<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Message\Incoming\Answer;
use BotMan\BotMan\Drivers\DriverManager;
use Illuminate\Http\Request;

// $config = [
//     // Your driver-specific configuration
//     // "telegram" => [
//     //    "token" => "TOKEN"
//     // ]
// ];

// DriverManager::loadDriver(\BotMan\Drivers\Telegram\TelegramDriver::class);

// $botman = BotManFactory::create($config);
// $botman->hears('hello', function (BotMan $bot) {
//     $bot->reply('Hello yourself.');
// });
// $botman->listen();
class BotManController extends Controller
{
    public function accept()
    {
        $botman = app('botman');
        // $botman->hears('hi {message}', function($botman, $message){
        //     if($message == 'hi'){
        //         $bot->reply("H E L L O");
        //         $this->askName($bot);
        //     } else {
        //         $bot->reply("Type 'Hi' for starting conversation!");
        //     }
        //     //$bot->reply("Type 'Hi' for starting conversation!");
        // });
        $botman->hears('hi {na}', function (BotMan $bot, $na) {
            $bot->reply('Hello yourself.');
        });
        $botman->listen();
        //-----------------------------------------------working
        // $botman = app('botman');
        // $botman->hears('hello', function (BotMan $bot) {
        //     $bot->reply('Hello yourself.');
        // });
        // $botman->listen();
    }

    public function askName($bm)
    {
        $bm->ask("Hello! What is your name?", function(Answer $ans){
            $name = $ans->getText();
            $this->say("Nice to see you ".$name);
        });
    }
}