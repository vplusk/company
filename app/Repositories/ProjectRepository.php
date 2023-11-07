<?php

namespace App\Repositories;

use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectRepository
{
    public function create(array $attributes)
    {
        return DB::transaction(function () use ($attributes) {

            $created = Project::query()->create([
                'title' => data_get($attributes, 'title'),
                'price' => data_get($attributes, 'price'),
                'description' => data_get($attributes, 'description'),
                'company_id' => data_get($attributes, 'company_id'),
            ]);
            throw_if(!$created, GeneralJsonException::class, 'Failed to create. ');
            
            return $created;
        });
    }

    public function update($company, array $attributes)
    {
        return DB::transaction(function () use($company, $attributes) {
            $updated = $company->update([
                'title' => data_get($attributes, 'title'),
                'price' => data_get($attributes, 'price'),
                'description' => data_get($attributes, 'description'),
                'company_id' => data_get($attributes, 'company_id'),
            ]);

            throw_if(!$updated, GeneralJsonException::class, 'Failed to update project');

            return $company;

        });
    }
}