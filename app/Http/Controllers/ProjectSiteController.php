<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\ProjectSite;

class ProjectSiteController extends Controller
{
    public function index()
    {
      $sites = ProjectSite::select('siteID', 'address', 'longitude', 'latitude', 'companyHandled', 'projectName', 'purpose', 'status', 'remarks')
                                  ->orderBy('siteID', 'asc')
                                  ->get();

      return view('dashboard.projectsite.projectsite', compact('sites'));
    }

    public function store()
    {
      $this->validate(request(),[
        'projectName' => 'required',
        'purpose' => 'required',
        'companyHandled' => 'required',
        'address' => 'required',
        'longitude' => 'required|numeric',
        'latitude' => 'required|numeric',
        'status' => 'required'
      ]);

      ProjectSite::create([
        'projectName' => request('projectName'),
        'purpose' => request('purpose'),
        'companyHandled' => request('companyHandled'),
        'address' => request('address'),
        'latitude' => request('latitude'),
        'longitude' => request('longitude'),
        'status' => request('status'),
        'remarks' => request('remark')
      ]);

      return back();
    }

    public function show($id)
    {
      $find = ProjectSite::find($id);
      return view('dashboard.projectsite.editsite', compact('find'));
    }

    public function update($id)
    {
      $upd = ProjectSite::find($id);
      $upd->projectName = request('projectName');
      $upd->purpose = request('purpose');
      $upd->companyHandled = request('companyHandled');
      $upd->address = request('address');
      $upd->latitude = request('latitude');
      $upd->longitude = request('longitude');
      $upd->status = request('status');
      $upd->remarks = request('remark');
      $upd->save();

      return redirect ('/projectsite');
    }

    public function showSearch()
    {
      $sites = ProjectSite::select('siteID', 'address', 'longitude', 'latitude', 'companyHandled', 'projectName', 'purpose', 'status', 'remarks')
                                  ->orderBy('siteID', 'asc')
                                  ->get();

      return view('dashboard.projectsite.search', compact('sites'));
    }

    public function map()
    {
      $sites = ProjectSite::where('status', '=', 'On-Going')->get();


      return view('dashboard.projectsite.sitemap', compact('sites'));
    }
}
