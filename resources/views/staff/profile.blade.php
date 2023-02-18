@include('staff.staffcomponents.staffHeader')
 
 
    <div class="container-fluid">
    <nav class="navbar navbar-main navbar-expand-lg px-0 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Home</a></li>
            <li class="breadcrumb-item text-sm text-dark" >Staff</li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Profile</li>
          </ol>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
        <div class="container-fluid pt-1 py-4 px-0">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card p-5">
                @foreach($staff_users as $userdetails)
                  <form action="{{ url('staff/update_profile') }}" method="post" class="information_form">
                    @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="input-group d-flex justify-content-center">
                        <h5><strong>Profile</strong></h5>
                      </div>
                    </div>
                  </div>
                 
                  <div class="row mt-1">
                    <div class="col-md-12">
                        <label class="input_label_padding_top">Name</label>
                    </div>

                    <div class="col-md-12">
                      <div class="input-group">
                        <input type="text" class="form-control" name="staffname" value="{{ $userdetails->name }}" placeholder="Name">
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Email</label>
                    
                      <div class="input-group">
                        <input type="text" class="form-control" name="staffemail" value="{{ $userdetails->email }}" placeholder="Email">
                      </div>
                    </div>
                    <input type="hidden" class="form-control" value="{{ $userdetails->password }}" placeholder="Password.">
                                      
         
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Contact</label>
                    </div>

                    <div class="col-md-12">
                      <div class="input-group">
                        <input type="text" class="form-control" name="staffcontact" value="{{ $userdetails->mobile }}" placeholder="MObile">
                      </div>
                    </div> 
                    
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Profile</label>
                    </div>

                    <div class="col-md-12">
                      <div class="input-group">
                        <input type="file" class="form-control" placeholder="Name">
                      </div>
                    </div>
                    
                    <div class="col-md-12 mt-4">
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