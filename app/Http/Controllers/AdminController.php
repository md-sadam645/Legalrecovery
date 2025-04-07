<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function add()
    {
        try{
            $data['title'] = 'Add Admin';
            return view('admin.admin.add',$data);
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }

    //Start - add Admin
    public function save(request $request)
    {
        try
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'mobile' => 'required|string|min:10|max:10',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'itemimage' => 'required|mimes:jpeg,png,jpg',
                'image' => 'required|mimes:jpeg,png,jpg',
            ]);
            if($validator->fails())
            {
                return back()->with('error',$validator->errors()->all());
            }
    
            $user = User::where('email',$request->email)->get();
            if(count($user)=='0') 
            {    
                if($request->itemimage != "")
                {
                    $fname = time().'.'.$request->itemimage->extension();  
                    $fileName =date('d-m-Y-H-i-s').$fname;
                    $request->itemimage->move(public_path('userImg'), $fileName);
                    $itemimage= env("APP_URL")."userImg/".$fileName;
                }
                //Image Upload Close
                
                if($request->image!="")
                {
                    $fname1 = time().'.'.$request->image->extension();  
                    $fileName1 =date('d-m-Y-H').$fname1;
                    $request->image->move(public_path('userImg'), $fileName1);
                    $adhaarimage= env("APP_URL")."userImg/".$fileName1;
                }
                //Adhaar Upload Close
                
                $admin = new User();
                $admin->name= $request->post('name');
                $admin->mobile= $request->post('mobile');
                $admin->email= $request->post('email');
                $admin->password= Hash::make($request->post('password'));
                $admin->image = $itemimage;
                $admin->aadhar = $adhaarimage;
                $admin->gst= $request->post('gst');
                $admin->role= '2';
                $admin->status= '1';
                if($admin->save())
                {
                    return back()->with('success','Admin Added Successfully');
                }
            }
            else
            {
                return back()->with('error',"User Exist's Please Login!");
            }
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }
    //End - add Admin

    //Start - View Admin
    public function view()
    {
        try{
            $data['title']='Admin List';
            $data['list']= User::where('role','2')->latest()->paginate(10);
            return view('admin.admin.view',$data);
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }
    //End - View Admin

    //Start - Edit Admin
    public function edit($id)
    {
        try{
            $data['title'] = "Edit Admin";
            $data['list'] = User::where('id',$id)->first();
            return view('admin.admin.edit',$data);
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }
    //End - Edit Admin

    //Start - Update Admin
    public function update(request $request,$id)
    {
        try
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'mobile' => 'required|string|min:10|max:10',
                'email' => 'required|string|email|max:255'
            ]);
            if($validator->fails())
            {
                return back()->with('error',$validator->errors()->all());
            }
    
            //IMAGE UPDATE
           if($request->itemimage!="")
           {
                $adminData = User::where('id',$id)->first();
                $image_split = explode("/",$adminData->image);
    
                //delete exists profile image file
                $image_path = public_path()."/".$image_split[3]."/".$image_split[4];
                if(file_exists($image_path))
                {
                    @unlink($image_path);
    
                    $validator = Validator::make($request->all(), [
                        'itemimage' => 'required|mimes:jpg,png,jpeg',
                    ]);
                    if ($validator->fails())
                    { 
                        return back()->withErrors($validator)->withInput();
                    }
                    else{
                        $fname = time().'.'.$request->itemimage->extension();  
                        $fileName =date('d-m-Y-H-i-s').$fname;
                        $request->itemimage->move(public_path('userImg'), $fileName);
                        $itemimage= env("APP_URL")."userImg/".$fileName;
                    }
                }
                
            }   
            else
            {
                $itemimage= $request->oldimg;
            }
        
            //ADHAAR UPDATE
            if($request->aadhar!="")
            {
                $adminData = User::where('id',$id)->first();
                $aadhar_split = explode("/",$adminData->aadhar);
    
                //delete exists aadhar img file
                $aadhar_path = public_path()."/".$aadhar_split[3]."/".$aadhar_split[4];
                if(file_exists($image_path) && file_exists($aadhar_path))
                { 
                    @unlink($aadhar_path);
                    
                    $validator = Validator::make($request->all(), [
                        'aadhar' => 'required|mimes:jpg,png,jpeg',
                    ]);
                    if ($validator->fails())
                    { 
                        return back()->withErrors($validator)->withInput();
                    }
                    else
                    {
                        $fname1 = time().'.'.$request->aadhar->extension();  
                        $fileName1 =date('d-m-Y-H').$fname1;
                        $request->aadhar->move(public_path('userImg'), $fileName1);
                        $adhaarimage= env("APP_URL")."userImg/".$fileName1;
                    }
                }
            }   
            else
            {
                $adhaarimage= $request->oldadhaar;
            }
        
            
            $CheckAgent = User::where("admin_id",$id)->where("role",3)->get();
            
            if($CheckAgent == "[]")
            {
                User::where('id',$id)->update([
                    'image'=>$itemimage,
                    'aadhar'=>$adhaarimage,
                    'name'=>$request->name,
                    'mobile'=>$request->mobile,
                    'status'=>$request->status,
                    'email'=>$request->email,
                    'gst'=>$request->gst
                ]);
            }
            else
            {
                for($i=0; $i<count($CheckAgent); $i++)
                {
                    User::where("id",$CheckAgent[$i]->id)->update(['status'=>$request->status]);
                }
                
               User::where('id',$id)->update([
                    'image'=>$itemimage,
                    'aadhar'=>$adhaarimage,
                    'name'=>$request->name,
                    'mobile'=>$request->mobile,
                    'status'=>$request->status,
                    'email'=>$request->email,
                    'gst'=>$request->gst
                ]);
            }
            
            return back()->with('success','Admin Updated successfully');
        
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
        
    }
    //End - Update admin


   //Start - Search Admin
    function searchAdmin(Request $request)
    {
        try{
            $data['list'] = User::where('role','2')->where('name','Like',"%".$request['search-admin']."%")->latest()->paginate(10);
            $data['title']='Search Admin';
            return view('admin.admin.view',$data);
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }
    //End - Search Admin

    //Start - Delete Admin
    public function destroy($id)
    {
        try{
            $adminData = User::where('id',$id)->first();
            $image_split = explode("/",$adminData->image);
            $aadhar_split = explode("/",$adminData->aadhar);
    
            //delete exists sale notice file
            $image_path = public_path()."/".$image_split[3]."/".$image_split[4];
            $aadhar_path = public_path()."/".$aadhar_split[3]."/".$aadhar_split[4];
            if(file_exists($image_path) && file_exists($aadhar_path))
            {
                @unlink($image_path);   
                @unlink($aadhar_path); 
    
                if(User::where('id',$id)->delete())
                {
                    return back()->with('success','Admin Deleted successfully');
                }
            }
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }
    //End - Delete Admin
}
