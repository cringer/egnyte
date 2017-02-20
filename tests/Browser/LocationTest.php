<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LocationTest extends DuskTestCase
{
    /** @test */
    public function admin_can_create_location()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/location')
                    ->type('name', 'John Doe')
                    ->type('email', 'john@example.com')
                    ->press('Register')
                    ->assertPathIs('/newhire')
                    ->assertSee('John Doe');
        });
    }
}
