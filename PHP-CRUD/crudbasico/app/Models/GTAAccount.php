<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class GTAAccount
 * @package App\Models
 * @version August 15, 2017, 4:30 pm CEST
 *
 * @method static GTAAccount find($id=null, $columns = array())
 * @method static GTAAccount|\Illuminate\Database\Eloquent\Collection findOrFail($id, $columns = ['*'])
 * @property string socialName
 * @property string forumName
 * @property string password
 * @property int status
 */
class GTAAccount extends Model
{

    public $table = 'accounts';

    protected $connection = 'mysql_servidor';

    protected $primaryKey = 'socialName'; // or null

    public $timestamps = false;

    public $incrementing = false;

    public $fillable = [
        'socialName',
        'forumName',
        'password',
        'lastIp',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'socialName' => 'string',
        'forumName' => 'string',
        'password' => 'string'
    ];

    protected $hidden = [
        'password'
    ];
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'socialName' => 'required|unique:accounts',
        'password' => 'required'
    ];

    
}
