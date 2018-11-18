<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Subcategory;
use App\Category;
use DB;

class SubcategoryController extends Controller
{
  public function index()
  {
    $subcategories = Subcategory::select('subcategoryID', 'categoryID', 'subcategoryName')
                                ->orderBy('subcategoryID', 'asc')
                                ->get();

    $categories = Category::select('categoryID', 'categoryName')
                                ->orderBy('categoryID', 'asc')
                                ->get();
    return view('dashboard.asset.subcategory.mgSubcategories', compact('subcategories'), compact('categories'));
  }

  public function store()
  {

    $this->validate(request(),[
      'subcategoryName' => 'required',
      'categoryName' => 'required|numeric'
    ]);


    Subcategory::create([
      'subcategoryName' => request('subcategoryName'),
      'categoryID' => request('categoryName') //label as name but value is id
    ]);

    return back();
  }

  public function show($id)
  {
    $findS = Subcategory::find($id);
    $categories = Category::select('categoryID', 'categoryName')
                                ->orderBy('categoryID', 'asc')
                                ->get();
    return view('dashboard.asset.subcategory.editSubcategories', compact('findS'), compact('categories'));
  }

  public function update($id)
  {

    $this->validate(request(),[
      'subcategoryName' => 'required',
      'categoryName' => 'required|numeric'
    ]);

    $updCt = Subcategory::find($id);
    $updCt->subcategoryName = request('subcategoryName');
    $updCt->categoryID = request('categoryName');
    $updCt->save();

    return redirect('/asset/subcategory');
  }
}
