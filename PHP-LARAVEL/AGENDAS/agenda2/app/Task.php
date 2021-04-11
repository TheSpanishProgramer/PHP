<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = ['title', 'description', 'date_time'];

    protected $hidden = ['id', 'company_id', 'client_id', 'created_at', 'updated_at'];

    public function companies()
    {
        return $this->belongsTo('App\Company');
    }

    public function clients()
    {
        return $this->belongsTo('App\Clients');
    }
}
