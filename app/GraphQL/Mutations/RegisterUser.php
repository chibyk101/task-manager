<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\User;

final class RegisterUser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args): string
    {
        $user = new User($args);
        $user->save();
        return $user->createToken(request()->userAgent())->plainTextToken;
    }
}
