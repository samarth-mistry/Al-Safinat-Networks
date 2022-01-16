<!DOCTYPE html>
<html>
<head>
    <title> {{ $booking->owner_name }}'s Booking Details</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="Boank Albatron">
    <style>
        .details{
            border: 2px;
            border-color: black;
        }
        .details th{
            background: khaki;
        }
        .events li { 
            display: flex; 
            color: #999;
        }

        .events port { 
        position: relative;
        padding: 0 1.5em;  }

        .events port::after { 
        content: "";
        position: absolute;
        z-index: 2;
        right: 0;
        top: 0;
        transform: translateX(50%);
        border-radius: 50%;
        background: #fff;
        border: 1px #ccc solid;
        width: .8em;
        height: .8em;
        }


        .events span {
        padding: 0 1.5em 1.5em 1.5em;
        position: relative;
        }

        .events span::before {
        content: "";
        position: absolute;
        z-index: 1;
        left: 0;
        height: 100%;
        border-left: 1px #ccc solid;
        }

        .events strong {
        display: block;
        font-weight: bolder;
        }

        .events { margin: 1em; width: 50%; }
        .events, 
        .events *::before, 
        .events *::after { box-sizing: border-box; font-family: arial; }
    </style>
</head>
    <body>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <table class="table-responsive" width="100%" style="border-bottom:1px solid #ccc;">
                        <tr>
                            <td width="150">
                                <img alt="Logo" src="/favicon.ico" style="width:80%" />
                            </td>
                            <td align="center"> <!-- padding-right:70px -->
                                <h2 align="center" style="color:#333">Booking Details for <b>{{ $tracking_id }}</b></h2>
                            </td>
                        </tr>
                    </table>
                    <table width="100%">
                        <tr>
                            <td colspan="5">
                                <h4>Registration Details</h4>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%">Requestor's Full Name </td>
                            <td width="25%" style="font-family: Firefly Sung">: {{ $booking->owner_name }}</td>
                            <td width="5%">&nbsp;</td>
                            <td width="20%">&nbsp;</td>
                            <td width="25%">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Container Type </td>
                            <td>: {{ $booking->unit_size == 0 ? 'TEU' : 'FEU' }}</td>
                            <td>&nbsp;</td>
                            <td>Material Type </td>
                            <td>: {{ $booking->material_type_id }}</td>
                        </tr>
                        <tr>
                            <td>Weight </td>
                            <td>: {{ $booking->weight }} Kgs</td>
                            <td>&nbsp;</td>
                            <td>Dementions</td>
                            <td>: {{ $booking->d_l }}x{{ $booking->d_w }}x{{ $booking->d_h }} [m x m x m]</td>
                        </tr>
                    </table>
                    <table width="100%">
                        <tr>
                            <td>
                                <h4>Source vs Destination comparision</h4>
                            </td>
                        </tr>
                    </table>
                    <table width="100%" class="details" border="1">
                        <thead class="bg-info">
                            <tr>
                                <th></th>
                                <th>Source Details</th>
                                <th>Destination Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Country</td>
                                <td>{{ $booking->sourceCountry->name }}</td>
                                <td>{{ $booking->destinationCountry->name }}</td>
                            </tr>
                            <tr>
                                <td>Port</td>
                                <td>{{ $booking->sourcePort->name }}</td>
                                <td>{{ $booking->destinationPort->name }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $booking->source_address }}</td>
                                <td>{{ $booking->destination_address }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $booking->source_email }}</td>
                                <td>{{ $booking->source_email }}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>{{ $booking->source_phone }}</td>
                                <td>{{ $booking->source_phone }}</td>
                            </tr>
                            <tr>
                                <td>Arrival Date</td>
                                <td>{{ $booking->s_date_of_arrival }}</td>
                                <td>{{ $booking->d_date_of_arrival_approx ? $booking->d_date_of_arrival_approx : '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%" style="border-bottom:1px solid #ccc;">
                        <tr>
                            <td colspan="3">
                                <h4>Vessel Route Details</h4>
                            </td>
                        </tr>
                        <tr>
                            <td width="33.33%"></td>
                            <td width="33.33%" style="background: green; color: white;"><center><b>START</b></center></td>
                            <td></td>
                        </tr>
                    </table>
                    <table width="100%">
                        @php $cnt = 1; @endphp
                        @foreach($route_array as $port)
                        <tr>
                            <td width="33.33%"></td>
                            <td width="33.33%">({{ $cnt++ }}) {{ $port }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </table>
                    <table width="100%" style="border-top:1px solid #ccc;">
                        <tr>
                            <td width="33.33%"></td>
                            <td width="33.33%" style="background: black; color: white;"><center><b>END</b></center></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>