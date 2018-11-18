<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectSite;
use App\SubmittedRequisition;
use App\Requisition;

use DB;
use Auth;

class SubmittedRequisitionController extends Controller
{
  public function index()
  {
      $assets = DB::table('assets')->join('asset_details', 'assets.assetID', '=', 'asset_details.assetID')
                                        ->select('assets.assetID', 'assets.assetName', 'asset_details.currentStatus')
                                        ->where('asset_details.currentStatus', 'Available')
                                        ->get();

      $user = Auth::user();
      $staffID = $user->staffID;

      $sites = DB::table('project_sites')->join('assigned_sites', 'project_sites.siteID', '=', 'assigned_sites.siteID')
                                        ->select('project_sites.siteID', 'project_sites.projectName', 'project_sites.purpose')
                                        ->where([['assigned_sites.staffID', '=', $staffID], ['project_sites.status', '=', 'On-Going']])
                                        ->get();

      return view('dashboard.requisition.user.sendRequisition', compact('assets'), compact('sites'));
  }

  public function store()
  {

      $this->validate(request(),[
        'asset' => 'required',
        'site' => 'required',
        'purpose' => 'required',
        'rentalDateTime' => 'required',
        'returnDateTime' => 'required'
      ]);

      $user = Auth::user();
      $userID = $user->staffID;

      SubmittedRequisition::create([
        'staffID' => $userID,
        'assetID' => request('asset'),
        'siteID' => request('site'),
        'requisitionPurpose' => request('purpose'),
        'rentalDateTime' => request('rentalDateTime'),
        'returnDateTime' => request('returnDateTime'),
        'status' => 'Pending'
      ]);

      return redirect('/requisition');
  }

  public function showPending()
  {
    $pendings = DB::table('submitted_requisitions') ->join('assets', 'submitted_requisitions.assetID', '=', 'assets.assetID')
                                                  ->join('asset_details', 'submitted_requisitions.assetID', '=', 'asset_details.assetID')
                                                  ->join('project_sites', 'submitted_requisitions.siteID', '=', 'project_sites.siteID')
                                                      ->select('submitted_requisitions.id','submitted_requisitions.staffID','assets.assetID', 'asset_details.carPlate', 'assets.assetName','asset_details.currentStatus', 'submitted_requisitions.siteID', 'project_sites.projectName', 'project_sites.purpose', 'submitted_requisitions.rentalDateTime', 'submitted_requisitions.returnDateTime', 'submitted_requisitions.created_at', 'submitted_requisitions.requisitionPurpose')
                                                      ->where('submitted_requisitions.status', 'Pending')
                                                      ->get();

    return view('dashboard.requisition.pending', compact('pendings'));
  }

  public function approve($id)
  {
    DB::table('submitted_requisitions')->where('id', $id)
                                        ->update(['status' => 'Approved']);

    $req = DB::table('submitted_requisitions')->select('staffID', 'assetID', 'siteID', 'requisitionPurpose', 'rentalDateTime', 'returnDateTime')
                          ->where('id', $id)
                          ->first();


    DB::table('asset_details')->where('assetID', $req->assetID)
                                        ->update(['currentStatus' => 'On Loan']);

    $new = new Requisition;

    $new->staffID = $req->staffID;
    $new->assetID = $req->assetID;
    $new->siteID = $req->siteID;
    $new->requisitionPurpose = $req->requisitionPurpose;
    $new->rentalDateTime = $req->rentalDateTime;
    $new->returnDateTime = $req->returnDateTime;
    $new->rentalStatus = 'On Loan';

    $new->save();

    $rID = $new->requisitionID;

    $sub = SubmittedRequisition::find($id);
    $sub->requisitionID = $rID;
    $sub->save();

    return back();
  }

  public function reject($id)
  {
    $this->validate(request(),[
      'RemarksInput' => 'required'
    ]);

    $remarkIpt = request('RemarksInput');
    DB::table('submitted_requisitions')->where('id', $id)
                                        ->update(['status' => 'Rejected'], ['remarks' => $remarkIpt]);

    return back();
  }

}
