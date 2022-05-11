<?php

namespace Tests\Unit;

use Tests\TestCase;
Use App\Models\User;

class UserTest extends TestCase
{
    public function testGetRegisterForm()
    {
        $response = $this->get('/auth/register');
        $response->assertStatus(200);
    }

    public function testGetLoginForm()
    {
        $response = $this->get('/auth/login');
        $response->assertStatus(200);
    }

    public function testRegisterProcess()
    {
        $response = $this->followingRedirects('main')->post('/auth/register_process', ['name' => 'TestUser', 'email' => 'TestEmail@mail.ru', 'password' => 'TestPassword12345', 'password_confirmation' => 'TestPassword12345']);
        $response->assertStatus(200);


        $response = $this->followingRedirects('register')->post('/auth/register_process', ['name' => '', 'email' => 'TestEmail2@mail.ru', 'password' => 'TestPassword123456', 'password_confirmation' => 'TestPassword12345']); 
        $response->assertStatus(200); // without name


        $response = $this->followingRedirects('register')->post('/auth/register_process', ['name' => 'TestUser2', 'email' => '', 'password' => 'TestPassword123456', 'password_confirmation' => 'TestPassword12345']); 
        $response->assertStatus(200); // without email


        $response = $this->followingRedirects('register')->post('/auth/register_process', ['name' => 'TestUser3', 'email' => 'TestEmail3@mail.ru', 'password' => 'TestPassword123456', 'password_confirmation' => '']); 
        $response->assertStatus(200); // without password confirmation


        $response = $this->followingRedirects('register')->post('/auth/register_process', ['name' => 'TestUser3', 'email' => 'TestEmail3@mail.ru', 'password' => '', 'password_confirmation' => '']); 
        $response->assertStatus(200); // without password


        $response = $this->followingRedirects('register')->post('/auth/register_process', []); 
        $response->assertStatus(200); // without all data
    }

    public function testLoginProcess()
    {
        $response = $this->followingRedirects('main')->post('/auth/login_process', ['email' => 'TestEmail@mail.ru', 'password' => 'TestPassword12345']);
        $response->assertStatus(200);


        $response = $this->followingRedirects('login')->post('/auth/login_process', ['email' => 'Abracadabra@mail.ru', 'password' => 'TestPassword12345']);
        $response->assertStatus(200); // with wrong email


        $response = $this->followingRedirects('login')->post('/auth/login_process', ['email' => 'TestEmail@mail.ru', 'password' => 'Abracadabra']);
        $response->assertStatus(200); // with wrong password


        $response = $this->followingRedirects('login')->post('/auth/login_process', []);
        $response->assertStatus(200); // without all data


        User::where('name', 'TestUser')->delete();
    }
}
