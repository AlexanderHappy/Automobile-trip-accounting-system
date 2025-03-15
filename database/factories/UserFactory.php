<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'user_name' => 'admin',
            'password' => password_hash('1234', PASSWORD_DEFAULT),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
