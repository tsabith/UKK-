<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->string('table_name');
            $table->unsignedBigInteger('record_id');
            $table->string('action'); // INSERT, UPDATE, DELETE
            $table->json('old_values')->nullable();
            $table->json('new_values')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });

        // Trigger untuk tabel siswas
        DB::unprepared('
            CREATE TRIGGER tr_siswas_after_update
            AFTER UPDATE ON siswas
            FOR EACH ROW
            BEGIN
                INSERT INTO audit_logs (table_name, record_id, action, old_values, new_values, created_at, updated_at)
                VALUES ("siswas", 
                        NEW.id,
                        "UPDATE",
                        JSON_OBJECT(
                            "nama", OLD.nama,
                            "nis", OLD.nis,
                            "email", OLD.email,
                            "status_lapor_pkl", OLD.status_lapor_pkl
                        ),
                        JSON_OBJECT(
                            "nama", NEW.nama,
                            "nis", NEW.nis,
                            "email", NEW.email,
                            "status_lapor_pkl", NEW.status_lapor_pkl
                        ),
                        NOW(),
                        NOW()
                );
            END
        ');

        // Trigger untuk tabel pkls
        DB::unprepared('
            CREATE TRIGGER tr_pkls_after_insert
            AFTER INSERT ON pkls
            FOR EACH ROW
            BEGIN
                -- Update status siswa ketika PKL dibuat
                UPDATE siswas 
                SET status_lapor_pkl = true, 
                    updated_at = NOW()
                WHERE id = NEW.siswa_id;
                
                -- Log perubahan
                INSERT INTO audit_logs (table_name, record_id, action, new_values, created_at, updated_at)
                VALUES ("pkls", 
                        NEW.id,
                        "INSERT",
                        JSON_OBJECT(
                            "siswa_id", NEW.siswa_id,
                            "industri_id", NEW.industri_id,
                            "tanggal_mulai", NEW.tanggal_mulai,
                            "tanggal_selesai", NEW.tanggal_selesai
                        ),
                        NOW(),
                        NOW()
                );
            END
        ');
    }

    public function down(): void
    {
        // Hapus trigger
        DB::unprepared('DROP TRIGGER IF EXISTS tr_siswas_after_update');
        DB::unprepared('DROP TRIGGER IF EXISTS tr_pkls_after_insert');

        Schema::dropIfExists('audit_logs');
    }
};
