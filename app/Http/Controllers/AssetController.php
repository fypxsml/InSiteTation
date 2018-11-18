<?php

namespace App\Http\Controllers;

use View;
use Illuminate\Http\Request;
use App\Asset;
use App\InsuranceCompany;
use App\ServiceCompany;
use App\Subcategory;
use DB;

class AssetController extends Controller
{
  public function index()
  {
    $assets = DB::table('assets')->join('asset_details', 'assets.assetID', '=', 'asset_details.assetID')
                                  ->join('subcategories', 'subcategories.subcategoryID', '=', 'assets.subcategoryID')
                                  ->where('asset_details.currentStatus', '!=', 'Archived')
                                  ->orderBy('assets.assetID', 'asc')
                                  ->get();

    $subcategories = Subcategory::select('subcategoryID', 'subcategoryName')
                                ->orderBy('subcategoryID', 'asc')
                                ->get();

    $insurances = InsuranceCompany::all();

    $services = ServiceCompany::select('serviceCompanyID', 'serviceCompanyName')
                                    ->orderBy('serviceCompanyID', 'asc')
                                    ->get();

    return View::make('dashboard.asset.asset', compact('assets'), compact('subcategories', 'insurances', 'services'));
  }

  public function store()
  {
    $this->validate(request(),[
      'assetName' => 'required',
      'subcategory' => 'required|numeric',
      'datePurchased' => 'date_format:Y-m-d|before_or_equal:today',
    ]);

    $asset = new Asset;

    $asset->assetName = request('assetName');
    $asset->subcategoryID = request('subcategory');

    $asset->save();

    $assetid = $asset->assetID;

    DB::table('asset_details')->insert(
        array(
          'assetID' => $assetid,
          'purchasedValue' => request('purchasedValue'),
          'netWorthValue' => request('netWorthValue'),
          'roadTaxValue' => request('roadTaxValue'),
          'brand' => request('brand'),
          'model' => request('model'),
          'colour' => request('colour'),
          'carPlate' => request('carplate'),
          'supplier' => request('supplier'),
          'datePurchased' => Request('datePurchased'),
          'currentStatus' => 'Available'
        )
      );

    return back();

  }

  public function show($id)
  {
    $find = DB::table('assets')->join('asset_details', 'assets.assetID', '=', 'asset_details.assetID')
                                  ->join('subcategories', 'subcategories.subcategoryID', '=', 'assets.subcategoryID')
                                  ->join('categories', 'categories.categoryID', '=', 'subcategories.categoryID')
                                  ->where('assets.assetID', '=', $id)
                                  ->first();

   $findI = DB::table('has_insurance')->join('insurance_companies', 'has_insurance.insuranceCompanyID', '=', 'insurance_companies.insuranceCompanyID')
                                         ->select('has_insurance.insuranceID', 'has_insurance.insuranceCompanyID', 'has_insurance.previousExpDate', 'has_insurance.currentExpDate', 'insurance_companies.insuranceCompanyName')
                                         ->where('has_insurance.assetID', '=', $id)
                                         ->orderBy('has_insurance.insuranceID', 'asc')
                                         ->get();

   $findS = DB::table('has_maintenance')->join('service_companies', 'has_maintenance.serviceCompanyID', '=', 'service_companies.serviceCompanyID')
                                         ->select('has_maintenance.maintenanceID', 'has_maintenance.serviceDescription', 'has_maintenance.serviceDateTime', 'has_maintenance.nextServiceDate', 'has_maintenance.maintenancePeriod', 'service_companies.serviceCompanyName')
                                         ->where('has_maintenance.assetID', '=', $id)
                                         ->orderBy('has_maintenance.maintenanceID', 'asc')
                                         ->get();

   $subcategories = Subcategory::select('subcategoryID', 'subcategoryName')
                               ->orderBy('subcategoryID', 'asc')
                               ->get();

   $insurances = InsuranceCompany::all();

   $services = ServiceCompany::select('serviceCompanyID', 'serviceCompanyName')
                                   ->orderBy('serviceCompanyID', 'asc')
                                   ->get();

     return view('dashboard.asset.manageasset',compact('find'), compact( 'findI', 'findS','subcategories', 'insurances', 'services') );
  }

  public function archive($id)
  {
    DB::table('asset_details')
      ->where('assetID', $id)
      ->update(['currentStatus' => 'Archived']);

    return redirect('/asset');
  }

  public function update($id)
  {
    $upd = Asset::find($id);
    $upd->assetName = request('assetName');
    $upd->subcategoryID = request('subcategory');

    $upd->save();

    $aID = $upd->assetID;

    $this->validate(request(),[
      'datePurchased' => 'required | date_format:Y-m-d|before_or_equal:today',
    ]);

    DB::table('asset_details')
      ->where('assetID', $aID)
      ->update(
          array(
            'purchasedValue' => request('purchasedValue'),
            'netWorthValue' => request('netWorthValue'),
            'roadTaxValue' => request('roadTaxValue'),
            'brand' => request('brand'),
            'model' => request('model'),
            'colour' => request('colour'),
            'carPlate' => request('carplate'),
            'supplier' => request('supplier'),
            'datePurchased' => Request('datePurchased')
          )
        );

    return back();
  }

