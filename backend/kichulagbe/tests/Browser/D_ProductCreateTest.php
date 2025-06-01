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
                ->type('name', '3BHK Flat')
                ->select('category_id', $category->id)
                ->type('price', '26000')
                ->type('stock', '1')
                ->type('description', 'This is a test product.')
                ->attach('image', base_path('tests/Browser/files/sample2.jpg'))
                ->press('Create Product')
                ->pause(2000)
                ->assertPathIs('/products') // Adjust based on your redirect
                ->assertSee('Product');
        });
    }
}
