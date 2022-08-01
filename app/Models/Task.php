<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Project;
use App\Models\User;

class Task extends Model
{
    use HasFactory;
    use \Znck\Eloquent\Traits\BelongsToThrough;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function projects()
    {
        return $this->belongsToThrough(Project::class, User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class, 'task_id');
    }
}
