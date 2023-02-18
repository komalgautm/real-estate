@include('admin.components.header')
<meta name="csrf-token" content="{{ csrf_token() }}" />
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->

    <div class="container-fluid">
    <nav class="navbar navbar-main navbar-expand-lg px-0 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Home</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Admin</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Add Payment</h6>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
        <div class="container-fluid pt-1 py-4 px-0">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card p-5">
                  @foreach($users as $user_data)
                  <form action="{{ url('/admin/add_payment_data') }}" method="POST" name="myForm" class="information_form" enctype="multipart/form-data" onsubmit="return validateForm()">
                    @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="input-group d-flex justify-content-center">
                        <h5><strong>Add Payment</strong></h5>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="user_id" value="{{ $user_data->id }}">
                  <input type="hidden" name="city" value="{{ $user_data->city_id }}">
                  <input type="hidden" name="area" value="{{ $user_data->area_id }}">
                  <input type="hidden" name="building" value="{{$user_data->building}}">
                  <input type="hidden" name="apartment" value="{{ $user_data->apartment }}">
                  <!-- <div class="row mt-1">
                  <div class="col-md-12">
                      <label class="input_label_padding_top">Area Name</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <select name="area" class="form-control" id="area">
                        </select>
                        <input type="hidden" name="language_id" id="language_id">
                        <input type="hidden" name="code" id="code">
                      </div>
                    </div>
                  </div> -->
                  <!-- <div class="row mt-1">
                  <div class="col-md-12">
                      <label class="input_label_padding_top">Building Name</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <select name="building" class="form-control" id="building"></select>
                      </div>
                    </div>
                  </div> -->
                  <!-- <div class="row mt-1">
                  <div class="col-md-12">
                      <label class="input_label_padding_top">Apartment</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <select name="apartment"  class="form-control" id="apartment">
                        </select>
                       <input type="hidden" id="user_id" name="user_id">
                      </div>
                    </div>
                  </div> -->
                  <div class="row mt-1">
                    <div>{{ $user_data->name }}</div>
                    <div id="message"></div>
                  <div class="col-md-12">
                      <label class="input_label_padding_top">Payment Type</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <select name="payment_type" id="payment_type" class="form-control" required>
                            <option value="0">Select</option>
                            <option value="1">Rent</option>
                            <option value="2">Maintenance</option>
                        </select>
                      </div>
                    </div>

                  
                  </div>
                  <div class="row mt-1">
                  <div class="col-md-12">
                      <label class="input_label_padding_top">Payment Mode</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group mb-3">
                        <select name="payment_mode" id="payment_mode" class="form-control" required>
                            <option value="0">Select</option>
                            <option value="1">Cash</option>
                            <option value="2">Cheques</option>
                        </select>
                      </div>
                    </div>
                    <div  id="cheque_details">
                        <div class="col-md-12">
                          <div class="input-group mb-3">
                              <input type="text" name="cheque_no" class="form-control" placeholder="Cheque No.">
                          </div>
                          <div class="input-group mb-3">
                            <select name="cheque_status" class="form-control" id="">
                                <option value="">Select</option>
                                <option value="1">Cleared</option>
                                <option value="2">Returened</option>
                                <option value="3">Cancelled</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="input-group">
                            <input type="file" name="cheque_image" class="form-control" placeholder="">
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
                    <div class="col-md-12 mt-4">
                      <div class="input-group d-flex justify-content-center">
                        <button type="submit" id="payment_submit" class="btn btn-outline-success allBtnsize" data-bs-toggle="modal" data-bs-target="#exportexcel">Save</button>
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


    @include('admin.components.footer')
    <script>
        $(document).ready(function() {
            $('#cheque_details').hide();
            $.ajax({
                type: "POST",
                url: "{{ url('/admin/get_all_area_data')}}",
                dataType: "json",
                async:false,
                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                success: function( data ) {
                    console.log(data);
                    $('#area').append($('<option>', {value:0, text:"Select"}));
                    for (var i = 0; i < data.length; i++) {
                        $('#area').append($('<option>', {value:data[i]['id'], text:data[i]['area_name']}));
                    }
                    if (data.error == "true") 
                        {
                            alert("An error occurred: " & data.errorMessage);
                        }
                       
                }
            });      
            $('#area').change(function(){
                id = this.value;
                $.ajax({
                type: "POST",
                url: "{{ url('/admin/get_building_data_ajax')}}"  + '/' + id,
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
            $('#building').on('change', function(){
                id = this.value;
                $.ajax({
                  type: "POST",
                  url: "{{ url('/admin/get_apartment_data_ajax')}}"  + '/' + id,
                  dataType: "json",
                  async:false,
                  headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              },
                  success: function( data ) {
                      console.log(data);
                      $('#apartment').append($('<option>', {value:0, text:"Select"}));
                    
                      for (var i = 1; i <= data[0]['no_of_apartments']; i++) {
                                $('#apartment').append($('<option>', {value: i, text:i}));
                      }
                      if (data.error == "true") 
                      {
                          alert("An error occurred: " & data.errorMessage);
                      }
                  }
                });
            })

            $('#apartment').on('change', function(){
                building = $('#building').val();
                apartment = $('#apartment').val();
               
                $.ajax({
                  type: "POST",
                  url: "{{ url('/admin/get_user_ajax')}}",
                  data: { "building_id" : building, "apartment_id": apartment },
                  dataType: "json",
                  async:false,
                  headers: {
                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                  success: function( data ) {
                      console.log(data);
                      if(data == ""){
                          alert('This apartment is Vacant');
                      } else {
                         $('#user_id').val(data[0]['id']);
                      }
                     
                      if (data.error == "true") 
                      {
                          alert("An error occurred: " & data.errorMessage);
                      }
                  }
                });
            })
            
            
            $('#payment_mode').on('change', function() {
                  // alert(this.value);
              if ( this.value == '2')
              {
                  $("#cheque_details").show();
              }
              else
              {
                  $("#cheque_details").hide();
              }
            });
 

        });
   
    </script>