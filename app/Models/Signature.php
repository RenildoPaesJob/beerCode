<?php

namespace App\Models;

use App\Enums\SignatureStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Signature extends Model
{
    use HasFactory, SoftDeletes;

	protected $fillable = [
		'client_id',
		'plan_id',
		'status',
	];

	//typed with SignatureStatus enum
	protected $casts = [
		'status' => SignatureStatus::class,
	];

	//relationships with client 1-1
	public function client()
	{
		return $this->belongsTo(Client::class);
	}

	//relationships with plan 1-1
	public function plan()
	{
		return $this->belongsTo(Plan::class);
	}

	//relationships with transactions 1-*
	public function transactions()
	{
		return $this->hasMany(Transaction::class);
	}

	//relationships with signatureHistories 1-*
	public function signatureHistories()
	{
		return $this->hasMany(SignatureHistory::class);
	}
}
