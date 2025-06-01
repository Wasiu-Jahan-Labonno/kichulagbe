<?php

namespace Tests\Browser;

use App\Models\User;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Support\Facades\Storage;

class E_ProfileUpdateTest extends DuskTestCase
{
<<<<<<< HEAD:backend/kichulagbe/tests/Browser/E_ProfileUpdateTest.php
   
=======
>>>>>>> bf0accf36ac782287b21b1eb717a75aab0f82f7c:backend/kichulagbe/tests/Browser/ProfileUpdateTest.php

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
<<<<<<< HEAD:backend/kichulagbe/tests/Browser/E_ProfileUpdateTest.php
        ->type('name', 'Test User 3')
        ->type('email', 'test3@oleaon.com') // Make sure this file exists
=======
        ->type('name', 'New Name')
        ->type('email', 's@s.com')
        ->attach('img', base_path('tests/Browser/files/sample.png')) // Make sure this file exists
>>>>>>> bf0accf36ac782287b21b1eb717a75aab0f82f7c:backend/kichulagbe/tests/Browser/ProfileUpdateTest.php
        ->press('আপডেট করুন')
        ->pause(1000)
        ->assertPathIs('/profile'); // Use dynamic user ID if the profile URL contains the user's ID


});
    }
}
