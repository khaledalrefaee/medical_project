<?php

namespace App\Repository;

interface PharmieseRepositoryInterface
{

    //get all pharmies
    public function getAllPharmiese();

    //store pharmiese
    public function StorePharmiese($request);

    //edit
    public function editPharmiese($id);

    //update
    public function updatePharmiese($request);

    //Delete
    public function DeletePharmiese($request);
}
