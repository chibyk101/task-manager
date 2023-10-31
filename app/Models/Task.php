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
        'task_category_id',
        'status',
        'due_date'
    ];

    protected $appends = [
        'is_almost_due', //boolean
        'is_due', //boolean
    ];

    /**
     * Task category (eg. Personal, Urgent, Work)
     */
    public function category()
    {
        return $this->belongsTo(TaskCategory::class,'task_category_id');
    }

    /**
     * Task Owner
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getIsAlmostDueAttribute()
    {
        return now()->diffInDays($this->attributes['due_date']) <= 1;
    }

    public function getIsDueAttribute()
    {
        return now()->greaterThanOrEqualTo($this->attributes['due_date']);
    }
}
