


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice</title>

    <style type="text/css">
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f7f7f7;
            border: 1px solid #ddd;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .header img {
            max-width: 150px;
        }
        .header h2 {
            font-size: 24px;
            color: green;
            margin: 0;
        }
        .invoice-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .invoice-details .left-column p {
            margin: 0;
            font-size: 14px;
            line-height: 1.5;
        }
        .invoice-details .right-column p {
            margin: 0;
            font-size: 14px;
            line-height: 1.5;
            text-align: right;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f7f7f7;
            color: #444;
            font-size: 14px;
            font-weight: bold;
        }
        table td {
            font-size: 14px;
            border-bottom: 1px solid #ddd;
        }
        .subtotal {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }
        .subtotal h2 {
            font-size: 24px;
            color: green;
            margin: 0;
        }
        .thanks {
            text-align: center;
            margin-top: 40px;
        }
        .thanks p {
            font-size: 16px;
            font-weight: bold;
            color: green;
            margin: 0;
        }
        .signature {
            text-align: right;
            margin-top: 20px;
        }
        .signature p {
            margin: 0;
            font-size: 14px;
        }
    </style>

</head>
<body>

<div class="invoice-container">

    <div class="header">
        <img src="" alt="">
        <h2>My Clinic</h2>
    </div>

    <div class="invoice-details">
        <div class="left-column">
            <p><strong>Name:</strong> {{ $Reservation->name }}</p>
            <p><strong>Email:</strong> {{ $Reservation->user->email }}</p>
            <p><strong>Phone:</strong> {{ $Reservation->phone }}</p>
            <p><strong>Address:</strong> {{ $Reservation->address }}</p>
        </div>
        <div class="right-column">
            <h3><span style="color: green;">Reservation Date:</span> #{{ $Reservation->date}}</h3>
            <p><strong >Reservation time:</strong> {{ $Reservation->time }}</p>
            <p><strong>Birthday:</strong> {{ $Reservation->birthday }}</p>
            <p><strong>Status:</strong> {{ $Reservation->status }}</p>
            <p><strong>Total:</strong> {{ $Reservation->total }} $</p>
            <p><strong>Diagnosis:</strong> {{ $Reservation->diagnosis }}</p>
        </div>
    </div>



    <div class="subtotal">
        <h2>Subtotal: {{ $Reservation->total }} $</h2>
    </div>

    <div class="thanks">
        <p>Thanks for your business!</p>
    </div>

    <div class="signature">
        <p>-----------------------------------</p>
        <p>Authority Signature:</p>


    </div>

</div>

</body>
</html>

