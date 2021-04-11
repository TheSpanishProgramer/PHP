<?php

namespace App\Repositories;

use App\Models\CertificationQuestion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CertificationQuestionRepository
 * @package App\Repositories
 * @version August 1, 2017, 3:29 pm UTC
 *
 * @method CertificationQuestion findWithoutFail($id, $columns = ['*'])
 * @method CertificationQuestion find($id, $columns = ['*'])
 * @method CertificationQuestion first($columns = ['*'])
*/
class CertificationQuestionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'question'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CertificationQuestion::class;
    }
}
