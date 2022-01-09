<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Messages\Attachments\Image;
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
            if ($message == 'Hi' || $message == 'hi' || $message == 'Hello') {
                // $this->askName($botman);
                $botman->reply("Hello yourself");
                $botman->reply("For Basic information querying <br>
                (1) /start <br> 
                (2) /login <br> 
                (3) /about <br> 
                (4) /exit <br>
                Please login for using advance features like booking, tracking, viewing billing and requesting a PDF.");
            } else if($message == '/start'){
                $botman->startConversation(new OnboardingConversation);
            } else if($message == '/login') {
                $botman->startConversation(new LoginConversation);
            }
            else{
                $botman->reply("Please type 'Hi' for starting.");
            }
        });
        $botman->fallback(function($bot) {
            $bot->reply('Sorry, I did not understand these. Here is a list of commands I understand: ...');
        });
        $botman->listen();
    }
}
// $credentials = $request->only('email', 'password');

//         if (Auth::attempt($credentials)) {
//             // Authentication passed...
//             return redirect()->intended('dashboard');
//         }