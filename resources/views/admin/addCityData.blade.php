@include('admin.components.header')
 
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
          <h6 class="font-weight-bolder mb-0">Add City</h6>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
        <div class="container-fluid pt-1 py-4 px-0">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card p-5">
                  <form action="{{ url('/admin/add_city_data') }}" method="POST" class="information_form">
                    @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="input-group d-flex justify-content-center">
                        <h5><strong>Add City</strong></h5>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <label class="input_label_padding_top">In English</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <input type="text" name="city_name_en" class="form-control" placeholder="City Name">
                        <input type="hidden" value="">
                      </div>
                    </div>
                  </div>
                  <!-- <div class="row mt-1">
                  <div class="col-md-12">
                      <label class="input_label_padding_top">In Arabic</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <input type="text" name="city_name_ar" class="form-control" placeholder="City Name">
                        <input type="hidden" value="">
                      </div>
                    </div>
                  </div> -->
                
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