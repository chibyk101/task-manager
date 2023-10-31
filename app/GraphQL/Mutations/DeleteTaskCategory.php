<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Exceptions\CustomGqlException;
use App\Models\TaskCategory;

final class DeleteTaskCategory
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args): TaskCategory
    {
        $taskCategory = TaskCategory::findOrFail($args['id']);

        throw_if($taskCategory->user_id !== auth()->id(),new CustomGqlException("You aren't permitted to view this resource")); //should be actual policy

        $taskCategory->delete();

        return $taskCategory;
    }
}
