

<!DOCTYPE html>

<html lang="en">



<head>

  <meta charset="utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" type="image/png" href="{{ url('/assets/img/favicon.png') }}">

    <title>Admin - @yield('title')</title>


  <link href="{{ url('/assets/css/nucleo-icons.css') }}" rel="stylesheet" />

  <link href="{{ url('/assets/css/nucleo-svg.css') }}" rel="stylesheet" />

  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

  <link id="pagestyle" href="{{ url('/assets/css/material-dashboard.css?v=3.0.0') }}" rel="stylesheet" />

  <link id="pagestyle" href="{{ url('/assets/css/admin_style.css') }}" rel="stylesheet" />

  <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/6.5.95/css/materialdesignicons.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

  <link id="pagestyle" href="{{ url('/assets/css/style.css') }}" rel="stylesheet" />



   

</head>

<style>

  .dropdown.dropdown-hover:hover > .dropdown-menu:before, .dropdown .dropdown-menu.show:before {

    left:89%;

  }

  .btn-align{
    margin-top: 14px;
    margin-right: 37px;
  }

  .dataTables_filter {
    position: absolute;
    right: 47px;
    top: 78px;
  }

  [type="search"] {
    margin-left: 10px;
  }

  .dataTables_paginate {
    float: right;
  }

  #time_start {
    margin-left: 45px !important;
  }

  .information_dataTables table tbody tr td {
    padding: 10px 18px;
  }

  .thead, tbody, tfoot, tr, td, th {
    text-align: start;
  }

  .sorting_1 {
    padding-left: 18px;
  }
 .included_Excluded input[type="checkbox"] {
    margin-left: 10px;
}
.included_Excluded .input_label_padding_top {
    padding-top: 10px;
    margin-right: 8px;
}
input[type="checkbox"] {
    width: 20px;
    height: 20px;
}
.input_label_padding_top {
    padding-right: 20px;
    align-items: center;
    display: flex;
}
label.input_label_padding_top input {
    margin-right: 8px;
}

.dataTables_paginate {
    text-align: right;
    display: inline-block;
}
.dataTables_wrapper .dataTables_info {
    margin-top: 12px;
    display: inline-block;
    margin-left: 18px;
}
.information_dataTables .dataTables_length select {
    width: 82px;
    height: 28px;
}
.information_dataTables div#example_length {
    margin-top: 8px;
    margin-bottom: 0px;
    margin-left: 20px;
}
.dataTables_filter {
    right: 38px;
    top: 64px;
}
.tableTopName {
    padding: 10px 20px;
    border-bottom: 1px solid #dddbdb;
}
.staff_img{
  width: 60px;
  height: 60px;
  margin: 2px 0;
  border: 1px solid #aaa;
  padding: 2px;
  border-radius: 50%;
  overflow: hidden;
}
.staff_img img{
  width: 100%;
  height: 100%;
  border-radius: 50%;
}
.information_dataTables table.staff_profile tbody tr td {
    padding: 0px 18px;
}
.nameTotalDue {
    display: flex;
    padding: 10px 24px;
    border-bottom: 1px solid #e5e5e5;
}
.nameTotalDue span.errowIcon{
  font-size: 17px;
  font-weight: 800;
  color: #000;
}
.userName{
  margin-right: 10px;
}
.paymentCheck_img img {
    width: 100%;
    height: 100%;
}
.paymentCheck_img {
    width: 70px;
    height: 50px;
    border: 1px solid #aaa;
    padding: 1px;
}

div.dt-buttons {
    float: left;
    padding-left: 20px;
}
button.dt-button.buttons-html5 {
    background: #00ade6 !important;
    color: #fff;
    padding: 7px 30px;
    font-size: 0.75rem;
    border-radius: 0.5rem;
    margin-top: 4px;
    border-color: none !important;
}
button.dt-button.buttons-html5:hover, button.dt-button.buttons-html5:hover {
  background: #00ade6 !important;
    border-color: none !important;
    box-shadow: 0 14px 26px -12px rgb(26 115 232 / 40%), 0 4px 23px 0 rgb(26 115 232 / 15%), 0 8px 10px -5px rgb(26 115 232 / 20%);
}

</style>



