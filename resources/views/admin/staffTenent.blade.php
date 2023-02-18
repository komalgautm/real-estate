@include('staff.staffcomponents.staffHeader')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->

    <div class="container-fluid">
    <nav class="navbar navbar-main navbar-expand-lg px-0 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Home</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tenant</li>
          </ol>
          <!-- <h6 class="font-weight-bolder mb-0">Partner</h6> -->
        </nav>
      
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid pt-1 py-4 px-0">
        <div class="row">
             <div class="col-lg-12 col-md-12 mb-4">
              <div class="card p-2 px-4">
                <form action="" class="information_form">
                  <div class="row mt-3">
                    <div class="col-md-2"> 
                      <label class="input_label_padding_top">Search Tenant By Building</label>
                    </div>
                    <div class="col-md-2">
                      <div class="input-group">
                        <select id="city" name="city" class="classic form-select select_options align-left">
                         
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="input-group">
                        <select id="area" name="area" class="classic form-select select_options align-left">
                       
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="input-group">
                        <select id="building" name="building" class="classic form-select select_options align-left">
                         
                        </select>
                      </div>
                    </div>
                    
                    <div class="col-md-2">
                      <div class="input-group">
                        <button type="button" id="search_tenant" class="btn btn-outline-success allBtnsize">Search</button>
                      </div>
                    </div>
                  </div>
           
                </form>
              </div>
            </div>  
          </div>
          
          <div class="row">
            <div class="col-lg-12 col-md-12 mb-4">
              <div class="card p-4">
                <div class="databaseTableSection pt-0">
                  <div class="grayBgColor p-4 pt-2 pb-2">
                    <div class="row">
                      <div class="col-md-6">
                        <h6 class="font-weight-bolder mb-0 pt-2"><i class="mdi mdi-view-headline"></i>Tenant</h6>
                      </div>
                      <div class="col-md-6">                    
                          <div class="">
                            
                          </div>
                      </div>
                    </div>
                  </div>
                  <?php   $tenant = explode(",",$tanant_permission); 
                          $add = $tenant[0]; 
                          $edit = $tenant[1];
                          $delete = $tenant[2]; 
                          $view = $tenant[3];
                  ?>
                  <!-- End databaseTableSection -->
                  <div class="top-space-search-reslute">
                    <div class="tab-content p-4 pt-0 pb-0">
                      <div class="tab-pane active" id="header" role="tabpanel">
                          <div id="datatable_wrapper" class="information_dataTables dataTables_wrapper dt-bootstrap4 table-responsive">
                                            <!-----------------------------table data----------------------->
                              <div class="d-flex exportPopupBtn">
                                <?php if($add == 1){ ?>
                                  <a href="{{ url('/staff/addtenant') }}" class="btn button btn-info btn-align" >Add Tenants</a>
                                <?php  }?>
                               
                              </div>
                            <table id="table_id" class="display table-bordered" style="width:100%">
                                <thead>
                                  <tr>
                                  <th>Sr. No.</th>
                                    <th>Tenant Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>City</th>
                                    <th>Area</th>
                                    <th>Building Name</th>
                                    <th>Apartment No.</th>
                                    <th>Rent (Monthly)</th>
                                    <th>Maintenance Fee (Monthly)</th>
                                    <th>Agreement Start Date</th>
                                    <th>Agreement End Date</th>
                                    <th>Agreement</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                 
                                </tbody>
                            </table>
                              <!-- The Modal -->
                              <div class="modal-box modalPopupCenter">
                                  <!-- Modal -->
                                  <div class="modal fade" id="myModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                      <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Tenants Details</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal">×</button>
                                              </div>
                                              <div class="modal-body">
                                               
                                                </div>
                                              <div class="formBgcolor">
                                                  <form action="/action_page.php">
                                                    <div class="formProgress manForm pt-2">
                                                      <div class="mb-3">
                                                        <div class="row">
                                                          <div class="col-md-4">
                                                            <label class="lablePapding" for="email">Tenants Name</label>
                                                          </div>
                                                          <div class="col-md-8">
                                                            <input type="email" class="form-control" id="email" placeholder="" name="email">
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="mb-3">
                                                        <div class="row">
                                                          <div class="col-md-4">
                                                            <label class="lablePapding" for="email">Contact</label>
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
                                                      <div class="mb-3">
                                                        <div class="row">
                                                          <div class="col-md-4">
                                                            <label class="lablePapding" for="email">Area</label>
                                                          </div>
                                                          <div class="col-md-8">
                                                            <input type="email" class="form-control" id="email" placeholder="" name="email">
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="mb-3">
                                                        <div class="row">
                                                          <div class="col-md-4">
                                                            <label class="lablePapding" for="email">Building</label>
                                                          </div>
                                                          <div class="col-md-8">
                                                            <input type="email" class="form-control" id="email" placeholder="" name="email">
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="mb-3">
                                                        <div class="row">
                                                          <div class="col-md-4">
                                                            <label class="lablePapding" for="email">Apartment Name</label>
                                                          </div>
                                                          <div class="col-md-8">
                                                            <input type="email" class="form-control" id="email" placeholder="" name="email">
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="mb-3">
                                                        <div class="row">
                                                          <div class="col-md-4">
                                                            <label class="lablePapding" for="email">Aggrement Start Date</label>
                                                          </div>
                                                          <div class="col-md-8">
                                                            <input type="date" class="form-control" id="email" placeholder="" name="email">
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="mb-3">
                                                        <div class="row">
                                                          <div class="col-md-4">
                                                            <label class="lablePapding" for="email">Aggrement End Date</label>
                                                          </div>
                                                          <div class="col-md-8">
                                                            <input type="date" class="form-control" id="email" placeholder="" name="email">
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="mb-3">
                                                        <div class="row">
                                                          <div class="col-md-4">
                                                            <label class="lablePapding" for="email">Aggrement</label>
                                                          </div>
                                                          <div class="col-md-8">
                                                            <input type="file" class="form-control" id="email" placeholder="" name="email">
                                                          </div>
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
    @include('staff.staffcomponents.staffFooter')

  <script>
        $(document).ready(function(){
          let i = 1;
            $('#table_id').DataTable({
                "processing": true,
                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                ajax: {
                    url: '{{ url("/staff/get_all_tenants") }}',
                    dataSrc: 'tenants'
                },
                "columns": [
                        {
                        "render": function(data, type, full, meta) {
                          return i++;
                        } },
                        { "data": "name" },
                        { "data": "email" },
                        { "data": "contact" },
                        { "data": "city_name" },
                        { "data": "area_name" },
                        { "data": "building_name" },
                        { "data": "apartment" },
                        { "data": "rent" },
                        { "data": "maintenance_fee" },
                        { "data": "agreement_start_date" },
                        { "data": "agreement_end_date" },
                        {"mRender": function ( data, type, row, meta ) {
                            return '<a href=<?=url('assets/img/agreement/')?>/'+row.agreement+' target="_blank">'+row.agreement+'</a>';}
                        },
                        {"mRender": function ( data, type, row ) {
                          
                            return `<a href={{url("admin/edit_tenant/")}}${row.users_id}>
                              <i class="fas fa-edit"></i></a> 
                              || <a href={{ url("/admin/delete_tenant/") }}${row.users_id} onclick="return confirm('Are you sure?')">
                              <i class="fas fa-trash-alt" style="color: #00ade6;"></i></a>`;
                            }
                        },
                    ]
            });
            $.ajax({
                type: "get",
                url: "{{ url('/staff/get_all_city')}}",
                dataType: "json",
                async:false,
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                success: function( data ) {
                    console.log(data);
                    $('#city').append($('<option>', {value:0, text: "Select City"}));
                    for (var i = 0; i < data.length; i++) {
                        $('#city').append($('<option>', {value:data[i]['id'], text:data[i]['city_name']}));
                    }
                    if (data.error == "true") 
                    {
                        alert("An error occurred: " & data.errorMessage);
                    }
                }
            });     
            $('#city').change(function(){
              id = this.value;
              // alert(id);
              $.ajax({
                
                url: "{{ url('/staff/get_area_data_ajax')}}" + '/' + id,
                dataType: "json",
                async:false,
                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                success: function( data ) {
                    console.log(data);
                    $('#area').append($('<option>', {value:0, text:"Select Area"}));
                    for (var i = 0; i < data.length; i++) {
                        $('#area').append($('<option>', {value:data[i]['id'], text:data[i]['area_name']}));
                    }
                    if (data.error == "true") 
                        {
                            alert("An error occurred: " & data.errorMessage);
                        }
                       
                }
            });
            });
            $('#area').change(function(){
              var city = $('#city').val();
              var area = $('#area').val();
              var token = "<?=csrf_token()?>";
              $.ajax({
                type: "POST",
                url: "{{ url('/staff/get_building_data_area_ajax')}}",
                data: {city_id: city , area_id: area, _token:token },
                dataType: "json",
                async:false,
                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                  success: function( data ) {
                    console.log(data);
                    $('#building').append($('<option>', {value:0, text:"Select"}));
                    for (var i = 0; i < data.length; i++) {
                        $('#building').append($('<option>', {value:data[i]['id'], text:data[i]['building_name']}));
                    }
                    if (data.error == "true") 
                    {
                        alert("An error occurred: " & data.errorMessage);
                    }
                  }
              });
            });
            $('#search_tenant').click(function(){
              let j = 1;
                var table = $('#table_id').DataTable();
                var building = $('#building').val();
                var token = "<?=csrf_token()?>";
                table.destroy();
                $('#table_id').DataTable({
                  "processing": true,
                
                  headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                  ajax: {
                      type: 'POST',
                      url: '{{ url("/staff/get_all_building_tenants") }}',
                      data: {
                          building_id: building,_token:token
                        },
                      dataSrc: 'tenants'
                  },
                  "columns": [
                          {
                              "render": function(data, type, full, meta) {
                              return j++;
                          }   },
                          { "data": "name" },
                          { "data": "email" },
                          { "data": "contact" },
                          { "data": "city_name" },
                          { "data": "area_name" },
                          { "data": "building_name" },
                          { "data": "apartment" },
                          { "data": "rent" },
                          { "data": "maintenance_fee" },
                          { "data": "agreement_start_date" },
                          { "data": "agreement_end_date" },
                          {"mRender": function ( data, type, row, meta ) {
                              return '<a href=<?=url('assets/img/agreement/')?>/'+row.agreement+' target="_blank">'+row.agreement+'</a>';}
                          },
                          {"mRender": function ( data, type, row ) {
                            
                              return `<a href={{url("admin/edit_tenant/")}}${row.users_id}>
                                <i class="fas fa-edit"></i></a> 
                                || <a href={{ url("/admin/delete_tenant/") }}${row.users_id} onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash-alt" style="color: #00ade6;"></i></a>`;
                              }
                          },
                      ]
                 });
              });
        });
    </script>

