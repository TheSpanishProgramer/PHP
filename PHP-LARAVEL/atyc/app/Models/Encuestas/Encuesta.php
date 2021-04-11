<?php

namespace App\Models\Encuestas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Encuesta extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'encuestas.encuestas';

    /**
     * Primary key asociated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_encuesta';

    protected $fillable = ['id_curso', 'id_pregunta', 'id_respuesta', 'cantidad'];

    public function curso()
    {
        return $this->hasOne('App\Models\Cursos\Curso', 'id_curso', 'id_curso');
    }

    public function pregunta()
    {
        return $this->hasOne('App\Models\Encuestas\Pregunta', 'id_pregunta', 'id_pregunta');
    }

    public function respuesta()
    {
        return $this->hasOne('App\Models\Encuestas\Respuesta', 'id_respuesta', 'id_respuesta');
    }
}
