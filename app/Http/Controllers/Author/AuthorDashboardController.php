<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorDashboardController extends Controller
{
    //View author dashboard. This page can only be viewed after author logging.
    public function dashboard(){
        return view('author.dashboard');
    }
}
