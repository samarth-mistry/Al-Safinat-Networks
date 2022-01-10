<?php

namespace App\Http\Conversations;

use Auth;
use Validator;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class LoginConversation extends Conversation
{
    public function askName()
    {
        $this->say("⚠️ Login using chatbot is not recommended<br>Login System using Chatbot actived.");
        $this->askEmail();
    }

    public function askEmail()
    {
        $this->ask('Enter Email.', function(Answer $answer) {
            $validator = Validator::make(['email' => $answer->getText()], [
                'email' => 'email',
            ]);
            if ($validator->fails()) {
                return $this->repeat('That doesn\'t look like a valid email. Please enter a valid email.');
            }
            $this->bot->userStorage()->save([
                'login_email' => $answer->getText(),
            ]);
            $this->askPassword();
        });
    }

    public function askPassword()
    {
        $this->ask('Enter Password.', function(Answer $answer) {
            $email = $this->bot->userStorage()->get('login_email');
            $password = $answer->getText();
            if(Auth::attempt(['email' => $email, 'password' => $password])){
                $this->say('Login successfully!');
            } else {
                $this->say('Invalid Email or Password. Try again!');
                $this->askEmail();
            }
        });
    }

    public function run()
    {
        $this->askName();
    }
}