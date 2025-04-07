<?php

namespace App\Http\Controllers;
use App\Models\FileRecord;
use App\Models\Vehicle;
use App\Models\User;
use App\Models\SharedFileRecord;
use App\Exports\FileRecordExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class FileRecordController extends Controller
{
    public function view()
    {
        try{
            $data['title'] = 'View File Record';
            $data['list'] = FileRecord::where('user_id',Auth::user()->id)->paginate(10);
            $data['name'] = Auth::user()->name;
            $data['admin'] = User::whereNot('id',Auth::user()->id)->where('role',2)->get();
            return view('admin.fileRecord.view',$data);
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function delete($id)
    {
        try{
            $data = Vehicle::where('file_id',$id)->where('add_by',Auth::user()->id)->first();
            if($data)
            {
                if(Vehicle::where('file_id',$id)->where('add_by',Auth::user()->id)->delete())
                {
                    $shareFile = SharedFileRecord::where('file_id',$id)->where('share_from',Auth::user()->id)->get();
                    foreach($shareFile as $sFile)
                    {
                        Vehicle::where('file_id',$id)->where('add_by',$sFile->share_to)->delete();
                        $sFile->delete();
                    }
                    
                    FileRecord::where('id',$id)->where("user_id",Auth::user()->id)->delete();
                    return back()->with('success','File record deleted successfully!');  
                }
            }
            else
            {
                if(FileRecord::where('id',$id)->where("user_id",Auth::user()->id)->delete())
                {
                    return back()->with('success','File record deleted successfully!');
                }else
                {
                     return redirect("/file-record/view")->with('error','Access Denied!');
                }
            }
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function downloadData($id)
    {
        try{
            $fileData = FileRecord::where("id",$id)->first();
            $fileName = date('Y-m-d-H-i-s')."_".$fileData->filename;
            // return Excel::download(new FileRecordExport($id), $fileName);
            
            $vehicles = Vehicle::select([
                'registration_numbers',
                'chasisnum',
                'enginenum',
                'allocation',
                'agreementid',
                'username',
                'emi_amt',
                'pos',
                'tbr',
                'bkts',
                'bank',
                'productname',
                'model',
                'address',
                'file_id',
            ])
            ->where('file_id', $id)
            ->where('add_by', Auth::user()->id)
            ->cursor();

            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="'.$fileName.'"',
            ];
    
            $callback = function () use ($vehicles) {
                $file = fopen('php://output', 'w');
    
                // Add CSV headers
                fputcsv($file, [
                    'registration_numbers',
                    'chasisnum',
                    'enginenum',
                    'allocation',
                    'agreementid',
                    'username',
                    'emi_amt',
                    'pos',
                    'tbr',
                    'bkts',
                    'bank',
                    'productname',
                    'model',
                    'address',
                    'file_id',
                ]);
    
                // Add data rows
                foreach ($vehicles as $vehicle) {
                    fputcsv($file, [
                        $vehicle->registration_numbers,
                        $vehicle->chasisnum,
                        $vehicle->enginenum,
                        $vehicle->allocation,
                        $vehicle->agreementid,
                        $vehicle->username,
                        $vehicle->emi_amt,
                        $vehicle->pos,
                        $vehicle->tbr,
                        $vehicle->bkts,
                        $vehicle->bank,
                        $vehicle->productname,
                        $vehicle->model,
                        $vehicle->address,
                        $vehicle->file_id,
                    ]);
                }
    
                fclose($file);
            };
    
            return Response::stream($callback, 200, $headers);
        } 
        catch (\Exception $e) 
        {
            return $e->getMessage();
        }
    }
}
