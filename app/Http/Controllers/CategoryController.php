<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Category;

class CategoryController extends Controller
{
    public function create(){
		return view('category.create');
	}
        
    public function save(Request $request){
		
		$validate = $this->validate($request, [
			'name_category' => 'required',
		]);
		
		$category = new Category();
		$category->name_category = $request->input('name_category');		
		
		$category->save();
		
		return redirect()->route('home');
	}
}
