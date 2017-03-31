<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perlombaan extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'perlombaan';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id_lomba';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_lomba', 'id','nama_lomba','id_bidang','tgl_perlombaan','deskripsi','link','poster'];

    public function bidang_lomba(){
        return $this->hasOne('\App\Bidang', 'id_bidang', 'id_bidang');
    }

    public function user(){
      return $this->hasOne('\App\User', 'id', 'id');
    }
}
