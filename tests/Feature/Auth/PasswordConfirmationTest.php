<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PasswordConfirmationTest extends TestCase
{
    use RefreshDatabase;

    public function test_confirm_password_screen_can_be_rendered(): void
    {
        $user = User::create([
            'name' => 'Test User8',
            'telephone' => '3129156789',
            'email' => 'test8@example.com',
            'adresse' => 'Test Adresse',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response = $this->actingAs($user)->get('/confirm-password');

        $response->assertStatus(200);
    }

    public function test_password_can_be_confirmed(): void
    {
        $user = User::create([
            'name' => 'Test User10',
            'telephone' => '3102456789',
            'email' => 'test10@example.com',
            'adresse' => 'Test Adresse',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response = $this->actingAs($user)->post('/confirm-password', [
            'password' => 'password',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }

    public function test_password_is_not_confirmed_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/confirm-password', [
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors();
    }
}
