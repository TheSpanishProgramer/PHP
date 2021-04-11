<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CertificationQuestionAnswer
 * @package App\Models
 * @version August 1, 2017, 5:42 pm UTC
 *
 * @method static CertificationQuestionAnswer find($id=null, $columns = array())
 * @method static CertificationQuestionAnswer|\Illuminate\Database\Eloquent\Collection findOrFail($id, $columns = ['*'])
 * @property mt1
 * @property \Illuminate\Database\Eloquent\Collection CertificationUserAnswer
 * @property \Illuminate\Database\Eloquent\Collection userRoles
 * @property string answers
 * @property boolean valid
 * @property integer certification_question_id
 */
class CertificationQuestionAnswer extends Model
{
    use SoftDeletes;

    public $table = 'certification_question_answers';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const CORRECTA = 'Correcta';
    const INCORRECTA = 'Incorrecta';

    protected $dates = ['deleted_at'];


    public $fillable = [
        'answers',
        'valid',
        'certification_question_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'answers' => 'string',
        'valid' => 'boolean',
        'certification_question_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function certificationQuestion()
    {
        return $this->belongsTo(\App\Models\CertificationQuestion::class, 'certification_question_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function certificationUserAnswers()
    {
        return $this->hasMany(\App\Models\CertificationUserAnswer::class);
    }
}
