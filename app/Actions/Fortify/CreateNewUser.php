<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $user = User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'user_name' => $input['user_name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        UserProfile::create([
            'user_id' => $user->id,
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'full_name_color' => '#FFFFFF',
            'full_name_font' => 'font-mono',
            'full_name_font_size' => '30',
            'email_color' => '#FFFFFF',
            'email_font' => 'font-mono',
            'background_opacity' => '0.8',
            'user_image' => '1633524720.png',
        ]);
        return $user;
    }
}
