@section('title') {{'Tenants'}} @endsection
@include('staff.staffcomponents.staffHeader')

<style type="text/css">
  label.input_label_padding_top input {
    margin-left: 10px;
}
</style>

<meta name="csrf-token" content="{{ csrf_token() }}" />
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->

    <div class="container-fluid">
    <nav class="navbar navbar-main navbar-expand-lg px-0 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Home</a></li>
            <li class="breadcrumb-item text-sm text-dark">Staff</li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit Tenant</li>
          </ol>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
        <div class="container-fluid pt-1 py-4 px-0">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card p-5">
                  @foreach($users as $user_data)
                  <form action="{{ url('/staff/update_tenant') }}" method="POST" class="information_form" enctype="multipart/form-data">
                    @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="input-group d-flex justify-content-center">
                        <h5><strong>Edit Tanents</strong></h5>
                        <input type="hidden" name="user_id" id="user_id" value="{{ $user_data->id}}">
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-6">
                      <label class="input_label_padding_top">Tanants Name</label>
                      <div class="input-group">
                        <input type="text" name="tenent_name" value="{{ $user_data->name }}" class="form-control" placeholder="Name" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label class="input_label_padding_top">Email</label>
                      <div class="input-group">
                        <input type="text" name="tenant_email" value="{{ $user_data->email }}" class="form-control" placeholder="Email" required>
                      </div>
                    </div>
                  
                    
                      <div class="col-md-6">
                        <label class="input_label_padding_top">Contact</label>
                        <div class="input-group">
                          <input type="text" name="contact" value="{{ $user_data->contact }}" class="form-control" placeholder="Contact" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label class="input_label_padding_top">Permanent Address</label>
                        <div class="input-group">
                          <input type="text" name="parmanenet_address" value="{{ $user_data->parmanent_address }}" class="form-control" placeholder="Parmanent" required>
                        </div>
                      </div>
                  
                    <div class="col-md-6">
                      <label class="input_label_padding_top">City</label>
                      <div class="input-group">
                        
                        <select name="city_name" class="form-control" id="city" required>
                          <option value="">Select</option>
                          @foreach($city as $city_value)
                          <?php if($user_data->city_id == $city_value->id) {  ?>
                            <option selected value="{{ $city_value->id }}">{{ $city_value->city_name }}</option>
                          <?php } ?>
                            <option value="{{ $city_value->id }}">{{ $city_value->city_name }}</option>
                          @endforeach
                        </select>
                        <input type="hidden" value="{{ $user_data->city_id }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label class="input_label_padding_top">Area</label>
                      <div class="input-group">
                        <select name="area_name" class="form-control" id="area" required>
                          <option value="">Select</option>
                        </select>
                        <input type="hidden" id="dyn_area" value="{{ $user_data->area_id }}">
                      </div>
                    </div>
                
                    <div class="col-md-6">
                      <label class="input_label_padding_top">Building</label>
                      <div class="input-group">
                        <select name="building_name" class="form-control" id="building_id" required>
                          <option value="">Select</option>
                       </select>
                       <input type="hidden" id="dyn_building" value="{{ $user_data->building }}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label class="input_label_padding_top">Apartment No.</label>
                      <div class="input-group">
                        <select name="apartment_no" class="form-control" id="apartment" required></select>
                        <input type="hidden" id="dyn_apartment" value="{{ $user_data->apartment }}">
                      </div>
                    </div>
                 
                    <div class="col-md-6">
                      <label class="input_label_padding_top">Rent Monthly</label>
                      <div class="input-group">
                        <input type="text" name="rent" value="{{ $user_data->rent }}" class="form-control" placeholder="Amount" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label class="input_label_padding_top">Maintenance Amount</label>
                      <div class="input-group included_Excluded">
                        <input type="hidden" id="expenses" value="<?php echo $user_data->maintenance_fee; ?>">
                          <label class="input_label_padding_top">Included
                            <input type="checkbox" id="included"  name="maintenance1" class="a" placeholder="">
                        </label>
                        <label class="input_label_padding_top">Excluded
                          <input type="checkbox" id="excluded" name="maintenance2" class="a" placeholder="">
                        </label>
                      </div>
                      <div class="input-group">
                        <?php if($user_data->maintenance_fee === 0) ?>
                        <input type="text" id="maintenance_amount" value="{{ $user_data->maintenance_fee }}" name="maintenance_amount" class="form-control" placeholder="Amount">
                      </div>
                    </div>
              
                    <div class="col-md-6">
                      <label class="input_label_padding_top">Agreement Start Date</label>
                      <div class="input-group">
                        <input type="date" name="start_date" value="{{ $user_data->agreement_start_date }}" class="form-control" placeholder="" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label class="input_label_padding_top">Agreement End Date</label>
                      <div class="input-group">
                        <input type="date" name="end_date" value="{{ $user_data->agreement_end_date }}" class="form-control" placeholder="" required>
                      </div>
                    </div>
                         
                    <div class="col-md-6">
                      <label class="input_label_padding_top">Agreement</label>
                      <div>{{ $user_data->agreement }}</div>
                      <div class="input-group">
                        <input type="hidden" name="previous_agreement" value="{{ $user_data->agreement }}">
                        <input type="file" name="update_agreement" id="fileUpload" class="form-control" accept="application/pdf" placeholder="">
                      </div>
                      <div id="lblError">Please insert only pdf file</div>
                    </div>
                 
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-12">
                      <div class="input-group d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-success allBtnsize mb-0" data-bs-toggle="modal" data-bs-target="#exportexcel">Save</button>
                      </div>
                    </div>
                  </div>
                </form>
                @endforeach
                </div>
            </div>
          </div>       
        </div>
        </div>
      </div>
    </div>


    @include('staff.staffcomponents.staffFooter')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment.min.js"></script>
    <script>
        $(document).ready(function() {
          city = $('#city').val();
          $.ajax({
                type: 'POST',
                url: "{{ url('/staff/get_area_data') }}" + '/' + city,
                dataType: "json",
                async:false,
                data: {city_id: city }, 
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                success: function(result) {
                  console.log(result);
                  var dyn_area = $('#dyn_area').val();
                  for (var i = 0; i < result.area.length; i++) {
                      optText = result.area[i]['area_name'];
                      optValue = result.area[i]['id'];
                    if(dyn_area == result.area[i]['id']){
                        $('#area').append(`<option selected value="${optValue}">${optText}</option>`);
                    } else {
                      $('#area').append(`<option selected value="${optValue}">${optText}</option>`);
                    }
                  }
                    if (result.error == "true")  {
                        alert("An error occurred: " & result.errorMessage);
                    }
                }
          });

          var city = $('#city').val();
          var area = $('#dyn_area').val();
          var token = "<?=csrf_token()?>";
          $.ajax({
                type: 'POST',
                url: "{{ url('/staff/get_building_data_area_ajax') }}",
                dataType: "json",
                async:false,
                data: {city_id: city , area_id: area, _token:token }, 
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                success: function(result) {
                  console.log(result);
                  var dyn_building = $('#dyn_building').val();
                     
                  for (var i = 0; i < result.length; i++) {
                      optText = result[i]['building_name'];
                      optValue = result[i]['id'];
                      if(dyn_building == result[i]['id']){
                        $('#building_id').append(`<option selected value="${optValue}">${optText}</option>`);
                      } else {
                        $('#building_id').append(`<option value="${optValue}">${optText}</option>`);
                      }
                  }
                  if (result.error == "true")  {
                      alert("An error occurred: " & result.errorMessage);
                  }
                }
            });

            var users_id = $('#user_id').val();
            var token = "<?=csrf_token()?>";
            $.ajax({
                  type: 'POST',
                  url: "{{ url('/staff/get_users_and_floors') }}",
                  dataType: "json",
                  async:false,
                  data: {id: users_id , _token:token }, 
                  headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                  success: function(result) {
                    console.log(result);
                    dyn_apartment = $('#dyn_apartment').val();
                    for (var i = 0; i < result.length; i++) {
                      optText = result[i];
                      optValue = result[i];
                      if(dyn_building == result[i]){
                        $('#apartment').append(`<option selected value="${optValue}">${optText}</option>`);
                      } else {
                        $('#apartment').append(`<option value="${optValue}">${optText}</option>`);
                      }
                    }
              
                  }
              });


          
          var expenses = $('#expenses').val();
          if(expenses == 0) {
            $('#included').attr( 'checked', true );
            $('#maintenance_amount').hide();

          } else {
            $('#excluded').attr( 'checked', true );
            $('#maintenance_amount').show();
          }
         
          $('#end_date').change(function() {
              var UserDate = document.getElementById("end_date").value;
              var ToDate = new Date();
              if (new Date(UserDate).getTime() <= ToDate.getTime()) {
                    alert("The Date must be Bigger or Equal to today date");
              }
          });
       
          $( "#city" ).change(function() {
                var id = this.value;
                $.ajax({
                      type: 'POST',
                      url: "{{ url('/staff/get_area_data') }}" + '/' + id,
                      dataType: "json",
                      async:false,
                      data: id,
                      headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                      success: function(result) {
                        console.log(result.area);
                          $('#area').children().remove();
                          $('#building_id').children().remove();
                          $('#apartment').children().remove();
                        
                          for (var i = 0; i < result.area.length; i++) {
                              $('#area').append($('<option>', {value: result.area[i]['id'], text:result.area[i]['area_name']}));
                          }
                          if(result.area.length == 1){
                            // console.log('if')
                            var city = $('#city').val();
                            var area = $('#area').val();
                           
                            var token = "<?=csrf_token()?>";
                            $.ajax({
                                  type: 'POST',
                                  url: "{{ url('/staff/get_building_data_area_ajax') }}",
                                  dataType: "json",
                                  async:false,
                                  data: {city_id: city , area_id: area, _token:token }, 
                                  headers: {
                                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                      },
                                  success: function(result) {
                                    console.log(result);
                                    for (var i = 0; i < result.length; i++) {
                                          $('#building_id').append($('<option>', {value: result[i]['id'], text:result[i]['building_name']}));
                                      }
                                      if (result.error == "true")  {
                                          alert("An error occurred: " & result.errorMessage);
                                      }
                                  }
                              });

                              var e = document.getElementById("building_id");
                              var id = e.value;
                              //alert(id);
                              $.ajax({
                                    type: 'POST',
                                    url: "{{ url('/staff/get_floors') }}" + '/' + id,
                                    dataType: "json",
                                    async:false,
                                    data: id,
                                    headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                    success: function(result) {
                                      console.log(result);
                                      $('#apartment').children().remove();
                                      $('#apartment').append($('<option>', {value:0, text:"Select"}));
                                        for (var i = 0; i < result.length; i++) {
                                            $('#apartment').append($('<option>', {value: result[i], text:result[i]}));
                                        }
                                        if (result.error == "true") {
                                            alert("An error occurred: " & result.errorMessage);
                                        }
                                    }
                                });
                            }
                            else{
                              // console.log('else')
                              var city = $('#city').val();
                              var area = $('#area').val();
                              var id = $( "#building_id" ).val();
                              var token = "<?=csrf_token()?>";
                              $.ajax({
                                    type: 'POST',
                                    url: "{{ url('/staff/get_building_data_area_ajax') }}",
                                    dataType: "json",
                                    async:false,
                                    data: {city_id: city , area_id: area, _token:token }, 
                                    headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                    success: function(result) {
                                      console.log(result);
                                      for (var i = 0; i < result.length; i++) {
                                            $('#building_id').append($('<option>', {value: result[i]['id'], text:result[i]['building_name']}));
                                        }
                                        if (result.error == "true")  {
                                            alert("An error occurred: " & result.errorMessage);
                                        }
                                    }
                                });
                                var e = document.getElementById("building_id");
                                var id = e.value;
                                $.ajax({
                                    type: 'POST',
                                    url: "{{ url('/staff/get_floors') }}" + '/' + id,
                                    dataType: "json",
                                    async:false,
                                    data: id,
                                    headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                    success: function(result) {
                                      console.log(result);
                                      $('#apartment').children().remove();
                                      $('#apartment').append($('<option>', {value:0, text:"Select"}));
                                        for (var i = 0; i < result.length; i++) {
                                            $('#apartment').append($('<option>', {value: result[i], text:result[i]}));
                                        }
                                        if (result.error == "true") {
                                            alert("An error occurred: " & result.errorMessage);
                                        }
                                    }
                                });

                            }
                          if (result.error == "true")  {
                              alert("An error occurred: " & result.errorMessage);
                          }
                      }
                  });
            });
              $( "#area" ).on('change', function() {
                var city = $('#city').val();
                var area = $('#area').val();
                var token = "<?=csrf_token()?>";
                $.ajax({
                      type: 'POST',
                      url: "{{ url('/staff/get_building_data_area_ajax') }}",
                      dataType: "json",
                      async:false,
                      data: {city_id: city , area_id: area, _token:token }, 
                      headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                      success: function(result) {
                        console.log(result);
                        $('#building_id').children().remove();
                        for (var i = 0; i < result.length; i++) {
                              $('#building_id').append($('<option>', {value: result[i]['id'], text:result[i]['building_name']}));
                          }
                          console.log(result, 'rese')
                          if(result.length == 1){
                            let id = $( "#building_id" ).val(); 
                            $.ajax({
                                type: 'POST',
                                url: "{{ url('/staff/get_floors') }}" + '/' + id,
                                dataType: "json",
                                async:false,
                                data: id,
                                headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                success: function(result) {
                                  console.log(result);
                                  $('#apartment').append($('<option>', {value:0, text:"Select"}));
                                    for (var i = 0; i < result.length; i++) {
                                        $('#apartment').append($('<option>', {value: result[i], text:result[i]}));
                                    }
                                    if (result.error == "true") {
                                        alert("An error occurred: " & result.errorMessage);
                                    }
                                }
                            });
                          } else {
                            let id = $( "#building_id" ).val(); 
                            $.ajax({
                                type: 'POST',
                                url: "{{ url('/staff/get_floors') }}" + '/' + id,
                                dataType: "json",
                                async:false,
                                data: id,
                                headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                success: function(result) {
                                  console.log(result);
                                    for (var i = 0; i < result.length; i++) {
                                        $('#apartment').append($('<option>', {value: result[i], text:result[i]}));
                                    }
                                    if (result.error == "true") {
                                        alert("An error occurred: " & result.errorMessage);
                                    }
                                }
                            });
                          }
                          if (result.error == "true")  {
                              alert("An error occurred: " & result.errorMessage);
                          }
                      }
                  });
              });
              $( "#building_id" ).on('chnage',function() {
                  let id = this.value;
                  $.ajax({
                      type: 'POST',
                      url: "{{ url('/staff/get_floors') }}" + '/' + id,
                      dataType: "json",
                      async:false,
                      data: id,
                      headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                          },
                      success: function(result) {
                        console.log(result);
                       
                        $('#apartment').children().remove();
                      
                          for (var i = 0; i < result.length; i++) {
                              $('#apartment').append($('<option>', {value: result[i], text:result[i]}));
                          }
                          if (result.error == "true") {
                              alert("An error occurred: " & result.errorMessage);
                          }
                      }
                  });
              });
              $( "#excluded" ).click(function() {
                if(this.value==="on"){
                  $('#maintenance_amount').show();
                }else{
                  $('#maintenance_amount').hide();
                }
              });
              $( "#included" ).click(function() {
                  $('#maintenance_amount').hide();
              });
              $('.a').on('change', function() {
                      $('.a').not(this).prop('checked',false);
                      alert(this.val());
              });
            });
    </script>