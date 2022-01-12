<?php namespace Tests\Repositories;

use App\Models\Individu;
use App\Repositories\IndividuRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class IndividuRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var IndividuRepository
     */
    protected $individuRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->individuRepo = \App::make(IndividuRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_individu()
    {
        $individu = Individu::factory()->make()->toArray();

        $createdIndividu = $this->individuRepo->create($individu);

        $createdIndividu = $createdIndividu->toArray();
        $this->assertArrayHasKey('id', $createdIndividu);
        $this->assertNotNull($createdIndividu['id'], 'Created Individu must have id specified');
        $this->assertNotNull(Individu::find($createdIndividu['id']), 'Individu with given id must be in DB');
        $this->assertModelData($individu, $createdIndividu);
    }

    /**
     * @test read
     */
    public function test_read_individu()
    {
        $individu = Individu::factory()->create();

        $dbIndividu = $this->individuRepo->find($individu->id);

        $dbIndividu = $dbIndividu->toArray();
        $this->assertModelData($individu->toArray(), $dbIndividu);
    }

    /**
     * @test update
     */
    public function test_update_individu()
    {
        $individu = Individu::factory()->create();
        $fakeIndividu = Individu::factory()->make()->toArray();

        $updatedIndividu = $this->individuRepo->update($fakeIndividu, $individu->id);

        $this->assertModelData($fakeIndividu, $updatedIndividu->toArray());
        $dbIndividu = $this->individuRepo->find($individu->id);
        $this->assertModelData($fakeIndividu, $dbIndividu->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_individu()
    {
        $individu = Individu::factory()->create();

        $resp = $this->individuRepo->delete($individu->id);

        $this->assertTrue($resp);
        $this->assertNull(Individu::find($individu->id), 'Individu should not exist in DB');
    }
}
