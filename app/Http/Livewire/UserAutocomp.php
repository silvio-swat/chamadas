<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserAutocomp extends Component
{
    public $queryUsers = [];
    public $searchTerm;
    public $searchUserId = null;
    public $users;   

    public function render()
    {
        return view('livewire.user-autocomp');
    }

    public function selectUser($id) {
        $this->searchUserId = $id;
        $this->updatedSearchTerm();
        $this->searchClear();
    }

    public function updatedSearchTerm()
    {
        $userQuery = User::query();
        if($this->searchUserId) {
            $this->users = $userQuery->where(function ($query) {
                $query->where('id', '=', $this->searchUserId);
            })->get();
        }

        $this->queryUsers = $userQuery->where(function ($query) {
            $query->where('name', 'like', trim($this->searchTerm) . "%")
                ->orWhere('email', 'like', trim($this->searchTerm) . "%");
        })->get();
    }

    public function searchClear($list = null)
    {
        $this->queryUsers = [];
        $this->searchTerm = null;
        $this->searchUserId = null;
    }  

}
