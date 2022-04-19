<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterUserTest extends DuskTestCase
{
    /** @test */
    public function check_if_root_site_is_correct()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }

    /** @test */
    public function check_if_login_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'to@mail.com')
                ->type('password', '123456789')
                ->press('Login')
                ->assertPathIs('/home');
        });
    }

    /** @test */
    public function check_if_register_is_working()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('name', 'User')
                ->type('email', 'to@mail.com')
                ->type('password', '123456789')
                ->type('password_confirmation', '123456789')
                ->press('Register')
                ->assertPathIs('/home')
                ->assertSee('Dashboard');
        });
    }
}
