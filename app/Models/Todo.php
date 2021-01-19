<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function todo()
    {
        return $this->hasMany(Todo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
