<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Task;

final class Tasks
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $status = isset($args['status']) ? $args['status'] : null;

        $tasks = Task::query()
            ->where('user_id', auth()->id())
            ->when($status, fn ($q, $status) => $q->where('status', $status))
            ->get();

        return $tasks;
    }
}
