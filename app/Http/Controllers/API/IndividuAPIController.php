<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateIndividuAPIRequest;
use App\Http\Requests\API\UpdateIndividuAPIRequest;
use App\Models\Individu;
use App\Repositories\IndividuRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class IndividuController
 * @package App\Http\Controllers\API
 */

class IndividuAPIController extends AppBaseController
{
    /** @var  IndividuRepository */
    private $individuRepository;

    public function __construct(IndividuRepository $individuRepo)
    {
        $this->individuRepository = $individuRepo;
    }

    /**
     * Display a listing of the Individu.
     * GET|HEAD /individus
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $individus = $this->individuRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($individus->toArray(), 'Individus retrieved successfully');
    }

    /**
     * Store a newly created Individu in storage.
     * POST /individus
     *
     * @param CreateIndividuAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateIndividuAPIRequest $request)
    {
        $input = $request->all();

        $individu = $this->individuRepository->create($input);

        return $this->sendResponse($individu->toArray(), 'Individu saved successfully');
    }

    /**
     * Display the specified Individu.
     * GET|HEAD /individus/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Individu $individu */
        $individu = $this->individuRepository->find($id);

        if (empty($individu)) {
            return $this->sendError('Individu not found');
        }

        return $this->sendResponse($individu->toArray(), 'Individu retrieved successfully');
    }

    /**
     * Update the specified Individu in storage.
     * PUT/PATCH /individus/{id}
     *
     * @param int $id
     * @param UpdateIndividuAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIndividuAPIRequest $request)
    {
        $input = $request->all();

        /** @var Individu $individu */
        $individu = $this->individuRepository->find($id);

        if (empty($individu)) {
            return $this->sendError('Individu not found');
        }

        $individu = $this->individuRepository->update($input, $id);

        return $this->sendResponse($individu->toArray(), 'Individu updated successfully');
    }

    /**
     * Remove the specified Individu from storage.
     * DELETE /individus/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Individu $individu */
        $individu = $this->individuRepository->find($id);

        if (empty($individu)) {
            return $this->sendError('Individu not found');
        }

        $individu->delete();

        return $this->sendSuccess('Individu deleted successfully');
    }
}
