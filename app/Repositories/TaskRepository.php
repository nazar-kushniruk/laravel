<?php

namespace App\Repositories;

use App\User;
use App\Task;

class TaskRepository
{
    private $tasks;

    private $tasksModel;
    public function __construct(Task $taskModel )
    {
        $this->tasksModel = $taskModel;
    }

    /**
     * Получить все задачи заданного пользователя.
     *
     * @param  User $user
     * @return Collection
     */
    public function getUserTasks(User $user)
    {
        return $user->tasks()
            ->orderBy('created_at', 'asc');
    }

    public function getAllTasks()
    {
        return $this->tasksModel->all();

    }
    public function getSingleTask($id)
    {
        return $this->tasksModel->find($id);

    }

}
