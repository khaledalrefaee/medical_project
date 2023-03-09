<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointment;
use App\Http\Requests\StoreWating;

use App\Models\Doctor;
use App\Models\Reservation;

use App\Repository\WatingRepositoryInterface;
use Barryvdh\DomPDF\Facade\Pdf;

class ReservationController extends Controller
{
    protected $Wating;

    public function __construct(WatingRepositoryInterface $Wating)
    {
        $this->Wating = $Wating;
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
    ///

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
    public function update_appointment(StoreAppointment $request){
        return $this->Wating->update_appointment($request);
    }

    public function delete_appointment($id){
        return $this->Wating->delete_appointment($id);
    }

    public function ChngeStatus($id){
        $Reservation = Reservation::find($id);
        $Reservation->status = 'completed';
        $Reservation->save();
        return redirect()->route('Reservations.all');
    }

    public function ChngeCancelling($id){
        $Reservation = Reservation::find($id);
        $Reservation->status = 'Cancelling';
        $Reservation->save();
        return redirect()->route('Reservations.all');
    }

    public function PdfInvoiceDownload($id)
    {

        $Reservation = Reservation::find($id);

        $pdf = PDF::loadView('backend.Reservations.pdf', compact('Reservation'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('Reservations.pdf');
    }
}
