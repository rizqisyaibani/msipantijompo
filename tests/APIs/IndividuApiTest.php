<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Individu;

class IndividuApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_individu()
    {
        $individu = Individu::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/individus', $individu
        );

        $this->assertApiResponse($individu);
    }

    /**
     * @test
     */
    public function test_read_individu()
    {
        $individu = Individu::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/individus/'.$individu->id
        );

        $this->assertApiResponse($individu->toArray());
    }

    /**
     * @test
     */
    public function test_update_individu()
    {
        $individu = Individu::factory()->create();
        $editedIndividu = Individu::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/individus/'.$individu->id,
            $editedIndividu
        );

        $this->assertApiResponse($editedIndividu);
    }

    /**
     * @test
     */
    public function test_delete_individu()
    {
        $individu = Individu::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/individus/'.$individu->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/individus/'.$individu->id
        );

        $this->response->assertStatus(404);
    }
}
