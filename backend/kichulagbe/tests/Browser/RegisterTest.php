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
                    ->type('email', 'testuser' . time() . '@example.com') // Unique email
                    ->type('password', 'password')
                    ->type('password_confirmation', 'password')
                    ->select('role', 'seller') // or 'seller'
                    ->press('Register')
                    ->pause(2000) // Wait for redirect
                    ->assertPathIs('/home') // Change to your post-registration path
                    ->assertSee('Perfect Home'); // Or any text that confirms successful registration
        });
    }
}
