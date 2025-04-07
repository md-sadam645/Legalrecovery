<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login()
    {
        $data['title'] ='Login';
        return view('admin/auth/login',$data);
    }
    
    public function deleteAccount(){
        
        return view('admin.auth.deleteAccount');

    }
     public function deletemyaccount(){
    return back()->with('success','Account Deleted Successfully');
    //   return redirect('/dashboard')->with('success', 'Login Success');

    }

    //Start - Super Admin & Admin Login
    public function authAdmin(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);
        if($validator->fails())
        {
            return back()->with('error',$validator->errors()->all());
        }

        $username = $request->email;
        $password = $request->password;

        $checkUser = User::where("email",$username)->first();
        if(!empty($checkUser))
        {
            if($checkUser->role == 1 || $checkUser->role == 2)
            {   
                //current date time
                $now = Carbon::now();
                $dateTime = $now->format('Y-m-d g:i A');

                //super admin login
                if($checkUser->role == 1)
                {
                    if(Auth::attempt(['email' => $username, 'password' => $password]))
                    {
                        $update = User::where("id",Auth::user()->id)->update(array(
                            "last_login" => $dateTime
                        ));
                        if($update)
                        {
                            return redirect('/dashboard')->with('success', 'Login Success');
                        }
                        
                    }
                    else
                    {
                        return back()->with("error","Wrong password !");
                    }
                }

                //Start - admin login
                if($checkUser->role == 2 && $checkUser->status == 1)
                {
                    if(Auth::attempt(['email' => $username, 'password' => $password]))
                    {
                        $update = User::where("id",Auth::user()->id)->update(array(
                            "last_login" => $dateTime
                        ));
                        if($update)
                        {
                            return redirect('/dashboard')->with('success', 'Login Success');
                        }
                    }
                    else
                    {
                        return back()->with("error","Wrong password !");
                    }
                }
                else
                {
                    return back()->with("error","Account Inactive, Please Contact Your Admin!");   
                }  
                //End - admin login    
            }
            else
            {
                return back()->with("error","Access Denied!");
            }
        }
        else
        {
            return back()->with("error","User not registered!");
        }
    }
    //End - Super Admin & Admin  Login

    //Start - Super Admin & Admin  view Profile
    function myProfile()
    {
        $data['title'] ='My Profile';
        return view('admin.auth.myProfile',$data);
    }
    //End - Super Admin & Admin  view Profile

    //Start - Super Admin & Admin  Profile Update
    function profileUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|string|min:10|max:10'
        ]);
        if($validator->fails())
        {
            return back()->with('error',$validator->errors()->all());
        }

        if($request->file("profile") != "")
        {
            $fname = time().'.'.$request->profile->extension();  
            $fileName =date('d-m-Y-H-i-s').$fname;
            $request->profile->move(public_path('userImg'), $fileName);
            $profileImg= env("APP_URL")."userImg/".$fileName;
        }
        else
        {
            $profileImg = env("APP_URL")."images/avtaar/avtaar.jpg";
        }

        $update = User::where("id",Auth::user()->id)->update(array(
            'image' => $profileImg,
            'name' => $request->name,
            'mobile'=>$request->mobile
        ));
        if($update)
        {
            return back()->with('success','You have been successfully update profile!');
        }
    }
    //End - Super Admin & Admin  Profile Update

    //Start - Super Admin & Admin  Change Password
    function changePassword()
    {
        $data['title'] ='Change Password';
        return view('admin.auth.changePassword',$data);
    }
    //Start - Super Admin & Admin  Change Password

    //Start - Super Admin & Admin  Update Password
    function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required| min:6'
            
        ]);
        if($validator->fails())
        {
            return back()->with('error',$validator->errors()->all());
        }
        else
        {
            $user =  User::where("id", Auth::user()->id)->first();
            if($user && password_verify($request->current_password, $user->password))
            {
                $update = $user->update(array(
                    'password' =>  Hash::make($request['password_confirmation']),
                ));
                if($update)
                {
                    Auth::logout();
                    return redirect("/")->with("success","Your password was changed !");
                }
            }
            else
            {
                return back()->with("error","Current Password Doesn't Matched !");
                
            }
        }
    }
    //End - Super Admin & Admin  Update Password

    // public function unauthorized(){
    //     Auth::logout();
    //     return redirect('login');
    //     echo "Unauthorized access from middleware"; 
    // }

    
    //Start - Super Admin & Admin  Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    //End - Super Admin & Admin  Logout
}
