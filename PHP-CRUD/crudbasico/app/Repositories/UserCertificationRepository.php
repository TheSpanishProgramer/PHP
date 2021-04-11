<?php

namespace App\Repositories;

use App\Models\UserCertification;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserCertificationRepository
 * @package App\Repositories
 * @version August 6, 2017, 7:49 pm CEST
 *
 * @method UserCertification findWithoutFail($id, $columns = ['*'])
 * @method UserCertification find($id, $columns = ['*'])
 * @method UserCertification first($columns = ['*'])
*/
class UserCertificationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'character_description',
        'status',
        'user_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserCertification::class;
    }
}
