<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $message;

    public $successMessage;

    protected $rules = [
        'name'     => 'required|min:6',
        'email'    => 'required|email',
        'message'  => 'required|min:10|max:1000',
    ];

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function submitForm() {
        sleep( seconds: 2);

        $validatedData = $this->validate();

        $this->reset(['name', 'email', 'message']);

        $this->successMessage = "Hey {$validatedData['name']}, contato enviado com sucesso!";
    }   
    
    // public function resetForm() {
    //     $this->name = "";
    //     $this->email = "";
    //     $this->message = "";
    // }     
}
