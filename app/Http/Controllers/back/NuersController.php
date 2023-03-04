<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNuerse;
use App\Models\Nurses;
use App\Repository\NuerseRepositoryInterface;
use Illuminate\Http\Request;


class NuersController extends Controller
{

    protected $Nuerse;

    public function __construct(NuerseRepositoryInterface $Nuerse)
    {
        $this->Nuerse = $Nuerse;
    }

    public function index(){
        return $this->Nuerse->index();
    }

    public function create(){
       return $this->Nuerse->cretae();
    }

    public function store(StoreNuerse $request){
        return $this->Nuerse->store($request);
    }

    public function show($id){
       return $this->Nuerse->show($id);
    }

    public function Retreat(){
        return redirect()->route('all.nuers');
    }

    public function edit($id){
        return $this->Nuerse->edit($id);
    }


    public function update(StoreNuerse $request , $id){
        $nurse = Nurses::findOrFail($id);

        if ($request->hasFile('image')) {
            // Get the new image
            $newImage = $request->file('image');

            // Get the old image
            $oldImage = $nurse->image;

            // Generate a new filename for the image
            $filename = time() . '.' . $newImage->getClientOriginalExtension();

            // Store the new image
            $path = $newImage->storeAs('uploads', $filename, 'public');

            // Update the nurse's information with the new image
            $nurse->name = $request->name;
            $nurse->phone = $request->phone;
            $nurse->description = $request->description;
            $nurse->image = $filename;

        }

        $nurse->save();
        toastr()->warning('You are edit nuers','success');
        return redirect()->route('all.nuers');
    }




    public function destroy(Request $request , $id)
    {
        return $this->Nuerse->Delete($id);
    }


}
