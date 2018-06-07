<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\User as UserResource;

class Nomination extends Resource
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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'nominee_first_name' => $this->nominee_first_name,
            'nominee_last_name' => $this->nominee_last_name,
            'nominee_status' => $this->nominee_status,
            'nominee_work' => $this->nominee_work,
            'nominee_impact' => $this->nominee_impact,
            'nominee_impact' => $this->nominee_impact,
            'nominee_links' => $this->nominee_links,
            'slug' => $this->slug,
            'sender' => $this->sender,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
