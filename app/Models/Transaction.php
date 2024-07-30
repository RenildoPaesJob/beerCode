<?php

namespace App\Models;

use App\Enums\Enums\TransactionStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

	protected $fillable = [
		'total_price',
		'signature_id',
		'status'
	];

	protected $casts = [
		'status' => TransactionStatus::class
	];

	//relationships with signature 1-1
	public function signature()
	{
		return $this->belongsTo(Signature::class);
	}
}
