<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileRecord;
use App\Models\Vehicle;
use App\Models\User;
use App\Models\SharedFileRecord;
use Illuminate\Support\LazyCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SharedFileRecordController extends Controller
{
    public function create(Request $request)
    {
        try
        {
            $aId = $request->admin;
            $fId = $request->file_id;
            $uDetails = User::where('id',$aId)->first();
            $fileData = FileRecord::where('id',$fId)->first();
            $sharedFile = SharedFileRecord::where("share_to",$aId)->where("file_id",$fId)->first();
            if(empty($sharedFile))
            {
                if(request()->has('csv')) 
                {   
                    $shareFile = new SharedFileRecord();
                    $shareFile->share_from = Auth::user()->id;
                    $shareFile->share_from_name = Auth::user()->name;
                    $shareFile->share_to = $aId;
                    $shareFile->share_to_name = $uDetails->name;
                    $shareFile->file_id = $fId;
                    $shareFile->filename = $fileData->filename;
                    if($shareFile->save())
                    {
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
                        ->each(function(LazyCollection $chunk) use ($fId,$aId,$uDetails){
                            $records = $chunk->map(function($row) use ($fId,$aId,$uDetails) {
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
                                    'file_id'=> $fId,
                                    'add_by' => $aId,
                                    'add_by_name' => $uDetails->name,
                                    'created_at' => date('Y-m-d h:i:s'),
                                    'updated_at' => date('Y-m-d h:i:s'),
                                ];
                                
                            })->toArray();
            
                            DB::table('vehicles')->insert($records);
                        });

                        return back()->with("success","File shared successfully");
                    }
                        
                }
                else
                {
                    return back()->with('error','Please Select downloaded file!'); 
                }
            }else{
                return back()->with('error','This file is already shared!'); 
            }

            // $isExist = Vehicle::where('file_id',$fId)->where('add_by',$aId)->get();
            // if(count($isExist) == 0)
            // {
            //     $isData = Vehicle::where('file_id',$fId)->where('add_by',Auth::user()->id)->get();
            //     if(count($isData)>0)
            //     {
            //         $fileDetail = FileRecord::where('id',$fId)->where('user_id',Auth::user()->id)->first();
            //         if(!empty($fileDetail))
            //         {
            //             $shareFile = new SharedFileRecord();
            //             $shareFile->share_from = Auth::user()->id;
            //             $shareFile->share_from_name = Auth::user()->name;
            //             $shareFile->share_to = $aId;
            //             $shareFile->share_to_name = $uDetails->name;
            //             $shareFile->file_id = $fId;
            //             $shareFile->filename = $fileDetail->filename;
            //             if($shareFile->save())
            //             {
            //                 $allFileData = Vehicle::where('file_id',$fId)->where('add_by',Auth::user()->id)->chunk(1000, function ($chunk) use ($fId,$aId, $uDetails) {
            //                     foreach ($chunk as $item) {
            //                         $newItem = new Vehicle();
            //                         $newItem->fill((array) $item);
            //                         $newItem->registration_numbers = $item->registration_numbers;
            //                         $newItem->chasisnum = $item->chasisnum;
            //                         $newItem->enginenum= $item->enginenum;
            //                         $newItem->allocation= $item->allocation;
            //                         $newItem->agreementid= $item->agreementid;
            //                         $newItem->username= $item->username;
            //                         $newItem->emi_amt= $item->emi_amt;
            //                         $newItem->pos= $item->pos;
            //                         $newItem->tbr= $item->tbr;
            //                         $newItem->bkts= $item->bkts;
            //                         $newItem->bank= $item->bank;
            //                         $newItem->productname= $item->productname;
            //                         $newItem->model= $item->model;
            //                         $newItem->address= $item->address;
            //                         $newItem->file_id = $fId;
            //                         $newItem->add_by = $aId;
            //                         $newItem->add_by_name = $uDetails->name;
            //                         $newItem->save();
            //                     }
            //                 });
            //             } 
            //         }
            //     }
            // }
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function from()
    {
        try{
            $data['title'] = 'View File Shared Record';
            $data['list'] = SharedFileRecord::where('share_from',Auth::user()->id)->paginate(10);
            return view('admin.fileShared.from',$data);
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function to()
    {
        try{
            $data['title'] = 'View File Received Record';
            $data['list'] = SharedFileRecord::where('share_to',Auth::user()->id)->paginate(10);
            return view('admin.fileShared.to',$data);
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function fromDelete($id)
    {
        try{
            $data = SharedFileRecord::where('id',$id)->where('share_from',Auth::user()->id)->first();
            if(!empty($data))
            {
                Vehicle::where('file_id',$data->file_id)->where('add_by',$data->share_to)->delete();
                SharedFileRecord::where('id',$id)->delete();
                return back()->with('success','File record deleted successfully!');
            }else
            {
                return back()->with('error','Access Denied!');
            }
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }


    public function toDelete($id)
    {
        try{
            $data = SharedFileRecord::where('id',$id)->where('share_to',Auth::user()->id)->first();
            if(!empty($data))
            {
                Vehicle::where('file_id',$data->file_id)->where('add_by',$data->share_to)->delete();
                SharedFileRecord::where('id',$id)->delete();
                return back()->with('success','File record deleted successfully!');
            }else
            {
                return back()->with('error','Access Denied!');
            }
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
