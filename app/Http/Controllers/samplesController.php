<?php

namespace App\Http\Controllers;

use App\DataTables\samplesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesamplesRequest;
use App\Http\Requests\UpdatesamplesRequest;
use App\Repositories\samplesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class samplesController extends AppBaseController
{
    /** @var  samplesRepository */
    private $samplesRepository;

    public function __construct(samplesRepository $samplesRepo)
    {
        $this->samplesRepository = $samplesRepo;
    }

    /**
     * Display a listing of the samples.
     *
     * @param samplesDataTable $samplesDataTable
     * @return Response
     */
    public function index(samplesDataTable $samplesDataTable)
    {
        return $samplesDataTable->render('samples.index');
    }

    /**
     * Show the form for creating a new samples.
     *
     * @return Response
     */
    public function create()
    {
        return view('samples.create');
    }

    /**
     * Store a newly created samples in storage.
     *
     * @param CreatesamplesRequest $request
     *
     * @return Response
     */
    public function store(CreatesamplesRequest $request)
    {
        $input = $request->all();

        $samples = $this->samplesRepository->create($input);

        Flash::success('Samples saved successfully.');

        return redirect(route('samples.index'));
    }

    /**
     * Display the specified samples.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $samples = $this->samplesRepository->findWithoutFail($id);

        if (empty($samples)) {
            Flash::error('Samples not found');

            return redirect(route('samples.index'));
        }

        return view('samples.show')->with('samples', $samples);
    }

    /**
     * Show the form for editing the specified samples.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $samples = $this->samplesRepository->findWithoutFail($id);

        if (empty($samples)) {
            Flash::error('Samples not found');

            return redirect(route('samples.index'));
        }

        return view('samples.edit')->with('samples', $samples);
    }

    /**
     * Update the specified samples in storage.
     *
     * @param  int              $id
     * @param UpdatesamplesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesamplesRequest $request)
    {
        $samples = $this->samplesRepository->findWithoutFail($id);

        if (empty($samples)) {
            Flash::error('Samples not found');

            return redirect(route('samples.index'));
        }

        $samples = $this->samplesRepository->update($request->all(), $id);

        Flash::success('Samples updated successfully.');

        return redirect(route('samples.index'));
    }

    /**
     * Remove the specified samples from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $samples = $this->samplesRepository->findWithoutFail($id);

        if (empty($samples)) {
            Flash::error('Samples not found');

            return redirect(route('samples.index'));
        }

        $this->samplesRepository->delete($id);

        Flash::success('Samples deleted successfully.');

        return redirect(route('samples.index'));
    }
}
