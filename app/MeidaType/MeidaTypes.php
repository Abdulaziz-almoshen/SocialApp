<?php


namespace App\MeidaType;


class MeidaTypes
{
    public static $image = [
        'image/png',
        'image/jpg',
        'image/jpeg',

        ];
    public static $video = [
        'video/mp4',
    ];

    public static function all (){
        return array_merge(self::$image,self::$video);
    }
}
