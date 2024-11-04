<?php

namespace Database\Factories\Person;
 
use Illuminate\Database\Eloquent\Factories\Factory;
use Models\Person\User;
 
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;
    protected $model = User::class;
 
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->name(),
            'lastname' => fake()->name(),
            'password' => static::$password ??= Hash::make('password'),
        ];
    }
 
    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}