<?php

namespace App\Jobs;

use Throwable;
use App\Models\Vehicle;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\fileUploadDetails;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class VehicleData implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $header;
    public $userData;
    
    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 100000;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $header, $user)
    {
        $this->data   = $data;
        $this->header = $header;
        $this->userData = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        foreach($this->data as $product)
        {
            $vehicleProduct = array_combine($this->header,$product);
            // Vehicle::create($vehicleProduct);
            
            $data = Vehicle::where('registration_numbers',$product['0'])->where("add_by",$this->userData['id'])->get();
            if(count($data)=='0')
            {
                $excel = new Vehicle;
                $excel->registration_numbers = $product[0];
                $excel->chasisnum = $vehicleProduct['chasisnum'];
                $excel->enginenum = $vehicleProduct['enginenum'];
                $excel->allocation = $vehicleProduct['allocation'];
                $excel->agreementid = $vehicleProduct['agreementid'];
                $excel->username = $vehicleProduct['username'];
                $excel->emi_amt = $vehicleProduct['emi_amt'];
                $excel->pos = $vehicleProduct['pos'];
                $excel->tbr = $vehicleProduct['tbr'];
                $excel->bkts = $vehicleProduct['bkts'];
                $excel->bank = $vehicleProduct['bank'];
                $excel->productname = $vehicleProduct['productname'];
                $excel->model = $vehicleProduct['model'];
                $excel->address = $vehicleProduct['address'];
                $excel->add_by = $this->userData['id'];
                $excel->add_by_name = $this->userData['name'];
                $excel->save();
            }
        
        }
        
        // $currentDateTime  = Carbon::now('Asia/Kolkata');
        // $adminUploadFile = fileUploadDetails::where("admin_id",$this->userData['id'])->first();
        // if(!empty($adminUploadFile))
        // {
        //     fileUploadDetails::where("id",$adminUploadFile->id)->update([
        //         "current_data_uploaded_date" => $currentDateTime->toDateTimeString()
        //     ]);
        // }
        // else
        // {
        //     $fileUpload = new fileUploadDetails;
        //     $fileUpload->admin_name = $this->userData['name'];
        //     $fileUpload->admin_id = $this->userData['id'];
        //     $fileUpload->current_data_uploaded_date =  $currentDateTime->toDateTimeString();
        //     $fileUpload->last_data_uploaded_date =  $currentDateTime->toDateTimeString();
        //     $fileUpload->save();
        // }
    }

    public function failed(Throwable $exception)
    {
        // Send user notification of failure, etc...
    }
}