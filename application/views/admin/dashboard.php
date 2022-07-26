<div class="container-fluid">
  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Elektronik</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stok["el"] ?></div>
            </div>
            <div class="col-auto">
              <i class="fa fa-cart-plus fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pakaian Pria</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stok["pp"] ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-cart-plus fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pakaian Wanita</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $stok["pw"] ?></div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-cart-plus fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Olah Raga</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stok["ol"] ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-cart-plus fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bar Chart JS -->
  <div class="card shadow col-md-6 mb-4" height="50px">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Pie Chart</h6>
    </div>
    <div class="card-body">
      <div>
        <canvas id="myChart"></canvas>
      </div>
      <hr>
      Styling for the bar chart can be found in the
      <code>/js/demo/chart-bar-demo.js</code> file.
    </div>
  </div>


  <!-- Content Row -->

</div>
<script>
  const labels = [
    'Pakaian Anak',
    'Pakaian Wanita',
    'Pakaian Pria',
    'Elektronik',
    'Olahraga',
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'My First dataset',
      backgroundColor: ['#b19cd9', '#ffd1dc', '#fdfd96', '#77dd77', '#aec6cf'],
      // borderColor: 'rgb(255, 99, 132)',
      data: [0, 4, 5, 2, 20, 30],
    }]
  };

  const config = {
    type: 'pie',
    data: data,
    options: {}
  };

  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>