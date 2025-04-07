<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\SearchHistory;
use App\Models\User;
use App\Models\RequestLetter;
use App\Models\Letter;
use App\Models\fileUploadDetails;
use Carbon\Carbon;
use App\Jobs\GetVehicleData;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Storage;
class VehicleController extends Controller
{
    public function allVehicle(Request $request)
    {
        
       //current date & time
        $currentDateTime  = Carbon::now('Asia/Kolkata');
        
        $userDetail= $request->user()->token();
        $uid = $userDetail->user_id;
        
        $userData = User::where("id",$uid)->first();
        $per = explode(",",$userData->permission);
        
        $dbVersion = $request->get('version');
        
        $latestVersion = Vehicle::where("add_by",$userData->admin_id)->orderby('id','DESC')->first();
        $totalCount = Vehicle::where("add_by",$userData->admin_id)->where('db_version','>',$dbVersion)->count();
           $curPage=  $request->get('page');
        if(!empty($latestVersion))
        {
           $customerDataVersion = $latestVersion->db_version;
        
            if($latestVersion->db_version <= $dbVersion){
                 return response(['status'=>0,'msg'=>'No New Data Found','dataCount'=>$totalCount,'latestDbVersion'=>$customerDataVersion,'AppDbversion'=>$dbVersion,'currentPage'=>$request->get('page')], 200);
            } 
        }
        else
        {
            return response(['status'=>0,'msg'=>'Data not Found'], 200);
        }
        
        
        
        $perPage = 50000;
        $pageno=$request->get('page') - 1;
        
        $page = request()->get('page', 1);
        // $start = ($page - 2) * $perPage;
           $start= $perPage * $pageno;
        
        
        //  $totalCount = Vehicle::where('db_version','>',$dbVersion)->count();

         $totalPage= ceil($totalCount /$perPage);
        if($pageno >= $totalPage){
          $curPage=  $request->get('page');
            
              return response(['status'=>0,'msg'=>'Sync Completed','dataCount'=>$totalCount,'latestDbVersion'=>$customerDataVersion,'AppDbversion'=>$dbVersion,'currentPage'=>$curPage], 200); 
            
        }
        // return $start;
        $results = Vehicle::query()->where("add_by",$userData->admin_id)->where('db_version','>',$dbVersion)
            ->offset($start) // Start position
            ->limit($perPage) // Number of records per page
            ->get();
            
            //   $results = Vehicle::query()->where('db_version','>',$dbVersion)
            // ->offset($start) // Start position
            // ->limit($perPage) // Number of records per page
            // ->get();
            
            
        $currentCount= count($results);
        
        
        
        // Use the paginate method to create a pagination instance
        $pagination = new \Illuminate\Pagination\LengthAwarePaginator(
            $results, // Items for the current page
            Vehicle::query()->count(), 
            $perPage, // Number of items per page
            $page, // Current page
            [
                'path' => request()->url(), // The base path for generating URLs
                'query' => request()->query(), 
            ]
        );
        
        // $arraData = array_push($pagination);
        // You can pass the pagination instance to your view
        // return view('your.view', ['pagination' => $pagination]);
        // return $pagination;
        
        // $allData = Vehicle::where("add_by",$userData->admin_id)->paginate(1000);
        // $data = json_decode($allData);
        // $chunks = array_chunk($data, 500);
        // return $chunks[0][0]->registration_numbers;
        // $batch = Bus::batch([])->dispatch();
        $fileName = date("Y-m-d-H-i-s").time().'.txt';
        // Storage::disk('public')->put('vehicleData/' . $fileName, "");
        // return strtolower($per[0]);
        $sql=[];
        $sql[]='INSERT INTO vehicles (id,bank,chasisnum,registration_numbers,enginenum,allocation,agreementid,username,emi_amt,pos,tbr,bkts,productname,model,address,add_by,add_by_name,status)VALUES';
        $i=1;
        foreach($pagination as $record)
        {
            $cleanedAddress = str_replace(array( "\"","/","'","[","]",",","-","#","$","_","!","@","^",";" ), "", $record->address);
            $cleanedUsername = str_replace(array( "\"","/","'","[","]",",","-","#","$","_","!","@","^",";" ), "", $record->username);
            $cleanedEngine = str_replace(array( "\"","/","'","[","]",",","-","#","$","_","!","@","^",";" ), "", $record->enginenum);
            $cleanedChasisnum = str_replace(array( "\"","/","'","[","]",",","-","#","$","_","!","@","^",";" ), "", $record->chasisnum);
            $cleanedRegistration_numbers = str_replace(array( "\"","/","'","[","]",",","-","#","$","_","!","@","^",";" ), "", $record->registration_numbers);
            $cleanedAllocation = str_replace(array( "\"","/","'","[","]",",","-","#","$","_","!","@","^",";" ), "", $record->allocation);
            // $cleanedAgreementid = str_replace(array( "\"","/","'","[","]",",","-","#","$","_","!","@","^",";" ), "", $record->agreementid);
            $cleanedProductname = str_replace(array( "\"","/","'","[","]",",","-","#","$","_","!","@","^",";" ), "", $record->productname);
            $cleanedModel = str_replace(array( "\"","/","'","[","]",",","-","#","$","_","!","@","^",";" ), "", $record->model);
                        $cleanedBank = str_replace(array( "\"","/","'","[","]",",","-","#","$","_","!","@","^",";" ), "", $record->bank);
            
                if(strtolower($per[0]) != "loan")
                {
                     $agreementid = "";
                }
                else
                {
                    $agreementid = $record->agreementid;
                }
                
                if(strtolower($per[1]) != "amount")
                {
                    $pos = "";
                }
                else
                {
                    $pos = $record->pos;
                }
                
                if(strtolower($per[2]) != "bucket")
                {
                    $bkts = "";
                }
                else
                {
                    $bkts = $record->bkts;
                }
                
                if(strtolower($per[3]) != "total amount")
                {
                    $tbr = "";
                }
                else
                {
                    $tbr = $record->tbr;
                }
                
                if(strtolower($per[4]) != "emi")
                {
                    $emi_amt = "";
                }
                else
                {
                    $emi_amt = $record->emi_amt;
                }
            

            //  $sql[]= "INSERT INTO vehicles (id,chasisnum,registration_numbers,enginenum,allocation,agreementid,username,emi_amt,pos,tbr,bkts,bank,productname,model,address,add_by,add_by_name,status) 
            //  VALUES ('$record->id','$record->chasisnum','$record->registration_numbers','$record->enginenum','$record->allocation','$agreementid','$record->username','$emi_amt','$pos','$tbr','$bkts','$record->bank','$record->productname','$record->model','$cleanedAddress','$record->add_by','$record->add_by_name','$record->status');";
            if($i!=$currentCount){
                           $sql[]="('$record->id','$cleanedBank','$cleanedChasisnum','$cleanedRegistration_numbers','$cleanedEngine','$cleanedAllocation','$agreementid','$cleanedUsername','$emi_amt','$pos','$tbr','$bkts','$cleanedProductname','$cleanedModel','$cleanedAddress','$record->add_by','$record->add_by_name','$record->status'),"; 
            }else{
                            $sql[]="('$record->id','$cleanedBank','$cleanedChasisnum','$cleanedRegistration_numbers','$cleanedEngine','$cleanedAllocation','$agreementid','$cleanedUsername','$emi_amt','$pos','$tbr','$bkts','$cleanedProductname','$cleanedModel','$cleanedAddress','$record->add_by','$record->add_by_name','$record->status');";
            }

        $i++;

        }
        // Convert the array to a string
        $sqlString = implode("\n", $sql);
        // return $sql

        $vehicleListing = str_replace('"', '', $sqlString);
        // Find the last occurrence of ","
        $lastCommaPosition = strrpos($sqlString, ',');

        // Replace the last comma with a semicolon
        $outputString = substr_replace($sqlString, ';', $lastCommaPosition, 1);

        // Output the result
        $sqlString= $outputString;
        // Specify the file path
        // $filePath = public_path("vehicleData/");

        // Write the SQL data to the file
        // file_put_contents($filePath, $sqlString);
        //     Storage::disk('public')->append($fileName, $sqlString);
        // response()->download(public_path("vehicleData/$fileName"));
       
        // $fileUrl = env("APP_URL")."vehicleData/".$fileName;
        // fileUploadDetails::where("admin_id",$userData->admin_id)->update([
        //     "filename" => $fileName,
        //     "file_url" => $fileUrl,
        //     "data_fetched_date" => $currentDateTime->toDateTimeString()
        // ]);
        $fileUrl='';
        return response(['status'=>1,'limit'=>$perPage,'currentDataCount'=>$currentCount,'vehicleList'=>$vehicleListing,'dataCount'=>$totalCount,'latestDbVersion'=>$customerDataVersion,'AppDbversion'=>$dbVersion,'currentPage'=>$request->get('page'),'totalPage'=>$totalPage,'link' => $fileUrl], 200);

        // $adminDetails = fileUploadDetails::where("admin_id",$userData->admin_id)->first();
        // if(!empty($adminDetails))
        // {
        //     if(!empty($adminDetails->filename))
        //     {
        //         if($adminDetails->data_fetched_date > $adminDetails->current_data_uploaded_date)
        //         {
                    
        //             return response(['status'=>1,'link' => $adminDetails->file_url], 200);
        //         }
        //         else
        //         {
               
            
        //             return $allData = Vehicle::where("add_by",$userData->admin_id)->whereBetween('created_at', [$adminDetails->data_fetched_date, $adminDetails->updated_at])->paginate(10000);
        //             $data = json_decode($allData);
                    
        //             $chunks = array_chunk($data, 500);
        //             $batch = Bus::batch([])->dispatch();
        //             foreach($chunks as $key => $chunk) 
        //             {
        //                 $batch->add(new GetVehicleData($chunk,$adminDetails->filename));
        //             }

        //             fileUploadDetails::where("admin_id",$userData->admin_id)->update([
        //                 "data_fetched_date" => $currentDateTime->toDateTimeString()
        //             ]);

        //             return response(['status'=>1,'link2' => $adminDetails->file_url], 200);
        //         }
        //     }
        //     else
        //     {
        //         // Specify the number of records per page
        //         $perPage = 1000;
        //         $pageno=2;
        //         // Calculate the start position based on the current page and the number of records per page
        //         $page = request()->get('page', 1); // Get the current page from the request, default to 1 if not provided
        //         // $start = ($page - 2) * $perPage;
        //         $start= $perPage * $pageno;
                
                
        //          $totalCount = Vehicle::where("add_by",$userData->admin_id)->count();
        //          $totalPage= ceil($totalCount /$perPage);
        //         // Retrieve records from the database using pagination
        //         $results = Vehicle::query()->where("add_by",$userData->admin_id)
        //             ->offset($start) // Start position
        //             ->limit($perPage) // Number of records per page
        //             ->get();
                
        //         // Use the paginate method to create a pagination instance
        //         $pagination = new \Illuminate\Pagination\LengthAwarePaginator(
        //             $results, // Items for the current page
        //             Vehicle::query()->count(), // Total number of items (not just the current page)
        //             $perPage, // Number of items per page
        //             $page, // Current page
        //             [
        //                 'path' => request()->url(), // The base path for generating URLs
        //                 'query' => request()->query(), // The query parameters for generating URLs
        //             ]
        //         );
                
        //         // You can pass the pagination instance to your view
        //         // return view('your.view', ['pagination' => $pagination]);
        //         // return $pagination;
                
        //         // $allData = Vehicle::where("add_by",$userData->admin_id)->paginate(1000);
        //         // $data = json_decode($allData);
        //         // $chunks = array_chunk($data, 500);
        //         // return $chunks[0][0]->registration_numbers;
        //         $batch = Bus::batch([])->dispatch();
        //         $fileName = date("d-m-Y-H-i-s").time().'.txt';
        //         Storage::disk('public')->put($fileName, '');
                
        //         foreach($pagination as $record)
        //         {
        //             $sql = "INSERT INTO vehicles (id,chasisnum,registration_numbers,enginenum,allocation,agreementid,username,emi_amt,pos,tbr,bkts,bank,productname,model,address,add_by,add_by_name,status) VALUES ('$record->id','$record->chasisnum','$record->registration_numbers','$record->enginenum','$record->allocation','$record->agreementid','$record->username','$record->emi_amt','$record->pos','$record->tbr','$record->bkts','$record->bank','$record->productname','$record->model','$record->address','$record->add_by','$record->add_by_name','$record->status');";
        
        //             Storage::disk('public')->append($fileName, $sql);
        //         }
            
        //         response()->download(public_path("vehicleData/$fileName"));
               
        //         $fileUrl = env("APP_URL")."vehicleData/".$fileName;
        //         // fileUploadDetails::where("admin_id",$userData->admin_id)->update([
        //         //     "filename" => $fileName,
        //         //     "file_url" => $fileUrl,
        //         //     "data_fetched_date" => $currentDateTime->toDateTimeString()
        //         // ]);

        //         return response(['status'=>1,'version'=>1,'currentPage'=>$request->get('page'),'totalPage'=>$totalPage,'link' => $fileUrl], 200);
                
        //     }
        // }
        // else
        // {
        //     return response(['status'=>1,'link' => env("APP_URL")."vehicleData/empty.sql"], 200);
        // }
    }

