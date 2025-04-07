<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ApiAuthController extends Controller
{
    //Start - user register
    // public function register(Request $request)
    // {
        
    //     $user_data = User::where('email', $request['email'])->where('role', '4')->first();
        
    //     if(!empty($user_data))
    //     {
    //         return response(['status'=>1,'msg'=>"You've already registered!"],200);  
    //     }
    //     else
    //     {
    //         //new register
    //         $validator = Validator::make($request->all(), [
    //             'name' => 'required|string|max:255',
    //             'mobile' => 'required|string|min:10|max:10',
    //             'email' => 'required|string|email|max:255|unique:users',
    //             'password' => 'required|string|min:6',
    //             'admin_id' => 'required|string',
    //         ]);
    //         if ($validator->fails())
    //         {
    //             return response(['status'=>0,'errors'=>$validator->errors()->all()],200);
    //         }

    //         //getting admin data
    //         $adminData = User::where("id",$request->admin_id)->first();
    //         //updating admin name
    //         $request['admin_name'] = $adminData->name; 

    //         $request['role'] = '4';
    //         $request['status'] = '0';
    //         $request['password']= Hash::make($request['password']);
    //         $request['image'] = env("APP_URL")."images/avtaar/avtaar.jpg";
            
    //         $request['avatar'] = json_encode([env("APP_URL")."images/avtaar/avtaar.jpg",env("APP_URL")."images/avtaar/male.png",env("APP_URL")."images/avtaar/male1.png",env("APP_URL")."images/avtaar/female.png",env("APP_URL")."images/avtaar/female1.png"]);
            
    //         $user = User::create($request->toArray());
    //         if($user)
    //         {
    //             $token = $user->createToken('Laravel Password Grant Client')->accessToken;
    //             return response(['status'=>1,'msg'=>'You have been successfully Registered!','token'=>$token],200);
    //         }
    //         else
    //         {
    //             return response(['status'=>0,'msg'=>'Invalid Register!'],200);
    //         }
          
    //     }
    // }
    //End - user register
    
    
    //Start - user login
   public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
            'device_id' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 200);
        }

        $user = User::where('email', $request->email)->where("role", 3)->first();
        if (!empty($user)) {
            if ($user->status == 1) {
                if (!empty($user->device_id)) {
                    if ($user->device_id == $request->device_id) {
                    
                       
                        //current date time
                        $now = Carbon::now();
                        $dateTime = $now->format('Y-m-d g:i A');

                        if (Hash::check($request->password, $user->password)) {
                            $update = User::where("email", $request->email)->update(array(
                                "last_login" => $dateTime,
                                "device_id" => $request->device_id
                            ));
                            if ($update) {
                                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                                return response(['status' => 1, 'msg' => 'You have been successfully Login!', 'token' => $token], 200);
                            }
                        } else {
                            return response(['status' => 0, 'msg' => "Password mismatch"], 200);
                        }
                    } else {
                        return response(['status' => 0, 'msg' => "Already login in another device !"], 200);
                    }
                } else {

                    
                    //current date time
                    $now = Carbon::now();
                    $dateTime = $now->format('Y-m-d g:i A');

                    if (Hash::check($request->password, $user->password)) {
                        $update = User::where("email", $request->email)->update(array(
                            "last_login" => $dateTime,
                            "device_id" => $request->device_id
                        ));
                        if ($update) {
                            $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                            return response(['status' => 1, 'msg' => 'You have been successfully Login!', 'token' => $token], 200);
                        }
                    } else {
                        return response(['status' => 0, 'msg' => "Password mismatch"], 200);
                    }
                   
                }
            } else {
                return response(['status' => 0, 'msg' => "Account Inactive, Please Contact Your Admin!"], 200);
            }
        } else {
            return response(['status' => 0, 'msg' => "User doesn't exist"], 200);
        }
    }
    //End - user login

     //Start - agent register
     public function agentRegister(Request $request)
     {
        //return $request;
         $agent_data = User::where('email', $request['email'])->where('role', '3')->first();
         
         if(!empty($agent_data))
         {
             return response(['status'=>1,'msg'=>"You've already registered!"],200);  
         }
         else
         {
            //new register
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'mobile' => 'required|string|min:10|max:10',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'admin_id' => 'required|string',
            ]);
            if ($validator->fails())
            {
                return response(['status'=>0,'errors'=>$validator->errors()->all()],200);
            }
            
            if($request->photo != "")
            {
                $fname = time().'.'.$request->photo->extension();  
                $fileName =date('d-m-Y-H-i-s').$fname;
                $request->photo->move(public_path('agentImg'), $fileName);
                $photo= env("APP_URL")."agentImg/".$fileName;
            }
            else
            {
                $photo= env("APP_URL")."images/avtaar/avtaar.jpg";
            }
            //Image Upload Close
            
            if($request->aadhar_photo != "")
            {
                $fname1 = time().'.'.$request->aadhar_photo->extension();  
                $fileName1 =date('d-m-Y-H').$fname1;
                $request->aadhar_photo->move(public_path('agentImg'), $fileName1);
                $aadhar_photo = env("APP_URL")."agentImg/".$fileName1;
            }
            else
            {
                $aadhar_photo = "";
            }
            //aadhar Upload Close
            
            $loan_no = $request->loan_no;
            if(empty($loan_no))
            {
                $loan = 'No';
            }
            else
            {
                $loan = $loan_no;
            }
            $amount = $request->amount;
            if(empty($amount))
            {
                $amt = 'No';
            }
            else
            {
                $amt = $amount;
            }
            $bucket = $request->bucket;
            if(empty($bucket))
            {
                $buc = 'No';
            }
            else
            {
                $buc = $bucket;
            }
            $total_amount = $request->total_amount;
            if(empty($total_amount))
            {
                $tamt = 'No';
            }
            else
            {
                $tamt = $total_amount;
            }
            $cemi = $request->emi;
            if(empty($cemi))
            {
                $emi = 'No';
            }
            else
            {
                $emi = $cemi;
            }
            $permission = $loan.','.$amt.','.$buc.','.$tamt.','.$emi;

            //getting admin data
            $adminData = User::where("id",$request->admin_id)->first();
            //updating admin name
            $request['admin_name'] = $adminData->name; 

            $request['role'] = '3';
            $request['status'] = '0';
            $request['password']= Hash::make($request['password']);
            $request['image'] = $photo;
            $request['aadhar'] = $aadhar_photo;
            $request['permission'] = $permission;
            //$request['avatar'] = json_encode([env("APP_URL")."images/avtaar/avtaar.jpg",env("APP_URL")."images/avtaar/male.png",env("APP_URL")."images/avtaar/male1.png",env("APP_URL")."images/avtaar/female.png",env("APP_URL")."images/avtaar/female1.png"]);
            
            $user = User::create($request->toArray());
            if($user)
            {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                return response(['status'=>1,'msg'=>'Successfully registered contact your admin to approval and go back to login screen!','token'=>$token],200);
            }
            else
            {
                return response(['status'=>0,'msg'=>'Invalid Register!'],200);
            }
           
        }
     }
     //End - agent register

    
    public function userStatus(Request $request)
    {
        $userDetail= $request->user()->token();
        $uid = $userDetail->user_id; 
        
        $uData = User::where("id",$uid)->first();
        return response(['status'=>1,'user_status'=> $uData->status],200);
    }
    
      //Start - Agent login
    // public function agentLogin (Request $request) 
    // {
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|string|email|max:255',
    //         'password' => 'required|string|min:6',
    //     ]);
    //     if ($validator->fails())
    //     {
    //         return response(['errors'=>$validator->errors()->all()], 200);
    //     }

    //     $user = User::where('email', $request->email)->first();
    //     if(!empty($user))
    //     {
    //         if($user->status == 1)
    //         {
    //             //current date time
    //             $now = Carbon::now();
    //             $dateTime = $now->format('Y-m-d g:i A');

    //             if(Hash::check($request->password, $user->password))
    //             {
    //                 $update = User::where("email",$request->email)->update(array(
    //                     "last_login" => $dateTime
    //                 ));
    //                 if($update)
    //                 {
    //                     $token = $user->createToken('Laravel Password Grant Client')->accessToken;
    //                     return response(['status'=>1,'msg'=>'You have been successfully Login!','token'=>$token],200);
    //                 } 
    //             }
    //             else
    //             {
    //                 return response(['status'=>0,'msg'=>"Password mismatch"],200);
    //             }
    //         }
    //         else
    //         {
    //             return response(['status'=>0,'msg'=>"Account Inactive, Please Contact Your Admin!"],200);
    //         }
            
    //     }
    //     else
    //     {
    //         return response(['status'=>0,'msg'=>"User doesn't exist"],200);
    //     }
    // }
    //End - Agent login

    function profile(Request $request)
    {
        $userDetail= $request->user()->token();
        $uid = $userDetail->user_id;
        
        $userData = User::where("id",$uid)->first();
        $userData["permission"] = explode(",",$userData->permission);
        return response(['status'=>1,'data'=> $userData],200);
    }


 //Start - Agent  Profile Update
    public function profileUpdate(request $request)
    {
        $userDetail= $request->user()->token();
        $uid = $userDetail->user_id;

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|min:10|max:10'
        ]);
        if($validator->fails())
        {
            return response(['status'=>0,'errors'=>$validator->errors()->all()],200);
        }

        //IMAGE UPDATE
        $agentData = User::where("id",$uid)->first();
       if($request->photo !="" )
       {
            $validator = Validator::make($request->all(), [
                'photo' => 'required|mimes:jpg,png,jpeg',
            ]);
            if ($validator->fails())
            { 
                return response(['status'=>0,'errors'=>$validator->errors()->all()],200);
            }
            else
            {
                $file = explode("agentImg",$agentData->image)[1];
                $filePath = public_path()."/agentImg".$file;
                if(file_exists($filePath))
                {
                    unlink($filePath);
                }
                
                $fname = time().'.'.$request->photo->extension();  
                $fileName =date('d-m-Y-H-i-s').$fname;
                $request->photo->move(public_path('agentImg'), $fileName);
                $itemimage= env("APP_URL")."agentImg/".$fileName;
            }
        }   
        else
        {
            $itemimage= $agentData->image;
        }
    
        //ADHAAR UPDATE
        if($request->aadhar!=""){
            $validator = Validator::make($request->all(), [
                'aadhar' => 'required|mimes:jpg,png,jpeg',
            ]);
            if ($validator->fails())
            { 
                return response(['status'=>0,'errors'=>$validator->errors()->all()],200);
            }
            else
            {
                $file = explode("agentImg",$agentData->aadhar)[1];
                $filePath = public_path()."/agentImg".$file;
                if(file_exists($filePath))
                {
                    unlink($filePath);
                }
                $fname1 = time().'.'.$request->aadhar->extension();  
                $fileName1 =date('d-m-Y-H').$fname1;
                $request->aadhar->move(public_path('agentImg'), $fileName1);
                $adhaarimage= env("APP_URL")."agentImg/".$fileName1;
            }
        }   
        else
        {
            $adhaarimage= $agentData->aadhar;
        }
    
        $update = User::where('id',$uid)->update([
            'image'=>$itemimage,
            'aadhar'=>$adhaarimage,
            'name'=>$request->name,
            'mobile'=>$request->mobile
        ]);
        if($update)
        {
            return response(['status'=>1,'msg'=>'You have been successfully update profile!'],200);
        }
    }
    //End - Agent Profile Update
    
    
    //Start - Admin
    public function Admin(Request $request) 
    {
        return response(['status'=>1,'data'=> User::where("role",2)->where("status",1)->get()],200);
    }
    //End - Admin
    
    public function logout(Request $request)
    {
        $userDetail= $request->user()->token();
        $uid = $userDetail->user_id;
        
        $update = User::where("id",$uid)->update(["device_id" => '']);
        if($update)
        {
            return response(['status'=>1,'msg'=>"logout success"],200);
        }
    }
}
