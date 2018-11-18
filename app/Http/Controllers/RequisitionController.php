<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\ProjectSite;
use App\Requisition;
use App\Location;
use Carbon\Carbon;
use DB;
use Auth;

class RequisitionController extends Controller
{

  public function index()
  {
    $ongoings = Requisition::where('rentalStatus', 'On Loan')
                            ->orderBy('requisitionID', 'asc')
                            ->get();

    return view('dashboard.requisition.onGoing', compact('ongoings'));
  }

  public function show($id)
  {


    $requisition = DB::table('requisitions')->join('assets', 'assets.assetID', '=', 'requisitions.assetID')
                                            ->join('project_sites', 'project_sites.siteID', '=', 'requisitions.siteID')
                                              ->select('requisitions.requisitionID', 'requisitions.staffID', 'requisitions.assetID', 'assets.assetName', 'requisitions.siteID', 'project_sites.projectName', 'project_sites.purpose', 'requisitions.requisitionPurpose', 'requisitions.rentalDateTime', 'requisitions.returnDateTime', 'requisitions.created_at')
                                              ->where('requisitions.requisitionID', $id)
                                              ->first();

    $locations = Location::where('requisitionID', '=', $id)->get();




    return view('dashboard.requisition.details', compact('requisition'), compact('locations'));
  }

  public function return($id)
  {
    $req = Requisition::find($id);
    $req->remarks = request('ReasonsInput');
    $req->rentalStatus = 'Returned';
    $req->save();

    $aID = $req->assetID;

    DB::table('asset_details')->where('assetID', $aID)
                              ->update(['currentStatus' => 'Available']);


    DB::table('locations')->where('requisitionID', $id)
                          ->update(['requisitionStatus' => 'End']);
    return redirect('/requisition/ongoing');
  }

  public function cancel($id)
  {
    $this->validate(request(), [
      'ReasonsInput' => 'required'
    ]);

    $req = Requisition::find($id);
    $req->remarks = request('ReasonsInput');
    $req->rentalStatus = 'Cancelled';
    $req->save();

    $aID = $req->assetID;

    DB::table('asset_details')->where('assetID', $aID)
                              ->update(['currentStatus' => 'Available']);

    DB::table('locations')->where('requisitionID', $id)
                          ->update(['requisitionStatus' => 'End']);
    return redirect('/requisition/ongoing');
  }

  public function history()
  {

    $requisitions = Requisition::select('requisitionID', 'staffID', 'assetID', 'siteID', 'requisitionPurpose', 'rentalDateTime', 'returnDateTime', 'rentalStatus','remarks', 'created_at')
                            ->orderBy('requisitionID', 'desc')
                            ->get();

    return view('dashboard.requisition.history', compact('requisitions'));
  }

  public function historyDetails($id)
  {

    $requisition = DB::table('requisitions')->join('assets', 'assets.assetID', '=', 'requisitions.assetID')
                                            ->join('project_sites', 'project_sites.siteID', '=', 'requisitions.siteID')
                                              ->select('requisitions.requisitionID', 'requisitions.staffID', 'requisitions.assetID', 'assets.assetName', 'requisitions.siteID', 'project_sites.projectName', 'project_sites.purpose', 'requisitions.requisitionPurpose', 'requisitions.rentalDateTime', 'requisitions.returnDateTime', 'requisitions.created_at')
                                              ->where('requisitions.requisitionID', $id)
                                              ->first();

    $locations = Location::where('requisitionID', '=', $id)->get();

    return view('dashboard.requisition.historyDetails', compact('requisition'), compact('locations'));
  }

  public function assetHistory()
  {
    $assets = DB::table('assets')->join('asset_details', 'assets.assetID', '=', 'asset_details.assetID')
                                  ->join('subcategories', 'assets.subcategoryID', '=', 'subcategories.subcategoryID')
                                  ->select('assets.assetID', 'assets.assetName', 'asset_details.carPlate', 'asset_details.currentStatus', 'subcategories.subcategoryName')
                                  ->orderBy('assets.assetID', 'asc')
                                  ->get();

    return view('dashboard.requisition.assetHistory', compact('assets'));
  }

