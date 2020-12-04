<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Repositories\Contracts\ProjectInterface;

class ProjectController extends Controller
{
    private $project;

    public function __construct(ProjectInterface $project)
    {
        $this->project = $project;

        $this->middleware('auth:sanctum');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = $this->project->all();

        return response([
            'status' => 200,
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $project = $this->project->store($request);

        if ( ! $project) {
            return response([
                'status' => 401,
                'message' => 'Project can not be created'
            ]);
        }

        return response([
            'status' => 200,
            'project' => $project
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = $this->project->getById($id);

        if ( ! $project) {
            return response([
                'status' => 401,
                'message' => 'Project can not be found'
            ]);
        }

        return response([
            'status' => 200,
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id)
    {
        $project = $this->project->getById($id);

        if ( ! $project) {
            return response([
                'status' => 401,
                'message' => 'Client can not be found'
            ]);
        }

        $project = $this->project->update($id, $request);

        if ( ! $project) {
            return response([
                'status' => 401,
                'message' => 'Project can not be updated'
            ]);
        }

        return response([
            'status' => 200,
            'project' => $project
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = $this->project->getById($id);

        if ( ! $project) {
            return response([
                'status' => 401,
                'message' => 'Project can not be found'
            ]);
        }

        $this->project->destroy($id);

        return response([
            'status' => 200,
            'project' => $project
        ]);
    }
}
