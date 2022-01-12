<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKeluargaAPIRequest;
use App\Http\Requests\API\UpdateKeluargaAPIRequest;
use App\Models\Keluarga;
use App\Repositories\KeluargaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class KeluargaController
 * @package App\Http\Controllers\API
 */

class KeluargaAPIController extends AppBaseController
{
    /** @var  KeluargaRepository */
    private $keluargaRepository;

    public function __construct(KeluargaRepository $keluargaRepo)
    {
        $this->keluargaRepository = $keluargaRepo;
    }

    /**
     * Display a listing of the Keluarga.
     * GET|HEAD /keluargas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $keluargas = $this->keluargaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($keluargas->toArray(), 'Keluargas retrieved successfully');
    }

    /**
     * Store a newly created Keluarga in storage.
     * POST /keluargas
     *
     * @param CreateKeluargaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKeluargaAPIRequest $request)
    {
        $input = $request->all();

        $keluarga = $this->keluargaRepository->create($input);

        return $this->sendResponse($keluarga->toArray(), 'Keluarga saved successfully');
    }

    /**
     * Display the specified Keluarga.
     * GET|HEAD /keluargas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Keluarga $keluarga */
        $keluarga = $this->keluargaRepository->find($id);

        if (empty($keluarga)) {
            return $this->sendError('Keluarga not found');
        }

        return $this->sendResponse($keluarga->toArray(), 'Keluarga retrieved successfully');
    }

    /**
     * Update the specified Keluarga in storage.
     * PUT/PATCH /keluargas/{id}
     *
     * @param int $id
     * @param UpdateKeluargaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKeluargaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Keluarga $keluarga */
        $keluarga = $this->keluargaRepository->find($id);

        if (empty($keluarga)) {
            return $this->sendError('Keluarga not found');
        }

        $keluarga = $this->keluargaRepository->update($input, $id);

        return $this->sendResponse($keluarga->toArray(), 'Keluarga updated successfully');
    }

    /**
     * Remove the specified Keluarga from storage.
     * DELETE /keluargas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Keluarga $keluarga */
        $keluarga = $this->keluargaRepository->find($id);

        if (empty($keluarga)) {
            return $this->sendError('Keluarga not found');
        }

        $keluarga->delete();

        return $this->sendSuccess('Keluarga deleted successfully');
    }
}
