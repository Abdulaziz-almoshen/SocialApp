<?php

namespace App\Http\Controllers\Api\Media;

use App\Http\Controllers\Controller;
use App\MeidaType\MeidaTypes;
use Illuminate\Http\Request;

class MediaTypesController extends Controller
{
    public function index(){

        return response()->json([

            'data' => [
                   'image'  => MeidaTypes::$image,
                    'video' => MeidaTypes::$video
            ]
        ]);
    }
}
