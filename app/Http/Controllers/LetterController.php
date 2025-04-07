<?php

namespace App\Http\Controllers;
use App\Models\Letter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use Purifier;
use Illuminate\Support\Facades\Storage;
use App\Models\{User,RequestLetter, Vehicle};
use Illuminate\Support\Facades\Validator;
class LetterController extends Controller
{
    public function index()
    {
        try
        {
            $data['title'] = "Add Letter"; 
            return view("admin.letter.index",$data);
        }catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }
    
    public function save(Request $request)
    {
        try
        {
            // return $request;
            $validator = Validator::make($request->all(),[
                'name' => 'required|string',
                'address' => 'required|string',
                'content' => 'required|string'
            ]);
            if($validator->fails())
            {
                return back()->withErrors($validator)->withInput();
            }else
            {   
                $logoName = null;
                $sealName = null;
                if($request->file('logo'))
                {
                    $logoName = date("Y-m-d")."-".time()."-logo.".$request->logo->extension();
                    $request->logo->move(public_path("letterDoc"),$logoName);
                }

                if($request->file('seal'))
                {
                    $sealName = date("Y-m-d")."-".time()."-seal.".$request->seal->extension();
                    $request->seal->move(public_path("letterDoc"),$sealName);
                }

                $letter = new Letter();
                $letter->admin_id = Auth::user()->id;
                $letter->name = $request->name;
                $letter->address = $request->address;
                $letter->content = $request->content;
                $letter->logo = $logoName;
                $letter->seal = $sealName;
                if($letter->save())
                {
                    return back()->with("success","Letter Added successfully!");
                }
            }
            
        }catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }
    
