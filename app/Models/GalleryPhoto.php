<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class GalleryPhoto extends Model
{
    protected $primaryKey='id';
    protected $table = 'gallery_photo';

    public function gethashid(){
		return Hashids::encode($this->id);
	}
}
