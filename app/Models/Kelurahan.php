<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Kelurahan extends Model
{
    protected $primaryKey='id';
    protected $table = 'kelurahan';

    public function gethashid(){
		return Hashids::encode($this->id);
	}
}
