<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Setting extends Model
{
    protected $primaryKey='id';
    protected $table = 'setting';

    public function gethashid(){
		return Hashids::encode($this->id);
	}
}
