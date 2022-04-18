<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    /** @test */
    public function users_logged_can_see_list_of_clients()
    {
        $response = $this->get('/customers')
            ->assertRedirect('/login');
    }
}