    public function searchVehicle(Request $request)
    {
        $userDetail= $request->user()->token();
        $uid = $userDetail->user_id;

        $userData = User::where("id",$uid)->first();
        
        //making data uppercase
        $searchedData =  strtoupper($request->search_vehicle);

        $data = Vehicle::where("add_by",$userData->admin_id)->where('chasisnum','LIKE','%'.$searchedData.'%')->orWhere('registration_numbers','LIKE','%'.$searchedData.'%')->orWhere('enginenum','LIKE','%'.$searchedData.'%')->orWhere('agreementid','LIKE','%'.$searchedData.'%')->get();
        return response(['status'=>1,'data' => $data], 200);
    }

    public function viewVehicle(Request $request)
    {
        // return gettype($request->id);
        
        $userDetail= $request->user()->token();
        $uid = $userDetail->user_id;

        $userData = User::where("id",$uid)->first();
       
        //current date & time
        $currentDateTime  = Carbon::now('Asia/Kolkata');
        
        $allId = explode(",",$request->id);
    
        for($i=0; $i<count($allId); $i++)
        {
      
            if($vehicleData =  Vehicle::where('id',$allId[$i])->first()){
                 $allData = new SearchHistory;
            $allData->registration_numbers = $vehicleData['registration_numbers'];
            $allData->chasisnum = $vehicleData['chasisnum'];
            $allData->enginenum = $vehicleData['enginenum'];
            $allData->date = $currentDateTime->toDateString();
            $allData->time = $currentDateTime->toTimeString();
            $allData->user_id = $uid;
            $allData->user_name = $userData->name;
            $allData->admin_id = $userData->admin_id;
            $allData->admin_name = $userData->admin_name;
            $allData->add_by = $vehicleData->add_by;
            $allData->save();
            }
            
           
        }
        
        return response(['status'=>1,'msg' => "success"], 200);
        
    }

