@include('admin.components.header')
 
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->

    <div class="container-fluid">
    <nav class="navbar navbar-main navbar-expand-lg px-0 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Home</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Current Month Due</li>
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
                        <h6 class="font-weight-bolder mb-0 pt-2"><i class="mdi mdi-view-headline"></i>Current Month Due </h6>
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
                                <!-- <a href="{{ url('/admin/addCity') }}" class="btn button btn-info" >Add City</a> -->
                              </div>
                              <table id="example" class="display table-bordered" style="width:100%">
                                <thead>
                                  <tr>
                                    <th>Sr. No.</th>
                                    <th>Tenant Name</th>
                                    <th>Current Month Due</th>
                                    <th>Current Month Collection</th>
                                    <th>Rent</th>
                                    <th>Maintenance</th>
                                   
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $i=1; ?>
                                  @foreach($user as $userData)
                                  <tr>
                                    <td><?php echo $i; ?></td>
                                  
                                    <td>{{ $userData->name }}</td>
                                 
                                      <!-- current_month_due = 264200 -->
                                      <?php 
                                        $due = 0;
                                        $amount =0;
                                        $currentMonth = date('m');
                                        $payment = DB::table('payment')->where('user_id', $userData->id)->where('current_month',$currentMonth);
                                     
                                        if($payment->count()==0){
                                          $due = $due+$userData->rent+$userData->maintenance_fee;
                                        
                                        }else{
                                           $amount=$amount+$userData->rent+$userData->maintenance_fee;
                                        }
                                    ?>

                                    <td>
                                      <?php 
                                          if(isset($due)){
                                            echo $due;
                                          } else{
                                            echo "0";
                                          }
                                      ?>
                                    </td>

                                    <td>
                                      <?php if(isset($amount)){
                                          echo $amount;
                                        } else {
                                          echo "0";
                                        }
                                        ?>
                                    </td>
                                    
                                    <td>{{ $userData->rent }}</td>
                                    <td>{{ $userData->maintenance_fee }}</td>
                                    
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

    <!-- <script type="text/javascript">

        $(document).ready(function() {

            $('#exampleCity').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                            "type" : "GET",
                            "url" : "{{ url('/admin/getcity') }}",  
                            "dataSrc": function ( json ) {
                                //Make your callback here.
                                alert(json.recordsFiltered);
                                
                                // return json.data;
                            },
                            "columns": [
                                { "data": "city_name_ar " },
                                { "data": "city_name_en" },
                                { "data": "id" },
                                { "data": "status" }
                      ]
                    }
                
            } );

        } );

        </script>
 -->
