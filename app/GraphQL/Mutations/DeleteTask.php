<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Exceptions\CustomGqlException;
use App\Models\Task;

final class DeleteTask
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args): Task
    {
        $task = Task::findOrFail($args['id']);

        throw_if($task->user_id !== auth()->id(),new CustomGqlException("You aren't permitted to delete this task")); //should be actual policy

        $task->delete();

        return $task;
    }
}
