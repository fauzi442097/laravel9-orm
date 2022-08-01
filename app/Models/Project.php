<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Team;
use App\Models\Task;

class Project extends Model
{
    use HasFactory;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;


    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
        // return $this->hasMany(User::class);
    }

    public function projectTasks()
    {
        return $this->hasManyThrough(
            Task::class,
            Team::class,
            'project_id', // Foreign key in pivot table
            'user_id', // Foregin key in task table
            'id', // id table in project table
            'user_id' // user id in pivot table
        );
    }

    public function comments()
    {
        return $this->hasManyDeep(Comment::class, [User::class, Task::class]);
    }
}
