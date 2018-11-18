<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\InsuranceCompany;

class InsuranceCompanyController extends Controller
{
  public function index()
  {
    //return all existed company
    $companies = InsuranceCompany::select('insuranceCompanyID', 'insuranceCompanyName', 'insuranceAgent', 'insuranceAgentContact', 'companyContact', 'companyAddress')
                                ->orderBy('insuranceCompanyID', 'asc')
                                ->get();

    return view('dashboard.asset.insuranceComp.mgInsuranceComp', compact('companies'));
  }

  public function store()
  {
    $this->validate(request(),[
      'insuranceCompanyName' => 'required',
      'companyContact' => 'required|numeric',
      'companyAddress' => 'required',
      'insuranceAgent' => 'required',
      'insuranceAgentContact' => 'required|numeric'
    ]);

    InsuranceCompany::create([
      'insuranceCompanyName' => request('insuranceCompanyName'),
      'companyContact' => request('companyContact'),
      'companyAddress' => request('companyAddress'),
      'insuranceAgent' => request('insuranceAgent'),
      'insuranceAgentContact' => request('insuranceAgentContact')
    ]);

    return back();

  }

  public function show($id)
  {
    $findComp = InsuranceCompany::find($id);
    return view('dashboard.asset.insuranceComp.editInsuranceComp', compact('findComp'));
  }

  public function update($id)
  {
	$this->validate(request(),[
		'insuranceCompanyName' => 'required',
		'companyContact' => 'required|numeric',
		'companyAddress' => 'required',
		'insuranceAgent' => 'required',
		'insuranceAgentContact' => 'required|numeric'
	]);

	$updComp = InsuranceCompany::find($id);
	$updComp->insuranceCompanyName = request('insuranceCompanyName');
	$updComp->companyContact = request('companyContact');
	$updComp->companyAddress = request('companyAddress');
	$updComp->insuranceAgent = request('insuranceAgent');
	$updComp->insuranceAgentContact = request('insuranceAgentContact');
	$updComp->save();

	return redirect('/asset/insurance');
  }
}
