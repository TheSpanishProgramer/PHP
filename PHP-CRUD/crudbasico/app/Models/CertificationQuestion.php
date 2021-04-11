<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CertificationQuestion
 * @package App\Models
 * @version August 1, 2017, 3:29 pm UTC
 *
 * @method static CertificationQuestion find($id=null, $columns = array())
 * @method static CertificationQuestion|\Illuminate\Database\Eloquent\Collection findOrFail($id, $columns = ['*'])
 * @property \Illuminate\Database\Eloquent\Collection CertificationQuestionAnswer
 * @property \Illuminate\Database\Eloquent\Collection CertificationUserAnswer
 * @property \Illuminate\Database\Eloquent\Collection userRoles
 * @property string question
 */
class CertificationQuestion extends Model
{
    use SoftDeletes;

    public $table = 'certification_questions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'question'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'question' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function certificationQuestionAnswers()
    {
        return $this->hasMany(\App\Models\CertificationQuestionAnswer::class, 'certification_question_id', 'id');
    }

}
