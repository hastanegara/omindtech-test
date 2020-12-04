<?php
/**
 * Created by PhpStorm.
 * User: Heidar
 * Date: 03-Dec-20
 * Time: 4:41 PM
 */

namespace App\Repositories\Eloquent;

use App\Models\Client;
use App\Repositories\Contracts\ClientInterface;

class ClientRepository implements ClientInterface
{
    protected $client;

    protected $relations = [];

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->relations = ['projects'];
    }

    public function all()
    {
        return $this->client->with($this->relations)->get();
    }

    public function getById($id)
    {
        return $this->client->with($this->relations)->find($id);
    }

    public function store($data)
    {
        $client = $this->client->create($data);

        return $client;
    }

    public function update($id, $data)
    {
        $client = $this->client->find($id)->update($data);

        return $client;
    }

    public function destroy($id)
    {
        $client = $this->client->destroy($id);

        return $client;
    }
}