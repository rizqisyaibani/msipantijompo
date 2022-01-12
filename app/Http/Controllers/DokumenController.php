<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDokumenRequest;
use App\Http\Requests\UpdateDokumenRequest;
use App\Repositories\DokumenRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DokumenController extends AppBaseController
{
    /** @var  DokumenRepository */
    private $dokumenRepository;

    public function __construct(DokumenRepository $dokumenRepo)
    {
        $this->dokumenRepository = $dokumenRepo;
    }

    /**
     * Display a listing of the Dokumen.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $dokumens = $this->dokumenRepository->all();

        return view('dokumens.index')
            ->with('dokumens', $dokumens);
    }

    /**
     * Show the form for creating a new Dokumen.
     *
     * @return Response
     */
    public function create()
    {
        return view('dokumens.create');
    }

    /**
     * Store a newly created Dokumen in storage.
     *
     * @param CreateDokumenRequest $request
     *
     * @return Response
     */
    public function store(CreateDokumenRequest $request)
    {
        $input = $request->all();

        $dokumen = $this->dokumenRepository->create($input);

        Flash::success('Dokumen saved successfully.');

        return redirect(route('dokumens.index'));
    }

    /**
     * Display the specified Dokumen.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dokumen = $this->dokumenRepository->find($id);

        if (empty($dokumen)) {
            Flash::error('Dokumen not found');

            return redirect(route('dokumens.index'));
        }

        return view('dokumens.show')->with('dokumen', $dokumen);
    }

    /**
     * Show the form for editing the specified Dokumen.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dokumen = $this->dokumenRepository->find($id);

        if (empty($dokumen)) {
            Flash::error('Dokumen not found');

            return redirect(route('dokumens.index'));
        }

        return view('dokumens.edit')->with('dokumen', $dokumen);
    }

    /**
     * Update the specified Dokumen in storage.
     *
     * @param int $id
     * @param UpdateDokumenRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDokumenRequest $request)
    {
        $dokumen = $this->dokumenRepository->find($id);

        if (empty($dokumen)) {
            Flash::error('Dokumen not found');

            return redirect(route('dokumens.index'));
        }

        $dokumen = $this->dokumenRepository->update($request->all(), $id);

        Flash::success('Dokumen updated successfully.');

        return redirect(route('dokumens.index'));
    }

    /**
     * Remove the specified Dokumen from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dokumen = $this->dokumenRepository->find($id);

        if (empty($dokumen)) {
            Flash::error('Dokumen not found');

            return redirect(route('dokumens.index'));
        }

        $this->dokumenRepository->delete($id);

        Flash::success('Dokumen deleted successfully.');

        return redirect(route('dokumens.index'));
    }
}
