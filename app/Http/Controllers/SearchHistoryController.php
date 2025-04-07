<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\SearchHistory;
use App\Models\User;
use App\Exports\SearchHistoryExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SearchHistoryController extends Controller
{
    function view()
    {
        try{
            $data['title']='View Search History';
            if(Auth::user()->role == 1)
            {
                $data["list"] = SearchHistory::latest()->paginate(10);
            }
            else
            {
                $data["list"] = SearchHistory::where("admin_id",Auth::user()->id)->latest()->paginate(10);
            }
            
            return view('admin.searchHistory.view',$data);
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }

    public function export() 
    {
        try{
            $date = time();
            return Excel::download(new SearchHistoryExport, $date.'searchHistory.xlsx');
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try{
            if(SearchHistory::where('id',$id)->delete())
            {
                return back()->with('success','Search history deleted successfully');
            }
        
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }
    
    public function destroyall()
    {
        try{
            SearchHistory::truncate();
            return back()->with('success','Search history deleted successfully');
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
        
    }
}
