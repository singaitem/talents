<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
    protected function store(Request $request){
        if(is_null($request['agree']) || $request['agree']=='off' ){
            return redirect('/register')->withErrors([
                'error' => 'You must aggre to the terms',
            ]);
        }
        validator($request->all())->validate();
        $employee = Employee::where('name',$request['employee_number'])->first();
        if (is_null($employee)) {
            return redirect('/register')->withErrors([
                'error' => 'Employee number does not match with our records.',
            ]);
        }
        if ($employee->person->email !=$request['email']) {
            return redirect('/register')->withErrors([
                'error' => 'Email does not match with our records.',
            ]);
        }
        if ($employee->company->code !=$request['company_code']) {
            return redirect('/register')->withErrors([
                'error' => 'Company code does not match with our records.',
            ]);
        }
        
        $this->create($request->all());
        return redirect()->route('login');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'employee_number' => 'required|unique:users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $employee = Employee::where('name',$data['employee_number'])->first();
        return User::create([
            'employee_id' =>$employee->id,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
