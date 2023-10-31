<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Task;

final class UpdateTask
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args): Task
    {
        $task = Task::findOrFail($args['id']);

         throw_if($task->user_id !== auth()->id(),new \App\Exceptions\CustomGqlException("You are not authorized to modify this resource")); //should be actual policy

         $task->update($args);

         return $task;
    }
}
