<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Category;

class ProductCreateTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
               $user = User::factory()->create();
            $category = Category::factory()->create(['name' => 'Category1']);

            $browser->loginAs($user)
                ->visit('/products/create')
                ->type('name', 'Test Product')
                ->select('category_id', '1')
                ->type('price', '999')
                ->type('stock', '10')
                ->type('description', 'This is a test product.')
                ->attach('image', base_path('tests/Browser/files/sample.png'))
                ->press('Create Product')
                ->pause(2000)
                ->assertPathIs('/products') ;// Adjust based on your redirect

        });
    }
}
