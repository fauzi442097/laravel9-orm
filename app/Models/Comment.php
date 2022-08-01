<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    use \Znck\Eloquent\Traits\BelongsToThrough;

    protected $guarded = ['id'];

    public function comment()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function project()
    {
        return $this->belongsToThrough(Project::class, [Task::class, User::class]);
    }
}
