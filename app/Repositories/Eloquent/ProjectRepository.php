<?php
/**
 * Created by PhpStorm.
 * User: Heidar
 * Date: 03-Dec-20
 * Time: 4:41 PM
 */

namespace App\Repositories\Eloquent;

use App\Models\Project;
use App\Repositories\Contracts\ProjectInterface;

class ProjectRepository implements ProjectInterface
{
    protected $project;

    protected $relations = [];

    public function __construct(Project $project)
    {
        $this->project = $project;
        $this->relations = ['client'];
    }

    public function all()
    {
        return $this->project->with($this->relations)->get();
    }

    public function getById($id)
    {
        return $this->project->find($id);
    }

    public function store($data)
    {
        $project = $this->project->create($data);

        return $project;
    }

    public function update($id, $data)
    {
        $project = $this->project->find($id)->update($data);

        return $project;
    }

    public function destroy($id)
    {
        $project = $this->project->destroy($id);

        return $project;
    }
}