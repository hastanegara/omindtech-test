<?php
/**
 * Created by PhpStorm.
 * User: Heidar
 * Date: 04-Dec-20
 * Time: 3:52 AM
 */

namespace App\Repositories\Eloquent;

use Illuminate\Container\Container as App;


abstract class BaseRepository
{
    private $app;
    protected $model;
    protected $query;

    protected $with = [];

    public function __construct(App $app)
    {
        $this->app = $app;

        $this->makeModel();
    }

    public function makeModel()
    {
        $model = $this->app->make($this->model());

        return $this->model = $model;
    }

    public abstract function model();

    protected function newQuery()
    {
        $this->query = $this->model->newQuery();

        return $this;
    }

    protected function eagerLoad()
    {
        foreach ($this->with as $relation) {
            $this->query->with($relation);
        }

        return $this;
    }

    public function all()
    {
        $this->newQuery()->eagerLoad();

        $models = $this->query->get();

        $this->unsetClauses();

        return $models;

//        return $this->model->all();
    }

    public function getById($id)
    {}

    public function create($data)
    {}

    public function update($id, $data)
    {}

    public function delete($id)
    {}
}