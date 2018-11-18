<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\ServiceCompany;

class ServiceCompanyController extends Controller
{
  public function index()
  {
    //return all existed company
    $companies = ServiceCompany::select('serviceCompanyID', 'serviceCompanyName', 'companyContact', 'companyAddress')
                                ->orderBy('serviceCompanyID', 'asc')
                                ->get();

    return view('dashboard.asset.serviceComp.mgServiceComp', compact('companies'));
  }

  public function store()
  {
    $this->validate(request(),[
      'serviceCompanyName' => 'required',
      'companyContact' => 'required|numeric',
      'companyAddress' => 'required'
    ]);

    ServiceCompany::create([
      'serviceCompanyName' => request('serviceCompanyName'),
      'companyContact' => request('companyContact'),
      'companyAddress' => request('companyAddress')
    ]);

    return back();

  }

  public function show($id)
  {
    $findComp = ServiceCompany::find($id);
    return view('dashboard.asset.serviceComp.editServiceComp', compact('findComp'));
  }

  public function update($id)
  {

	$this->validate(request(),[
	  'serviceCompanyName' => 'required',
	  'companyContact' => 'required|numeric',
	  'companyAddress' => 'required'
	]);

	$updComp = ServiceCompany::find($id);
	$updComp->serviceCompanyName = request('serviceCompanyName');
	$updComp->companyContact = request('companyContact');
	$updComp->companyAddress = request('companyAddress');
	$updComp->save();

	return redirect('/asset/service');
  }
}
