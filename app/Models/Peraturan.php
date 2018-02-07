<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Peraturan extends Model
{
    protected $primaryKey='id';
    protected $table = 'peraturan';

    public function gethashid(){
		return Hashids::encode($this->id);
	}
}
