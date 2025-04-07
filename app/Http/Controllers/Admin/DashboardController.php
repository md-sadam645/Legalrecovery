<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\SearchHistory;
use App\Models\Vehicle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        try{
            $data['title'] = 'Dashboard';
            if(Auth::user()->role == 1)
            {
                $data['search'] = SearchHistory::count();
                // $data['vehicle'] = Vehicle::count();
                $data['admin'] = User::where("role",2)->count();
                $data['agent'] = User::where("role",3)->count();
            }
            
            if(Auth::user()->role == 2)
            {
                $data['search'] = SearchHistory::where("admin_id",Auth::user()->id)->count();
                $data['vehicle'] = Vehicle::where("add_by",Auth::user()->id)->count();
                $data['agent'] = User::where("role",3)->where("admin_id",Auth::user()->id)->count();
            }
            return view('admin.dashboard',$data);
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }
}
