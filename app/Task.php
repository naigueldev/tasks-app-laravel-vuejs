<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title','user_id'];
    protected $table = 'tasks';
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
