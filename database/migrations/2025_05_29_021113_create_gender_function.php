<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE FUNCTION getGenderCode(code CHAR(1))
            RETURNS VARCHAR(20)
            BEGIN
                RETURN CASE code
                    WHEN "L" THEN "Laki-laki"
                    WHEN "P" THEN "Perempuan"
                    ELSE "Tidak Diketahui"
                END;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP FUNCTION IF EXISTS getGenderCode');
    }
};
