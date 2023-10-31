<?php declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\TaskCategory;

final class TaskCategories
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        return TaskCategory::where('user_id',auth()->id())->get();
    }
}
