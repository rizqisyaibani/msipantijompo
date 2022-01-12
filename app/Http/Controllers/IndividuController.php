<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIndividuRequest;
use App\Http\Requests\UpdateIndividuRequest;
use App\Repositories\IndividuRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class IndividuController extends AppBaseController
{
    /** @var  IndividuRepository */
    private $individuRepository;

    public function __construct(IndividuRepository $individuRepo)
    {
        $this->individuRepository = $individuRepo;
    }

    /**
     * Display a listing of the Individu.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $individus = $this->individuRepository->all();

        return view('individus.index')
            ->with('individus', $individus);
    }

    /**
     * Show the form for creating a new Individu.
     *
     * @return Response
     */
    public function create()
    {
        return view('individus.create');
    }

    /**
     * Store a newly created Individu in storage.
     *
     * @param CreateIndividuRequest $request
     *
     * @return Response
     */
    public function store(CreateIndividuRequest $request)
    {
        $input = $request->all();

        $individu = $this->individuRepository->create($input);

        Flash::success('Individu saved successfully.');

        return redirect(route('individus.index'));
    }

    /**
     * Display the specified Individu.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $individu = $this->individuRepository->find($id);

        if (empty($individu)) {
            Flash::error('Individu not found');

            return redirect(route('individus.index'));
        }

        return view('individus.show')->with('individu', $individu);
    }

    /**
     * Show the form for editing the specified Individu.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $individu = $this->individuRepository->find($id);

        if (empty($individu)) {
            Flash::error('Individu not found');

            return redirect(route('individus.index'));
        }

        return view('individus.edit')->with('individu', $individu);
    }

    /**
     * Update the specified Individu in storage.
     *
     * @param int $id
     * @param UpdateIndividuRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIndividuRequest $request)
    {
        $individu = $this->individuRepository->find($id);

        if (empty($individu)) {
            Flash::error('Individu not found');

            return redirect(route('individus.index'));
        }

        $individu = $this->individuRepository->update($request->all(), $id);

        Flash::success('Individu updated successfully.');

        return redirect(route('individus.index'));
    }

    /**
     * Remove the specified Individu from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $individu = $this->individuRepository->find($id);

        if (empty($individu)) {
            Flash::error('Individu not found');

            return redirect(route('individus.index'));
        }

        $this->individuRepository->delete($id);

        Flash::success('Individu deleted successfully.');

        return redirect(route('individus.index'));
    }
}
