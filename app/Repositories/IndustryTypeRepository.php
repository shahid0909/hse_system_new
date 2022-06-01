<?php

namespace App\Repositories;

use App\Models\IndustryType;

class IndustryTypeRepository
{

    public function getIndustryTypes($name = null)
    {
        $industryTypes = IndustryType::query();

        $industryTypes->when(!empty($name), function ($industryTypes) use ($name) {
            $industryTypes->where('name', 'LIKE', "%{$name}%");
        });

        return $industryTypes;
    }
}