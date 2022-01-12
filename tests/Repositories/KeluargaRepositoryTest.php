<?php namespace Tests\Repositories;

use App\Models\Keluarga;
use App\Repositories\KeluargaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class KeluargaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var KeluargaRepository
     */
    protected $keluargaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->keluargaRepo = \App::make(KeluargaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_keluarga()
    {
        $keluarga = Keluarga::factory()->make()->toArray();

        $createdKeluarga = $this->keluargaRepo->create($keluarga);

        $createdKeluarga = $createdKeluarga->toArray();
        $this->assertArrayHasKey('id', $createdKeluarga);
        $this->assertNotNull($createdKeluarga['id'], 'Created Keluarga must have id specified');
        $this->assertNotNull(Keluarga::find($createdKeluarga['id']), 'Keluarga with given id must be in DB');
        $this->assertModelData($keluarga, $createdKeluarga);
    }

    /**
     * @test read
     */
    public function test_read_keluarga()
    {
        $keluarga = Keluarga::factory()->create();

        $dbKeluarga = $this->keluargaRepo->find($keluarga->id);

        $dbKeluarga = $dbKeluarga->toArray();
        $this->assertModelData($keluarga->toArray(), $dbKeluarga);
    }

    /**
     * @test update
     */
    public function test_update_keluarga()
    {
        $keluarga = Keluarga::factory()->create();
        $fakeKeluarga = Keluarga::factory()->make()->toArray();

        $updatedKeluarga = $this->keluargaRepo->update($fakeKeluarga, $keluarga->id);

        $this->assertModelData($fakeKeluarga, $updatedKeluarga->toArray());
        $dbKeluarga = $this->keluargaRepo->find($keluarga->id);
        $this->assertModelData($fakeKeluarga, $dbKeluarga->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_keluarga()
    {
        $keluarga = Keluarga::factory()->create();

        $resp = $this->keluargaRepo->delete($keluarga->id);

        $this->assertTrue($resp);
        $this->assertNull(Keluarga::find($keluarga->id), 'Keluarga should not exist in DB');
    }
}
