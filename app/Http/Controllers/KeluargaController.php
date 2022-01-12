<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKeluargaRequest;
use App\Http\Requests\UpdateKeluargaRequest;
use App\Repositories\KeluargaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class KeluargaController extends AppBaseController
{
    /** @var  KeluargaRepository */
    private $keluargaRepository;

    public function __construct(KeluargaRepository $keluargaRepo)
    {
        $this->keluargaRepository = $keluargaRepo;
    }

    /**
     * Display a listing of the Keluarga.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $keluargas = $this->keluargaRepository->all();

        return view('keluargas.index')
            ->with('keluargas', $keluargas);
    }

    /**
     * Show the form for creating a new Keluarga.
     *
     * @return Response
     */
    public function create()
    {
        return view('keluargas.create');
    }

    /**
     * Store a newly created Keluarga in storage.
     *
     * @param CreateKeluargaRequest $request
     *
     * @return Response
     */
    public function store(CreateKeluargaRequest $request)
    {
        $input = $request->all();

        $keluarga = $this->keluargaRepository->create($input);

        Flash::success('Keluarga saved successfully.');

        return redirect(route('keluargas.index'));
    }

    /**
     * Display the specified Keluarga.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $keluarga = $this->keluargaRepository->find($id);

        if (empty($keluarga)) {
            Flash::error('Keluarga not found');

            return redirect(route('keluargas.index'));
        }

        return view('keluargas.show')->with('keluarga', $keluarga);
    }

    /**
     * Show the form for editing the specified Keluarga.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $keluarga = $this->keluargaRepository->find($id);

        if (empty($keluarga)) {
            Flash::error('Keluarga not found');

            return redirect(route('keluargas.index'));
        }

        return view('keluargas.edit')->with('keluarga', $keluarga);
    }

    /**
     * Update the specified Keluarga in storage.
     *
     * @param int $id
     * @param UpdateKeluargaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKeluargaRequest $request)
    {
        $keluarga = $this->keluargaRepository->find($id);

        if (empty($keluarga)) {
            Flash::error('Keluarga not found');

            return redirect(route('keluargas.index'));
        }

        $keluarga = $this->keluargaRepository->update($request->all(), $id);

        Flash::success('Keluarga updated successfully.');

        return redirect(route('keluargas.index'));
    }

    /**
     * Remove the specified Keluarga from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $keluarga = $this->keluargaRepository->find($id);

        if (empty($keluarga)) {
            Flash::error('Keluarga not found');

            return redirect(route('keluargas.index'));
        }

        $this->keluargaRepository->delete($id);

        Flash::success('Keluarga deleted successfully.');

        return redirect(route('keluargas.index'));
    }
}
