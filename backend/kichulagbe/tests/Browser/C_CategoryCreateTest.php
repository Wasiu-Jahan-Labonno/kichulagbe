<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
class C_CategoryCreateTest extends DuskTestCase
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
<<<<<<< HEAD:backend/kichulagbe/tests/Browser/C_CategoryCreateTest.php
                    ->type('name', 'Flat')
                    ->type('slug', 'Flat')
              ->attach('img', base_path('tests\Browser\files\sample.png'))
=======
                    ->type('name', 'Category10')
                    ->type('slug', 'category10')
              ->attach('img', base_path('tests/Browser/files/sample.png'))
>>>>>>> bf0accf36ac782287b21b1eb717a75aab0f82f7c:backend/kichulagbe/tests/Browser/CategoryCreateTest.php
// Provide a sample image path
                    ->press('Create Category')
                    ->pause(2000)
                    ->assertPathIs('/category/index') // or your category index path
                    ->assertSee('Category');
        });
    }
}
