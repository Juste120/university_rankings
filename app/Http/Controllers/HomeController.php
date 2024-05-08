<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\University;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user) {
                $usertype = $user->getAttribute('usertype');
                if ($usertype == 'user') {
                    $universities = University::all();
                    return view('dashboard', compact('universities'));
                } elseif ($usertype == 'admin') {
                    return view('admin.adminhome');
                }
            }
        }

        return redirect()->route('login');
    }

}
