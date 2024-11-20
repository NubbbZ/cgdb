<?php

namespace App\Http\Resources;

use App\Models\CardElement;
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
        $data = array(
            'name' => $this->name,
            'image' => $this->image,
            'set' => Set::find($this->set_id)->name,
            'reference' => $this->reference,
        );

        foreach (CardElement::all() as $element) {
            $data[$element->slug] = $this->card_elements[$element->slug] ?? null;
        }

        return $data;
    }
}
