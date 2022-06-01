<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * Test Login
     *
     * @return void
     */
    public function test_login()
    {
        $user = User::where('email', 'krammstein@gmail.com')->first();

        $response = $this->post(route('user.doLogin'), [
            'email' => $user->email,
            'password' => '12345678',
        ]);

        $response->assertStatus(200);
    }
}
