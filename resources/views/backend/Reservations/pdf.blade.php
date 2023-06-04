<!doctype html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Invoice</title>

    <style type="text/css">
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f5f5f5;
        }
        .invoice-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 30px;
            background-color: #ffffff;
            border: 2px solid #00d3f5; /* تغيير لون الحدود */
            border-radius: 6px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.15);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .header img {
            max-width: 200px; /* تحديد عرض الصورة */
            max-height: 150px; /* تحديد ارتفاع الصورة */
            object-fit: contain; /* تحديد كيفية تناسب الصورة داخل الحاوية */
            float: right; /* تحديد موقع الصورة على الجانب الأيمن */
            margin-left: 20px; /* تحديد الهامش بين الصورة والعنوان */
        }
        .header h2 {
            font-size: 28px;
            color: #00d3f5; /* تغيير لون العنوان */
            margin: 0;
        }
        .invoice-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }
        .invoice-details .left-column, .invoice-details .right-column {
            width: 50%;
        }
        .invoice-details .right-column {
            text-align: right;
        }
        .invoice-details p {
            margin-bottom: 15px;
            font-size: 18px;
            line-height: 1.5;
            color: #666666;
        }
        .invoice-details strong {
            font-weight: bold;
            color: #00d3f5; /* تغيير لون النص البارز */
        }
        .subtotal {
            display: flex;
            justify-content: flex-end;
            margin-top: 30px;
        }
        .subtotal h2 {
            font-size: 28px;
            color: #00d3f5; /* تغيير لون الإجمالي */
            margin: 0;
        }
        .thanks {
            text-align: center;
            margin-top: 40px;
        }
        .thanks p {
            font-size: 20px;
            font-weight: bold;
            color: #00d3f5; /* تغيير لون الشكر */
            margin: 0;
        }
        .signature {
            text-align: right;
            margin-top: 30px;
        }
        .signature p {
            margin: 0;
            font-size: 18px;
            color: #666666;
        }
        .diagnosis {
            margin-bottom: 40px;
            font-size: 22px;
            color: #00d3f5; /* تغيير لون التشخيص */
            font-weight: bold;
        }
        @media (max-width: 768px) {
            .invoice-details .left-column, .invoice-details .right-column {
                width: 100%;
            }
        }
    </style>

</head>
<body>

<div class="invoice-container">

    <div class="header">
        <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('front_log/images/imag_02.jpeg'))) }}" alt="Your Image">

        <h2>My Clinic</h2>
    </div>

    <div class="invoice-details">
        <div class="left-column">
            <p><strong>Name:</strong> {{ $Reservation->name }}</p>
            <p><strong>Booked by :</strong> {{ $Reservation->user->name }}</p>
            <p><strong>Phone:</strong> {{ $Reservation->phone }}</p>
            <p><strong>Diagnosis:</strong> {{ $Reservation->diagnosis }}</p>
        </div>
        <div class="right-column">
            <br>
            <h3><span style="color: #00d3f5;">Reservation Date:</span> #{{ $Reservation->date}}</h3>
            <p><strong>Reservation time:</strong> {{ $Reservation->time }}</p>
            <p><strong>Birthday:</strong> {{ $Reservation->birthday }}</p>
            <p><strong>Status:</strong> {{ $Reservation->status }}</p>
            <p><strong>Total:</strong>
                @if( $Reservation->total === Null)
                    0.00 SYP
                @else
                    {{ $Reservation->total }} SYP
                @endif</p>
            <div ><p><strong>Address:</strong>  {{ $Reservation->address }}</p></div>

        </div>
    </div>

    <div class="subtotal">
        <h2>Subtotal:
            @if( $Reservation->total === Null)
                0.00 SYP
            @else
                {{ $Reservation->total }} SYP
            @endif</h2>
    </div>

    <div class="thanks">
        <p>Thanks for your business!</p>
    </div>

    <div class="signature">
        <p>-----------------------------------</p>
        <p>Doctor's Signature:</p>
    </div>

</div>

</body>
</html>
