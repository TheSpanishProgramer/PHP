<?php

namespace AppIetal;

use Illuminate\Database\Eloquent\Model;
use AppIetal\Attendant;
class Attendant extends Model
{
  protected $fillable = ['nomPapa','docPapa','telPapa','dirPapa','nomMama','docMama','telMama','dirMama',
                        'dirAcudiente','telAcudiente','docAcudiente','nomAcudiente','user_id'];


  public function user(){
          // Un perfil pertence solo a un usuario
       return $this->belongsTo('App\User');
  }
}
