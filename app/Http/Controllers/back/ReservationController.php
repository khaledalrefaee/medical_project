<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointment;
use App\Http\Requests\StoreWating;

use App\Models\Doctor;
use App\Models\Reservation;

use App\Models\Waiting;
use App\Repository\WatingRepositoryInterface;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    protected $Wating;

    public function __construct(WatingRepositoryInterface $Wating)
    {
        $this->Wating = $Wating;

        $this->middleware('permission:waiting create', ['only' => ['create_waiting','storewaiting']]);
        $this->middleware('permission:waiting edit', ['only' => ['edit_waiting','update_waiting']]);
        $this->middleware('permission:waiting show', ['only' => ['show_waiting']]);
        $this->middleware('permission:waiting delete', ['only' => ['delete_wating']]);

        $this->middleware('permission:Reservations all', ['only' => ['index']]);
        $this->middleware('permission:Reservations create', ['only' => ['create_appointment','store_appointment']]);
        $this->middleware('permission:Reservations edit', ['only' => ['edit_appointment','update_appointment']]);
        $this->middleware('permission:Reservations delete', ['only' => ['delete_appointment']]);
        $this->middleware('permission:Reservations show', ['only' => ['Show_appointment']]);
        $this->middleware('permission:Reservations completed', ['only' => ['ChngeStatus']]);
        $this->middleware('permission:Reservations Cancelling', ['only' => ['ChngeCancelling']]);
        $this->middleware('permission:Reservations Download', ['only' => ['PdfInvoiceDownload']]);
        $this->middleware('permission:Show Deleted Reservations', ['only' => ['show_destroy']]);


    }




    public function index(){
        return $this->Wating->getAll_wating_reservation();
    }

    public function create_waiting(){
       return $this->Wating->create_wating();
    }

    public function storewaiting(StoreWating $request){
        return $this->Wating->storewaiting($request);
    }

    public function show_waiting($id){
        return $this->Wating->show_waiting($id);
    }
    public function Retern_waiting(){
        return redirect()->route('Reservations.all');
    }

    public function edit_waiting($id){
        return $this->Wating->edit_waiting($id);
    }

    public function update_waiting(StoreWating $request,$id){
        return $this->Wating->update_waiting($request);
    }

    public function delete_wating($id){
      return $this->Wating->delete_wating($id);
    }

    public function Get_Doctoer($clinic_id){

    }

    ////


    public function create_appointment(){
      return $this->Wating->create_appointment();
    }

    public function store_appointment(StoreAppointment $request){
        return $this->Wating->Store_appointment($request);
    }

    public function Show_appointment($id){
        return $this->Wating->Show_appointment($id);
    }
    public function Retern_appointment(){
        return redirect()->route('Reservations.all');
    }
    public function edit_appointment($id){
        return $this->Wating->edit_appointment($id);
    }
    public function update_appointment(Request $request){
        return $this->Wating->update_appointment($request);
    }

    public function delete_appointment($id){
        return $this->Wating->delete_appointment($id);
    }


    public function show_destroy(){
        return $this->Wating->show_destroy();
    }

    public function ChngeStatus($id){
    return $this->Wating->ChngeStatus($id);
    }

    public function ChngeCancelling($id){
        return $this->Wating->ChngeCancelling($id);
    }

    public function PdfInvoiceDownload($id)
    {
        return $this->Wating->PdfInvoiceDownload($id);
    }

    public function deleteRecords(Request $request){

        $ids = $request->input('ids');

        if (!empty($ids)) {
            // Delete the records with the given ids
            Reservation::whereIn('id', $ids)->delete();
            Waiting::whereIn('id', $ids)->delete();

            // Return a success response
            return response()->json(['success' => true]);
        }

        // Return an error response if no ids were provided
        return response()->json(['success' => false, 'message' => 'No ids provided']);

//        // check if ids is not null
//        if ($ids) {
//            // convert the input to an array
//            $idsArray = explode(',', $ids);
//
//            // delete reservations and waiting times with the given ids
//            Reservation::whereIn('id', $idsArray)->delete();
//            Waiting::whereIn('id', $idsArray)->delete();
//
//            // return a success response
//            return response()->json(['success' => true]);
//        }
//
//        // return an error response if ids is null
//        return response()->json(['success' => false, 'message' => 'No ids provided']);
    }

}