    public function requestLetter(Request $request)
    {
        try
        {
            $uDetail = $request->user()->token();
            $uid = $uDetail->user_id;
          
            $ifExist = RequestLetter::where("vehicle_id",$request->vehicle_id)
            ->where("user_id",$uid)
            ->where("letter_id",$request->letter_id)
            ->first();
            if($ifExist)
            {
                if($ifExist->status == 0)
                {
                    return response(["status"=>1, "msg"=>"Please Hold on your letter under process!"],200);
                }

                if($ifExist->status == 1)
                {
                    return response(["status"=>1, "msg"=>"You've already requested for letter!"],200);
                }

                if($ifExist->status == 2)
                {
                    $update = RequestLetter::where("vehicle_id",$request->vehicle_id)->where("user_id",$uid)->update([
                        "status" => 0,
                    ]);

                    if($update)
                    {
                        return response(["status"=>1, "msg"=>"Letter Request Submitted Again!"],200);
                    }
                }
            }else
            {
                $letter = new RequestLetter();
                $letter->user_id = $uid;
                $letter->admin_id = $request->add_by;
                $letter->vehicle_id = $request->vehicle_id;
                $letter->city = $request->city;
                $letter->pincode = $request->pincode;
                $letter->station_name = $request->station_name;
                $letter->letter_id = $request->letter_id;
                $letter->save();
                return response(["status"=>1, "msg"=>"Letter Request Submitted Successfully!"],200);
            }

        }catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function letterList(Request $request)
    {
        try
        {
            $uDetail = $request->user()->token();
            $uid = $uDetail->user_id;
          
            $letter = RequestLetter::where("user_id",$uid)->latest()->get();
            foreach($letter as $ldata)
            {
                if($ldata->status == 0)
                {
                    $status = "pending";
                }
                elseif($ldata->status == 1)
                {
                    $status = "approved";
                }
                elseif($ldata->status == 2)
                {
                    $status = "rejected";
                }

                $vehicle = Vehicle::where("id",$ldata->vehicle_id)->first();
                $ldata['registration_number'] = $vehicle->registration_numbers;
                $ldata['request_on'] = date("Y-m-d",strtotime($ldata->created_at));
                $ldata['status'] = $status;
            }
            return response(["status"=>1, "data"=>$letter],200);

        }catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function letter(Request $request)
    {
        try
        {
            $uDetail = $request->user()->token();
            $uid = $uDetail->user_id;
            $userData = User::where("id",$uid)->first();
            $letter = Letter::where("admin_id",$userData->admin_id)
            ->where("status",1)
            ->latest()->get();
   
            return response(["status"=>1, "data"=>$letter],200);

        }catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }
} 
