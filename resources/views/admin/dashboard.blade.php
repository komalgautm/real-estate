@section('title') {{'Dashboard'}} @endsection
@include('admin.components.header')
 
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->

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
                <h4 class="mb-0"><?php echo $users;  ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span><a class="" href="{{url('admin/tenant')}}">More Info</a></p>
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
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span><a class="" href="{{url('admin/building')}}">More Info</a></p>
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
                <h4 class="mb-0">QAR <?php echo $amount_due;  //echo number_format($amount_due, 2, ',', ' ')?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-danger text-sm font-weight-bolder"></span> <a class="" href="{{ url('/admin/payment') }}">More Info</a></p>
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
                <h4 class="mb-0">QAR <?php  echo $maintenance + $payment; ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span><a class="" href="{{ url('admin/payment') }}">More Info</a></p>
            </div>
          </div>
        </div>
      </div>

      <div class="statics_section">
       
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">attach_money</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Current Month Due</p>
                  <h4 class="mb-0">QAR <?php echo $current_month_due; ?></h4>
                </div>
              </div>
               <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"> </span><a class="" href="{{ url('admin/current_month_due'); }}">More Info</a></p>
            </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">                  
                  <i class="material-icons opacity-10">currency_exchange</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Current Month Collected</p>
                  <h4 class="mb-0">QAR <?php echo $current_month_collection; ?></h4>
                </div>
              </div>
               <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span><a class="" href="{{ url('admin/current_month_due'); }}">More Info</a></p>
            </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">keyboard_double_arrow_left</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Cust. Not Paying last 3 mth.</p>
                  <h4 class="mb-0"><?php echo $three_month; ?></h4>
                </div>
              </div> 
               <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span><a class="" href="{{ url('admin/last_three_month_tenant') }}">More Info</a></p>
            </div>            
            </div>
          </div>
          <!-- <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card tooltipExtra">
              <div class="top">
                <ul class="tooltipList">
                    <li>+- Than yesterday</li>
                </ul>
                <i></i>
            </div>
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">calendar_today</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Total Expenses</p>
                  <h4 class="mb-0">QAR <?php //echo $maintenance; ?></h4>
                </div>
              </div>
               <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span><a class="" href="{{ url('/admin/maintenance') }}">More Info</a></p>
            </div>
            </div>
          </div> -->
          <!-- <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card tooltipExtra">
              <div class="top">
                  <ul class="tooltipList">
                      <li> Devide by no of partners (want to see sales average per partner)</li>
                  </ul>
                  <i></i>
              </div>
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">calendar_month</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Others</p>
                  <h4 class="mb-0">Rs. 10,000</h4>
                </div>
              </div>
               <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span><a class="" href="#">More Info</a></p>
              </div>
            </div>
          </div> -->
          <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card tooltipExtra">
              <div class="top">
                  <ul class="tooltipList">
                      <li> Total Maintenanace Expenses</li>
                  </ul>
                  <i></i>
              </div>
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">calendar_month</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Total Maintenance Expenses </p>
                  <h4 class="mb-0">QAR <?php echo $maintenance; ?></h4>
                </div>
              </div>
               <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span><a class="" href="{{ url('/admin/maintenance') }}">More Info</a></p>
            </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-4">
             <div class="card tooltipExtra">
              <div class="top">
                  <ul class="tooltipList">
                      <li>Devide by no of payment terminal, want to see sales average per the payment terminal</li>
                  </ul>
                  <i></i>
              </div>
           
            
            </div>
          </div>
          <!-- <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">auto_graph</i>
                </div>
                <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize"> Monthly Total Sales</p>
                  <h4 class="mb-0">430k</h4>
                </div>
              </div>
               <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+0% </span>check it with last month</p>
            </div>
            </div>
          </div> -->
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

        <!-- <div class="col-lg-6 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-white shadow-dark border-radius-lg py-3 pe-1">
                <div id='myChart'><a class="zc-ref" href="https://www.zingchart.com/">Powered by ZingChart</a></div>
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
                    <select id="linegraphOne" class="form-control">
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

        <div class="col-lg-6 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-white shadow-dark border-radius-lg py-3 pe-1">
                <div id='lineChart2'><a class="zc-ref2" href="https://www.zingchart.com/">Powered by ZingChart</a></div>
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
                    <select id="linegraphTwo" class="form-control">
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
        </div> -->

        <!-- <div class="col-lg-6 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-white shadow-dark border-radius-lg py-3 pe-1">
                 <div id='myChartHorigontal'></div>
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
                    <select id="twoColorGraph" class="form-control">
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
        </div> -->

        <!-- <div class="col-lg-6 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="bg-white shadow-dark border-radius-lg py-3 pe-1">

                <div id="chartContainer" style="height: 360px; width: 100%;"></div>
              
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
                    <select id="fourColorGraph" class="form-control">
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
        </div> -->

      </div><!--  -->

      <div class="row mb-4">
        <!-- <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Top Sales Report</h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">30 done</span> this month
                  </p>
                </div>
                <div class="col-lg-3 col-5 my-auto text-end">
                  <div>
                    <label class="font-weight-bold">Period:</label>
                    <select class="topsaleSelect">
                      <option>1 month </option>
                      <option>2 month </option>
                      <option>3 month </option>
                      <option>4 month </option>
                      <option>5 month </option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-3 col-5 my-auto text-end">
                  <div>
                     <label class="font-weight-bold">Top:</label>
                    <select class="topsaleSelect">
                      <option>10</option>
                      <option>20</option>
                      <option>30</option>
                      <option>40</option>
                      <option>50</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Partner</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Users</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Completion</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-md">Partner</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="avatar-group mt-2">
                           <span class="text-md font-weight-bold">Sales amount </span>                                  
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-md font-weight-bold">% of total sales</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-md font-weight-bold">No of 60%</span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-md">Partner</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="avatar-group mt-2">
                           <span class="text-md font-weight-bold">Sales amount </span>                                  
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-md font-weight-bold">% of total sales</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-md font-weight-bold">No of 60%</span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-md">Partner</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="avatar-group mt-2">
                           <span class="text-md font-weight-bold">Sales amount </span>                                  
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-md font-weight-bold">% of total sales</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-md font-weight-bold">No of 60%</span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-md">Partner</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="avatar-group mt-2">
                           <span class="text-md font-weight-bold">Sales amount </span>                                  
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-md font-weight-bold">% of total sales</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-md font-weight-bold">No of 60%</span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-md">Partner</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="avatar-group mt-2">
                           <span class="text-md font-weight-bold">Sales amount </span>                                  
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-md font-weight-bold">% of total sales</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-md font-weight-bold">No of 60%</span>
                      </td>
                    </tr>
                    <tr>
                     <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-md">Partner</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="avatar-group mt-2">
                           <span class="text-md font-weight-bold">Sales amount </span>                                  
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-md font-weight-bold">% of total sales</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-md font-weight-bold">No of 60%</span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
         -->
      </div>
        <!-- <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Top Sales Report</h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">30 done</span> this month
                  </p>
                </div>
                <div class="col-lg-3 col-5 my-auto text-end">
                  <div>
                    <label class="font-weight-bold">Period:</label>
                    <select class="topsaleSelect">
                      <option>1 month </option>
                      <option>2 month </option>
                      <option>3 month </option>
                      <option>4 month </option>
                      <option>5 month </option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-3 col-5 my-auto text-end">
                  <div>
                     <label class="font-weight-bold">Top:</label>
                    <select class="topsaleSelect">
                      <option>10</option>
                      <option>20</option>
                      <option>30</option>
                      <option>40</option>
                      <option>50</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                       <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Partner</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Users</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Completion</th> 
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-md">Partner</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="avatar-group mt-2">
                           <span class="text-md font-weight-bold">Sales amount </span>                                  
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-md font-weight-bold">% of total sales</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-md font-weight-bold">No of 60%</span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-md">Partner</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="avatar-group mt-2">
                           <span class="text-md font-weight-bold">Sales amount </span>                                  
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-md font-weight-bold">% of total sales</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-md font-weight-bold">No of 60%</span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-md">Partner</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="avatar-group mt-2">
                           <span class="text-md font-weight-bold">Sales amount </span>                                  
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-md font-weight-bold">% of total sales</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-md font-weight-bold">No of 60%</span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-md">Partner</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="avatar-group mt-2">
                           <span class="text-md font-weight-bold">Sales amount </span>                                  
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-md font-weight-bold">% of total sales</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-md font-weight-bold">No of 60%</span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-md">Partner</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="avatar-group mt-2">
                           <span class="text-md font-weight-bold">Sales amount </span>                                  
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-md font-weight-bold">% of total sales</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-md font-weight-bold">No of 60%</span>
                      </td>
                    </tr>
                    <tr>
                     <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-md">Partner</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="avatar-group mt-2">
                           <span class="text-md font-weight-bold">Sales amount </span>                                  
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-md font-weight-bold">% of total sales</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-md font-weight-bold">No of 60%</span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>-->
        
       </div> 
     
    </div>
    </div>
  
  
  @include('admin.components.footer')