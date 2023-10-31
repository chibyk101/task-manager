<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Exceptions\CustomGqlException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

final class Login
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args): string
    {
        /**
         * @var User $user
         */
        $user = User::where('email',$args['email'])->first();

        if($user && Hash::check($args['password'],$user->password)){
            return  $user->createToken(request()->ip())->plainTextToken;
        }

        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
}
