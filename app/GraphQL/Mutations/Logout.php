<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;

final class Logout
{
  /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args): ?User
    {
        $user = auth()->user();

        $user->currentAccessToken()->delete();

        return $user;
    }
}
