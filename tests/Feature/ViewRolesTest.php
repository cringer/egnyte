<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewRolesTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function admin_can_see_roles()
	{
	    $user = factory(User::class)->create();
	    $role = factory(Role::class)->create(['name' => 'admin']);
	    $roleA = factory(Role::class)->create(['name' => 'writer']);
	    $user->assignRole('admin');

	    $response = $this->ActingAs($user)->get('/admin/role');

	    $response->assertStatus(200);
	    $response->assertSee($role->name);
	    $response->assertSee($roleA->name);
	}

	/** @test */
	public function users_cant_see_roles()
	{
	    $user = factory(User::class)->create();
	    $role = factory(Role::class)->create(['name' => 'user']);
	    $roleA = factory(Role::class)->create(['name' => 'writer']);
	    $user->assignRole('user');

	    $response = $this->ActingAs($user)->get('/admin/role');

	    $response->assertStatus(403);  
	}

	/** @test */
	public function visitor_cant_see_roles()
	{
	    $user = factory(User::class)->create();
	    $role = factory(Role::class)->create(['name' => 'publisher']);

	    $response = $this->get('/admin/role');

	    $response->assertStatus(302);
	}
}
