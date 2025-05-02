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
        ->waitForText('Welcome to MyApp', 10000) // waits up to 10 seconds
        ->assertSee('Welcome to MyApp');
        });
    }
}
