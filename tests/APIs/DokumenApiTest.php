<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Dokumen;

class DokumenApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_dokumen()
    {
        $dokumen = Dokumen::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/dokumens', $dokumen
        );

        $this->assertApiResponse($dokumen);
    }

    /**
     * @test
     */
    public function test_read_dokumen()
    {
        $dokumen = Dokumen::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/dokumens/'.$dokumen->id
        );

        $this->assertApiResponse($dokumen->toArray());
    }

    /**
     * @test
     */
    public function test_update_dokumen()
    {
        $dokumen = Dokumen::factory()->create();
        $editedDokumen = Dokumen::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/dokumens/'.$dokumen->id,
            $editedDokumen
        );

        $this->assertApiResponse($editedDokumen);
    }

    /**
     * @test
     */
    public function test_delete_dokumen()
    {
        $dokumen = Dokumen::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/dokumens/'.$dokumen->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/dokumens/'.$dokumen->id
        );

        $this->response->assertStatus(404);
    }
}
