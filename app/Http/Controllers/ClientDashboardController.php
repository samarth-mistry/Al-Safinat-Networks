<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:client');
    }

    public function index()
    {
        return view('clients.dashboard');
    }

    public function sendPdfOfBookingInvoice($booking_id)
    {
        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
            ])->loadView('clients.bookings.pdf', compact(
                'booking'
            ));
        $pdf->save(str_replace(' ', '_', strtolower($booking->owner_name)) . "_details.pdf", array('Attachment' => 0));
        return $pdf->stream(str_replace(' ', '_', strtolower($booking->name)) . "_details.pdf", array('Attachment' => 0));
    }
}
