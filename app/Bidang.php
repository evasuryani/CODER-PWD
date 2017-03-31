<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bidang';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id_bidang';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_bidang', 'nama_bidang'];


}