  public function showSearch()
  {
    $assets = DB::table('categories')->join('subcategories', 'categories.categoryID', '=', 'subcategories.categoryID')
                                     ->join('assets', 'subcategories.subcategoryID', '=', 'assets.subcategoryID')
                                     ->join('asset_details', 'assets.assetID', '=', 'asset_details.assetID')
                                     ->where('asset_details.currentStatus', '!=', 'Archived')
                                     ->orderBy('assets.assetID', 'asc')
                                     ->get();

    return view('dashboard.asset.search', compact('assets'));
  }

  public function generate()
  {
    $allassets = DB::table('assets')->join('asset_details', 'assets.assetID', '=', 'asset_details.assetID')
                                      ->select('assets.assetID', 'assets.assetName', 'asset_details.currentStatus')
                                      ->orderBy('assets.assetID', 'asc')
                                      ->get();

    return view('dashboard.asset.generate', compact('allassets'));
  }

  public function generateID()
  {
    $aID = request('asset');
    $find = Asset::find($aID);
    return view('dashboard.asset.qr', compact('find'));
  }

  public function addInsurance($id)
  {
    $this->validate(request(),[
      'insuranceCompanyID' => 'required|numeric',
      'previousExpDate' => 'required|date_format:Y-m-d|before_or_equal:today',
      'currentExpDate' => 'required|date_format:Y-m-d|after:today',
    ]);

    $find = Asset::find($id);
    $aID = $find->assetID;

    DB::table('has_insurance')->insert(
        array(
          'assetID' => $aID,
          'insuranceCompanyID' => request('insuranceCompanyID'),
          'previousExpDate' => request('previousExpDate'),
          'currentExpDate' => request('currentExpDate')
        )
      );

    return back();

  }

  public function showInsurance($id)
  {
    $find = DB::table('has_insurance')->where('insuranceID', '=', $id)
                                      ->first();

    $insurances = InsuranceCompany::all();

    return view('dashboard.asset.mngInsurance', compact('find', 'insurances'));
  }

  public function updInsurance($id)
  {
    DB::table('has_insurance')
      ->where('insuranceID', $id)
      ->update(
          array(
            'insuranceCompanyID' => request('insuranceCompanyID'),
            'previousExpDate' => request('previousExpDate'),
            'currentExpDate' => request('currentExpDate')
          )
        );

      return redirect('/asset');
  }

  public function addService($id)
  {

    $this->validate(request(),[
      'serviceCompanyID' => 'required|numeric',
      'serviceDateTime' => 'required|after:today ',
      'maintenancePeriod' => 'required|numeric',
      'serviceDescription' => 'required',
      'nextServiceDate' => 'required | date_format:Y-m-d|after:serviceDateTime',
    ]);

    $find = Asset::find($id);
    $aID = $find->assetID;

    DB::table('has_maintenance')->insert(
        array(
          'assetID' => $aID,
          'serviceCompanyID' => request('serviceCompanyID'),
          'serviceDateTime' => request('serviceDateTime'),
          'maintenancePeriod' => request('maintenancePeriod'),
          'serviceDescription' => request('serviceDescription'),
          'nextServiceDate' => request('nextServiceDate')
        )
      );

    return back();

  }

  public function showService($id)
  {
    $find = DB::table('has_maintenance')->where('maintenanceID', '=', $id)
                                      ->first();

    $services = ServiceCompany::all();

    return view('dashboard.asset.mngService', compact('find', 'services'));
  }

  public function updService($id)
  {
    DB::table('has_maintenance')
      ->where('maintenanceID', $id)
      ->update(
          array(
            'serviceCompanyID' => request('serviceCompanyID'),
            'serviceDateTime' => request('serviceDateTime'),
            'maintenancePeriod' => request('maintenancePeriod'),
            'serviceDescription' => request('serviceDescription'),
            'nextServiceDate' => request('nextServiceDate')
          )
        );


      return redirect('/asset');
  }

  public function searchArchived()
  {
    $archives = DB::table('categories')->join('subcategories', 'categories.categoryID', '=', 'subcategories.categoryID')
                                     ->join('assets', 'subcategories.subcategoryID', '=', 'assets.subcategoryID')
                                     ->join('asset_details', 'assets.assetID', '=', 'asset_details.assetID')
                                     ->where('asset_details.currentStatus', '=', 'Archived')
                                     ->orderBy('assets.assetID', 'asc')
                                     ->get();

    return view('dashboard.asset.searchArchive', compact('archives'));
  }

  public function showArchived($id)
  {
    $find = DB::table('categories')->join('subcategories', 'categories.categoryID', '=', 'subcategories.categoryID')
                                     ->join('assets', 'subcategories.subcategoryID', '=', 'assets.subcategoryID')
                                     ->join('asset_details', 'assets.assetID', '=', 'asset_details.assetID')
                                     ->where('assets.assetID', '=', $id)
                                     ->first();

   return view('dashboard.asset.unarchive', compact('find'));
  }

  public function updateArchived($id)
  {
    DB::table('asset_details')
      ->where('assetID', $id)
      ->update(['currentStatus' => 'Available']);

    return redirect('/asset');
  }

}
