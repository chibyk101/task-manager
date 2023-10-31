<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;

final class UpdateProfile
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args): User
    {
        /**
         * @var \App\Models\User $user
         */

        $user = auth()->user();

        $user->update($args);

        return $user;
    }
}
