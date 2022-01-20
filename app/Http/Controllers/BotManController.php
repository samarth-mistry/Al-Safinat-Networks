<?php

namespace App\Http\Controllers;

use PDF;
use Auth;
use Hashids\Hashids;
// use Vinkla\Hashids\Facades\Hashids;
use App\Models\Booking;
use App\Models\Vessel;
use App\Models\VesselRoute;
use App\Models\Office;
use App\Http\Conversations\OnboardingConversation;
use App\Http\Conversations\LoginConversation;
use App\Http\Conversations\PdfConversation;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Messages\Attachments\File;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Attachments\Audio;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
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
                $message = OutgoingMessage::create()->withAttachment($attachment);
                $botman->reply($message);

                $botman->reply("Direct commands list: <br>
                (1) /start <br> 
                (2) /login <br> 
                (2) /logout <br> 
                (3) /about <br> 
                (4) /pdf <br>
                Please login for using advance features like booking, tracking, viewing billing and requesting a PDF.");

                $botman->reply('And yes! You can also talk in natural language with me.');
            } else if($message == '/start'){
                $botman->startConversation(new OnboardingConversation);
            } else if($message == '/login') {
                $botman->startConversation(new LoginConversation);
            } else if($message == '/logout') {
                $this->logout($botman);
            } else if($message == '/stop') {
                return false;
            } else if($message == '/pdf') {
                $botman->startConversation(new PdfConversation);
            } else {
                $botman->reply("Please type 'Hi' for starting.");
            }
        });
        $botman->hears('.*Bonjour.*', function(BotMan $bot){
            $bot->reply("Oh you are French! 😊");
        });
        $botman->hears('/stop', function(BotMan $bot) {
            $bot->reply("That's fine. Let's stop this conversation. 😊");
        })->stopsConversation();
        $botman->fallback(function($bot) {
            $bot->reply('Sorry 😔, I did not understand these. Here is a list of commands I understand: ...');
        });
        $botman->hears('.*pdf.*', function(BotMan $bot){
            $bot->startConversation(new PdfConversation);
        });
        $botman->hears('.*login.*', function(BotMan $bot){
            $bot->startConversation(new LoginConversation);
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

    public function generatePdfLink($tracking_id ='AZIFO')
    {
        $booking = Booking::where('tracking_id', $tracking_id)->first();

        $randomness_factor = "Aaziya Nazakat Ali";
        $hashids = new Hashids($randomness_factor);
        $id = $hashids->encode(1 ,$booking->id, 3);

        $pdf_url = url('/pdf-links/'.$id);
        return $pdf_url;
    }
}