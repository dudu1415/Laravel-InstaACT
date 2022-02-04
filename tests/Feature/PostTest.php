<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
class PostTest extends TestCase
{
    use DatabaseTransactions;
    use withFaker;
    /**
     * Entrar na página inicial e ver a frase 'Instact'
     * @return void
     */
    public function testOpenIndexAndSeeInstact()
    {

     $response = $this->get(    '/');
     $response->assertSee('Instact');
    }

    /**
     * Entrar na rota inicial e não ver a palavra Dashboard
     */

    public function testeOpenIndexAndDontSeeDashboard()
    {
        $response = $this->get('/');
        $response->assertDontSee('Dashboard');
    }
    /**
     * Tentar acessar a rota dashboard sem autenticação e retornar erro
     * @return void
     */

    public function testShouldNotOpenDashboardWithoutAuth(){

        $response = $this->get('/dashboard');
        $response->assertRedirect('/');
    }

    /**
     * Entrar na rota dashboard com autenticação
     */

    public function testShouldNotOpenDashboardWithAuth(){

        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/dashboard');
        $response->assertOk();
        $response->assertSee('Dashboard');

    }
    /**
     * Acessar Rota/posts/store e criar um Post
     */

    public function testShouldStorePost()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $input = [
            'description'=>$this->faker->sentence(4),
            'photo'=>UploadedFile::fake()->image('img.jpg')
        ];
        $response = $this->post('/posts/store',$input);
        $this->assertDatabaseHas('posts',[
           'description'=>$input['description'],
           'user_id'=>$user->id
        ]);

    }
}
