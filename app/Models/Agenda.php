<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Agenda extends Model
{
    protected $primaryKey='id';
    protected $table = 'agenda';

    public function gethashid(){
		return Hashids::encode($this->id);
	}
}
