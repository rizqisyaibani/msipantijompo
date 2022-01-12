<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Keluarga;

class KeluargaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_keluarga()
    {
        $keluarga = Keluarga::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/keluargas', $keluarga
        );

        $this->assertApiResponse($keluarga);
    }

    /**
     * @test
     */
    public function test_read_keluarga()
    {
        $keluarga = Keluarga::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/keluargas/'.$keluarga->id
        );

        $this->assertApiResponse($keluarga->toArray());
    }

    /**
     * @test
     */
    public function test_update_keluarga()
    {
        $keluarga = Keluarga::factory()->create();
        $editedKeluarga = Keluarga::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/keluargas/'.$keluarga->id,
            $editedKeluarga
        );

        $this->assertApiResponse($editedKeluarga);
    }

    /**
     * @test
     */
    public function test_delete_keluarga()
    {
        $keluarga = Keluarga::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/keluargas/'.$keluarga->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/keluargas/'.$keluarga->id
        );

        $this->response->assertStatus(404);
    }
}