<body class="g-sidenav-show  bg-gray-200" >



  <header class="topbaar">

    <div class="container-fluid">

      <div class="logosection">

        <div class="d-flex justify-content-between">

          <div class="logobrand">

            <a href="{{url('admin/dashboard')}}"><img src="{{ url('/assets/img/logo.png') }}" alt="logo"> </a>

          </div>

          <div class="navigationbg pt-2">

            <div class="container">

               <div class="main_navbg">

                   <nav class="navbar navbar-expand-lg">

                  <div class="">

                      <a href="#!" class="nav-link d-xl-none d-lg-none text-body p-0 menuBtn" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">

                          <div class="sidenav-toggler-inner">

                            <i class="sidenav-toggler-line"></i>

                            <i class="sidenav-toggler-line"></i>

                            <i class="sidenav-toggler-line"></i>

                          </div>

                      </a>

                    <div class="collapse navbar-collapse" id="collapsibleNavbar">

                      <ul style="position: relative;" class="navbar-nav main_menu">

                      <li class="nav-item dropdown dropdown_position">

                      </li>

                        <li class="nav-item"><a class="nav-link" href="{{url('admin/dashboard')}}"><i class="mdi mdi-account-details-outline"></i> Dashboard</a></li>

                        <li class="nav-item"><a class="nav-link" href="{{url('admin/staff')}}"><i class="mdi mdi-account-cog-outline"></i> Staff</a></li>

                        <!-- <li class="nav-item dropdown dropdown_position">
                          <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown"><i class="mdi mdi-account-cog-outline"></i> Staff<i class="mdi mdi-chevron-down"></i></a> 
                            <ul  class="dropdown-menu drpmenu">
                                <li><a class="dropdown-item" href="{{url('admin/city')}}">Staff</a></li>
                                <li><a class="dropdown-item" href="{{url('admin/area')}}">Permission</a></li>
                            
                            </ul>
                        </li> -->


                        <li class="nav-item"><a class="nav-link" href="{{url('admin/tenant')}}"><i class="mdi mdi-account-cog-outline"></i> Tenants</a></li>

                        <li class="nav-item"><a class="nav-link" href="{{url('admin/payment')}}"><i class="mdi mdi-sale"></i> Payments</a></li>

                        <li class="nav-item"><a class="nav-link" href="{{url('admin/maintenance')}}"><i class="mdi mdi-card-account-details-outline"></i> Maintenance Expenses</a></li>

                        <li class="nav-item"><a class="nav-link" href="{{url('admin/report')}}"><i class="mdi mdi-briefcase-edit-outline"></i> Reports</a></li>

                        <li class="nav-item dropdown dropdown_position">

                      <a class="nav-link dropdown-toggle" href="{{url('admin/dashboard')}}" role="button" data-bs-toggle="dropdown"><i class="mdi mdi-account-cog-outline"></i> More<i class="mdi mdi-chevron-down"></i></a> 

                          <ul style="left: -476px; top: 10px;" class="dropdown-menu drpmenu">

                              <li><a class="dropdown-item" href="{{url('admin/city')}}">Cities</a></li>

                              <li><a class="dropdown-item" href="{{url('admin/area')}}">Area</a></li>

                              <li><a class="dropdown-item" href="{{url('admin/building')}}">Buildings</a></li>

                              <li><a class="dropdown-item" href="{{url('admin/apartment')}}">Apartments</a></li>

                          </ul>

                        </li>

                      </ul>

                    </div>

                  </div>

                </nav>

               </div>       

            </div>

          </div>

          <div class="mainProfile">

            <ul class="navbar-nav  justify-content-end">

              <li><span id="time_start"></span></li>

              <li class="nav-item dropdown adminProfile pe-2 d-flex align-items-center">

             

                <a href="javascript:;" class="nav-link d-flex p-0 dropdown-toggle" id="dropdownSettingButton" data-bs-toggle="dropdown" aria-expanded="false">

                 <span class="profileImg"><img src="{{ url('/assets/img/avatar.jpg') }}"></span>

                 

                  <span class="proName"><?php echo session('adminUser') ;?></span>

                </a>

                <ul class="dropdown-menu  dropdown-menu-end me-sm-n4" aria-labelledby="dropdownSettingButton">

                  <li class="profiledropMenu"><a class="dropdown-item border-radius-md" href="{{ url('/admin/set_password') }}">Set Password</a> </li>

                  <li class="profiledropMenu"> <a class="dropdown-item border-radius-md" href="{{url('admin/logout')}}"> Logout  </a> </li>                 

                </ul>

              </li>

            </ul>

          </div>

        </div>

      </div>

    </div>    

  </header>