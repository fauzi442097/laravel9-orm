<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Task;

class Project extends Model
{
    use HasFactory;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;


    protected $guarded = ['id'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function projectTasks()
    {
        return $this->hasManyThrough(Task::class, User::class, 'project_id', 'user_id');
    }

    public function comments()
    {
        return $this->hasManyDeep(Comment::class, [User::class, Task::class]);
    }
}
