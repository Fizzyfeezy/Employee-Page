<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employer;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function home(){

        $employers = Employer::with('user')->get();

        $status = [ 'test period','worker'];

        $classification = [ 'full time','part time'];

        //dd($status);

        // foreach ($status as $emp) {
        //     dd($emp);
        // }

        return view('employees.home', compact('employers','status','classification'));
    }
}
