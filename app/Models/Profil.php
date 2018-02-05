<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Profil extends Model
{
    protected $primaryKey='id';
    protected $table = 'profil';

    public function gethashid(){
		return Hashids::encode($this->id);
	}
}
