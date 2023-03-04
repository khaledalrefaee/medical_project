<?php

namespace App\Repository;

interface ClinceRepositoryInterface
{
    public function index();

    public function store($request);

    public function show($id);

    public function update($request);

    public function delete($id);


}
