<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Siswa extends Model
{
	use \Illuminate\Database\Eloquent\Factories\HasFactory;

	protected $fillable = [
    	'nama', 'nis', 'gender', 'alamat', 'kontak', 'email', 'foto', 'status_lapor_pkl', 'user_id'
	];

	public function pkl(): HasOne
	{
    	return $this->hasOne(Pkl::class);
	}

	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}
}
