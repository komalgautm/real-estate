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
                  <form action="{{ url('/admin/add_area_data') }}" method="POST" class="information_form">
                    @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="input-group d-flex justify-content-center">
                        <h5><strong>Add Area</strong></h5>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="row mt-1">
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Language</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <select name="language" class="form-control" id="language">
                            <option value="">Select</option>
                           
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
                          
                        </select>
                        <input type="hidden" name="city_code" id="city_code" value="">
                      </div>
                    </div>
                  </div> -->
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <label class="input_label_padding_top">City</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <select name="city_id" class="form-control" id="city">
                          <option value="">Select</option>
                          @foreach($city as $city_data)
                            <option value="{{ $city_data->id }}">{{ $city_data->city_name }}</option>
                          @endforeach
                        </select>
                        <input type="hidden" name="city_code" id="city_code" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                  <div class="col-md-12">
                      <label class="input_label_padding_top">Area Name</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <input type="text" name="area_name" class="form-control" placeholder="Area Name">
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
                url: "{{ url('/admin/get_language')}}",
                dataType: "json",
                async:false,
                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                success: function( data ) {
                    //alert(data.langauge);

                    for (var i = 0; i < data.langauge.length; i++) {
                        $('#language').append($('<option>', {value:data.langauge[i]['id'], text:data.langauge[i]['name']}));
                    }
                    if (data.error == "true") 
                        {
                            alert("An error occurred: " & data.errorMessage);
                        }
                       
                }
            });
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
   
    </script>