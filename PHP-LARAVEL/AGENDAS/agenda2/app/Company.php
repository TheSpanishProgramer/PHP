<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = ['cnpj', 'company_name', 'commercial_name'];

    protected $hidden = ['id', 'created_at', 'updated_at'];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function clients()
    {
        return $this->hasMany('App\Client');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
