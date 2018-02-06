<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Sarana extends Model
{
    protected $primaryKey='id';
    protected $table = 'sarana';

    public function gethashid(){
		return Hashids::encode($this->id);
	}
}
