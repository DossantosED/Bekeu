<?php

namespace App\Repository\Interfaces;

/**
 * @author emanueldossantoset5@gmail.com
 *
 * @package App\Repositories
 */
interface RepositoryInterface
{

    public function save($model);

    public function update($model);

    public function delete($id);

    public function findByid($id);

    public function all();

}
