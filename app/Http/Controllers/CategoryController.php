<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Category;

class CategoryController extends Controller
{

    public function index()
    {
		//return all existed category
		$categories = Category::select('categoryID', 'categoryName', 'categoryDescription')
		                          ->orderBy('categoryID', 'asc')
		                          ->get();

		return view('dashboard.asset.category.mgCategories', compact('categories'));
    }

    public function store()
    {
      $this->validate(request(),[
        'categoryName' => 'required',
        'categoryDescription' => 'required'
      ]);

      Category::create([
        'categoryName' => request('categoryName'),
        'categoryDescription' => request('categoryDescription')
      ]);

      return back();

    }

    public function show($id)
    {
      $findC = Category::find($id);
      return view('dashboard.asset.category.editCategories', compact('findC'));
    }

    public function update($id)
    {

		$this->validate(request(),[
		'categoryName' => 'required',
		'categoryDescription' => 'required'
		]);

		$updCt = Category::find($id);
		$updCt->categoryName = request('categoryName');
		$updCt->categoryDescription = request('categoryDescription');
		$updCt->save();

		return redirect('/asset/category');
    }
}
