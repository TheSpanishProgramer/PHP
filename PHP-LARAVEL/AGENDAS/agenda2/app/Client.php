<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    public function companies()
    {
        return $this->blongsTo('App\Company');
    }
}
