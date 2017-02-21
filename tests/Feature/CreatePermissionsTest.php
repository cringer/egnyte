<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreatePermissionsTest extends TestCase
{
use DatabaseMigrations;

	/** @test */
	public function admin_can_create_permissions()
	{
	    $user = factory(User::class)->create();
	    $role = factory(Role::class)->create(['name' => 'admin']);
	    $user->assignRole('admin');

	    $response = $this->ActingAs($user)->json('POST', '/admin/permission', ['name' => 'modify_settings']);
	    $permission = Permission::where('name', 'modify_settings')->first();

	    $response->assertStatus(201);
	    $this->assertEquals('modify_settings', $permission->name);
	}

	/** @test */
	public function user_cant_create_permissions()
	{
	    $user = factory(User::class)->create();
	    $role = factory(Role::class)->create(['name' => 'user']);
	    $user->assignRole('user');

	    $response = $this->ActingAs($user)->post('/admin/permission', ['name' => 'modify_settings']);
	    $permission = Permission::where('name', 'modify_settings')->first();

	    $response->assertStatus(403);
	    $this->assertEmpty($permission);
	}

	/** @test */
	public function visitor_cant_create_roles()
	{
	    $response = $this->post('/admin/permission', ['name' => 'modify_settings']);
	    $permission = Permission::where('name', 'modify_settings')->first();

	    $response->assertStatus(302);
	    $this->assertEmpty($permission);
	}
}
