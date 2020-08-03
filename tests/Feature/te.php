<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class te extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function a_user_must_login_to_see_home_page()
    {
//        $this->withoutExceptionHandling();
        $response = $this->get('/home')->assertRedirect('/login');

//        $response->assertStatus(403);
    }
    /** @test */
    public function a_logedin_user_can_see_home_page()
    {
        $this->actingAs(factory(User::class)->create());
                $this->withoutExceptionHandling();
        $response= $this->get('/home')->assertOk();
    }

}
