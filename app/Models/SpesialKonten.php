<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class SpesialKonten extends Model
{
    protected $primaryKey='id';
    protected $table = 'spesial_konten';

    public function gethashid(){
		return Hashids::encode($this->id);
	}
}
