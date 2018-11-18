<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectSite;
use App\User;
use App\AssignedSite;

use DB;

class AssignedSiteController extends Controller
{
    public function index()
    {
        $sites = ProjectSite::where('status', '=', 'On-Going')->get();

        $users = DB::table('users')->join('role_user', 'users.id','=', 'role_user.user_id')
                                    ->select('users.staffID', 'users.userID', 'users.status')
                                    ->where([['users.status', '=', 'Active'], ['role_user.role_id', '=', 3]])
                                    ->get();

        $allAssign = AssignedSite::all();

        return view('dashboard.projectsite.assign', compact('sites', 'allAssign','users'));
    }

    public function store()
    {
      $this->validate(request(),[
        'user' => 'required | numeric',
        'projectSites' => 'required | numeric',
        'startDate' => 'required | date ',
        'endDate' => 'required | date_format:Y-m-d|after:startDate',
        'jobDescription' => 'required',
      ]);

      AssignedSite::create([
        'staffID' => request('user'),
        'siteID' => request('projectSites'),
        'startDate' => request('startDate'),
        'endDate' => request('endDate'),
        'jobDescription' => request('jobDescription'),
        'jobStatus' => 'Active'
      ]);

      return back();

    }

    public function show($id)
    {
        $sites = ProjectSite::where('status', '=', 'On-Going')->get();

        $find = AssignedSite::find($id);

        return view('dashboard.projectsite.editAssign', compact('sites', 'find'));
    }

    public function update($id)
    {
        $upd = AssignedSite::find($id);

        $upd->siteID = request('projectSites');
        $upd->startDate = request('startDate');
        $upd->endDate = request('endDate');
        $upd->jobDescription = request('jobDescription');
        $upd->jobStatus = request('status');
        $upd->remarks = request('reason');
        $upd->save();

        return redirect('/projectsite/assign');
    }
}
