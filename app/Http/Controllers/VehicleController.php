<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Imports\ImportVehicle;
// use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;
use App\Jobs\VehicleData;
use App\Models\FileRecord;
use App\Models\fileUploadDetails;
use App\Models\Job;
use Illuminate\Support\LazyCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Artisan;


class VehicleController extends Controller
{
    public function add()
    {
        try{

            $data['title']='Add Vehicle Details';
            return view('admin.vehicle.add',$data);
        
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
        
    }

    public function save(request $request)
    {
        try{
            // return $request->post();
            $vehicle = new Vehicle();
            $vehicle->prod = $request->post('prod');
            $vehicle->agrno = $request->post('agrno');
            $vehicle->cust_name= $request->post('cust_name');
            $vehicle->curr_buck = $request->post('curr_buck');
            $vehicle->asset = $request->post('asset');
            $vehicle->chassino = $request->post('chassino');
            $vehicle->regno = $request->post('regno');
            $vehicle->engineno = $request->post('engineno');
    
            if($vehicle->save())
            {
                return redirect('vehicle/add')->with('success','Vehicle Added Successfully');
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
            $data['title']='Vehicle List';
            if(Auth::user()->role == 1)
            {
                $data['vlist'] = Vehicle::orderByRaw(
                    "SUBSTRING(registration_numbers, 1, 8) ASC, CAST(SUBSTRING(registration_numbers, 9) AS UNSIGNED) ASC"
                )->paginate(10); 
            }
            else
            {
                $data['vlist'] = Vehicle::orderByRaw(
                    "SUBSTRING(registration_numbers, 1, 8) ASC, CAST(SUBSTRING(registration_numbers, 9) AS UNSIGNED) ASC"
                )
                ->where("add_by",Auth::user()->id)
                ->paginate(10);
            }
            return view('admin.vehicle.view',$data);
        
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }

    }

    public function viewInDetails($id)
    {
        try{
            $data['title']='Vehicle List In Details';
            $data['list']= Vehicle::where("id",$id)->first();
            return view('admin.vehicle.viewInDetails',$data);
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }


    public function importVehicle(Request $request) 
    {
        try{
           
            if(request()->has('csv')) 
            {   
                $filename = $request->csv->getClientOriginalName();
                $fileRecord = new FileRecord();
                $fileRecord->user_id = Auth::user()->id;
                $fileRecord->filename = $filename;
                if($fileRecord->save())
                {
                    session()->put('fileId',$fileRecord->id);
                    DB::disableQueryLog();
                    $chunkSize = 200;
                    LazyCollection::make(function(){
                        $fileSize = request()->file('csv')->getSize();
                        $data = fopen(request()->file('csv'),'r');
        
                        while(($line = fgetcsv($data,$fileSize)) != false){
                            $dataString = implode(",",$line);
                            $row = explode(',',$dataString);
                            yield $row;
                        }
                    })
                    ->skip(1)
                    ->chunk(250)
                    ->each(function(LazyCollection $chunk){
                        $records = $chunk->map(function($row){
                            return [
                                'registration_numbers'=> $row[0],
                                'chasisnum'=> $row[1],
                                'enginenum'=> $row[2],
                                'allocation'=> $row[3],
                                'agreementid'=> $row[4],
                                'username'=> $row[5],
                                'emi_amt'=> $row[6],
                                'pos'=> $row[7],
                                'tbr'=> $row[8],
                                'bkts'=> $row[9],
                                'bank'=> $row[10],
                                'productname'=> $row[11],
                                'model'=> $row[12],
                                'address'=> $row[13],
                                'file_id'=> session()->get('fileId'),
                                'add_by' => Auth::user()->id,
                                'add_by_name' => Auth::user()->name,
                                'created_at' => date('Y-m-d h:i:s'),
                                'updated_at' => date('Y-m-d h:i:s'),
                            ];
                            
                        })->toArray();
        
                        DB::table('vehicles')->insert($records);
                    });
        
                    return back()->with('success','Vehicle Csv data uploaded successfully!');
                }
                    
            }
            else
            {
                return back()->with('error','Excel file Upload required field!'); 
            }       
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
        
    
        // if(request()->has('csv')) 
        // {
        //     //Artisan::call('queue:work');
        //     $allJobs = Job::count();
            
        //     $data = file(request()->csv);
        //     //Chunking file
        //     $chunks = array_chunk($data, 500);

        //     $header = [];
        //     $batch  = Bus::batch([])->dispatch();

        //     foreach($chunks as $key => $chunk) 
        //     {
        //         $data = array_map('str_getcsv', $chunk);

        //         if($key === 0)
        //         {
        //             $header = $data[0];
        //             unset($data[0]);
        //         }

        //         $batch->add(new VehicleData($data, $header,Auth::user()));
        //     }
           
        // //   $adminUploadFile = fileUploadDetails::where("admin_id",Auth::user()->id)->first();
        // //     if(!empty($adminUploadFile))
        // //     {
        // //         fileUploadDetails::where("id",$adminUploadFile->id)->update([
        // //             "last_data_uploaded_date" => $adminUploadFile->current_data_uploaded_date,
        // //         ]);
        // //     }
           
            
        //     if(!empty($allJobs))
        //     {
        //         return back()->with('success','There are lots of data before you, Please hold for a moment, your data upload as soon as possible!');
        //     }
        //     else
        //     {
        //         return back()->with('success','Vehicle Csv Data Uploading Started please hold for a moment!');
        //     }
            
        // }
        // else
        // {
        //     return back()->with('error','Csv file Upload is required field!'); 
        // }
    }
    
    public function deleteDuplicateData()
    {
        try{
            $users =  DB::table('vehicles')->get();
            $users  =  $users->groupBy('registration_numbers');     
                foreach ($users as $key => $value){
                if(count($value) > 1)
                {
                    $id = $value[0]->id;
                    $t = $value->where('id','!=',$id)->pluck('id');
                    Vehicle::whereIn('id',$t)->delete();
                }
            }
        
            return back()->with('success',"Duplicate data deleted Successfully!");
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }



    public function edit($id)
    {
        try{
            $data['title'] = "Edit Vehicle";
            $data['list'] = Vehicle::where('id',$id)->get();
            //return $data['list'];
            return view('admin.vehicle.edit',$data);
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }

    public function update(request $request,$id)
    {
        try{
        
            Vehicle::where('id',$id)->update(['prod'=>$request->prod,'agrno'=>$request->agrno,'status'=>$request->status,'cust_name'=>$request->cust_name]);
            return back()->with('success','Vehicle Updated successfully');
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try{
            if(Vehicle::where('id',$id)->delete())
            {
                return back()->with('success','Vehicle deleted successfully');
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
            FileRecord::where('user_id',Auth::user()->id)->delete();
            Vehicle::where('add_by',Auth::user()->id)->delete();
            return back()->with('success','All Vehicle deleted successfully');
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }
}
