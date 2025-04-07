<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class CustomerController extends Controller
{
    //Start - View Customer
    public function view()
    {
        $data['title']='Customer List';
        if(Auth::user()->role == 2)
        {
            $data['customerList'] = User::where("admin_id",Auth::user()->id)->where("role",4)->latest()->paginate(10);
        }
        
        if(Auth::user()->role == 1)
        {
            $data['customerList'] = User::where("role",4)->latest()->paginate(10);
        }
        
        return view('admin.customer.view',$data);
    }
    //End - View Customer

    //Start - Edit Customer
    public function edit($id)
    {
        $data['title'] = "Edit Customer";
        $data['list'] = User::where('id',$id)->first();
        return view('admin.customer.edit',$data);
    }
    //End - Edit Customer

    //Start - Update Customer
    public function update(request $request,$id)
    {
        User::where('id',$id)->update(['status'=>$request->status]);
        return back()->with('success','Customer status update successfully');
    }
    //End - Edit Customer
    

    //Start - Search Customer
    function searchCustomer(Request $request)
    {
        $data['customerList'] = User::where('name','Like',"%".$request['search-customer']."%")->get();
        $data['title']='Search Customer';
        return view('admin.customer.view',$data);
    }
    //End - Search Customer

    //Start - Delete Customer
    public function destroy($id)
    {
        if(User::where('id',$id)->delete())
        {
            return back()->with('success','Customer deleted successfully');
        }
    }
    //End - Delete Customer
  
}
