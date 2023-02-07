<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'active' => $this->active,
            'nik' => $this->NIK,
            'joined' => $this->joined,
            'display_joined' => $this->joined->format('d-m-Y'),
            'srv_year' => $this->joined->diffForHumans(now(), ['parts' => 2, 'join' =>' ', 'syntax' => \Carbon\CarbonInterface::DIFF_ABSOLUTE]),
            'company_id' => $this->company_id,
            'department_id' => $this->department_id,
            'religion_id' => $this->religion_id,
            $this->mergeWhen(isset($this->company_name),[
                'company_name' => $this->company_name,
            ]),
            $this->mergeWhen(isset($this->department_name),[
                'department_name' => $this->department_name,
            ])            
        ];
    }
}
