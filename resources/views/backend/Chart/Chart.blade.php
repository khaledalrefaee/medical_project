@extends('backend.index')
@section('content')

    <!DOCTYPE html>
<html>
<head>
    <title>User Chart</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>



 <br><br>

<div class="row mb-3">
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Users</div>
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$totalUsers}}</div>
                    <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> </span>
                        <span></span>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-info"></i>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Doctors</div>
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$totalDoctors}}</div>
                    <div class="mt-2 mb-0 text-muted text-xs">
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-info"></i>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Clinics</div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$totalClince}}</div>
                        <div class="mt-2 mb-0 text-muted text-xs">
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Nurses</div>
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$totalNurses}}</div>
                    <div class="mt-2 mb-0 text-muted text-xs">
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-info"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

 <div class="charts-wrapper">
     <div class="chart-container">
         <canvas id="user-chart"></canvas>
         <i id="arrow-icon" class="fas fa-arrow-up"></i>
     </div>
     <div class="chart-container">
         <canvas id="circle"></canvas>
     </div>
 </div>

<canvas id="myChart" ></canvas>

 <canvas id="totalChart" width="50" height="20"></canvas>

<script>
    var ctx = document.getElementById('circle').getContext('2d');
    var circle = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['All Appointments', 'Daily Appointments', 'Cancelled Appointments'],
            datasets: [{
                label: '# of Appointments',
                data: [{{ $data['all'] }}, {{ $data['daily'] }}, {{ $data['Cancelled'] }}],
                backgroundColor: ['#ff6384', '#36a2eb', '#ffce56']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>









<script>
    var ctx = document.getElementById('user-chart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Doctors', 'Users', 'Nurses'],
            datasets: [{
                label: 'Number',
                data: [{{ $totalDoctors }}, {{ $totalUsers }}, {{ $totalNurses }}],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            },

                    @foreach ($data['doctorAppointments'] as $doctorName => $appointmentCount)
                {
                    label: '{{ $doctorName }}',
                    data: [{{ $appointmentCount }}, 0, 0],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
            @endforeach
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>



 <script>
     var ctx = document.getElementById('totalChart').getContext('2d');
     var dates = {!! $data['total']->pluck('month') !!};
     var totals = {!! $data['total']->pluck('total') !!};

     var chart = new Chart(ctx, {
         type: 'line',
         data: {
             labels: dates,
             datasets: [{
                 label: 'Total Paid',
                 backgroundColor: 'rgba(255, 99, 132, 0.2)',
                 borderColor: 'rgba(255, 99, 132, 1)',
                 data: totals,
                 fill: false // تعيينها إلى false لإظهار خطوط الرسم البياني بدلاً من المناطق الملونة
             }]
         },
         options: {
             scales: {
                 yAxes: [{
                     ticks: {
                         beginAtZero: true
                     }
                 }]
             }
         }
     });
 </script>




<style>
    .charts-wrapper {
        display: flex;
        justify-content: space-between;
    }

    .chart-container {
        width: 48%;
        display: inline-block;
        vertical-align: top;
    }

    .chart-container {
        position: relative;
        width: 50%;
        margin: auto;
        margin-top: 50px;
        text-align: center;
    }
    .myChart {
        width: 400px;
        height: 400px;
    }
    #arrow-icon {
        position: absolute;
        top: 0;
        right: 0;
        font-size: 24px;
        color: green;
        transform: translateY(-50%);
    }
</style>
</body>
</html>

@endsection
