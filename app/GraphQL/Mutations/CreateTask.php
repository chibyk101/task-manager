<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Task;

final class CreateTask
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args) :Task
    {
        $task = new Task($args);
        $task->user()->associate(auth()->user());
        $task->save();
        
        return $task;
    }
}
