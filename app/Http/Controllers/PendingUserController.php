<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\PendingUser;
use App\RoleUser;
use jeremykenedy\LaravelRoles\Models\Role;


class PendingUserController extends Controller
{
    public function index()
    {
		$pgUsers = PendingUser::get()->where('status', 'Pending');
		return view('registration.approve', compact('pgUsers'));
    }

	public function addUser($id)
	{
		$this->validate(request(), [
		'roleID' => 'required|numeric',
		]);

		$pg = PendingUser::find($id);

		$fname = $pg->fname;
		$lname = $pg->lname;
		$staffID = $pg->staffID;
		$userID = $pg->userID;
		$email = $pg->email;
		$password = $pg->password;

		$pg->status = 'Approved';
		$pg->save();

		$user = new User();
		$user->fname = $fname;
		$user->lname = $lname;
		$user->staffID = $staffID;
		$user->userID = $userID;
		$user->email = $email;
		$user->password = $password;
    $user->status = 'Active';
		$user->save();

		$RID = request('roleID');
		$roleUser = new RoleUser();
		$roleUser->role_id=$RID;
		$roleUser->user_id=$user->id;
		$roleUser->save();

		//\Mail::to($user)->send(new Approved($user));

		return back();
	}

	public function rejected($id)
	{
		$this->validate(request(), [
		'remarks' => 'required',
		]);

		$pg = PendingUser::find($id);
		$pg->status = 'Rejected';
		$pg->remarks = request('remarks');
		$pg->save();

		//\Mail::to($pg)->send(new Rejected($pg));

		return back();
	}
}
