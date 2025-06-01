<?php

namespace Tests\Browser;

use App\Models\User;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Support\Facades\Storage;

class E_ProfileUpdateTest extends DuskTestCase
{
   

    public function testExample(): void
    {
  
        Storage::fake('public');

        $user = User::factory()->create([
            'name' => 'Test User 2',
            'email' => 'test2@oleaon.com',
        ]);

      $this->browse(function (Browser $browser) use ($user) {
    $browser->loginAs($user)
        ->visit('/profile/edit') // Adjust if your route is different
        ->assertSee('Edit Profile')
        ->type('name', 'Test User 3')
        ->type('email', 'test3@oleaon.com') // Make sure this file exists
        ->press('আপডেট করুন')
        ->pause(1000)
        ->assertPathIs('/profile/'.$user->id); // Use dynamic user ID if the profile URL contains the user's ID
        
       
});
    }
}
