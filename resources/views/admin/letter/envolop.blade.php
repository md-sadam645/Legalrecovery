<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Envolop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .label {
            width: 100%;
            height:250px;
            /* margin-top: 250px; */
            padding-top:70px;
            /* padding-bottom:20px; */
            /* margin-bottom: 200px; */
            /* border:1px solid red;     */
        }
        .label div {
            display: inline-block;
            vertical-align: top;
            /* padding: 10px; */
        }
        .label .left {
            /* border: 1px solid red; */
            width: 60%;
            text-align: left;
        }
        .label .right {
            /* border: 1px solid red; */
            width: 38%;
            text-align: left;
        }
        .label .left h2,.label .right h2, .label .left p, .label .right p {
            margin: 0;
            padding: 0;
        }
        .label .left h2,.label .right h2 {
            font-size: 20px;
            font-weight: bold;
        }
        .label .left p, .label .right p {
            text-transform: capitalize;
            font-size: 15px;
        }
        .label .right p {
            text-align: left;
        }
        .label .from {
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="label">
        <div class="left">
            <p><b>TO,</b></p>
            <p>SUB INSPECTOR</p>
            <h2 style="margin-bottom:5px ">{{$station_detail->station_name}}</h2>
            <p>POLICE STATION</p>
            <h2>{{$station_detail->city}}</h2>
            <h2>{{$station_detail->pincode}}</h2>
        </div>
        <div class="right">
            <h2>{{$vehicle_details->registration_numbers}}</h2>
            <h2>PRE</h2>
            <div class="from">
                <h2>FROM,</h2>
                <p>
                    {{$address_of_letter}}
                </p>
            </div>
        </div>
    </div>
    <div class="label">
        <div class="left">
            <p><b>TO,</b></p>
            <p>SUB INSPECTOR</p>
            <h2 style="margin-bottom:5px ">{{$station_detail->station_name}}</h2>
            <p>POLICE STATION</p>
            <h2>{{$station_detail->city}}</h2>
            <h2>{{$station_detail->pincode}}</h2>
        </div>
        <div class="right">
            <h2>{{$vehicle_details->registration_numbers}}</h2>
            <h2>POST</h2>
            <div class="from">
                <h2>FROM,</h2>
                <p>
                    {{$address_of_letter}}
                </p>
            </div>
        </div>
    </div>
    <div class="label">
        <div class="left">
            <p><b>TO,</b></p>
            <h2>{{$vehicle_details->username}}</h2>
            <p>{{$vehicle_details->address}}</p>
        </div>
        <div class="right">
            <h2>{{$vehicle_details->registration_numbers}}</h2>
            <div class="from">
                <h2>FROM,</h2>
                <p> {{$address_of_letter}}</p>
            </div>
        </div>
    </div>
</body>
</html>
