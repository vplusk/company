<?php


namespace App\Repositories;

use App\Models\Company;
use Illuminate\Support\Facades\DB;

class CompanyRepository
{
    public function create(array $attributes)
    {
        return DB::transaction(function () use ($attributes) {

            $created = Company::query()->create([
                'name' => data_get($attributes, 'name'),
            ]);
            throw_if(!$created, GeneralJsonException::class, 'Failed to create. ');
            
            return $created;
        });
    }

    public function update($company, array $attributes)
    {
        return DB::transaction(function () use($company, $attributes) {
            $updated = $company->update([
                'name' => data_get($attributes, 'name'),
            ]);

            throw_if(!$updated, GeneralJsonException::class, 'Failed to update company');

            return $company;

        });
    }
}