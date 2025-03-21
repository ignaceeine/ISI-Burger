<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }


    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::create([
            'name' => 'Test User3',
            'telephone' => '9123456789',
            'email' => 'test3@example.com',
            'adresse' => 'Test Adresse',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_logout(): void
    {
        $user = User::create([
            'name' => 'Test User4',
            'telephone' => '8123456789',
            'email' => 'test4@example.com',
            'adresse' => 'Test Adresse',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/');
    }
}
