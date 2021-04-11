<?php

namespace App\Http\Controllers;

use App\DataTables\UserCertificationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUserCertificationRequest;
use App\Http\Requests\UpdateUserCertificationRequest;
use App\Models\GTAAccount;
use App\Models\UserCertification;
use App\Repositories\UserCertificationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;

class UserCertificationController extends AppBaseController
{
    /** @var  UserCertificationRepository */
    private $userCertificationRepository;

    public function __construct(UserCertificationRepository $userCertificationRepo)
    {
        $this->userCertificationRepository = $userCertificationRepo;
    }

    /**
     * Display a listing of the UserCertification.
     *
     * @param UserCertificationDataTable $userCertificationDataTable
     * @return Response
     */
    public function index(UserCertificationDataTable $userCertificationDataTable)
    {
        return $userCertificationDataTable->render('user_certifications.index');
    }

    /**
     * Show the form for creating a new UserCertification.
     *
     * @return Response
     */
    public function create()
    {
        return view('user_certifications.create');
    }

    /**
     * Store a newly created UserCertification in storage.
     *
     * @param CreateUserCertificationRequest $request
     *
     * @return Response
     */
    public function store(CreateUserCertificationRequest $request)
    {
        $input = $request->all();

        $userCertification = $this->userCertificationRepository->create($input);

        Flash::success('User Certification saved successfully.');

        return redirect(route('userCertifications.index'));
    }

    /**
     * Display the specified UserCertification.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $userCertification = $this->userCertificationRepository->findWithoutFail($id);

        if (empty($userCertification)) {
            Flash::error('User Certification not found');

            return redirect(route('userCertifications.index'));
        }

        return view('user_certifications.show')->with('userCertification', $userCertification);
    }

    /**
     * Show the form for editing the specified UserCertification.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $userCertification = $this->userCertificationRepository->findWithoutFail($id);

        if (empty($userCertification)) {
            Flash::error('User Certification not found');

            return redirect(route('userCertifications.index'));
        }

        return view('user_certifications.edit')->with('userCertification', $userCertification);
    }

    /**
     * Update the specified UserCertification in storage.
     *
     * @param  int              $id
     * @param UpdateUserCertificationRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $userCertification = $this->userCertificationRepository->findWithoutFail($id);

        if (empty($userCertification)) {
            Flash::error('Ha ocurrido un error, no se ha encontrado la certificación de usuario.');

            return redirect(route('userCertifications.index'));
        }
       // dd($request->all());
        //$userCertification = $this->userCertificationRepository->update($request->all(), $id);
        if($request->status == UserCertification::VALIDADO){
            //TODO verificar funcionalidad
            $gtaAccount = GTAAccount::find($userCertification->user->social_club);
            $gtaAccount->status = 1;
            $gtaAccount->save();
        }
        $userCertification->status = $request->status;
        $userCertification->save();


        Flash::success('Se ha actualizado correctamente la certificación del usuario.');

        return redirect(route('userCertifications.index'));
    }

    /**
     * Remove the specified UserCertification from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userCertification = $this->userCertificationRepository->findWithoutFail($id);

        if (empty($userCertification)) {
            Flash::error('User Certification not found');

            return redirect(route('userCertifications.index'));
        }

        $this->userCertificationRepository->delete($id);

        Flash::success('User Certification deleted successfully.');

        return redirect(route('userCertifications.index'));
    }
}
