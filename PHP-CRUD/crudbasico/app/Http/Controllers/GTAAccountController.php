<?php

namespace App\Http\Controllers;

use App\DataTables\GTAAccountDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateGTAAccountRequest;
use App\Http\Requests\UpdateGTAAccountRequest;
use App\Repositories\GTAAccountRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class GTAAccountController extends AppBaseController
{
    /** @var  GTAAccountRepository */
    private $gTAAccountRepository;

    public function __construct(GTAAccountRepository $gTAAccountRepo)
    {
        $this->gTAAccountRepository = $gTAAccountRepo;
    }

    /**
     * Display a listing of the GTAAccount.
     *
     * @param GTAAccountDataTable $gTAAccountDataTable
     * @return Response
     */
    public function index(GTAAccountDataTable $gTAAccountDataTable)
    {
        return $gTAAccountDataTable->render('g_t_a_accounts.index');
    }

    /**
     * Show the form for creating a new GTAAccount.
     *
     * @return Response
     */
    public function create()
    {
        return view('g_t_a_accounts.create');
    }

    /**
     * Store a newly created GTAAccount in storage.
     *
     * @param CreateGTAAccountRequest $request
     *
     * @return Response
     */
    public function store(CreateGTAAccountRequest $request)
    {
        $input = $request->all();

        $gTAAccount = $this->gTAAccountRepository->create($input);

        Flash::success('G T A Account saved successfully.');

        return redirect(route('gTAAccounts.index'));
    }

    /**
     * Display the specified GTAAccount.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $gTAAccount = $this->gTAAccountRepository->findWithoutFail($id);

        if (empty($gTAAccount)) {
            Flash::error('G T A Account not found');

            return redirect(route('gTAAccounts.index'));
        }

        return view('g_t_a_accounts.show')->with('gTAAccount', $gTAAccount);
    }

    /**
     * Show the form for editing the specified GTAAccount.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $gTAAccount = $this->gTAAccountRepository->findWithoutFail($id);

        if (empty($gTAAccount)) {
            Flash::error('G T A Account not found');

            return redirect(route('gTAAccounts.index'));
        }

        return view('g_t_a_accounts.edit')->with('gTAAccount', $gTAAccount);
    }

    /**
     * Update the specified GTAAccount in storage.
     *
     * @param  int              $id
     * @param UpdateGTAAccountRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGTAAccountRequest $request)
    {
        $gTAAccount = $this->gTAAccountRepository->findWithoutFail($id);

        if (empty($gTAAccount)) {
            Flash::error('G T A Account not found');

            return redirect(route('gTAAccounts.index'));
        }

        $gTAAccount = $this->gTAAccountRepository->update($request->all(), $id);

        Flash::success('G T A Account updated successfully.');

        return redirect(route('gTAAccounts.index'));
    }

    /**
     * Remove the specified GTAAccount from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $gTAAccount = $this->gTAAccountRepository->findWithoutFail($id);

        if (empty($gTAAccount)) {
            Flash::error('G T A Account not found');

            return redirect(route('gTAAccounts.index'));
        }

        $this->gTAAccountRepository->delete($id);

        Flash::success('G T A Account deleted successfully.');

        return redirect(route('gTAAccounts.index'));
    }
}
