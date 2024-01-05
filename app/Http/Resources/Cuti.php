<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Cuti extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'karyawan_id' => $this->karyawan_id,
            'tanggal_cuti' => $this->tanggal_cuti,
            'lama_cuti' => $this->lama_cuti,
            'keterangan' => $this->keterangan,
        ];
    }

}
