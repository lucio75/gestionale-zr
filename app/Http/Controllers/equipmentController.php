<?php

namespace App\Http\Controllers;

use App\DataTables\equipmentDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateequipmentRequest;
use App\Http\Requests\UpdateequipmentRequest;
use App\Repositories\equipmentRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class equipmentController extends AppBaseController
{
    /** @var  equipmentRepository */
    private $equipmentRepository;

    public function __construct(equipmentRepository $equipmentRepo)
    {
        $this->equipmentRepository = $equipmentRepo;
    }

    /**
     * Display a listing of the equipment.
     *
     * @param equipmentDataTable $equipmentDataTable
     * @return Response
     */
    public function index(equipmentDataTable $equipmentDataTable)
    {
        return $equipmentDataTable->render('equipment.index');
    }

    /**
     * Show the form for creating a new equipment.
     *
     * @return Response
     */
    public function create()
    {
        return view('equipment.create');
    }

    /**
     * Store a newly created equipment in storage.
     *
     * @param CreateequipmentRequest $request
     *
     * @return Response
     */
    public function store(CreateequipmentRequest $request)
    {
        $input = $request->all();

        $equipment = $this->equipmentRepository->create($input);

        Flash::success('Equipment saved successfully.');

        return redirect(route('equipment.index'));
    }

    /**
     * Display the specified equipment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $equipment = $this->equipmentRepository->findWithoutFail($id);

        if (empty($equipment)) {
            Flash::error('Equipment not found');

            return redirect(route('equipment.index'));
        }

        return view('equipment.show')->with('equipment', $equipment);
    }

    /**
     * Show the form for editing the specified equipment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $equipment = $this->equipmentRepository->findWithoutFail($id);

        if (empty($equipment)) {
            Flash::error('Equipment not found');

            return redirect(route('equipment.index'));
        }

        return view('equipment.edit')->with('equipment', $equipment);
    }

    /**
     * Update the specified equipment in storage.
     *
     * @param  int              $id
     * @param UpdateequipmentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateequipmentRequest $request)
    {
        $equipment = $this->equipmentRepository->findWithoutFail($id);

        if (empty($equipment)) {
            Flash::error('Equipment not found');

            return redirect(route('equipment.index'));
        }

        $equipment = $this->equipmentRepository->update($request->all(), $id);

        Flash::success('Equipment updated successfully.');

        return redirect(route('equipment.index'));
    }

    /**
     * Remove the specified equipment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $equipment = $this->equipmentRepository->findWithoutFail($id);

        if (empty($equipment)) {
            Flash::error('Equipment not found');

            return redirect(route('equipment.index'));
        }

        $this->equipmentRepository->delete($id);

        Flash::success('Equipment deleted successfully.');

        return redirect(route('equipment.index'));
    }
}
