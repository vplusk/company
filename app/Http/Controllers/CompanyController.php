<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Repositories\CompanyRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CompanyController extends Controller
{


    /**
     * Display a list of companies
     * 
     * @return ResourceCollection
     */
    public function index(Request $request)
    {
        $pageSize = $request->page_size ?? 20;
        $companies = Company::query()->paginate($pageSize);

        return CompanyResource::collection($companies);
    }

    /**
     * Display one specified company
     */
    public function show(Company $company)
    {
        return new CompanyResource($company);
    }

    /**
     * Store a newly created company in storage
     * 
     * @return CompanyResource
     */
    public function store(Request $request, CompanyRepository $repository)
    {
        $payload = $request->only([
            'name'
        ]);

        $created = $repository->create($payload);
        return new CompanyResource($created);
    }

    /**
     * Update the specified company in storage.
     */
    public function update(Request $request, Company $company, CompanyRepository $repository)
    {
        $payload = $request->only([
            'name'
        ]);

        $updated = $repository->update($company, $payload);
        return new CompanyResource($updated);
    }

    /**
     * Remove the specified company from storage.
     * 
     * @param Company $company
     * @return JsonResponse
     */
    public function destroy(Company $company)
    {
        $company->forceDelete();
        return new JsonResponse([
            'data' => 'success'
        ]);
    }
}
