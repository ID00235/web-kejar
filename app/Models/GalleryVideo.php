<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;

class GalleryVideo extends Model
{
    protected $primaryKey='id';
    protected $table = 'gallery_video';

    public function gethashid(){
		return Hashids::encode($this->id);
	}
}
