@section('title') {{'Staff'}} @endsection
@include('admin.components.header')
 
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->

    <div class="container-fluid">
    <nav class="navbar navbar-main navbar-expand-lg px-0 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Home</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Staff</li>
          </ol>
          <!-- <h6 class="font-weight-bolder mb-0">Partner</h6> -->
        </nav>
      
      </div>
    </nav>
    <!-- End Navbar -->
      <div class="container-fluid pt-1 py-4 px-0">
        <!-- <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
              <div class="card p-2 px-4">
                <form action="" class="information_form">
             
               
                  <div class="row mt-3">
                    <div class="col-md-2">
                      <label class="input_label_padding_top">Search</label>
                    </div>
                    <div class="col-md-3">
                      <div class="input-group">
                        <select class="classic form-select select_options align-left">
                          <option>Please select an items</option>
                          <option>Reseller2</option>
                          <option>Reseller2</option>
                          <option>No wrapper</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Please enter only if you want to change it.">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="input-group">
                        <button type="button" class="btn btn-outline-success allBtnsize">Search</button>
                      </div>
                    </div>
                  </div>
           
                </form>
              </div>
            </div>
        </div> -->
          
          <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
              <div class="card p-4">
                <div class="databaseTableSection pt-0">
                  <div class="grayBgColor p-4 pt-2 pb-2">
                    <div class="row">
                      <div class="col-md-6">
                        <h6 class="font-weight-bolder mb-0 pt-2"><i class="mdi mdi-view-headline"></i>Staff</h6>
                      </div>
                    </div>
                  </div>

                  <!-- End databaseTableSection -->
                  <div class="top-space-search-reslute">
                    <div class="tab-content pt-0 pb-0">
                      <div class="tab-pane active" id="header" role="tabpanel">
                          <div id="datatable_wrapper" class="information_dataTables dataTables_wrapper dt-bootstrap4 table-responsive">
                                            <!-----------------------------table data----------------------->
                              <div class="d-flex exportPopupBtn">
                                <a href="{{ url('/admin/addStaff') }}" class="btn button btn-info  btn-align">Add Staff</a>
                              </div>
                            <table id="example" class="display table-bordered staff_profile" style="width:100%">
                                <thead>
                                  <tr>
                                    <th>Sr. No.</th>
                                    <th>Profile</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <td>Manage Staff</td>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($staff as $key => $val)
                                      <tr>
                                        <th scope="row">{{++$key}}</th>
                                        <td>
                                          <div class="staff_img">
                                              <img src="{{ url('assets/img/staff_profile/'.$val->staff_iamge)}}" alt="profile Pic">
                                          </div>
                                        </td>
                                        <td>{{ $val->name}}</td>
                                        <td>{{ $val->email}}</td>
                                        <td>{{ $val->mobile}}</td>
                                        <td><a href="{{ url('admin/permission'.$val->id)}} " style="color: #00ade6;">Permission</a></td>
                                      
                                        <td>
                                          <!-- 1 for active staff and 0 for inactive staff -->
                                          <div class="material-switch">
                                              <?php if( $val->staff_status == 1 ){
                                                      echo "Active"; 
                                                    } if($val->staff_status == 0) {
                                                      echo "Inactive";
                                                    }   
                                              ?>
                                          </div>
                                        </td>

                                        <td><a href="{{ url('/admin/edit_staff_data'.$val->id ) }}"><i class="fas fa-edit"></i></a> | <a href="{{ url('/admin/delete_staff_data'. $val->id) }}" onclick="return confirm('Are you sure?')"><i  class="fas fa-trash-alt" style="color: #00ade6;"></i> </a></td>
                                      </tr>
                                  
                                      @endforeach
                                </tbody>
                            </table>
                              <!-- The Modal -->
                              <div class="modal-box modalPopupCenter">
                                  <!-- Modal -->
                                 
                                  <div class="modal fade" id="myModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Staff</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">×</button>
                                              </div>
                                              <div class="modal-body">
                                              <div class="formBgcolor">
                                                  <form action="/action_page.php">
                                                    <div class="formProgress manForm pt-2">
                                                      <div class="mb-3">
                                                        <div class="row">
                                                          <div class="col-md-4">
                                                            <label class="lablePapding" for="email">Staff Name</label>
                                                            <input type="text" value="{{ $val->name }}">
                                                          </div>
                                                          <div class="col-md-8">
                                                            <input type="email" class="form-control" id="email" placeholder="" name="email">
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="mb-3">
                                                        <div class="row">
                                                          <div class="col-md-4">
                                                            <label class="lablePapding" for="email">Mobile</label>
                                                          </div>
                                                          <div class="col-md-8">
                                                            <input type="email" class="form-control" id="email" placeholder="" name="email">
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="mb-3">
                                                        <div class="row">
                                                          <div class="col-md-4">
                                                            <label class="lablePapding" for="email">Email</label>
                                                          </div>
                                                          <div class="col-md-8">
                                                            <input type="email" class="form-control" id="email" placeholder="" name="email">
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="row mt-1">
                                                        <div class="col-md-12">
                                                          <label class="input_label_padding_top">Permission</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                          <div class="input-group">
                                                            <label class="input_label_padding_top"><input type="checkbox" name="tenents_permission" class="" placeholder="">Tenents</label>                        
                                                            <label class="input_label_padding_top"><input type="checkbox" name="payment_permission" class="" placeholder="">Payments</label>
                                                            <label class="input_label_padding_top"><input type="checkbox" name="maintenance_pemission" class="" placeholder="">Maintenance Expenses</label>
                                                            <label class="input_label_padding_top"><input type="checkbox" name="location_permission" class="" placeholder="">Location</label>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="row mt-1">
                                                        <div class="col-md-12">
                                                          <label class="input_label_padding_top">Profile</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                          <div class="input-group">
                                                            <input type="file" name="uploadfile" class="form-control" placeholder="">
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="row mt-3">
                                                        <div class="col-md-12">
                                                          <label class="input_label_padding_top">Password</label>
                                                        </div>
                                                        <div class="col-md-12">
                                                          <div class="input-group">
                                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password.">
                                                          </div>
                                                        </div>
                                                      <div class="formProgressBtn">
                                                        <div class="row">
                                                          <div class="col-md-5">
                                                              <button type="submit" class="btn btn-sm">Cancel</button>
                                                            </div>
                                                            <div class="col-md-7 d-flex justify-content-end popupbtn_mrgn">
                                                             <button type="submit" class="btn btn-sm savepopupbtn">Save</button>
                                                            </div>
                                                          </div>
                                                        </div>
                                                     
                                                      
                                                    </form>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                            <!----------------------------- table data end---------------------------------->

                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       
  


        </div>
      </div>
    </div>


    @include('admin.components.footer')