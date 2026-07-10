<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_admin_dashboard_response(): void
    {
        $admin = \App\Models\User::where('email', 'admin@gmail.com')->first();
        if ($admin) {
            $response = $this->actingAs($admin)->get('/admin');
            $response->assertStatus(200);
        }
    }

    public function test_admin_rooms_response(): void
    {
        $admin = \App\Models\User::where('email', 'admin@gmail.com')->first();
        if ($admin) {
            $response = $this->actingAs($admin)->get('/admin/rooms');
            $response->assertStatus(200);
        }
    }
}

