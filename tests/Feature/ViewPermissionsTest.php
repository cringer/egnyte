<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewPermissionsTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function admin_can_see_permissions()
	{
	    $user = factory(User::class)->create();
	    $role = factory(Role::class)->create(['name' => 'admin']);
	    $permission = factory(Permission::class)->create(['name' => 'modify_settings']);
	    $permissionA = factory(Permission::class)->create(['name' => 'create_users']);
	    $user->assignRole('admin');

	    $response = $this->ActingAs($user)->get('/admin/permission');

	    $response->assertStatus(200);
	    $response->assertSee($permission->name);
	    $response->assertSee($permissionA->name);
	}

	/** @test */
	public function users_cant_see_permissions()
	{
	    $user = factory(User::class)->create();
	    $role = factory(Role::class)->create(['name' => 'users']);
	    $permission = factory(Permission::class)->create(['name' => 'modify_settings']);
	    $permissionA = factory(Permission::class)->create(['name' => 'create_users']);
	    $user->assignRole('users');

	    $response = $this->ActingAs($user)->get('/admin/permission');

	    $response->assertStatus(403);	     
	}

	/** @test */
	public function visitor_cant_see_permissions()
	{
	    $user = factory(User::class)->create();
	    $permission = factory(Permission::class)->create(['name' => 'modify_settings']);
	    $permissionA = factory(Permission::class)->create(['name' => 'create_users']);

	    $response = $this->get('/admin/role');

	    $response->assertStatus(302);
	}
}
