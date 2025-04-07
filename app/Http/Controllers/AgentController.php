<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AgentController extends Controller
{

    public function add()
    {
        try{
            $data['title']='Add Agent';
            return view('admin.agent.add',$data);
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }
    
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
    
    
            if($request->itemimage != "")
            {
                $fname = time().'.'.$request->itemimage->extension();  
                $fileName =date('d-m-Y-H-i-s').$fname;
                $request->itemimage->move(public_path('agentImg'), $fileName);
                $itemimage= env("APP_URL")."agentImg/".$fileName;
            }
            //Image Upload Close
            
            if($request->image!="")
            {
                $fname1 = time().'.'.$request->image->extension();  
                $fileName1 =date('d-m-Y-H').$fname1;
                $request->image->move(public_path('agentImg'), $fileName1);
                $aadharimage = env("APP_URL")."agentImg/".$fileName1;
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
            
            $agent = new User();
            $agent->name= $request->post('name');
            $agent->mobile= $request->post('mobile');
            $agent->email= $request->post('email');
            $agent->password= Hash::make($request->post('password'));
            $agent->image = $itemimage;
            // $agent->avatar = json_encode([env("APP_URL")."images/avtaar/avtaar.jpg",env("APP_URL")."images/avtaar/male.png",env("APP_URL")."images/avtaar/male1.png",env("APP_URL")."images/avtaar/female.png",env("APP_URL")."images/avtaar/female1.png"]);
            $agent->aadhar = $aadharimage;
            $agent->permission = $permission;
            $agent->role= "3";
            $agent->status= "1";
            $agent->admin_id =  Auth::user()->id;
            $agent->admin_name =  Auth::user()->name;
            if($agent->save())
            {
                return redirect('agent/add')->with('success','Agent Added Successfully');
            }
        
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }

    }

    public function view()
    {
        try{
            $data['title']='Agent List';
            session()->forget("agent_search");
            if(Auth::user()->role == 1)
            {
                $data['agentlist']= User::where("role",3)->latest()->paginate(10);
            }
            else
            {
                $data['agentlist']= User::where("role",3)->where("admin_id",Auth::user()->id)->latest()->paginate(10);
            }
            
            return view('admin.agent.view',$data);
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }
    
    public function edit($id)
    {
        try
        {
            $data['title'] = "Edit Agent";
            $data['list'] = User::where("role",3)->where('id',$id)->first();
            return view('admin.agent.edit',$data);
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }
    
    public function update(request $request,$id)
    {
        try{
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'mobile' => 'required|string|min:10|max:10',
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
                    if($validator->fails())
                    { 
                        return back()->withErrors($validator)->withInput();
                    }
                    else
                    {
                        $fname = time().'.'.$request->itemimage->extension();  
                        $fileName =date('d-m-Y-H-i-s').$fname;
                        $request->itemimage->move(public_path('agentImg'), $fileName);
                        $itemimage = env("APP_URL")."agentImg/".$fileName;
                    }
                }
            }   
            else
            {
                $itemimage= $request->oldimg;
            }
            
            //aadhar UPDATE
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
                        $request->aadhar->move(public_path('agentImg'), $fileName1);
                        $aadharimage = env("APP_URL")."agentImg/".$fileName1;
                    }
                }
            }   
            else
            {
                $aadharimage= $request->oldaadhar;
            }
            
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
            
            User::where("role",3)->where('id',$id)->update(['image'=>$itemimage,'aadhar'=>$aadharimage,'name'=>$request->name,'mobile'=>$request->mobile,'status'=>$request->status,'email'=>$request->email,'permission'=>$permission]);
            return back()->with('success','Agent Updated successfully');
        
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }

    //Start - Search Admin
    function searchAgent(Request $request)
    {
        try{
            $request->session()->put("agent_search",$request['search-agent']);
            if(Auth::user()->role == 1)
            {
                $data['agentlist'] = User::where("role",3)
                ->where('name','Like',"%".$request['search-agent']."%")
                ->orWhere('mobile','Like',"%".$request['search-agent']."%")
                ->orWhere('email','Like',"%".$request['search-agent']."%")
                ->latest()
                ->paginate(10);
            }
            
            if(Auth::user()->role == 2)
            {
                $data['agentlist'] = User::where("role",3)
                ->where(function($p) use ($request) {
                    $p->where("admin_id",Auth::user()->id)
                    ->where('name','Like',"%".$request['search-agent']."%");
                    })
                ->orWhere(function($q) use ($request) {
                    $q->where("admin_id",Auth::user()->id)
                    ->where('mobile','Like',"%".$request['search-agent']."%");
                    })
                ->orWhere(function($r) use ($request) {
                    $r->where("admin_id",Auth::user()->id)
                    ->where('email','Like',"%".$request['search-agent']."%");
                    })
                ->latest()
                ->paginate(10);
            }
            
            $data['title']='Search Agent';
            return view('admin.agent.view',$data);
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }

    }
    //End - Search Admin
    
    public function logout($id)
    {
        try
        {
            if(User::where("role",3)->where('id',$id)->update(["device_id"=>null]))
            {
                return back()->with('success','Agent signed out successfully');
            }else
            {
                return back()->with('success','Something error, please try again');
            }
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try{
            $agentData = User::where('id',$id)->first();
            if($agentData->image && $agentData->aadhar)
            {
                $image_split = explode("agentImg",$agentData->image);
                $aadhar_split = explode("agentImg",$agentData->aadhar);
        
                //delete exists sale notice file
                $image_path = public_path()."/agentImg".$image_split[1];
                $aadhar_path = public_path()."/agentImg".$aadhar_split[1];
                if(file_exists($image_path) && file_exists($aadhar_path))
                {
                    @unlink($image_path);   
                    @unlink($aadhar_path); 
                }
            }
            
            if(User::where("role",3)->where('id',$id)->delete())
            {
                return back()->with('success','Agent deleted successfully');
            }
        
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }
  
  
}
