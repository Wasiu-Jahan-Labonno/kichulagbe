<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class B_LoginTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
     public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
       $browser->visit('/login')
                ->assertTitleContains('kichulagbe') // Matches title check
                ->type('email', 'test@oleaon.com')
                ->type('password', 'password')
                ->press('#login-button') // Use press with button ID or text
                ->pause(10000) // Pause for 10 seconds (10,000 milliseconds)
                ->assertSee('Perfect Home'); // Check for successful login
        });
    
}
}
