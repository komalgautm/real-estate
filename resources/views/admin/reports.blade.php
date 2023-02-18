@section('title') {{'Reports'}} @endsection
@include('admin.components.header')
<style>
  .dataTables_filter {
    right: 34px;
    top: 16px;
}
button.dt-button, div.dt-button, a.dt-button, input.dt-button {
    border: 1px solid rgb(0 173 230) !important;
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Reports</li>
          </ol>
          <!-- <h6 class="font-weight-bolder mb-0">Partner</h6> -->
        </nav>
      
      </div>
    </nav>
    <!-- End Navbar -->
      <div class="container-fluid pt-1 py-4 px-0">
        <div class="row">
           
          </div>
          
          <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
              <div class="card p-4">
                <div class="databaseTableSection pt-0">
                  <div class="grayBgColor p-4 pt-2 pb-2">
                    <div class="row">
                      <div class="col-md-6">
                        <h6 class="font-weight-bolder mb-0 pt-2"><i class="mdi mdi-view-headline"></i>Reports</h6>
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
                                <!-- <a class="btn button btn-info btn-align" id="btnExport">Export</a> -->
                              </div>
                            <table id="example_report" class="display table-bordered" style="width:100%">
                                <thead>
                                  <tr>
                                    <th>Sr. No.</th>
                                    <th>Tenants Name</th>
                                    <th>Rent (Monthly)</th>
                                    <th>Maintenance (Monthly)</th>
                                    <th>Rent Collected</th>
                                    <th>Dues</th>
                                    <th>Maintenance Expenses</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $i=1; ?>
                                  @foreach($users as $userData)
                                  <tr class="rowCursorPointer">
                                    <td><?php echo $i; ?></td>
                                    <td>{{ $userData->name}}</td>
                                    <td>{{$userData->rent }}</td>
                                    <td>{{ $userData->maintenance_fee }}</td>
                                    <td>
                                        <?php 
                                          $payment_value = 0;
                                          $payment = DB::table('payment')->where('user_id', $userData->id)->get();
                                            foreach ($payment as $payment_data) {
                                                $payment = $payment_data->amount;
                                                if(isset($payment)){
                                                   $payment_value += $payment_data->amount;
                                                } else {
                                                   $payment = 0;
                                            }
                                          }
                                          
                                            echo $payment_value;
                                        ?>
                                    </td>
                                    <td>
                                      <?php
                                        if($payment_value == 0 ){
                                          echo $userData->rent + $userData->maintenance_fee;
                                        } else {
                                          echo "0";
                                        }
                                      ?>
                                    </td>
                                    <td>
                                        <?php
                                          $maintenace_amount=0;
                                          $maintenance = DB::table('maintenance')->where('user_id', $userData->id)->get();
         
                                              foreach($maintenance as $maintenace_data){
                                                 $maintenace_amount +=  $maintenace_data->amount;
                                              } 
                                              echo $maintenace_amount;
                                        ?>
                                    </td>
                                    
                                  
                                    <td>{{ $userData->agreement_start_date }}</td>
                                    <td>{{ $userData->agreement_end_date }}</td>
                                  </tr>
                                  <?php $i++; ?>
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
    <script>
      $(document).ready(function() {
          $('#example_report').DataTable( {
              dom: 'Bfrtip',
              buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: { orthogonal: 'export' }
            },
            {
                extend: 'excelHtml5',
                exportOptions: { orthogonal: 'export' }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: { orthogonal: 'export' }
            }
        ]
          } );
      } );
    </script>