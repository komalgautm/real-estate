@section('title') {{'Maintenance'}} @endsection
@include('admin.components.header')
<style type="text/css">
  
  .information_dataTables div#example_length {
      margin-top: 8px;
      margin-bottom: 0px;
      margin-left: 20px;
  }
  .dataTables_filter {
    right: 38px;
    top: 64px;
}
</style>
 
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->

    <div class="container-fluid">
    <nav class="navbar navbar-main navbar-expand-lg px-0 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Home</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Maintenance Expenses</li>
          </ol>
          <!-- <h6 class="font-weight-bolder mb-0">Partner</h6> -->
        </nav>
      
      </div>
    </nav>
    <!-- End Navbar -->
      <div class="container-fluid pt-1 py-4 px-0">
        
          
          <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
              <div class="card p-4">
                <div class="databaseTableSection pt-0">
                  <div class="grayBgColor p-4 pt-2 pb-2">
                    <div class="row">
                      <div class="col-md-6">
                        <h6 class="font-weight-bolder mb-0 pt-2"><i class="mdi mdi-view-headline"></i>Maintenance Expenses</h6>
                      </div>
                      <div class="col-md-6">                    
                          <div class="">
                            
                          </div>
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
                                <a href="{{ url('/admin/add_maintenance') }}" class="btn button btn-info btn-align" >Add Expenses</a>
                              </div>
                            <table id="example" class="display table-bordered" style="width:100%">
                                <thead>
                                  <tr>
                                    <th>Sr. No.</th>
                                    <th>From</th>
                                    <th>Area</th>
                                    <th>Building Name</th>
                                    <th>Apartment No.</th>
                                    <th>Amount</th>
                                    <th>Maintenance type</th>
                                    <th>Description</th>
                                    <th>Receipt of Payments</th>
                                    <th>Payment Mode</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $i=1; ?>                  
                                    @foreach ($maintenance as $val)
                                      <tr>
                                          <th scope="row"><?php echo $i++; ?></th>
                                          <td><?php if(!isset($val->staff)){
                                            echo "Admin";
                                          } else {
                                            echo $val->staff;
                                          }?> </td>
                                          <td>{{ $val->area_name }}</td>
                                          <td>{{ $val->building_name }}</td>
                                          <td>{{ $val->apartment_id }}</td>
                                          <td>{{ $val->amount }}</td>
                                            @if($val->payment_mode == 1)
                                            <td>Cash</td>
                                            @else
                                            <td>Cheque</td>  
                                            @endif
                                            <td>{{ $val->maintenance_type }}</td>
                                            <td>{{ $val->maintenance_type }}</td>
                                            <td>{{ $val->description }}</td>
                                            <!-- end here -->
                                            <td><a href="{{ url('/admin/edit_maintenanace_data/'.$val->main_id ) }}"><i class="fas fa-edit"></i></a> | <a href="{{ url('/admin/delete_maintenanace'. $val->main_id) }}" onclick="return confirm('Are you sure?')"><i  class="fas fa-trash-alt" style="color: #00ade6;"></i> </a> </td>
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
                                                <h4 class="modal-title">Partner information</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">×</button>
                                              </div>
                                              <div class="modal-body">
                                                <div  class="formProgress"> 
                                                  <div class="formtopcont">
                                                    <p>Lorem ipsum is a placeholder text commonly used.</p>
                                                  </div> 
                                                </div>
                                              <div class="formBgcolor">
                                                  <form action="/action_page.php">
                                                    <div class="formProgress manForm pt-2">
                                                      <div class="mb-3">
                                                        <div class="row">
                                                          <div class="col-md-4">
                                                            <label class="lablePapding" for="email">Business number (ID)</label>
                                                          </div>
                                                          <div class="col-md-8">
                                                            <input type="email" class="form-control" id="email" placeholder="" name="email">
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="mb-3">
                                                        <div class="row">
                                                          <div class="col-md-4">
                                                            <label class="lablePapding" for="email">Partner name</label>
                                                          </div>
                                                          <div class="col-md-8">
                                                            <input type="email" class="form-control" id="email" placeholder="" name="email">
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="mb-3">
                                                        <div class="row">
                                                          <div class="col-md-4">
                                                            <label class="lablePapding" for="email">Mission ID</label>
                                                          </div>
                                                          <div class="col-md-8">
                                                            <input type="email" class="form-control" id="email" placeholder="" name="email">
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="mb-3">
                                                        <div class="row">
                                                          <div class="col-md-4">
                                                            <label class="lablePapding" for="email">Memo</label>
                                                          </div>
                                                          <div class="col-md-8">
                                                            <input type="email" class="form-control" id="email" placeholder="" name="email">
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  
                                                      <div class="formProgressBtn">
                                                        <div class="row">
                                                          <div class="col-md-5">
                                                              <button type="submit" class="btn btn-sm">Cancel</button>
                                                            </div>
                                                            <div class="col-md-7 d-flex justify-content-end popupbtn_mrgn">
                                                             <button type="submit" class="btn btn-sm savepopupbtn">Enrollment</button>
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

    