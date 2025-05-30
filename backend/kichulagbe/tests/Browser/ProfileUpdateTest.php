<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Support\Facades\Storage;

class ProfileUpdateTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testExample(): void
    {
  
        Storage::fake('public');

        $user = User::factory()->create([
            'name' => 'Old Name',
            'email' => 'old@example.com',
        ]);

      $this->browse(function (Browser $browser) use ($user) {
    $browser->loginAs($user)
        ->visit('/profile/edit') // Adjust if your route is different
        ->assertSee('Edit Profile')
        ->type('name', 'New Name')
        ->type('email', 'new@example.com')
        ->attach('img', base_path('tests/Browser/files/sample.png')) // Make sure this file exists
        ->press('আপডেট করুন')
        ->pause(1000)
        ->assertPathIs('/profile/'.$user->id); // Use dynamic user ID if the profile URL contains the user's ID
        
       
});
    }
}
