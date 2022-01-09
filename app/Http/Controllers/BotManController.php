<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use App\Http\Conversations\OnboardingConversation;
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
            } else if($message == '/start'){
                $botman->startConversation(new OnboardingConversation);
            }
            else{
                $botman->reply("Write 'Hi' for testing...");
            }
        });
        $botman->fallback(function($bot) {
            $bot->reply('Sorry, I did not understand these. Here is a list of commands I understand: ...');
        });
        $botman->listen();
        //-----------------------------------------------working
        // $botman = app('botman');
        // $botman->hears('hello', function (BotMan $bot) {
        //     $bot->reply('Hello yourself.');
        // });
        // $botman->listen();
    }
}