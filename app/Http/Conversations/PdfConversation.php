<?php

namespace App\Http\Conversations;
// namespace App\Http\Controllers;

use Auth;
use Validator;
use Hashids\Hashids;
use App\Models\Booking;
use App\Models\Vessel;
use App\Models\VesselRoute;
use App\Models\Office;
use App\Http\Controllers\BotManController;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class PdfConversation extends Conversation
{
    public function askConfirmation()
    {
        $question = Question::create('CONFIRMATION: Do you want invoice PDF?')
            ->fallback('Error occured while processing the query.')
            ->callbackId('stream_pdf_link')
            ->addButtons([
                Button::create('Yes')->value('yes'),
                Button::create('No')->value('no'),
            ]);

        $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $selectedValue = $answer->getValue();
                $selectedText = $answer->getText();
                
                if($selectedValue == 'yes'){
                    $pdf_url = (new BotManController)->generatePdfLink();
                    $this->say("Please login and then use this <a href='".$pdf_url."' target='_blank'>Download</a> link to view your PDF.");
                }
                else{
                    $this->say("Abort.");
                }
            }
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
        $this->askConfirmation();
    }
}