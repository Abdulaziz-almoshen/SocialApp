<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'src' => $this->BaseMedia->getFullUrl(),
            'type' => $this->getType($this->baseMedia->mime_type)

        ];
    }

    private function getType ($type) {
        return  strtok($type, '/');
    }
}
