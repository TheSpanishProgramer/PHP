<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

/**
 * Class UserCertification
 * @package App\Models
 * @version August 6, 2017, 7:49 pm CEST
 *
 * @method static UserCertification find($id = null, $columns = array())
 * @method static UserCertification|\Illuminate\Database\Eloquent\Collection findOrFail($id, $columns = ['*'])
 * @property mediumText character_description
 * @property string status
 * @property integer user_id
 */
class UserCertification extends Model
{
    use SoftDeletes;

    public $table = 'user_certifications';


    protected $dates = ['deleted_at'];

    const PENDIENTE = 'pendiente';
    const VALIDADO = 'validado';
    const RECHAZADO = 'rechazado';

    public $fillable = [
        'character_description',
        'status',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'character_description' => 'required',
        'status' => 'required'
    ];

    public function user(){
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }
}
