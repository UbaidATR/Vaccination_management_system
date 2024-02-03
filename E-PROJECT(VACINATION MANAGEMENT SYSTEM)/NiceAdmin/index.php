<?php
include('header.php');
include('config2.php');
$query_v_c = mysqli_query($connection, "select count(*) as vac from parents where status_id='1' ");
$query_n_v_c = mysqli_query($connection, "select count(*) as non_v from parents where status_id='2' ");
$query_missed = mysqli_query($connection, "select count(*) as missed from parents where status_id='3' ");
$data_v_c = mysqli_fetch_assoc($query_v_c);
$data_n_v_c = mysqli_fetch_assoc($query_n_v_c);
$data_missed = mysqli_fetch_assoc($query_missed);
$query = mysqli_query($connection, "select count(*) as total_users from parents");
$row = mysqli_fetch_assoc($query);
$_SESSION['all'] = $row['total_users'];
$query12 = mysqli_query($connection, "select count(*) as total_hos from hospital where status='active'");
$data2 = mysqli_fetch_assoc($query12);
$hospitals = $data2['total_hos'];
if (isset($_GET['all'])) {
  $query = mysqli_query($connection, "select count(*) as total_users from parents ");

  if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $_SESSION['all'] = $row['total_users'];
  } else {
    $no_user = "No users found.";
  }
}

if (isset($_GET['Today'])) {
  $today = date("Y-m-d");

  // Get the total number of users registered today
  $query = "SELECT COUNT(*) AS total_users FROM parents WHERE created_at LIKE '$today%'";
  $result = mysqli_query($connection, $query);

  // Check for results
  if (mysqli_num_rows($result) > 0) {
    // Get the results
    $data = mysqli_fetch_assoc($result);

    // Set the total users variable
    $_SESSION['all'] = $data['total_users'];
  } else {
    // Set the total users variable
    $_SESSION['all'] = "No users found.";
  }
}
;
if (isset($_GET['Year'])) {
  $startDate = date("Y-01-01");
  $endDate = date("Y-12-31");
  $query = mysqli_query($connection, "select count(*) as total_users from parents where created_at between '$startDate' and '$endDate' ");
  if (mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_assoc($query);
    $_SESSION['all'] = $data['total_users'];
  } else {
    $_SESSION['all'] = "no users found";
  }
}
if (isset($_GET['Month'])) {
  $startDate = date("Y-m-01");
  $endDate = date("Y-m-t");
  $query = mysqli_query($connection, "select count(*) as total_users from parents where created_at between '$startDate' and '$endDate'");
  if (mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_assoc($query);
    $_SESSION['all'] = $data['total_users'];
  } else {
    $_SESSION['all'] = "no users found";
  }
}

?>



