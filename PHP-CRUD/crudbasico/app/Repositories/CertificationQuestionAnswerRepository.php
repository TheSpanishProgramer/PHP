<?php

namespace App\Repositories;

use App\Models\CertificationQuestionAnswer;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CertificationQuestionAnswerRepository
 * @package App\Repositories
 * @version August 1, 2017, 5:42 pm UTC
 *
 * @method CertificationQuestionAnswer findWithoutFail($id, $columns = ['*'])
 * @method CertificationQuestionAnswer find($id, $columns = ['*'])
 * @method CertificationQuestionAnswer first($columns = ['*'])
*/
class CertificationQuestionAnswerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'answers',
        'valid',
        'certification_question_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CertificationQuestionAnswer::class;
    }
}
