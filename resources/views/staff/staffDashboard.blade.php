@include('staff.staffcomponents.staffHeader')


    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  
    <div class="container-fluid">
    <nav class="navbar navbar-main navbar-expand-lg px-0  shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
        </nav>
        
      </div>
    </nav>
  
    <!-- End Navbar -->
    <div class="container-fluid py-4 px-0">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">people</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Tenants</p>
                <h4 class="mb-0"><?php echo $total_tenant;  ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span><a class="" href="{{url('/staff/tenents')}}">More Info</a></p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person_add_alt_1</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Buildings</p>
                <h4 class="mb-0"><?php echo $building; ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span><a class="" href="#{{url('admin/building')}}">More Info</a></p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">add_card</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Amount Due</p>
                <h4 class="mb-0">QAR  {{ $amount_due }}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-danger text-sm font-weight-bolder"></span> <a class="" href="#">More Info</a></p>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">web</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Amount Collected</p>
                <h4 class="mb-0">QAR {{ $maintenance + $payment}}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span><a class="" href="#">More Info</a></p>
            </div>
          </div>
        </div>
      </div>

     


      <div class="row mt-4">
        <div class="col-lg-7 col-md-7 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-7">
                  <h6 class="mb-0 ">Monthly updated</h6>
                  <p class="text-sm ">Total Sales: above #6 for 1 year / by partner</p>
                </div>
                <div class="col-md-5">
                  <div>
                    <select id="monthlygraph" class="form-control">
                      <option value="" selected hidden> --Select Sports--</option>
                      <option></option>
                    </select>
                  </div>
                </div>
              </div>
              <hr class="dark horizontal mt-0">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-md-5 mt-4 mb-4">
          <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                <div class="chart">
                  <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-7">
                  <h6 class="mb-0 "> Daily updated </h6>
                  <p class="text-sm "> Total Sales : above #6 for 1 week </p>
                </div>

                <div class="col-md-5">
                  <div>
                    <select id="dailyUpdated" class="form-control">
                      <option value="" selected hidden> --Select Sports--</option>
                      <option></option>
                    </select>
                  </div>
                </div>
              </div>
              <hr class="dark horizontal mt-0">
              <div class="d-flex ">
                <i class="material-icons text-sm my-auto me-1">schedule</i>
                <p class="mb-0 text-sm"> updated 4 min ago </p>
              </div>
            </div>
          </div>
        </div>

       </div>        
   
       </div> 
     
    </div>
  
  
  @include('staff.staffcomponents.staffFooter')