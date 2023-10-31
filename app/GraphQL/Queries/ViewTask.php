<?php declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Exceptions\CustomGqlException;
use App\Models\Task;

final class ViewTask
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args): Task
    {
        $task = Task::with('category')->findOrFail($args['id']);

        throw_if($task->user_id !== auth()->id(),new CustomGqlException("You aren't permitted to view this task"));
        return $task;
    }
}
