<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Home extends Component
{
    public $username = null;
    public $profile = null;
    public $searchStatus = true;

    public function render()
    {
        return view('livewire.home');
    }

    public function search()
    {
        $this->validate([
            'username' => 'required|min:3'
        ]);

        $response = Http::get('https://api.github.com/users/' . $this->username);
        $json = $response->json();
        if(isset($json['login'])) {
            $this->profile = $json;
            $this->searchStatus = true;
        } else {
            $this->profile = null;
            $this->searchStatus = false;
        }

    }  
}
