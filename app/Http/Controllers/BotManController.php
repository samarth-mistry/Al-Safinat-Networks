<?php

namespace App\Http\Controllers;

use PDF;
use Auth;
use App\Models\Booking;
use App\Models\Vessel;
use App\Models\VesselRoute;
use App\Models\Office;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Messages\Attachments\File;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Attachments\Audio;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use App\Http\Conversations\OnboardingConversation;
use App\Http\Conversations\LoginConversation;
use BotMan\BotMan\Message\Incoming\Answer;
use BotMan\BotMan\Drivers\DriverManager;
use Illuminate\Http\Request;

class BotManController extends Controller
{
    public function accept()
    {
        $botman = app('botman');
        $botman->hears('{message}', function($botman, $message) {
            if ($message == 'Hi' || $message == 'hi' || $message == 'Hello' || $message == 'hello') {
                // $this->askName($botman);
                $attachment = new Audio(asset("dist/mp3/botman-name.mp3"), [
                    'custom_payload' => true,
                ]);
                $message = OutgoingMessage::create('Hello yourself!')->withAttachment($attachment);                
                $botman->reply($message);

                $attachment = new Image(asset("dist/img/botman-hello.jpeg"));
                $message = OutgoingMessage::create('Hello yourself!')->withAttachment($attachment);
                $botman->reply($message);

                $botman->reply("For Basic information querying <br>
                (1) /start <br> 
                (2) /login <br> 
                (2) /logout <br> 
                (3) /about <br> 
                (4) /exit <br>
                Please login for using advance features like booking, tracking, viewing billing and requesting a PDF.");
            } else if($message == '/start'){
                $botman->startConversation(new OnboardingConversation);
            } else if($message == '/login') {
                $botman->startConversation(new LoginConversation);
            } else if($message == '/logout') {
                $this->logout($botman);
            } else if($message == '/stop') {
                return false;
            } else if($message == '/pdf') {
                // $this->requestPdf($botman);
                $this->downloadPdf($botman);
            } else {
                $botman->reply("Please type 'Hi' for starting.");
            }
        });
        $botman->hears('/stop', function(BotMan $bot) {
            $bot->reply("That's fine. Let's stop this conversation. 😊");
        })->stopsConversation();
        $botman->fallback(function($bot) {
            $bot->reply('Sorry 😔, I did not understand these. Here is a list of commands I understand: ...');
        });
        $botman->listen();
    }
    public function logout($botman)
    {
        if(Auth::user()){
            Auth::logout();
            $botman->reply("Logout successfull!");
        } else {
            $botman->reply("Your are not Logged in yet!");
        }
    }

    public function requestPdf($botman)
    {
       $ans = (new ClientTrackingController)->streamPdf();
       $botman->reply($ans);
    }

    public function downloadPdf($botman)
    {
        $tracking_id = 'AZIFO';//$request->tracking_id;
        $booking = Booking::where('tracking_id', $tracking_id)->first();

        $vessel = Vessel::find(2);
        
        $route_array = array();
        $routes = VesselRoute::where('vessel_id', $vessel->id)->get();
        $index = 0;
        foreach($routes as $route){
            if($index == 0){
                $init_port = Office::find($route->from_port);
                $route_array[$index] = $init_port->name;
                $index++;
                $port = Office::find($route->to_port);
                $route_array[$index] = $port->name;
            } else {
                $port = Office::find($route->to_port);
                $route_array[$index] = $port->name;
            }
            $index++;
        }
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('clients.trackings.pdf', compact('tracking_id','booking','route_array'));
        $pdf_path = public_path('file-system/booking-pdfs/'.str_replace(' ', '_', strtolower($booking->owner_name))."_details.pdf");
        $pdf->save($pdf_path, array('Attachment' => 0));
        return $pdf->download(str_replace(' ', '_', strtolower($booking->owner_name)) . "_details.pdf", array('Attachment' => 0));

        $pdf_url = url(asset('file-system/booking-pdfs/'.str_replace(' ', '_', strtolower($booking->owner_name))."_details.pdf"));
        // $pdf_url = "http://africau.edu/images/default/sample.pdf";
        $attachment = new File($pdf_url, [
            'custom_payload' => true,
        ]);
        $message = OutgoingMessage::create($pdf_url)->withAttachment($attachment);
        
        $botman->reply($message);
    }
}