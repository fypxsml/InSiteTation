<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ProjectSite;
use App\Requisition;
use App\SubmittedRequisition;
use App\AssetDetail;
use App\AssignedSite;
use App\Location;
use Carbon\Carbon;
use DB;
use Auth;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    //public function index(\App\Tag $tag = null)
    public function index()
    {
        $userAL = 0;
        if (\Auth::check())
        {
            $userAL = \Auth::user()->level();
        }


        if($userAL > 0 && $userAL < 4)
        {
            //active user
            $users = User::where('status', '=', 'Active')->count();

            //active sites
            $sites = ProjectSite::where('status', '=', 'On-Going')->count();

            //active requisitions
            $requisitions = Requisition::where('rentalStatus', '=', 'On Loan')->count();

            //all assets
            $assets = AssetDetail::where('currentStatus', '!=', 'Archived')->count();

            //active sites for user
            $user = Auth::user();
            $staffID = $user->staffID;

            //total requisitions on site managed
            //$siteMng = AssignedSite::where('staffID', '=', $staffID)->count();
            $reqSites = DB::table('assigned_sites')->join('requisitions', 'assigned_sites.siteID', '=', 'requisitions.siteID')
                                                  ->where([['assigned_sites.staffID', '=', $staffID]])
                                                  ->count();

            //total assets on site managed
            $totalAssets = DB::table('assigned_sites')->join('requisitions', 'assigned_sites.siteID', '=', 'requisitions.siteID')
                                                      ->where('assigned_sites.staffID', '=', $staffID)
                                                      ->count();


            //total sites handled
             $userSites = DB::table('assigned_sites')->where('staffID', '=', $staffID)->distinct('siteID')->count();

            //total users at the same site
            $sameSites = DB::table('assigned_sites')->distinct('staffID')->count('staffID');

            $analytics = [
              'allUsers' => $users,
              'allSites' => $sites,
              'allReq' => $requisitions,
              'allAssets' => $assets,

              'reqSites' => $reqSites,
              'totalAssets' => $totalAssets,
              'sites' => $userSites
            ];

            $staffDonut = DB::table('assigned_sites')->join('requisitions', 'assigned_sites.siteID', '=', 'requisitions.siteID')
                                                ->join('project_sites', 'assigned_sites.siteID', '=', 'project_sites.siteID')
                                                ->select('project_sites.projectName as label', DB::raw('count(*) as value'))
                                                ->where('assigned_sites.staffID', '=', $staffID)
                                                ->groupBy('project_sites.projectName')
                                                ->get();

            $staffBar = DB::table('project_sites')->join('assigned_sites', 'project_sites.siteID', '=', 'assigned_sites.siteID')
                                                  ->join('requisitions', 'requisitions.siteID', '=', 'assigned_sites.siteID')
                                                  ->select('project_sites.projectName as y', DB::raw('count(*) as a'))
                                                  ->where('assigned_sites.staffID', '=', $staffID)
                                                  ->groupBy('project_sites.projectName')
                                                  ->get();

            $donut = DB::table('project_sites')->join('requisitions', 'project_sites.siteID', '=', 'requisitions.siteID')
                                                ->select('project_sites.projectName as label', DB::raw('count(*) as value'))
                                                ->groupBy('project_sites.projectName')
                                                ->get();

            $bar = DB::table('project_sites')->join('requisitions', 'project_sites.siteID', '=', 'requisitions.siteID')
                                                  ->select('project_sites.projectName as y', DB::raw('count(*) as a'))
                                                  ->groupBy('project_sites.projectName')
                                                  ->get();

            $assigns = DB::table('assigned_sites')->join('project_sites', 'assigned_sites.siteID', '=', 'project_sites.siteID')
                                                  ->where('assigned_sites.staffID', '=', $staffID)
                                                  ->get();

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

            return view('dashboard.index', compact('analytics'), compact('staffDonut', 'staffBar', 'donut', 'bar', 'assigns', 'sites', 'locations'));
        }

        else
        {
            return view('error.notLogin');
        }
    }



}
