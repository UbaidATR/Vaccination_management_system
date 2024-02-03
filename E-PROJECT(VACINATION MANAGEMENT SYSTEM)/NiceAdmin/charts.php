<?php
include('config2.php');
include("header.php");
$query_v_c = mysqli_query($connection, "select count(*) as vac from parents where status_id='1' ");
$query_n_v_c = mysqli_query($connection, "select count(*) as non_v from parents where status_id='2' ");
$query_missed = mysqli_query($connection, "select count(*) as missed from parents where status_id='3' ");
$data_v_c = mysqli_fetch_assoc($query_v_c);
$data_n_v_c = mysqli_fetch_assoc($query_n_v_c);
$data_missed = mysqli_fetch_assoc($query_missed);
?>
<main id="main" class="main">
<div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">patient chart</li>
            </ol>
        </nav>
    </div>
    <span style="display:none;" id="vac">
        <?php echo $data_v_c['vac'] ?>
    </span>
    <span style="display:none;" id="non_v">
        <?php echo $data_n_v_c['non_v'] ?>
    </span>
    <span style="display:none;" id="missed">
        <?php echo $data_missed['missed'] ?>
    </span>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pie Chart</h5>
                    <canvas id="pieChart" style="max-height: 400px;"></canvas>
                    <script>
                        const total_v_c = parseInt(document.querySelector('#vac').innerText);
                        const total_n_v_c = parseInt(document.querySelector('#non_v').innerText);
                        const missed = parseInt(document.querySelector('#missed').innerText);
                        console.log(total_v_c);
                        document.addEventListener("DOMContentLoaded", () => {
                            new Chart(document.querySelector('#pieChart'), {
                                type: 'pie',
                                data: {
                                    labels: [
                                        'Non Vaccinated',
                                        'Vaccinated',
                                        'Missed'
                                    ],
                                    datasets: [{
                                        label: 'Total',
                                        data: [total_v_c, total_n_v_c, missed,],
                                        backgroundColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(54, 162, 235)',
                                            'rgb(255, 205, 86)'
                                        ],
                                        hoverOffset: 4
                                    }]
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Polar Area Chart</h5>

                    <!-- Polar Area Chart -->
                    <canvas id="polarAreaChart" style="max-height: 400px;"></canvas>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new Chart(document.querySelector('#polarAreaChart'), {
                                type: 'polarArea',
                                data: {
                                    labels: [
                                        'Non Vaccinated',
                                        'Vaccinated',
                                        'Missed'
                                    ],
                                    datasets: [{
                                        label: 'My First Dataset',
                                        data: [total_v_c, total_n_v_c, missed],
                                        backgroundColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(75, 192, 192)',
                                            'rgb(255, 205, 86)',
                                            'rgb(201, 203, 207)',
                                            'rgb(54, 162, 235)'
                                        ]
                                    }]
                                }
                            });
                        });
                    </script>
                    <!-- End Polar Area Chart -->

                </div>
            </div>
        </div>
    </div>
</main>
<?php
include('footer.php');
?>