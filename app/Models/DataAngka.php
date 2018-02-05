<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class DataAngka extends Model
{
    protected $primaryKey='id';
    protected $table = 'dataangka';

    public function gethashid(){
		return Hashids::encode($this->id);
	}
}
