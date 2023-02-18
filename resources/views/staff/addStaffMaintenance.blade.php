@include('staff.staffcomponents.staffHeader')
<meta name="csrf-token" content="{{ csrf_token() }}" />

 
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
          <h6 class="font-weight-bolder mb-0">Add Maintenance</h6>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
        <div class="container-fluid pt-1 py-4 px-0">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card p-5">
                  <form action="{{ url('/staff/add_maintenance_form') }}" method="post" class="information_form" enctype="multipart/form-data">
                    @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="input-group d-flex justify-content-center">
                        <h5><strong>Add Maintenance</strong></h5>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <label class="input_label_padding_top">City Name</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <select name="city" class="form-control" id="city" required>
                            <option value="">Select</option>
                                @foreach($city as $city_value)
                                    <option value="{{ $city_value->id }}">{{ $city_value->city_name }}</option>
                                @endforeach
                        </select>
                      </div> 
                    </div>
                  </div>
                  
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Area Name</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <select name="area" class="form-control" id="area" required>
                            <option value="">Select</option>
                          
                        </select>
                      </div>
                    </div>
                  </div>
             
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Building</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <select name="building" class="form-control" id="building" required>
                            <option value="">Select</option>
                        </select>  
                    </div>
                    </div>
                  </div>
                
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Apartment No.</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <select name="apartment_id" class="form-control" id="apartment"></select>
                        <!-- <input type="text" name="total_apartment" id="total_apartment"> -->
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Payment Mode</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group mb-2">
                        <select name="payment_mode"  class="form-control" id="payment_mode" required>
                            <option value="0">Select</option>
                            <option value="1">Cash</option>
                            <option value="2">Cheque</option>
                            <!-- <option value="3">others</option> -->
                        </select>
                      </div>
                      <div id="cheque_div">
                        <div class="col-md-12">
                        <div class="input-group mb-2">
                            <input type="text" name="cheque_no" class="form-control" placeholder="cheque No.">
                        </div>
                        </div>
                        <div class="col-md-12">
                          <div class="input-group mb-2">
                              <select name="cheque_status" class="form-control" id="">
                                <option value="">Select</option>
                                <option value="1">Cleared</option>
                                <option value="2">Returened</option>
                                <option value="3">Cancelled</option>
                            </select>
                          </div>
                          <div class="col-md-12">
                          <div class="input-group mb-2">
                            <input type="file" name="cheque_image" class="form-control" placeholder="">
                          </div>
                        </div>
                        </div>
                    </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Amount</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <input type="text" name="amount" class="form-control" placeholder="Amount" required>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Maintenance Type</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <input type="text" name="maintenanace_type" class="form-control" placeholder="Maintenance Type">
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Description</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <textarea name="description" id="" class="form-control" cols="" rows=""></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-12 mt-4">
                      <div class="input-group d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-success allBtnsize" data-bs-toggle="modal" data-bs-target="#exportexcel">Save</button>
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
    </div>

    @include('staff.staffcomponents.staffFooter')
 
    <script>
      $(document).ready(function() {
          $('#cheque_div').hide();
          $( "#city" ).change(function() {
                var id = this.value;
                $.ajax({
                      type: 'POST',
                      url: "{{ url('/admin/get_area_data') }}" + '/' + id,
                      dataType: "json",
                      async:false,
                      data: id,
                      headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                      success: function(result) {
                        console.log(result.area);
                          for (var i = 0; i < result.area.length; i++) {
                              $('#area').append($('<option>', {value: result.area[i]['id'], text:result.area[i]['area_name']}));
                          }
                          if (result.error == "true")  {
                              alert("An error occurred: " & result.errorMessage);
                          }
                      }
                  });
            });
            $( "#area" ).change(function() {
                var city = $('#city').val();
                var area = $('#area').val();
                var token = "<?=csrf_token()?>";
                  $.ajax({
                        type: 'POST',
                        url: "{{ url('/admin/get_building_data_area_ajax') }}",
                        dataType: "json",
                        async:false,
                        data: {city_id: city , area_id: area, _token:token }, 
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                        success: function(result) {
                          console.log(result);
                            for (var i = 0; i < result.length; i++) {
                                $('#building').append($('<option>', {value: result[i]['id'], text:result[i]['building_name']}));

                            }
                            if (result.error == "true")  {
                                alert("An error occurred: " & result.errorMessage);
                            }
                        }
                    });
              });
              $( "#building" ).change(function() {
                let building = $('#building').val();
                  // alert(building);
                  $.ajax({
                        type: 'POST',
                        url: "{{ url('/admin/get_apartments') }}",
                        dataType: "json",
                        async:false,
                        data: { building_id: building }, 
                        headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                      success: function(result) {
                        console.log(result);
                            for (var i = 0; i < result.length; i++) {
                              $('#apartment').append($('<option>', {value: result[i]['id'], text:result[i]['apartment']}));
                          }
                        if (result.error == "true") 
                          {
                              alert("An error occurred: " & result.errorMessage);
                          }
                      }
                  });
              });
          $('#payment_mode').on('change', function() {
                  // alert(this.value);
              if ( this.value == '2')
              {
                  $("#cheque_div").show();
              }
              else
              {
                  $("#cheque_div").hide();
              }
            });
              
        
      });
    </script>