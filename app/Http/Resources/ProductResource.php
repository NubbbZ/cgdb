<?php

namespace App\Http\Resources;

use App\Models\ProductType;
use App\Models\Set;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'type' => ProductType::find($this->product_type_id)->name,
            'image' => $this->image,
            'set' => Set::find($this->set_id)->name,
            'release_date' => $this->release_date,
        ];
    }
}
