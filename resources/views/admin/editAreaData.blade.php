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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Add Area</li>
          </ol>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
        <div class="container-fluid pt-1 py-4 px-0">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card p-5">
                @foreach($area as $area_data)
                  <form action="{{ url('/admin/update_area_data') }}" method="POST" class="information_form">
                    @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="input-group d-flex justify-content-center">
                        <h5><strong>Add Area</strong></h5>
                      </div>
                    </div>
                  </div>
                 
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Language</label>
                      <input type="hidden" name="area_id" value="{{ $area_data->id }}">
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <select name="language" class="form-control" id="language">
                            <option value="">Select</option>
                            @foreach($language as $language_data)
                              <?php if($language_data->id == $area_data->language_id ) {  ?>
                                 <option selected value="{{ $language_data->id }}">{{ $language_data->name }}</option>
                              <?php  } else { ?>
                                <option value="{{ $language_data->id }}">{{ $language_data->name }}</option>
                               <? } ?>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <label class="input_label_padding_top">City</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <select name="city_id" class="form-control" id="city">
                            @foreach($city as $city_data)
                              <?php if($city_data->id == $area_data->city_id) {  ?>
                                 <option selected value="{{ $city_data->id }}">{{ $city_data->city_name }}</option>
                              <?php  } else { ?>
                                <option value="{{ $city_data->id }}">{{ $city_data->city_name }}</option>
                               <? } ?>
                            @endforeach
                        </select>
                        <input type="hidden" name="city_code" id="city_code" value="{{ $area_data->code }}">
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                  <div class="col-md-12">
                      <label class="input_label_padding_top">Area Name</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <input type="text" name="area_name" value="{{ $area_data->area_name  }}" class="form-control" placeholder="Area Name">
                      </div>
                    </div>
                  </div>
                
                    <div class="col-md-12 mt-4">
                      <div class="input-group d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-success allBtnsize" data-bs-toggle="modal" data-bs-target="#exportexcel">Save</button>
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
    <!-- <script>
        $(document).ready(function() {
         
            $( "#language" ).change(function() {
                    var id = this.value; 
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/admin/get_city_data') }}" + '/' + id,
                        dataType: "json",
                        async:false,
                        data: id,
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                        success: function(result) {
                            console.log(result.city);
                            $('#city').append($('<option>', {value:0, text:"Select"}));
                            for (var i = 0; i < result.city.length; i++) {
                                $('#city').append($('<option>', {value:result.city[i]['id'], text:result.city[i]['city_name']}));
                            }
                            if (result.error == "true") 
                            {
                                alert("An error occurred: " & result.errorMessage);
                            }
                        }
                    });
                });
                $( "#city" ).change(function() {
                    var id = this.value; 
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('/admin/get_code_data') }}" + '/' + id,
                        dataType: "json",
                        async:false,
                        data: id,
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                        success: function(result) {
                            console.log(result.code);
                           
                            $('#city_code').val(result.code[0]['code']);
                            if (result.error == "true") 
                            {
                                alert("An error occurred: " & result.errorMessage);
                            }
                        }
                    });
                });
        });
   
    </script> -->