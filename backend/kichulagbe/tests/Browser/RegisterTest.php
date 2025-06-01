<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('name', 'Test User')
                    ->type('email', 'g@g.com')
                    ->type('password', '123456789')
                    ->type('password_confirmation', '123456789')
                    ->select('role', 'seller') // or 'buyer'
                    ->press('Register')
                    ->pause(2000) // Give time for redirect
                    ->assertPathIs('/home'); // Change this to your post-register route

        });
    }
}
