<?php

namespace App\Http\Controllers;

use App\Seller;
use Illuminate\Support\Facades\validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;


class SellerController extends Controller
{

    protected $redirectTo = RouteServiceProvider::SELLER;
    
    public function index()
    {
        return view('seller.home');
    }

    public function login()
    {
        return view('seller.login');
    }

    public function check_Seller_login(Request $request)
    {
        $this->validate($request ,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
    
        if (Auth::guard('seller')->attempt(['email' => $request->email,'password' =>$request->password], $request->get('remember'))) {
            
            return redirect()->intended('/seller');
        }

        return back()->withInput($request->only('email', 'remember'));
        
    }

    public function show_seller_registeration_page()
    {
        return view('seller.register');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:sellers'],
            'avatar' => ['sometimes'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        ]);
    }

    public function create_seller(Request $request)
    {
         if(request()->has('avatar')){
             
             $avatar_uploaded = request()->file('avatar');
             $avatar_name = time() . '.' . $avatar_uploaded->getClientOriginalExtension();
                 $avatar_path = public_path('/img/');
             $avatar_uploaded->move($avatar_path, $avatar_name);

             $this->validator($request->all())->validate();
              $seller = Seller::create([
                 'name' => $request['name'],
                 'email' => $request['email'],
                 'password' => Hash::make($request['password']),
                 'avatar' => '/img/' . $avatar_name,
         ]);
         return redirect()->intended('/seller');  
         }

        $this->validator($request->all())->validate();
        $seller = Seller::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        
        return redirect()->intended('/seller');
    }

    public function show_add_product_page()
    {
        return view('seller.add-product');
    }

 
}
