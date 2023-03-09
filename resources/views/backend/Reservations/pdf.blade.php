<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        table{
            font-size: x-small;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }
        .gray {
            background-color: lightgray
        }
        .font{
            font-size: 15px;
        }
        .authority {
            /*text-align: center;*/
            float: right
        }
        .authority h5 {
            margin-top: -10px;
            color: green;
            /*text-align: center;*/
            margin-left: 35px;
        }
        .thanks p {
            color: green;;
            font-size: 16px;
            font-weight: normal;
            font-family: serif;
            margin-top: 20px;
        }
    </style>

</head>
<body>

<table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
            <!-- {{-- <img src="" alt="" width="150"/> --}} -->
            <h2 style="color: green; font-size: 26px;"><strong>E-Khaled Book</strong></h2>
        </td>
        <td align="right">

        </td>
    </tr>

</table>


<table width="100%" style="background:white; padding:2px;""></table>
<table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
            <p class="font" style="margin-left: 20px;">
                <strong>Name:</strong> {{ $Reservation->name }}<br>
                <strong>Email:</strong> {{ $Reservation->user->email }} <br>
                <strong>Phone:</strong> {{ $Reservation->phone }} <br>
{{--                @php--}}
{{--                    $div = $order->city->city;--}}
{{--                    $dis = $order->address->address;--}}
{{--                    $s = $order->s_address;--}}

{{--                @endphp--}}

                <strong>Address:{{ $Reservation->address }}</strong> <br>
            </p>
        </td>
        <td>
            <p class="font">
            <h3><span style="color: green;">Reservation Date:</span> #{{ $Reservation->date}}</h3>
            Reservation time: {{ $Reservation->time }} <br>

            birthday :<span> {{ $Reservation->birthday }} </span><br>
            diagnosis :<span> {{ $Reservation->diagnosis }} </span><br>
            status :<span> {{ $Reservation->status }} </span>
            </p>
        </td>
    </tr>
</table>
<br/>
<h3></h3>
<table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">
    <tr class="font">
        <th>Image</th>
        <th>Product Name</th>
        <th>Size</th>
        <th>Color</th>
        <th>Code</th>
        <th>Quantity</th>
        <th>Unit Price </th>
        <th>Total </th>
    </tr>
    </thead>
    <tbody>


    </tbody>
</table>
<br>
<table width="100%" style=" padding:0 10px 0 10px;">
    <tr>
        <td align="right" >
            <h2><span style="color: green;">Subtotal:</span></h2>
            {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
        </td>
    </tr>
</table>
<div class="thanks mt-3">
    <p>Thanks For Dealing With US..!!</p>
</div>
<div class="authority float-right mt-5">
    <p>-----------------------------------</p>
    <h5>Authority Signature:</h5>
</div>
</body>
</html>
