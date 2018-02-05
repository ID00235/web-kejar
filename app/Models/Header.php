<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Header extends Model
{
    protected $primaryKey='id';
    protected $table = 'header';

    public function gethashid(){
		return Hashids::encode($this->id);
	}
}
