<?php
/**
 * Created by PhpStorm.
 * User: Heidar
 * Date: 04-Dec-20
 * Time: 3:46 AM
 */

namespace App\Repositories\Contracts;

interface BaseInterface
{
    public function all();
    public function getById($id);
    public function store($data);
    public function update($id, $data);
    public function destroy($id);
}