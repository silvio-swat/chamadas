<?php

namespace App\Http\Livewire;

use App\Events\MessageSent;
use App\Models\Message;

class WebSocketTest extends CrudComponent
{
    public $messages     = [];
    public $message      = null;
    public $newMessage   = null;
    public $result       = [];
    public $activeUser   = null;
    public $userTypping  = [];
    public $loggedUser   = [];
    public $joiningUsers = [];
    public $leavingUsers = [];
    public $usersList    = [];

    public function mount() {   
        $messages = Message::with('user')->get()->toArray();

        foreach($messages as $message)
        {
            $this->messages[] = (array)$message;
        }
        $this->activeUser = auth()->user()->toArray();
    }

    public function render()
    {
        return view('livewire.web-socket-test');
    }

    public function fetchMessages() {
        $this->messages = Message::with('user')->get();
    }

    public function sendMessage() {
        if(!$this->message) {
            return;
        }
        $message = auth()->user()->messages()->create([
            'message' => $this->message
        ]);
        broadcast(new MessageSent($message->load('user')))->toOthers();

        $this->messages[] = $message->toArray();

        $this->message = null;

        $this->result['status'] = 'success';
    }  

    public function updatedNewMessage() {
        $this->messages[] = $this->newMessage;
    }      

    public function updatedLoggedUser() {
        if(array_key_exists('name', $this->loggedUser)) {
            $this->usersList[$this->loggedUser['id']] = $this->loggedUser;
        } else {
            if(count($this->loggedUser) < 1){
                return;
            }
            foreach($this->loggedUser as $user) {
                $this->usersList[$user['id']] = $user;
                if (auth()->user()->id == $user['id']) {
                    unset($this->usersList[$user['id']]);
                }
            }
        }
    }         

    public function updatedJoiningUsers() {
        if(array_key_exists('name', $this->joiningUsers)) {
            $this->usersList[$this->joiningUsers['id']] = $this->joiningUsers;
        } else {
            if(count($this->joiningUsers) < 1){
                return;
            }
            foreach($this->joiningUsers as $user) {
                $this->usersList[$user['id']] = $user;
            }
        }
    }     
    
    public function updatedleavingUsers() {
        if(array_key_exists('name', $this->leavingUsers)) {
            unset($this->usersList[$this->leavingUsers['id']]);
        } else {
            if(count($this->leavingUsers) < 1){
                return;
            }
            foreach($this->leavingUsers as $user) {
                unset($this->usersList[$user['id']]);
            }
        }
    }     

}
