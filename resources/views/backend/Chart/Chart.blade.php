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

<div class="chart-container">
    <canvas id="user-chart"></canvas>
    <i id="arrow-icon" class="fas fa-arrow-up"></i>
</div>


<div class="row mb-3">
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card h-100">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">New User</div>
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
                    <div class="text-xs font-weight-bold text-uppercase mb-1">The number of doctors</div>
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$totalDoctoer}}</div>
                    <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                        <span>Since last month</span>
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
                            <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                            <span>Since last month</span>
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
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Number of nurses</div>
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$toutalNuers}}</div>
                    <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                        <span>Since last month</span>
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






<script>

    var totalUsers = <?php echo $totalUsers; ?>;
    var totalDoctoer = <?php echo $totalDoctoer; ?>;
    var toutalNuers = <?php echo $toutalNuers; ?>;
    var ctx = document.getElementById('user-chart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Users','Doctoers','Nurses'],
            datasets: [{
                label: 'Number ',
                data: [totalUsers,totalDoctoer,toutalNuers],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
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

    var prevValue = totalUsers;
    var prevValue = totalDoctoer;
    var prevValue = toutalNuers;
    setInterval(function() {
        //  the current number of users
        var totalUsers = <?php echo \App\Models\User::count(); ?>;
        var totalDoctoer = <?php echo \App\Models\Doctor::count(); ?>;
        var toutalNuers = <?php echo \App\Models\Nurses::count(); ?>;

        // Update the chart
        userChart.data.datasets[0].data = [totalUsers,];
        userChart.update();

        // Determine the direction of the arrow

        var direction = (totalUsers > prevValue) ? 'up' : 'down';
          var direction_2 = (totalDoctoer > prevValue) ? 'up' : 'down';
          var direction_3 = (toutalNuers > prevValue) ? 'up' : 'down';

        // Update the arrow icon
        var arrowIcon = document.getElementById('arrow-icon');
        arrowIcon.classList.remove('fa-arrow-up', 'fa-arrow-down');
        arrowIcon.classList.add('fa-arrow-' + direction);
         arrowIcon.classList.add('fa-arrow-' + direction_2);
         arrowIcon.classList.add('fa-arrow-' + direction_3);

        arrowIcon.style.color = (direction === 'up') ? 'green' : 'red';
        arrowIcon.style.color = (direction_2 === 'up') ? 'green' : 'red';
        arrowIcon.style.color = (direction_3 === 'up') ? 'green' : 'red';
        // Update the previous value
        prevValue = totalUsers;

    }, 5000);


</script>

<style>
    .chart-container {
        position: relative;
        width: 50%;
        margin: auto;
        margin-top: 50px;
        text-align: center;
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
