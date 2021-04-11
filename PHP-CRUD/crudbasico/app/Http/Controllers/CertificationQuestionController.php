<?php

namespace App\Http\Controllers;

use App\DataTables\CertificationQuestionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCertificationQuestionRequest;
use App\Http\Requests\UpdateCertificationQuestionRequest;
use App\Repositories\CertificationQuestionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CertificationQuestionController extends AppBaseController
{
    /** @var  CertificationQuestionRepository */
    private $certificationQuestionRepository;

    public function __construct(CertificationQuestionRepository $certificationQuestionRepo)
    {
        $this->certificationQuestionRepository = $certificationQuestionRepo;
    }

    /**
     * Display a listing of the CertificationQuestion.
     *
     * @param CertificationQuestionDataTable $certificationQuestionDataTable
     * @return Response
     */
    public function index(CertificationQuestionDataTable $certificationQuestionDataTable)
    {
        return $certificationQuestionDataTable->render('certification_questions.index');
    }

    /**
     * Show the form for creating a new CertificationQuestion.
     *
     * @return Response
     */
    public function create()
    {
        return view('certification_questions.create');
    }

    /**
     * Store a newly created CertificationQuestion in storage.
     *
     * @param CreateCertificationQuestionRequest $request
     *
     * @return Response
     */
    public function store(CreateCertificationQuestionRequest $request)
    {
        $input = $request->all();

        $certificationQuestion = $this->certificationQuestionRepository->create($input);

        Flash::success('Certification Question saved successfully.');

        return redirect(route('certificationQuestions.index'));
    }

    /**
     * Display the specified CertificationQuestion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $certificationQuestion = $this->certificationQuestionRepository->findWithoutFail($id);

        if (empty($certificationQuestion)) {
            Flash::error('Certification Question not found');

            return redirect(route('certificationQuestions.index'));
        }

        return view('certification_questions.show')->with('certificationQuestion', $certificationQuestion);
    }

    /**
     * Show the form for editing the specified CertificationQuestion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $certificationQuestion = $this->certificationQuestionRepository->findWithoutFail($id);

        if (empty($certificationQuestion)) {
            Flash::error('Certification Question not found');

            return redirect(route('certificationQuestions.index'));
        }

        return view('certification_questions.edit')->with('certificationQuestion', $certificationQuestion);
    }

    /**
     * Update the specified CertificationQuestion in storage.
     *
     * @param  int              $id
     * @param UpdateCertificationQuestionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCertificationQuestionRequest $request)
    {
        $certificationQuestion = $this->certificationQuestionRepository->findWithoutFail($id);

        if (empty($certificationQuestion)) {
            Flash::error('Certification Question not found');

            return redirect(route('certificationQuestions.index'));
        }

        $certificationQuestion = $this->certificationQuestionRepository->update($request->all(), $id);

        Flash::success('Certification Question updated successfully.');

        return redirect(route('certificationQuestions.index'));
    }

    /**
     * Remove the specified CertificationQuestion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $certificationQuestion = $this->certificationQuestionRepository->findWithoutFail($id);

        if (empty($certificationQuestion)) {
            Flash::error('Certification Question not found');

            return redirect(route('certificationQuestions.index'));
        }

        $this->certificationQuestionRepository->delete($id);

        Flash::success('Certification Question deleted successfully.');

        return redirect(route('certificationQuestions.index'));
    }
}
