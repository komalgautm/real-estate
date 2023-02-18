@include('admin.components.header')
 
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->

    <div class="container-fluid">
    <nav class="navbar navbar-main navbar-expand-lg px-0 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Home</a></li>
            <li class="breadcrumb-item text-sm text-dark ">Admin</li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit City</li>
          </ol>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
    @foreach($city as $city_value)
        <div class="container-fluid pt-1 py-4 px-0">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card p-5">
                  <form action="{{ url('/admin/update_city_data') }}" method="POST" class="information_form">
                    @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="input-group d-flex justify-content-center">
                        <h5><strong>Edit City</strong></h5>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                  <input type="hidden" name="id" value="{{ $city_value->id }}">
                    <!-- <div class="col-md-12">
                      <label class="input_label_padding_top">Select Language</label>
                    
                    </div> -->
                    <!-- <div class="col-md-12">
                      <div class="input-group">
                        <select name="language_id" class="form-control" id="">
                            <option value="">Select</option>
                              @foreach( $language as $value)
                                    @if($city_value->language_id  == $value->id)
                                        <option selected value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endif
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                          </select>
                      </div>
                    </div> -->
                  </div>
                  <div class="row mt-1">
                  <div class="col-md-12">
                      <label class="input_label_padding_top">City Name</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <input type="text" name="city_name" value="{{ $city_value->city_name}}" class="form-control" placeholder="City Name">
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
    @endforeach


    @include('admin.components.footer')

