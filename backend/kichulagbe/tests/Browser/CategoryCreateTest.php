<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
class CategoryCreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
              Storage::fake('public');

            $browser->loginAs(\App\Models\User::first()) // Ensure an authenticated user
                    ->visit('/category/create')
                    ->type('name', 'Category7')
                    ->type('slug', 'category7')
              ->attach('img', base_path('tests\Browser\files\sample.png'))
// Provide a sample image path
                    ->press('Create Category')
                    ->pause(2000)
                    ->assertPathIs('/category/index') // or your category index path
                    ->assertSee('Category');
        });
    }
}
