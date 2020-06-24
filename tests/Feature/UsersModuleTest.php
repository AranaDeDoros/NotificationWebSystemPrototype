<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\User;
use App\Role;
use App\Permission;

class UsersModuleTest extends TestCase
{

    use DatabaseMigrations;
    use RefreshDatabase;

    const USER_LIST = 'users/all';
    const USER_VIEW = 'users/view';

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testFrontPageIsUp()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testGuestsRequireLogin()
    {
        $response = $this->get(self::USER_LIST);
        $this->assertGuest();
    }

    public function testOnlyRegisteredUserCanEnterMdoule()
    {
        
        $this->createPermissions();
        $this->createRoles();

        $this->actingAs(factory(User::class)
            ->create());

        $response= $this->get(self::USER_LIST)
        ->assertOk();

    }


    public function testRegisteredUserCanVisitSingleUserView()
    {

        $user = $this->createNewUsers()[0];
        $route = $this->createUserRouteWithId($user->id);
        $response = $this->get($route);
        $response->assertStatus(200);

    }

    public function testUserCanBeCreated()
    {

        $user = $this->createNewUsers()[0];
        $route = $this->createNewUserRoute($user);
        //dd($user);
        $response = $this->post($route);
        $response->assertStatus(200);

    }

    public function testUserCanBeUpdated()
    {

        $user = User::find($this->createNewUsers()[0]->id);
        $route = $this->createUpdatedUserRoute($user, 'TESTMAN');
        $response = $this->put($route);
        $response->assertStatus(200);


    }

    public function testUserCanBeDeleted()
    {

       $user = User::find($this->createNewUsers()[0]->id);
        $route = $this->createDeletedUserRoute($user);
        $response = $this->delete($route);
        //softdelete
        $response->assertStatus(302);      

    }

    protected function createRoles($number = 3)
    {

        return factory(Role::class, $number)->create();

    }

    protected function createPermissions($number = 3)
    {

        return factory(Permission::class, $number)->create();

    }

    protected function createNewUsers($number = 1)
    {
        $this->createPermissions();
        $this->createRoles();
        return factory(User::class, $number)->create();
    }

    protected function createUserRouteWithId($userId)
    {

        return $route = route('users.view', [
            'id' => $userId
        ]);

    }

    protected function createNewUserRoute($user)
    {

        return $route = route('users.new', [
            'name' => $user->name,
            'email' => $user->email,
            'roleId' => $user->roleId,
            'status' => 0
        ]);

    }

    protected function createUpdatedUserRoute($user, $newName)
    {

        return $route = route('users.update', [
            'id' => $user->id,
            'name'=> $newName,
            'email'=> $user->email,
            'roleId'=> 1

        ]);

    }

    protected function createDeletedUserRoute($userId)
    {
        return $route = route('users.delete', [
            'id' => $userId
        ]);
    }
    
    

}