    public function view()
    {
        try
        {
            $data['title'] = "View Letter"; 
            $data['list'] = Letter::where("admin_id",Auth::user()->id)->latest()->paginate(10);
            return view("admin.letter.view",$data);
        }catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function preview($id)
    {
        try
        {
            $data['title'] = "Preview Letter"; 
            $data['list'] = Letter::where("admin_id",Auth::user()->id)->where("id",$id)->first();
            return view("admin.letter.viewLetter",$data);
        }catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function edit($id)
    {
        try
        {
            $data['title'] = "Edit Letter"; 
            $data['list'] = Letter::where("admin_id",Auth::user()->id)->where("id",$id)->first();
            return view("admin.letter.edit",$data);
        }catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function update(Request $request,$id)
    {
        try
        {
            $validator = Validator::make($request->all(),[
                'name' => 'required|string',
                'address' => 'required|string',
                'content' => 'required|string',
                'status' => 'required'
            ]);
            if($validator->fails())
            {
                return back()->withErrors($validator)->withInput();
            }else
            {
                $letter = Letter::where("admin_id",Auth::user()->id)->where("id",$id)->first();
                if($request->file('logo'))
                {
                    $logoName = date("Y-m-d")."-".time()."-logo.".$request->logo->extension();
                    $request->logo->move(public_path("letterDoc"),$logoName);
                }else{
                    $logoName = $letter->logo;
                }   

                if($request->file('seal'))
                {
                    $sealName = date("Y-m-d")."-".time()."-seal.".$request->seal->extension();
                    $request->seal->move(public_path("letterDoc"),$sealName);
                }else{
                    $sealName = $letter->seal;
                }

                $update = Letter::where("admin_id",Auth::user()->id)->where("id",$id)->update([
                    "name" => $request->name,
                    "address" => $request->address,
                    "content" => $request->content,
                    "logo" => $logoName,
                    "seal" => $sealName,
                    "status" => $request->status
                ]);
                if($update)
                {
                    return back()->with("success","Letter Updated Successfully!");
                }
            }
        }catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function delete($id)
    {
        try
        {
            $letter = Letter::where("admin_id",Auth::user()->id)->where("id",$id)->first();
            if(!empty($letter->logo))
            {
                $logoPath = public_path()."/letterDoc/".$letter->logo;
                if(file_exists($logoPath))
                {
                    unlink($logoPath);
                }
            }

            if(!empty($letter->seal))
            {
                $sealPath = public_path()."/letterDoc/".$letter->seal;
                if(file_exists($sealPath))
                {
                    unlink($sealPath);
                }
            }

            if(Letter::where("admin_id",Auth::user()->id)->where("id",$id)->delete())
            {
                return back()->with("success","Letter Deleted Successfully!");
            }
            
        }catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    //Start : Request Letter
    public function list()
    {
        try
        {
            $data['title'] = "All Letter Request list"; 
            $data['list'] = RequestLetter::where("request_letters.admin_id", Auth::user()->id)
            ->leftJoin("letters", "request_letters.letter_id", "=", "letters.id")
            ->leftJoin("vehicles", "request_letters.vehicle_id", "=", "vehicles.id")
            ->leftJoin("users", "request_letters.user_id", "=", "users.id")
            ->select('request_letters.*', 'letters.name as letterName','vehicles.bank','vehicles.registration_numbers','vehicles.username','users.name as agentName')
            ->latest('request_letters.created_at')
            ->paginate(10);

            return view("admin.letter.requestedLetter",$data);
        }catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function approve($id)
    {
        try
        {
            $isLetter = RequestLetter::where("id",$id)->where("admin_id",Auth::user()->id)->first();
            $vehicleDataForEnvolop = Vehicle::where('id',$isLetter->vehicle_id)->first();
            $letter = Letter::where("admin_id",$isLetter->admin_id)->where("id",$isLetter->letter_id)->first();
            if(empty($letter))
            {
                return back()->with("error","Letter doesn't exists!");
            }elseif($letter->status == 0)
            {
                return back()->with("error","Letter Inactive mode!");
            }
            $content = $letter->content;

            //Finding short name from content
            $shortName = ['_date_','customer_name','loan_no',"registration_no",'vehicle_make','executive_email','police_station','_city_','_pincode_','_address_','chasis_no','engine_no','_logo_','_seal_'];
            for($i=0; $i<count($shortName); $i++)
            {
                preg_match('~\\b' . $shortName[$i] . '\\b~i', $content, $matches, PREG_UNMATCHED_AS_NULL);
                if(!empty($matches))
                {
                    $shortNameFind[] = $matches[0];
                }
            }

            //Assigning data in finded short name
            if(!empty($shortNameFind))
            {
                for($i = 0; $i < count($shortNameFind); $i++)
                {   
                    if($shortNameFind[$i] == "registration_no")
                    {
                        $columnName = "registration_numbers";
                    }
                    elseif($shortNameFind[$i] == "customer_name")
                    {
                        $columnName = "username";
                    }
                    elseif($shortNameFind[$i] == "loan_no")
                    {
                        $columnName = "agreementid";
                    }
                    elseif($shortNameFind[$i] == "vehicle_make")
                    {
                        $columnName = "productname";
                    }
                    elseif($shortNameFind[$i] == "chasis_no")
                    {
                        $columnName = "chasisnum";
                    }
                    elseif($shortNameFind[$i] == "engine_no")
                    {
                        $columnName = "enginenum";
                    }
                    elseif($shortNameFind[$i] == "_address_")
                    {
                        $columnName = "address";
                    }else
                    {
                        $columnName = "";
                    }

                    $vehicleData = Vehicle::where('id',$isLetter->vehicle_id)->first();
                    if(!empty($columnName)) 
                    {
                        $innerArray = $vehicleData[$columnName];
                    } 
                    else 
                    {
                        if($shortNameFind[$i] == "_date_")
                        {
                            $innerArray = date("d-m-Y");
                        }
                        elseif($shortNameFind[$i] == "_pincode_")
                        {
                            $innerArray = $isLetter->pincode;
                        }
                        elseif($shortNameFind[$i] == "_city_")
                        {
                            $innerArray = $isLetter->city;
                        }
                        elseif($shortNameFind[$i] == "police_station")
                        {
                            $innerArray = $isLetter->station_name;
                        }
                        elseif($shortNameFind[$i] == "executive_email")
                        {
                            $agentDetails = User::where("id",$isLetter->user_id)->first();
                            $innerArray = $agentDetails->email;
                        }
                        elseif($shortNameFind[$i] == "_logo_")
                        {
                            $logoPath = public_path('letterDoc/'.$letter->logo);
                            $logoData = base64_encode(file_get_contents($logoPath));
                            $innerArray = 'data:image/png;base64,'.$logoData;
                            // $innerArray = env("APP_URL").'letterDoc/'.$letter->logo;
                        }
                        elseif($shortNameFind[$i] == "_seal_")
                        {
                            $sealPath = public_path('letterDoc/'.$letter->seal);
                            $sealData = base64_encode(file_get_contents($sealPath));
                            $innerArray = 'data:image/png;base64,'.$sealData;
                            // $innerArray = env("APP_URL").'letterDoc/'.$letter->seal;
                        }
                    }
                
                    //Replacing data with finded short name from content
                    $search = $shortNameFind[$i];
                    $replacement = $innerArray;
                    $content = preg_replace_callback(
                        "/\b" . preg_quote($search, '/') . "\b/i", 
                        function ($matches) use ($replacement, $search) {
                            return $matches[0] === $search ? $replacement : $matches[0];
                        }, 
                        $content
                    );
                }
            }

            //Creating pdf
            $data['pdf'] = $content;
            $options = new Options();
            $options->set('isRemoteEnabled', true);
            $pdf = new Dompdf($options);
            $pdf2 = new Dompdf($options);
            // return view("admin.letter.viewLetter",$data);
            $pdf->loadHtml(view("admin.letter.viewLetter",$data));
            $pdf->setPaper('A4', 'portrait');
            $pdf->render();

            //For Envolop
            $data2['vehicle_details'] = $vehicleDataForEnvolop;
            $data2['station_detail'] = $isLetter;
            $data2['address_of_letter'] = $letter->address;
            $pdf2->loadHtml(view("admin.letter.envolop",$data2));
            $height = 11 * 28.3465; // 1 cm = 28.3465 points
            $width = 22 * 28.3465;
            $pdf2->setPaper([0, 0, $width, $height]);
            $pdf2->render();

            

            //Deleting old letter if exists
            if(!empty($isLetter->link))
            {
                $fileName = explode("letters",$isLetter->link)[1];
                $letterPath = public_path()."/letters/".$fileName;
                if(file_exists($letterPath))
                {
                    unlink($letterPath);
                }
            }

            //Deleting old envolop if exists
            if(!empty($isLetter->envolop_link))
            {
                $fileName = explode("envolops",$isLetter->envolop_link)[1];
                $letterPath = public_path()."/envolops/".$fileName;
                if(file_exists($letterPath))
                {
                    unlink($letterPath);
                }
            }
         
            //Creating Envolop
            $envolopName = $vehicleDataForEnvolop->registration_numbers.'-envolop.pdf';
            Storage::disk('public')->put('envolops/'.$envolopName,$pdf2->output());
            $envolop_url = env("APP_URL").'envolops/'.$envolopName;

            //Creating Letter
            $filename = $vehicleDataForEnvolop->registration_numbers."-".$isLetter->id.'.pdf';
            Storage::disk('public')->put('letters/'.$filename,$pdf->output());
            $url = env("APP_URL").'letters/'.$filename;
        
            $update = RequestLetter::where("id",$id)->where("admin_id",Auth::user()->id)->update([
                "status"=>1,
                "link"=>$url,
                "envolop_link"=>$envolop_url,
            ]);
            if($update)
            {
                return back()->with("success","Letter Approved Successfully!");   
            }
        }catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function reject($id)
    {
        try
        {
            $update = RequestLetter::where("id",$id)->where("admin_id",Auth::user()->id)->update(["status"=>2]);
            if($update)
            {
                return back()->with("success","Letter Rejected Successfully!");   
            }
 
        }catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function requestDelete($id)
    {
        try
        {
            $data = RequestLetter::where("id",$id)->where("admin_id",Auth::user()->id)->first();
            if(!empty($data->link))
            {
                $file = explode("letters",$data->link)[1];
                $filePath = public_path()."/letters".$file;
                if(file_exists($filePath))
                {
                    unlink($filePath);
                } 
            }
           
            // $deleted = RequestLetter::where("id",$id)->where("admin_id",Auth::user()->id)->delete();
            $deleted = $data->delete();
            if($deleted)
            {
                return back()->with("success","Letter deleted Successfully!");   
            }
 
        }catch(\Exception $e)
        {
            return $e->getMessage();
        }
    }
}
