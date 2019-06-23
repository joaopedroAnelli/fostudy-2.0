<?php

namespace App\Http\Resources;

use App\Discipline;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DashboardAbsence extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //$request->user()->id
        $userId = 1;
        /** @var Discipline $this */
        return [
            'discipline' => [
                'name' => $this->name
            ],
            'count' => $this->classes()->count(),
            'absences' => $this->classes()->whereHas('absences', function ($q) use ($userId) {
                /** @var Builder $q */
                $q->where([
                    'users.id' => $userId
                ]);
            })->count()
        ];
    }
}
