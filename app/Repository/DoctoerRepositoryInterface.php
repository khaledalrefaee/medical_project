<?php

namespace App\Repository;

interface DoctoerRepositoryInterface
{

  public function get_all_Doctoer();

  public function create_Doctoer();

  public function store_Doctoer($request);

  public function edit_doctoer($id);

  public function update_doctoer($request);

  public function DeleteDoctoer($request);

}
