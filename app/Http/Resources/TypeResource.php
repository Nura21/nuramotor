<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        /** @var \App\Models\Type $type*/
		$type = $this;

		return [
            'types' => [
                'id' => $type->id,
                'product_id' => $type->product_id,
                'name' => $type->name,
                'color' => $type->color,
                'price' => $type->product->price,
            ]
		];
    }
}
