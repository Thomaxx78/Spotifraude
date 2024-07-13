<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ApiKey extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'key', 'user_id'];

    protected static function booted()
    {
        static::creating(function ($apiKey) {
            $apiKey->key = Str::random(32);
            $apiKey->uuid = (string) Str::uuid();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


