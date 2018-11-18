<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

use Illuminate\Http\Request;
use App\PendingUser;
use App\Mail\Approved;
use App\Mail\Rejected;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    public function displayMsg()
    {
        \Session::flash('message', 'Your request has been sent. A response email will be sent to you shortly.');
        return redirect('/');
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);

        // return $this->registered($request, $user)
        //                 ?: redirect($this->redirectPath());

        return $this->displayMsg($request);
    }

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'staffID' => 'required',
            'userID' => 'required',
            'email' => 'required|string|email|max:255|unique:pending_users',
            // 'password' => 'required|string|min:6|confirmed',
            'password' => 'required|string|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {
    //     $user = User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);

    //     $role = Role::where('name', '=', 'User')->first();  //choose the default role upon user creation.
    //     $user->attachRole($role);

    //     return $user;
    // }
    // public function create()
    // {
    //   return view('registration.create');
    // }

    public function create()
    {
      $status = 'Pending';

      PendingUser::create([
        'fname' => request('fname'),
        'lname' => request('lname'),
        'staffID' => request('staffID'),
        'userID' => request('userID'),
        'email' => request('email'),
        'status' => $status,
        'password' => bcrypt(request('password'))
      ]);
    }

    // public function index()
    // {
    //   $pgUsers = PendingUser::get()->where('status', 'Pending');
    //   return view('registration.approve', compact('pgUsers'));
    // }

    // public function addUser($id)
    // {
    //   $this->validate(request(), [
    //     'accessLevel' => 'required|numeric',
    //   ]);

    //   $pg = PendingUser::find($id);

    //   $fname = $pg->fname;
    //   $lname = $pg->lname;
    //   $staffID = $pg->staffID;
    //   $userID = $pg->userID;
    //   $email = $pg->email;
    //   $password = $pg->password;

    //   $pg->status = 'Approved';
    //   $pg->save();

    //   $user = new User();
    //   $user->fname = $fname;
    //   $user->lname = $lname;
    //   $user->staffID = $staffID;
    //   $user->userID = $userID;
    //   $user->email = $email;
    //   $user->password = $password;
    //   $user->accessLevel = request('accessLevel');
    //   $user->save();

    //   \Mail::to($user)->send(new Approved($user));

    //   return back();
    // }

    // public function rejected($id)
    // {
    //   $this->validate(request(), [
    //     'remarks' => 'required',
    //   ]);

    //   $pg = PendingUser::find($id);
    //   $pg->status = 'Rejected';
    //   $pg->remarks = request('remarks');
    //   $pg->save();

    //   \Mail::to($pg)->send(new Rejected($pg));

    //   return back();
    // }



}

