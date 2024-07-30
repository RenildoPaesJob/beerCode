<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

	//only the fields that will be manipulated
	protected $fillable = [
		'user_id',
		'document',
		'birthdate'
	];

	//allows you to cast the following fields
	protected $casts = [
		'birthdate' => 'datetime'
	];

	//relationship with user 1-1
	public function user()
	{
		return $this->belongsTo(User::class);
	}

	//relationship with signatures 1-*
	public function signatures()
	{
		return $this->hasMany(Signature::class);
	}
}
