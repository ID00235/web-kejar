<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Organisasi extends Model
{
    protected $primaryKey='id';
    protected $table = 'organisasi';

    public function gethashid(){
		return Hashids::encode($this->id);
	}
}
