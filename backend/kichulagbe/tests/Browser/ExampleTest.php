<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
     public function testBasicExample(): void
    {
        $this->browse(function (Browser $browser) {
       $browser->visit('/login')
                ->assertTitleContains('kichulagbe') // Matches title check
                ->type('email', 's@s.com')
                ->type('password', '123456789')
                ->press('#login-button') // Use press with button ID or text
                ->pause(10000) // Pause for 10 seconds (10,000 milliseconds)
                ->assertPathIs('/home'); // Check for successful login
        });

}
}