<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <form action="#" method="get">
                    <li><input type="submit" class="dropdown-item e_t" name="Today" value="Today"></li>
                    <li><input type="submit" class="dropdown-item e_t" name="Month" value="This Month"></li>
                    <li><input type="submit" class="dropdown-item e_t" name="Year" value="This Year"></li>
                    <li><input type="submit" class="dropdown-item e_t" name="all" value="All"></li>
                  </form>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Patients <span class="i_span">| All</span></h5>
                <script>
                  const inputArray = document.querySelectorAll(".e_t");
                  const span = document.querySelector('.i_span');

                  // Retrieve saved value from sessionStorage
                  const savedValue = sessionStorage.getItem('selectedValue');
                  if (savedValue) {
                    span.innerText = savedValue;
                  }

                  inputArray.forEach(input => {
                    input.addEventListener('click', () => {
                      span.innerText = input.value;
                      sessionStorage.setItem('selectedValue', input.value); // Store value in sessionStorage
                    });
                  });
                </script>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-p-circle"></i>
                  </div>
                  <div class="ps-3">
                    <h6 class="trans_ t_t">
                      <?php echo $_SESSION['all'] ?>
                    </h6>
                    <script>
                      const h7 = document.querySelector(".t_t");

                      const o_n = document.querySelector(".t_t").innerText; // Convert text to number
                      const n_m = Array.from({ length: o_n }).map((_, i) => i + 1); // Create array from 1 to originalNumber

                      const T_M = setInterval(() => {
                        if (n_m.length === 0) {
                          clearInterval(T_M);
                        } else {
                          h7.textContent = n_m.shift();
                        }
                      }, 100);


                    </script>

                    <span class="text-success small pt-1 fw-bold">12%</span> <span
                      class="text-muted small pt-2 ps-1">increase</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Hospitals <span>| Total</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-h-circle"></i>
                  </div>
                  <div class="ps-3">
                    <h6 class="trans_ t_o">
                      <?php echo $hospitals ?>
                    </h6>
                    <script>
                      const H6El = document.querySelector(".t_o");

                      const O_N = document.querySelector(".t_o").innerText; // Convert text to number
                      const Nm = Array.from({ length: O_N }).map((_, i) => i + 1); // Create array from 1 to originalNumber

                      const Tm = setInterval(() => {
                        if (Nm.length === 0) {
                          clearInterval(Tm);
                        } else {
                          H6El.textContent = Nm.shift();
                        }
                      }, 100);


                    </script>
                    <span class="text-success small pt-1 fw-bold">8%</span> <span
                      class="text-muted small pt-2 ps-1">increase</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">
            <?php
            $queryV = mysqli_query($connection, "select count(*) as total_users from parents where status_id='2'");
            $Vdata = mysqli_fetch_assoc($queryV);
            $totalV = $Vdata['total_users'];
            if (isset($_GET['Vaccinated'])) {
              $queryV = mysqli_query($connection, "select count(*) as total_users from parents where status_id='2' ");
              if (mysqli_num_rows($queryV) > 0) {
                $Vdata = mysqli_fetch_assoc($queryV);
                $totalV = $Vdata['total_users'];
              } else {
                $totalV = "no user found";
              }
            }
            if (isset($_GET['Non_V'])) {
              $queryV = mysqli_query($connection, "select count(*) as total_users from parents where status_id='1' ");
              if (mysqli_num_rows($queryV)) {
                $Vdata = mysqli_fetch_assoc($queryV);
                $totalV = $Vdata['total_users'];
              } else {
                $totalV = "no data is found";
              }
            }
            if (isset($_GET['Missed'])) {
              $queryV = mysqli_query($connection, "select count(*) as total_users from parents where status_id='3' ");
              if (mysqli_num_rows($queryV)) {
                $Vdata = mysqli_fetch_assoc($queryV);
                $totalV = $Vdata['total_users'];
              } else {
                $totalV = "no data is found";
              }
            }

            ?>
            <div class="card info-card customers-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <form action="#" method="get">
                    <li><input type="submit" class="dropdown-item r_t" name="Vaccinated" value="Vaccinated"></li>
                    <li><input type="submit" class="dropdown-item r_t" name="Non_V" value="Non vaccinated"></li>
                    <li><input type="submit" class="dropdown-item r_t" name="Missed" value="Missed"></li>
                  </form>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Patients <span class="O_span"> | Vaccinated
                  </span></h5>
                <script>
                  const inputArray2 = document.querySelectorAll(".r_t");
                  const span2 = document.querySelector('.O_span');

                  // Retrieve saved value from sessionStorage
                  const Savedvalue = sessionStorage.getItem('Selectedvalue');
                  if (Savedvalue) {
                    span2.innerText = Savedvalue;
                  }

                  inputArray2.forEach(input => {
                    input.addEventListener('click', () => {
                      span2.innerText = input.value;
                      sessionStorage.setItem('Selectedvalue', input.value); // Store value in sessionStorage
                    });
                  });
                </script>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6 class="trans_">
                      <?php echo $totalV ?>
                    </h6>
                    <script>
                      const h6Element = document.querySelector(".trans_");

                      const originalNumber = document.querySelector(".trans_").innerText; // Convert text to number
                      const numbers = Array.from({ length: originalNumber }).map((_, i) => i + 1); // Create array from 1 to originalNumber

                      const timer = setInterval(() => {
                        if (numbers.length === 0) {
                          clearInterval(timer);
                        } else {
                          h6Element.textContent = numbers.shift();
                        }
                      }, 100);


                    </script>
                    <span class="text-danger small pt-1 fw-bold">12%</span> <span
                      class="text-muted small pt-2 ps-1">decrease</span>

                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->
        </div>
      </div>
      <div class="col-lg-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Pie Chart About the Vaccine Status</h5>

        <!-- Bubble Chart -->
        <span style="display:none;" id="vac">
          <?php echo $data_v_c['vac'] ?>
        </span>
        <span style="display:none;" id="non_v">
          <?php echo $data_n_v_c['non_v'] ?>
        </span>
        <span style="display:none;" id="missed">
          <?php echo $data_missed['missed'] ?>
        </span>
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
        <!-- End Bubble Chart -->

      </div>
    </div>
  </div>
    </div>
  </section>
</main>
<?php
include('footer.php');
?>