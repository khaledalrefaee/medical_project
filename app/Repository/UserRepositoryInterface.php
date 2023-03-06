<?php

namespace App\Repository;

interface UserRepositoryInterface
{
    public function getAllUser();

    public function showUser($id);

    public function createUser();

    public function StoreUser($request);

    public function editUser($id);

    public function UpdateUser($request);
}
