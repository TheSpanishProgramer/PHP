<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
use Pais as Geo;

class Profesor extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sistema.profesores';

    /**
     * Primary key asociated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_profesor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];

    protected $hidden = ['pivot'];

    public function cursos()
    {
        return $this->belongsToMany('App\Models\Cursos\Curso', 'cursos.cursos_profesores', 'id_profesor', 'id_curso')
        ->withTimestamps();
    }

    public function tipoDocumento()
    {
        return $this->hasOne('App\TipoDocumento', 'id_tipo_documento', 'id_tipo_documento');
    }

    public function tipoDocente()
    {
        return $this->hasOne('App\TipoDocente', 'id_tipo_docente', 'id_tipo_docente');
    }

    public function crear(Request $r)
    {
        $this->nombres = ucwords($r->nombres);
        $this->apellidos = ucwords($r->apellidos);
        $this->id_tipo_documento = $r->id_tipo_documento;

        if ($this->esExtranjero($r)) {
            $id_pais = Geo::select('id_pais')->where('nombre', '=', $r->pais)->get('id_pais')->first();
            $this->id_pais = $id_pais['id_pais'];
        }

        $this->id_tipo_docente = $r->id_tipo_docente;
        $this->nro_doc = $r->nro_doc;
        $this->email = $r->email;
        $this->cel = $r->cel;
        $this->tel = $r->tel;
        $this->save();
        return $this;
    }

    public function modificar(Request $r)
    {
        $this->nombres = ucwords($r->nombres);
        $this->apellidos = ucwords($r->apellidos);

        $id_tipo_documento = $r->id_tipo_documento;

        $this->id_tipo_documento = $id_tipo_documento;

        if ($this->esExtranjero($r)) {
            $this->id_pais = $r->pais;
        }

        $this->id_tipo_docente = $r->id_tipo_docente;
        $this->nro_doc = $r->nro_doc;
        $this->email = $r->email;
        $this->cel = $r->cel;
        $this->tel = $r->tel;
        $this->save();
        return $this;
    }

    private function esExtranjero(Request $request)
    {
        return $request->has('pais') && ($request->id_tipo_documento == 5 || $request->id_tipo_documento == 6);
    }

    public function getNombrePais()
    {
        if ($this->id_tipo_documento == 5 || $this->id_tipo_documento == 6) {
            return Pais::findOrFail($this->id_pais)->nombre;
        }
    }
}
