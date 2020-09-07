<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operation;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentBalance = 0;
        $countOperations = 0;
	$operations = Operation::orderBy('id', 'desc')->get();
        
        foreach($operations as $operation){
            if($operation->type_operation == 'entry'){
                $currentBalance+= $operation->amount_operation;
            }else{
                $currentBalance-= $operation->amount_operation;
            }
            
        }
        
        return view('home', [
                    'operations' => $operations,
                    'countOperations' => $countOperations,
                    'currentBalance' => $currentBalance
                ]);
    }
    
}
