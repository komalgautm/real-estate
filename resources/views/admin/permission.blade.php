@include('admin.components.header')

 
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->

    <div class="container-fluid">
    <nav class="navbar navbar-main navbar-expand-lg px-0 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Home</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Permission</li>
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
                        <h6 class="font-weight-bolder mb-0 pt-2"><i class="mdi mdi-view-headline"></i>Permission</h6>
                      </div>
                      <div class="col-md-6">                    
                       
                      </div>
                    </div>
                  </div>

                  <!-- End databaseTableSection -->
                  <div class="top-space-search-reslute">
                    <div class="tab-content">
                      <div class="tab-pane active" id="header" role="tabpanel">
                          <div id="datatable_wrapper" class="information_dataTables dataTables_wrapper dt-bootstrap4 table-responsive">
                                            <!-----------------------------table data----------------------->
                              <div class="d-flex exportPopupBtn">
                                <!-- <a href="#!" class="btn button btn-info" data-bs-toggle="modal" data-bs-target="#myModal">Enrollment</a> -->
                              </div>
                              <form action="{{ url('/admin/edit_permission') }}" method="post">
                                @csrf
                              <table id="" class="table-bordered dataTable no-footer" style="width:100%">

                                <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>">
                                <thead>
                                  <tr>
                                    <th>Sr. No.</th>
                                    <th>Permissions</th>
                                    <th>Add</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>View</th>
                                  </tr>
                                </thead>
                                <tbody>

                               
                                  @foreach($permission as $permission_data)
                                    <tr>
                                      <td>1</td>
                                        <?php  $staff = explode(",",$permission_data->staff);  ?>
                                        <td>Staff</td>
                                        <?php if($staff[0] == "1") { ?>
                                          <td><input type="checkbox" checked  name="staff1"></td>
                                        <?php }  else { ?>
                                          <td><input type="checkbox"  name="staff1"></td>
                                        <?php } ?>

                                        <?php if($staff[1] == "1") { ?>
                                          <td><input type="checkbox" checked  name="staff2"></td>
                                        <?php }  else { ?>
                                          <td><input type="checkbox"  name="staff2"></td>
                                        <?php } ?>

                                        <?php if($staff[2] == "1") { ?>
                                          <td><input type="checkbox" checked  name="staff3"></td>
                                        <?php }  else { ?>
                                          <td><input type="checkbox"  name="staff3"></td>
                                        <?php } ?>
                                        <td><input type="checkbox" class="view" checked id="staff_view" name="staff4" onchange="myFunction()"></td>
                                    </tr>
                                    <tr>
                                      <td>2</td>
                                        <?php $payment = explode(",",$permission_data->payment);  ?>
                                        <td>Payment</td>

                                        <?php if($payment[0] == "1") { ?>
                                          <td><input type="checkbox" checked name="payment1"></td>
                                        <?php }  else { ?> 
                                          <td><input type="checkbox" name="payment1"></td>
                                       <?php  } ?>

                                        <?php if($payment[1] == "1") { ?>
                                          <td><input type="checkbox" checked name="payment2"></td>
                                        <?php }  else { ?> 
                                          <td><input type="checkbox" name="payment2"></td>
                                       <?php  } ?>

                                       <?php if($payment[2] == "1") { ?>
                                          <td><input type="checkbox" checked name="payment3"></td>
                                        <?php }  else { ?> 
                                          <td><input type="checkbox" name="payment3"></td>
                                       <?php  } ?>
                                      <td><input type="checkbox" class="view" checked id="payment_view" name="payment4" onchange="myFunction()"></td>
                                      
                                    </tr>
                                    <tr>
                                      <td>3</td>
                                      <?php $tenant = explode(",",$permission_data->tenant);  ?>
                                        <td>Tenant</td>
                                          <?php if($tenant[0]=="1"){ ?>
                                            <td><input type="checkbox" checked name="tenant1"></td>    
                                           <?php }  else { ?>
                                            <td><input type="checkbox"  name="tenant1"></td>
                                           <?php } ?>

                                           <?php if($tenant[1]=="1"){ ?>
                                            <td><input type="checkbox" checked name="tenant2"></td>    
                                           <?php }  else { ?>
                                            <td><input type="checkbox"  name="tenant2"></td>
                                           <?php } ?>

                                           <?php if($tenant[2]=="1"){ ?>
                                            <td><input type="checkbox" checked name="tenant3"></td>    
                                           <?php }  else { ?>
                                            <td><input type="checkbox"  name="tenant3"></td>
                                           <?php } ?>
                                            <td><input type="checkbox" class="view" checked id="tenant_view" name="tenant4" onchange="myFunction()"></td>
                                          
                                      </tr>
                                    <tr>
                                      <td>4</td>
                                      <?php $maintenance = explode(",",$permission_data->maintenance);  ?>
                                        <td>Maintenance Expenses</td>
                                            <?php if($maintenance[0] == "1") {  ?>
                                              <td><input type="checkbox"checked name="maintenance1"></td>
                                           <?php  } else { ?>
                                              <td><input type="checkbox"  name="maintenance1"></td>
                                            <?php } ?>
                                            
                                            <?php if($maintenance[1] == "1") {  ?>
                                              <td><input type="checkbox"checked name="maintenance2"></td>
                                           <?php  } else { ?>
                                              <td><input type="checkbox"  name="maintenance2"></td>
                                            <?php } ?>

                                            <?php if($maintenance[2] == "1") {  ?>
                                              <td><input type="checkbox"checked name="maintenance3"></td>
                                           <?php  } else { ?>
                                              <td><input type="checkbox"  name="maintenance3"></td>
                                            <?php } ?>
                                            <td><input type="checkbox" class="view" checked id="maintenance_view" name="maintenance4" onchange="myFunction()"></td>
                                           
                                      
                                        
                                    </tr>
                                  @endforeach
                                </tbody>
                                </table>
                                <button type="submit" id="permission" class="btn btn-outline-success allBtnsize m-3 mb-0" >Give Permission</button>
                              </form>
                            
                              <!-- The Modal -->
                            
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
         function myFunction() {
          let permitionBtn = document.getElementById('permission');
          let staf = document.getElementById('staff_view');
          let payment = document.getElementById('payment_view');
          let tenant = document.getElementById('tenant_view');
          let maintenanceExpenses = document.getElementById('maintenance_view');

          const tempArray = [
            staf,
            payment,
            tenant,
            maintenanceExpenses
          ] 

          for(let i = 0; i< tempArray.length; i++){
            if(tempArray[i].checked === false){
              alert("Please Select all view");
              permitionBtn.setAttribute('disabled', '');
              return false
            }else{
              if(i === 3){
                permitionBtn.removeAttribute('disabled');
                return true
              }
            }
          }
         }
        myFunction()

    </script>