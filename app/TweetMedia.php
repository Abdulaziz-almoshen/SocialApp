<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class TweetMedia extends Model implements HasMedia
{
    use HasMediaTrait;



    public function BaseMedia () {

      return   $this->belongsTo(Media::class,'media_id');
    }


}
