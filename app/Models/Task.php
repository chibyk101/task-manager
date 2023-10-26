<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'task_category_id'
    ];

    /**
     * Task category (eg. Personal, Urgent, Work)
     */
    public function category()
    {
        return $this->belongsTo(TaskCategory::class);
    }

    /**
     * Task Owner
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
