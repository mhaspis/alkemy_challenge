<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Operation;
use App\User;
use App\Category;

class OperationController extends Controller
{
    public function create(){
        
                $categories = Category::orderBy('name_category', 'asc')->get();
        
                return view('operation.create', [
                    'categories' => $categories
                ]);
	}
        
    public function save(Request $request){
		
		$operation = new Operation();
                $user = \Auth::user();
                
		$operation->user_id = $user->id;		
		$operation->category_id = $request->input('category_id');		
		$operation->concept_operation = $request->input('concept_operation');		
		$operation->amount_operation = $request->input('amount_operation');		
		$operation->date_operation = $request->input('date_operation');		
		$operation->type_operation = $request->input('type_operation');		
		
		$operation->save();
		
		return redirect()->route('home');
    }
    
    public function lists(){
        
        $operations = Operation::orderBy('id', 'desc')->get();
        
        return view('operation.lists', [
                    'operations' => $operations
                ]);
    }
    
    public function edit($id){
        
        $operation = Operation::find($id);
        $categories = Category::orderBy('name_category', 'asc')->get();
        
        return view('operation.create', [
                    'operation' => $operation,
                    'categories' => $categories
                ]);
    }
    
    public function update(Request $request){        
        
        $user = \Auth::user();
        $operation_id = $request->input('operation_id');

        $operation = Operation::find($operation_id);     
        $operation->user_id = $user->id;		
        $operation->category_id = $request->input('category_id');		
        $operation->concept_operation = $request->input('concept_operation');		
        $operation->amount_operation = $request->input('amount_operation');		
        $operation->date_operation = $request->input('date_operation');				

        $operation->update();
        
        return redirect()->route('home');
    }
    
    public function delete($id){
        
        $operation = Operation::find($id);
        $operation->delete();
        
        $operations = Operation::orderBy('id', 'desc')->get();
        
        return view('operation.lists', [
                    'operations' => $operations
                ]);
    }

}
