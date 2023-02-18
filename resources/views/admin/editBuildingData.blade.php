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
            <li class="breadcrumb-item text-sm text-dark">Admin</li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit Building</li>
          </ol>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
        <div class="container-fluid pt-1 py-4 px-0">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card p-5">
                    @foreach($building as $building_value)
                  <form action="{{ url('/admin/update_building') }}" method="POST" class="information_form">
                    @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="input-group d-flex justify-content-center">
                        <h5><strong>Edit Building</strong></h5>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <label class="input_label_padding_top">City Name</label>
                      <div class="input-group">
                        <select name="cityName" class="form-control" id="city">
                          <option value="">Select</option>
                          @foreach($city as $city_data)
                            @if( $building_value->city_id == $city_data->id)
                              <option selected value="{{ $city_data->id }}">{{ $city_data->city_name }}</option>
                            @endif
                              <option value="{{ $city_data->id }}">{{ $city_data->city_name }}</option>
                          @endforeach
                        </select>
                        <input type="hidden" name="building_id" value="{{ $building_value->id }}">
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <label class="input_label_padding_top">Area Name</label>
                      <div class="input-group">
                        <select name="areaName" class="form-control" id="area">
                          @foreach($area as $area_data)
                            @if( $building_value->area_id  == $area_data->id)
                              <option selected value="{{ $area_data->id }}">{{ $area_data->area_name }}</option>
                            @endif
                              <option value="{{ $area_data->id }}">{{ $area_data->area_name }}</option>
                          @endforeach
                        </select>
                        <input type="hidden" name="language_id" id="language_id">
                        <input type="hidden" name="code" id="code">
                      </div>
                    </div>
                 
                    <div class="col-md-6">
                      <label class="input_label_padding_top">Building Name</label>
                      <div class="input-group">
                        <input type="text" name="building" value="{{ $building_value->building_name }}" class="form-control" placeholder="Building Name">
                        <input type="hidden" value="">
                      </div>
                    </div>
                 
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Number of Floors</label>
                      <div class="input-group">
                        <input type="text" name="no_of_floors" value="{{ $building_value->no_of_floors }}"  class="form-control" placeholder="Number of Floors">
                        <input type="hidden" value="">
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <label class="input_label_padding_top">Number of Apartment</label>
                      <div class="input-group">
                        <input type="text" name="no_of_apartment"  value="{{ $building_value->no_of_apartments }}"  class="form-control" placeholder="Number of Apartments">
                        <input type="hidden" value="">
                      </div>
                    </div>
                  
                  <div class="col-md-6">
                      <label class="input_label_padding_top">Number of Floorwise</label>
                  
                      <div class="input-group">
                        <input type="text" name="no_of_floorwise" value="{{ $building_value->no_of_apartment_floorwise }}" class="form-control" placeholder="Number of Floorwise">
                        <input type="hidden" value="">
                      </div>
                    </div>
                  
                
                    <div class="col-md-12 mt-4">
                      <div class="input-group d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-success allBtnsize" data-bs-toggle="modal" data-bs-target="#exportexcel">Save</button>
                      </div>
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
            $.ajax({
                type: "POST",
                url: "{{ url('/admin/get_all_city')}}",
                dataType: "json",
                async:false,
                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                success: function( data ) {
                    console.log(data.city);
                    $('#city').append($('<option>', {value:0, text:"Select"}));
                    for (var i = 0; i < data.city.length; i++) {
                        $('#city').append($('<option>', {value:data.city[i]['id'], text:data.city [i]['city_name']}));
                    }
                    if (data.error == "true") 
                        {
                            alert("An error occurred: " & data.errorMessage);
                        }
                       
                }
            });
            $( "#city" ).change(function() {
                    var id = this.value;
                    //alert(id); 
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/admin/get_city_language_data') }}" + '/' + id,
                        dataType: "json",
                        async:false,
                        data: id,
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                        success: function(result) {
                            console.log(result.lang_id[0]['language_id']);
                            $('#language_id').val(result.lang_id[0]['language_id']);
                          
                            if (result.error == "true") 
                            {
                                alert("An error occurred: " & result.errorMessage);
                            }
                        }
                    });
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
                           
                            console.log(result);
                            $('#area').append($('<option>', {value:0, text:"Select"}));
                            for (var i = 0; i < result.area.length; i++) {
                                $('#area').append($('<option>', {value:result.area[i]['id'], text:result.area[i]['area_name']}));
                            }
                          
                            if (result.error == "true") 
                            {
                                alert("An error occurred: " & result.errorMessage);
                            }
                        }
                    });
                });
                $( "#area" ).change(function() {
                    var id = this.value;
                    //alert(id); 
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/admin/get_city_language_data') }}" + '/' + id,
                        dataType: "json",
                        async:false,
                        data: id,
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                        success: function(result) {
                            console.log(result.lang_id_code[0]['language_id']);
                            $('#language_id').val(result.lang_id_code[0]['language_id']);
                            $('#code').val(result.lang_id_code[0]['code']);
                            
                          
                            if (result.error == "true") 
                            {
                                alert("An error occurred: " & result.errorMessage);
                            }
                        }
                    });
               
                });
                
                
        });
   
    </script>