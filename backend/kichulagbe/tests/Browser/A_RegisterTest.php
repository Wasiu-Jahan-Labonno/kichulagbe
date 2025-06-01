<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class A_RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('name', 'Test User')
<<<<<<< HEAD:backend/kichulagbe/tests/Browser/A_RegisterTest.php
                    ->type('email', 'test@oleaon.com') // Unique email
                    ->type('password', 'password')
                    ->type('password_confirmation', 'password')
                    ->select('role', 'seller') // or 'seller'
                    ->press('Register')
                    ->pause(2000) // Wait for redirect
                    ->assertPathIs('/home'); // Change to your post-registration path
                   
=======
                    ->type('email', 'g@g.com')
                    ->type('password', '123456789')
                    ->type('password_confirmation', '123456789')
                    ->select('role', 'seller') // or 'buyer'
                    ->press('Register')
                    ->pause(2000) // Give time for redirect
                    ->assertPathIs('/home'); // Change this to your post-register route

>>>>>>> bf0accf36ac782287b21b1eb717a75aab0f82f7c:backend/kichulagbe/tests/Browser/RegisterTest.php
        });
    }
}
