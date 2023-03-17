<?php

namespace App\Repository;

interface DoctoerRepositoryInterface
{

  public function get_all_Doctoer();

  public function create_Doctoer();

  public function store_Doctoer($request);

  public function show($id);

  public function edit_doctoer($id);

  public function update_doctoer($request ,$id);

  public function delete($id);

  public function show_destroy();



  public function Filter_Clinces($request);

}
