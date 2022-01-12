<?php

namespace App\Http\Controllers;

use Auth;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
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
}