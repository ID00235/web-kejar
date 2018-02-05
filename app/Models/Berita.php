<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class Berita extends Model
{
    protected $primaryKey='id';
    protected $table = 'berita';

    public function gethashid(){
		return Hashids::encode($this->id);
	}
}
