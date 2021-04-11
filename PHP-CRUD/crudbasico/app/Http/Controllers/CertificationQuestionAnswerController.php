<?php

namespace App\Http\Controllers;

use App\DataTables\CertificationQuestionAnswerDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCertificationQuestionAnswerRequest;
use App\Http\Requests\UpdateCertificationQuestionAnswerRequest;
use App\Models\CertificationQuestion;
use App\Repositories\CertificationQuestionAnswerRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CertificationQuestionAnswerController extends AppBaseController
{
    /** @var  CertificationQuestionAnswerRepository */
    private $certificationQuestionAnswerRepository;

    public function __construct(CertificationQuestionAnswerRepository $certificationQuestionAnswerRepo)
    {
        $this->certificationQuestionAnswerRepository = $certificationQuestionAnswerRepo;
    }

    /**
     * Display a listing of the CertificationQuestionAnswer.
     *
     * @param CertificationQuestionAnswerDataTable $certificationQuestionAnswerDataTable
     * @return Response
     */
    public function index(CertificationQuestionAnswerDataTable $certificationQuestionAnswerDataTable)
    {
        return $certificationQuestionAnswerDataTable->render('certification_question_answers.index');
    }

    /**
     * Show the form for creating a new CertificationQuestionAnswer.
     *
     * @return Response
     */
    public function create()
    {
        $questions = CertificationQuestion::get()->pluck('question', 'id');
        $data = [
            'questions' => $questions
        ];

        return view('certification_question_answers.create', $data);
    }

    /**
     * Store a newly created CertificationQuestionAnswer in storage.
     *
     * @param CreateCertificationQuestionAnswerRequest $request
     *
     * @return Response
     */
    public function store(CreateCertificationQuestionAnswerRequest $request)
    {
        $input = $request->all();
        $input['valid'] == null ? $estado = false : $estado = true;
        $data= [
            'answers' => $input['answers'],
            'valid' => $estado,
            'certification_question_id' => $input['certification_question_id']
        ];

        $certificationQuestionAnswer = $this->certificationQuestionAnswerRepository->create($data);

        Flash::success('Certification Question Answer saved successfully.');

        return redirect(route('certificationQuestionAnswers.index'));
    }

    /**
     * Display the specified CertificationQuestionAnswer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $certificationQuestionAnswer = $this->certificationQuestionAnswerRepository->findWithoutFail($id);

        if (empty($certificationQuestionAnswer)) {
            Flash::error('Certification Question Answer not found');

            return redirect(route('certificationQuestionAnswers.index'));
        }

        return view('certification_question_answers.show')->with('certificationQuestionAnswer', $certificationQuestionAnswer);
    }

    /**
     * Show the form for editing the specified CertificationQuestionAnswer.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $certificationQuestionAnswer = $this->certificationQuestionAnswerRepository->findWithoutFail($id);

        if (empty($certificationQuestionAnswer)) {
            Flash::error('Certification Question Answer not found');

            return redirect(route('certificationQuestionAnswers.index'));
        }

        $questions = CertificationQuestion::get()->pluck('question', 'id');
        $data = [
            'certificationQuestionAnswer' => $certificationQuestionAnswer,
            'questions' => $questions
        ];

        return view('certification_question_answers.edit')->with($data);
    }

    /**
     * Update the specified CertificationQuestionAnswer in storage.
     *
     * @param  int $id
     * @param UpdateCertificationQuestionAnswerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCertificationQuestionAnswerRequest $request)
    {
        $certificationQuestionAnswer = $this->certificationQuestionAnswerRepository->findWithoutFail($id);

        if (empty($certificationQuestionAnswer)) {
            Flash::error('Certification Question Answer not found');

            return redirect(route('certificationQuestionAnswers.index'));
        }
        $input = $request->all();
        $input['valid'] == null ? $estado = false : $estado = true;
        $data= [
            'answers' => $input['answers'],
            'valid' => $estado,
            'certification_question_id' => $input['certification_question_id']
        ];

        $certificationQuestionAnswer = $this->certificationQuestionAnswerRepository->update($data, $id);

        Flash::success('Certification Question Answer updated successfully.');

        return redirect(route('certificationQuestionAnswers.index'));
    }

    /**
     * Remove the specified CertificationQuestionAnswer from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $certificationQuestionAnswer = $this->certificationQuestionAnswerRepository->findWithoutFail($id);

        if (empty($certificationQuestionAnswer)) {
            Flash::error('Certification Question Answer not found');

            return redirect(route('certificationQuestionAnswers.index'));
        }

        $this->certificationQuestionAnswerRepository->delete($id);

        Flash::success('Certification Question Answer deleted successfully.');

        return redirect(route('certificationQuestionAnswers.index'));
    }
}
