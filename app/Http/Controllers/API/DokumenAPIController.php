<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDokumenAPIRequest;
use App\Http\Requests\API\UpdateDokumenAPIRequest;
use App\Models\Dokumen;
use App\Repositories\DokumenRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DokumenController
 * @package App\Http\Controllers\API
 */

class DokumenAPIController extends AppBaseController
{
    /** @var  DokumenRepository */
    private $dokumenRepository;

    public function __construct(DokumenRepository $dokumenRepo)
    {
        $this->dokumenRepository = $dokumenRepo;
    }

    /**
     * Display a listing of the Dokumen.
     * GET|HEAD /dokumens
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $dokumens = $this->dokumenRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($dokumens->toArray(), 'Dokumens retrieved successfully');
    }

    /**
     * Store a newly created Dokumen in storage.
     * POST /dokumens
     *
     * @param CreateDokumenAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDokumenAPIRequest $request)
    {
        $input = $request->all();

        $dokumen = $this->dokumenRepository->create($input);

        return $this->sendResponse($dokumen->toArray(), 'Dokumen saved successfully');
    }

    /**
     * Display the specified Dokumen.
     * GET|HEAD /dokumens/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Dokumen $dokumen */
        $dokumen = $this->dokumenRepository->find($id);

        if (empty($dokumen)) {
            return $this->sendError('Dokumen not found');
        }

        return $this->sendResponse($dokumen->toArray(), 'Dokumen retrieved successfully');
    }

    /**
     * Update the specified Dokumen in storage.
     * PUT/PATCH /dokumens/{id}
     *
     * @param int $id
     * @param UpdateDokumenAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDokumenAPIRequest $request)
    {
        $input = $request->all();

        /** @var Dokumen $dokumen */
        $dokumen = $this->dokumenRepository->find($id);

        if (empty($dokumen)) {
            return $this->sendError('Dokumen not found');
        }

        $dokumen = $this->dokumenRepository->update($input, $id);

        return $this->sendResponse($dokumen->toArray(), 'Dokumen updated successfully');
    }

    /**
     * Remove the specified Dokumen from storage.
     * DELETE /dokumens/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Dokumen $dokumen */
        $dokumen = $this->dokumenRepository->find($id);

        if (empty($dokumen)) {
            return $this->sendError('Dokumen not found');
        }

        $dokumen->delete();

        return $this->sendSuccess('Dokumen deleted successfully');
    }
}
