<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['text', 'user_id', 'task_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentTask()
    {
        return $this->belongsTo(Task::class);

    }

    public function getPostComments($id)
    {
            return Comment::where('task_id',$id)->get();
    }
}
