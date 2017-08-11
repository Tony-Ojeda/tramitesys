<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfesionalRequest;
use App\Http\Requests\UpdateProfesionalRequest;
use App\Repositories\ProfesionalRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProfesionalController extends AppBaseController
{
    /** @var  ProfesionalRepository */
    private $profesionalRepository;

    public function __construct(ProfesionalRepository $profesionalRepo)
    {
        $this->profesionalRepository = $profesionalRepo;
    }

    /**
     * Display a listing of the Profesional.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->profesionalRepository->pushCriteria(new RequestCriteria($request));
        $profesionals = $this->profesionalRepository->all();

        return view('profesionals.index')
            ->with('profesionals', $profesionals);
    }

    /**
     * Show the form for creating a new Profesional.
     *
     * @return Response
     */
    public function create()
    {
        return view('profesionals.create');
    }

    /**
     * Store a newly created Profesional in storage.
     *
     * @param CreateProfesionalRequest $request
     *
     * @return Response
     */
    public function store(CreateProfesionalRequest $request)
    {
        $input = $request->all();

        $profesional = $this->profesionalRepository->create($input);

        Flash::success('Profesional saved successfully.');

        return redirect(route('profesionals.index'));
    }

    /**
     * Display the specified Profesional.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $profesional = $this->profesionalRepository->findWithoutFail($id);

        if (empty($profesional)) {
            Flash::error('Profesional not found');

            return redirect(route('profesionals.index'));
        }

        return view('profesionals.show')->with('profesional', $profesional);
    }

    /**
     * Show the form for editing the specified Profesional.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $profesional = $this->profesionalRepository->findWithoutFail($id);

        if (empty($profesional)) {
            Flash::error('Profesional not found');

            return redirect(route('profesionals.index'));
        }

        return view('profesionals.edit')->with('profesional', $profesional);
    }

    /**
     * Update the specified Profesional in storage.
     *
     * @param  int              $id
     * @param UpdateProfesionalRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProfesionalRequest $request)
    {
        $profesional = $this->profesionalRepository->findWithoutFail($id);

        if (empty($profesional)) {
            Flash::error('Profesional not found');

            return redirect(route('profesionals.index'));
        }

        $profesional = $this->profesionalRepository->update($request->all(), $id);

        Flash::success('Profesional updated successfully.');

        return redirect(route('profesionals.index'));
    }

    /**
     * Remove the specified Profesional from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $profesional = $this->profesionalRepository->findWithoutFail($id);

        if (empty($profesional)) {
            Flash::error('Profesional not found');

            return redirect(route('profesionals.index'));
        }

        $this->profesionalRepository->delete($id);

        Flash::success('Profesional deleted successfully.');

        return redirect(route('profesionals.index'));
    }
}
