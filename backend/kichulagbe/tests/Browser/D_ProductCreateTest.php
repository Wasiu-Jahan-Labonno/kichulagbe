<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Category;

class D_ProductCreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
               $user = User::factory()->create();
            $category = Category::factory()->create(['name' => 'Flat']);

            $browser->loginAs($user)
                ->visit('/products/create')
<<<<<<< HEAD:backend/kichulagbe/tests/Browser/D_ProductCreateTest.php
                ->type('name', '3BHK Flat')
                ->select('category_id', $category->id)
                ->type('price', '26000')
                ->type('stock', '1')
=======
                ->type('name', 'Test Product')
                ->select('category_id', '1')
                ->type('price', '999')
                ->type('stock', '10')
>>>>>>> bf0accf36ac782287b21b1eb717a75aab0f82f7c:backend/kichulagbe/tests/Browser/ProductCreateTest.php
                ->type('description', 'This is a test product.')
                ->attach('image', base_path('tests/Browser/files/sample.png'))
                ->press('Create Product')
                ->pause(2000)
<<<<<<< HEAD:backend/kichulagbe/tests/Browser/D_ProductCreateTest.php
                ->assertPathIs('/products') // Adjust based on your redirect
                ->assertSee('Product');
=======
                ->assertPathIs('/products') ;// Adjust based on your redirect

>>>>>>> bf0accf36ac782287b21b1eb717a75aab0f82f7c:backend/kichulagbe/tests/Browser/ProductCreateTest.php
        });
    }
}
