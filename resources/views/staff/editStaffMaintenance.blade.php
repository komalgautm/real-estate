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
          <h6 class="font-weight-bolder mb-0">Edit Maintenance</h6>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
        <div class="container-fluid pt-1 py-4 px-0">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card p-5">
                    @foreach($maintenance as $maintenance_data)
                  <form action="{{ url('/staff/update_maintenance') }}" method="post" class="information_form">
                    @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="input-group d-flex justify-content-center">
                        <h5><strong>Edit Maintenance</strong></h5>
                      </div>
                    </div>
                  </div>
                 
                  
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Area Name</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <select name="area_id" class="form-control" id="area">
                            <option value="">Select</option>
                            @foreach($areas as $area_details)
                            <option value="{{ $area_details->id }}">{{ $area_details->area_name }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="maintenance_id" value="{{ $maintenance_data->id }}">
                      </div>
                    </div>
                  </div>
             
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Building</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <select name="building_id" class="form-control" id="building"></select>  
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
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Payment Mode</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group mb-2">
                        <select name="payment_mode"  class="form-control" id="payment_mode">

                            <option value="0">Select</option>
                            <option value="1">Cash</option>
                            <option value="2">Cheque</option>
                            <option value="3">others</option>
                        </select>
                      </div>
                      <div id="cheque_div">
                        <div class="col-md-12">
                        <div class="input-group mb-2">
                            <input type="text" value="{{ $maintenance_data->cheque_no }}" name="cheque_no" class="form-control" placeholder="cheque No.">
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="input-group mb-2">
                            <input type="text" value="{{ $maintenance_data->cheque_status }}" name="cheque_status" class="form-control" placeholder="Cheque Status">
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
                        <input type="text" name="amount" value="{{ $maintenance_data->amount }}" class="form-control" placeholder="Amount">
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Maintenance Type</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <input type="text" name="maintenanace_type" value="{{ $maintenance_data->maintenance_type }}" class="form-control" placeholder="Maintenance Type">
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Description</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <textarea name="description" id="" class="form-control" cols="" rows="">{{ $maintenance_data->description }}</textarea>
                      </div>
                    </div>
                  </div>
                  @endforeach
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
          $( "#area" ).change(function() {
              //alert(this.value);
              var id = this.value; 
              $.ajax({
                  type: 'POST',
                  url: "{{ url('/staff/get_building_data') }}" + '/' + id,
                  dataType: "json",
                  async:false,
                  data: id,
                  headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                  success: function(result) {
                    console.log(result);

                  $('#building').append($('<option>', {value:0, text:"Select"}));
                      for (var i = 0; i < result.length; i++) {
                          $('#building').append($('<option>', {value:result[i]['id'], text:result[i]['building_name']}));
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
              
          $( "#building" ).change(function() {
                var id = this.value;
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
                        console.log(result[0]['no_of_apartments']);

                        $('#apartment').append($('<option>', {value:0, text:"Select"}));
                          var aparment = 201;
                          for (var i = 1; i <= result[0]['no_of_apartments']; i++) {
                              $('#apartment').append($('<option>', {value: i, text:aparment}));
                              aparment++;
                          }
                          if (result.error == "true") 
                          {
                              alert("An error occurred: " & result.errorMessage);
                          }
                      }
                   });
                });

      });
    </script>