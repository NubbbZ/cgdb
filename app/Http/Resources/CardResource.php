<?php

namespace App\Http\Resources;

use App\Models\Set;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'image' => $this->image,
            'set' => Set::find($this->set_id)->name,
            'reference' => $this->reference,
            'illustrator' => $this->illustrator,
            //'attributes' => $this->attributes,
        ];
    }
}
