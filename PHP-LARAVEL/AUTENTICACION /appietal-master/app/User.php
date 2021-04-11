<?php

namespace AppIetal;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Session;
class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'email', 'password','prematriculado','observaciones','aprobado'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function profile()
    {
        //un usuario tiene un solo perfil
        return $this->hasOne('AppIetal\Profile');
    }

    public function acudientes()
    {
        //un usuario tiene un solo grupo de acudientes
        return $this->hasOne('AppIetal\Attendant');
    }
    public function institucion()
    {
        //un usuario se matricula a una sola institucion
        return $this->hasOne('AppIetal\Institucion');
    }

    public function admin()// para el condicional en la vissta
    {
        return $this->tipo ==='admin';
    }
    public function estudiante()// para el condicional en la vissta
    {
        return $this->tipo ==='estudiante';
    }

    public function scopeNombre($query,$nombre)// Buscar por el nombre
    {

      if (trim($nombre) != "")
      {
          $query->where(\DB::raw("CONCAT(nombre)"),"LIKE","%$nombre%");
          Session::flash('message','Nombre:'.' '.$nombre.'  ' .'Resultado de la busqueda');
       }

    }

    public static function filter($nombre)
    {
        return User::nombre($nombre)

          ->orderBy('created_at','DESC')
          ->paginate(30);
    }



}
