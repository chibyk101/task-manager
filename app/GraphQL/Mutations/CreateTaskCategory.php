<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\TaskCategory;

final class CreateTaskCategory
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args): TaskCategory
    {
        /**
         * @var \App\Models\User $user
         */

         $user = auth()->user();

         $category = new TaskCategory($args);
         $user->taskCategories()->save($category);
         
         return $category;
    }
}
