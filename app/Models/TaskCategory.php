<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id'
    ];

    /**
     * Task category owner
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Tasks belonging to  this category
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

}
