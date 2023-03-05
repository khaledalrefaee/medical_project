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

<script>
    var totalUsers = <?php echo $totalUsers; ?>;

    var ctx = document.getElementById('user-chart').getContext('2d');
    var userChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Users'],
            datasets: [{
                label: 'Number of Users',
                data: [totalUsers],
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

    setInterval(function() {
        // Get the current number of users
        var totalUsers = <?php echo \App\Models\User::count(); ?>;

        // Update the chart
        userChart.data.datasets[0].data = [totalUsers];
        userChart.update();

        // Determine the direction of the arrow
        var direction = (totalUsers > prevValue) ? 'up' : 'down';

        // Update the arrow icon
        var arrowIcon = document.getElementById('arrow-icon');
        arrowIcon.classList.remove('fa-arrow-up', 'fa-arrow-down');
        arrowIcon.classList.add('fa-arrow-' + direction);
        arrowIcon.style.color = (direction == 'up') ? 'green' : 'red';

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
