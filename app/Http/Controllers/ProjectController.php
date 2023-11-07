<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProjectController extends Controller
{
    /**
     * Display a list of projects
     * 
     * @return ResourceCollection
     */
    public function index(Request $request)
    {
        $projects = Project::all();

        return ProjectResource::collection($projects);
    }

    /**
     * Display one specified project
     */
    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    /**
     * Store a newly created company in storage
     * 
     * @return ProjectResource
     */
    public function store(ProjectRequest $request, ProjectRepository $repository)
    {
        $payload = $request->only([
            'title',
            'price',
            'description',
            'company_id',
        ]);

        $created = $repository->create($payload);
        return new ProjectResource($created);
    }

    /**
     * Update the specified project in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param Project $project
     * 
     * @return ProjectResource
     */
    public function update(ProjectRequest $request, Project $project, ProjectRepository $repository)
    {
        $payload = $request->only([
            'title',
            'price',
            'description',
            'company_id',
        ]);

        $updated = $repository->update($project, $payload);
        return new ProjectResource($updated);
    }

    /**
     * Remove the specified project from storage.
     * 
     * @param Project $project
     * @return JsonResponse
     */
    public function destroy(Project $project)
    {
        $project->forceDelete();
        return new JsonResponse([
            'data' => 'success'
        ]);
    }
}
