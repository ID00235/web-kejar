<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Informasi extends Model
{
    protected $primaryKey='id';
    protected $table = 'informasi';

    public function gethashid(){
		return Hashids::encode($this->id);
	}
}
