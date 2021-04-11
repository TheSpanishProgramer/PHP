<?php

namespace App\Repositories;

use App\Models\GTAAccount;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class GTAAccountRepository
 * @package App\Repositories
 * @version August 15, 2017, 4:30 pm CEST
 *
 * @method GTAAccount findWithoutFail($id, $columns = ['*'])
 * @method GTAAccount find($id, $columns = ['*'])
 * @method GTAAccount first($columns = ['*'])
*/
class GTAAccountRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'socialName',
        'forumName',
        'password',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return GTAAccount::class;
    }
}