  public function locationHistory($id)
  {
    $locations = DB::table('locations')->join('requisitions', 'requisitions.requisitionID', '=', 'locations.requisitionID')
                                      ->select('requisitions.assetID','requisitions.requisitionID', 'requisitions.staffID', 'requisitions.rentalDateTime', 'requisitions.returnDateTime', 'requisitions.created_at', 'requisitions.rentalStatus', 'requisitions.requisitionPurpose', 'locations.longitude', 'locations.latitude')
                                      ->where('requisitions.assetID', $id)
                                      ->get();
    $aID = $id;
    return view('dashboard.requisition.location', compact('locations'), compact('aID'));
  }

  public function userRequisitions()
  {

    $user = Auth::user();

    $sID = $user->staffID;

    $requisitions = DB::table('submitted_requisitions')->select('assetID', 'rentalDateTime', 'returnDateTime', 'requisitionPurpose', 'siteID', 'remarks', 'status', 'created_at', 'requisitionID')
                                                    ->where('staffID', $sID)
                                                    ->get();


    return view('dashboard.requisition.user.reqHistory', compact('requisitions'));
  }

  public function reqDetails($id)
  {
    $requisition = Requisition::find($id);

    $aID = $requisition->assetID;
    $asset = Asset::select('assetID', 'assetName')
                    ->where('assetID', $aID)
                    ->get();
    $rID = $requisition->requisitionID;
    $locations = DB::table('locations')->select('longitude', 'latitude', 'updated_at', 'requisitionStatus')
                                        ->where('requisitionID', $rID)
                                        ->get();
    return view('dashboard.requisition.user.reqDetails', compact('asset', 'requisition'), compact('locations'));

  }

  public function showRequisition()
  {
    $user = Auth::user();

    $sID = $user->staffID;
    $requisitions = Requisition::select('requisitionID', 'assetID', 'rentalDateTime', 'returnDateTime', 'requisitionPurpose', 'siteID', 'remarks', 'rentalStatus', 'created_at')
                    ->where([['staffID', $sID], ['rentalStatus','=', 'On Loan']])
                    ->get();


    return view('dashboard.requisition.user.showupdate', compact('requisitions'));
  }

  public function update($id)
  {
    $find = Requisition::find($id);

    return view('dashboard.requisition.user.update', compact('find'));
  }

  public function updateLocation($id)
  {
    $req = Requisition::find($id);

    $temp = $req->assetID;

    $rID = $req->requisitionID;

    $this->validate(request(), [
      'qrValue' => 'required|in:'.$temp
    ]);

    DB::table('locations')->insert(
        array(
          'requisitionID' => $rID,
          'longitude' => request('long'),
          'latitude' => request('lat'),
          'requisitionStatus' => 'On-Going'
        )
      );

    \Session::flash('update', 'Location updated successfully');

    return back();

  }

  public function showMap()
  {
    $sites = DB::table('project_sites')->select('projectName', 'longitude', 'latitude')->get();

    $locations = DB::table('locations as a')
    ->select('a.requisitionID', 'a.longitude', 'a.latitude', 'requisitions.assetID', 'requisitions.staffID', 'project_sites.projectName')
    ->leftJoin('locations as b', function ($join) {
          $join->on('a.requisitionID','=','b.requisitionID')
               ->whereRaw(DB::raw('a.created_at < b.created_at'));
     })
    ->join('requisitions', 'a.requisitionID', '=', 'requisitions.requisitionID')
    ->join('project_sites', 'requisitions.siteID', '=', 'project_sites.siteID')
    ->whereNull('b.requisitionID')
    ->where('a.requisitionStatus', '=', 'On-Going')
    ->get();

    return view('dashboard.requisition.map', compact('sites', 'locations'));
  }

}
