<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory, SoftDeletes;

	protected $fillable = [
		'name',
		'short_description',
		'price',
		'cod'
	];

	//relationship with signatures 1-*
	public function signatures(): \Illuminate\Database\Eloquent\Relations\HasMany
	{
		return $this->hasMany(Signature::class);
	}
}
