<?php

namespace App\Repository;

interface WatingRepositoryInterface
{
    public function dailyAppointments();

  public function getAll_wating_reservation();

  public function create_wating();

    public function storewaiting($request);

    public function show_waiting($id);

    public function edit_waiting($id);

    public function update_waiting($request);

    public function delete_wating($id);

    public function ChngeStatusWating($id);

    public function ChngeCancellingWating($id);

///
///
///
    public function create_appointment();

    public function Store_appointment($request);

    public function Show_appointment($id);

    public function edit_appointment($id);

    public function update_appointment($request);

     public function delete_appointment($id);

    public function show_destroy();


    public function ChngeStatus($id);

    public function ChngeCancelling($id);

    public function PdfInvoiceDownload($id);


}
