<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    public function index() : View
    {
        $users = User::role('gestionnaire')->get();
        return view('dashboard',compact('users'));
    }

    public function create() : View
    {
        return view('gestionnaire.create');
    }
}
