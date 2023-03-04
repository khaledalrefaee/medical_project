<?php

namespace App\Repository;

interface NuerseRepositoryInterface
{
    public function index();

    public function cretae();

    public function store($request);

    public function show($id);

    public function edit($id);

    public function Delete($id);
}
