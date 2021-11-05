<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{
    public $searchTerm = null;

    public function user(Request $request) {
        if(!$request->get('query')){
            $users  = [];
        } else {
            $this->searchTerm = $request->get('query');
            $userQuery = User::query();
    
            $users = $userQuery->where(function ($query) {
                $query->where('name', 'like'   , trim($this->searchTerm) . "%")
                      ->orWhere('email', 'like', trim($this->searchTerm) . "%");
            })->get();
            $response = $this->userMountJson($users);
            
            return response()->json($response);
        }
    }

    public function userMountJson($users) {
        if(empty($users)){
            return null;
        }
        $response = [];
        foreach($users as $user) {
            $response[]= [
                'value'    => $user->id,
                'label'    => $user->name,
                'email'    => $user->email,
                'is_admin' => $user->is_admin,
            ];
        }
        return $response;
    }     
}
