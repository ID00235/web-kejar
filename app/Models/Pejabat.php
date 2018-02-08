<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Pejabat extends Model
{
    protected $primaryKey='id';
    protected $table = 'pejabat';

    public function gethashid(){
		return Hashids::encode($this->id);
	}
}
