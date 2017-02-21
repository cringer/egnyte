<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateRolesTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function admin_can_create_roles()
	{
	    $user = factory(User::class)->create();
	    $role = factory(Role::class)->create(['name' => 'admin']);
	    $user->assignRole('admin');

	    $response = $this->ActingAs($user)->json('POST', '/admin/role', ['name' => 'writer']);
	    $role = Role::where('name', 'writer')->first();

	    $response->assertStatus(201);
	    $this->assertEquals('writer', $role->name);
	}

	/** @test */
	public function user_cant_create_roles()
	{
	    $user = factory(User::class)->create();
	    $role = factory(Role::class)->create(['name' => 'user']);
	    $user->assignRole('user');

	    $response = $this->ActingAs($user)->post('/admin/role', ['name' => 'writer']);
	    $role = Role::where('name', 'writer')->first();

	    $response->assertStatus(403);
	    $this->assertEmpty($role);
	}

	/** @test */
	public function visitor_cant_create_roles()
	{
	    $response = $this->post('/admin/role', ['name' => 'writer']);
	    $role = Role::where('name', 'writer')->first();

	    $response->assertStatus(302);
	    $this->assertEmpty($role);
	}
}
