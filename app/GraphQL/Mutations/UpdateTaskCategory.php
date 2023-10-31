<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\TaskCategory;

final class UpdateTaskCategory
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args) :TaskCategory
    {
         $category = TaskCategory::findOrFail($args['id']);

         throw_if($category->user_id !== auth()->id(),new \App\Exceptions\CustomGqlException("You are not authorized to modify this resource")); //should be actual policy

         $category->update($args);

         return $category;
    }
}
