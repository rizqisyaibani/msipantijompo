<?php namespace Tests\Repositories;

use App\Models\Dokumen;
use App\Repositories\DokumenRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DokumenRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DokumenRepository
     */
    protected $dokumenRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->dokumenRepo = \App::make(DokumenRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_dokumen()
    {
        $dokumen = Dokumen::factory()->make()->toArray();

        $createdDokumen = $this->dokumenRepo->create($dokumen);

        $createdDokumen = $createdDokumen->toArray();
        $this->assertArrayHasKey('id', $createdDokumen);
        $this->assertNotNull($createdDokumen['id'], 'Created Dokumen must have id specified');
        $this->assertNotNull(Dokumen::find($createdDokumen['id']), 'Dokumen with given id must be in DB');
        $this->assertModelData($dokumen, $createdDokumen);
    }

    /**
     * @test read
     */
    public function test_read_dokumen()
    {
        $dokumen = Dokumen::factory()->create();

        $dbDokumen = $this->dokumenRepo->find($dokumen->id);

        $dbDokumen = $dbDokumen->toArray();
        $this->assertModelData($dokumen->toArray(), $dbDokumen);
    }

    /**
     * @test update
     */
    public function test_update_dokumen()
    {
        $dokumen = Dokumen::factory()->create();
        $fakeDokumen = Dokumen::factory()->make()->toArray();

        $updatedDokumen = $this->dokumenRepo->update($fakeDokumen, $dokumen->id);

        $this->assertModelData($fakeDokumen, $updatedDokumen->toArray());
        $dbDokumen = $this->dokumenRepo->find($dokumen->id);
        $this->assertModelData($fakeDokumen, $dbDokumen->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_dokumen()
    {
        $dokumen = Dokumen::factory()->create();

        $resp = $this->dokumenRepo->delete($dokumen->id);

        $this->assertTrue($resp);
        $this->assertNull(Dokumen::find($dokumen->id), 'Dokumen should not exist in DB');
    }
}
