<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assignment extends Model
{
    protected $fillable = [
        'course_name',
        'title',
        'description',
        'due_date',
        'is_completed',
        'user_id',
    ];

    // This function creates Relationships between the assignment and the user
    // An assignment belongs to a user, but a user can have many assignments
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
