@section('title') {{'Staff'}} @endsection
@include('admin.components.header')
 
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->

    <div class="container-fluid">
    <nav class="navbar navbar-main navbar-expand-lg px-0 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Home</a></li>
            <li class="breadcrumb-item text-sm text-dark">Admin</li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit Staff</li>
          </ol>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
    @foreach ($staff as $key => $val)
        <div class="container-fluid pt-1 py-4 px-0">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card p-5">
                  <form action="{{ url('/admin/update_staff_data') }}" method="POST" class="information_form" enctype="multipart/form-data">
                    @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="input-group d-flex justify-content-center">
                        <h5><strong>Edit Staff</strong></h5>
                      </div>
                    </div>
                  </div>
                  <div id="message"> </div>
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Name</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <input type="hidden" name="staff_id" value="{{ $val->id }}">
                        <input type="text" name="staff_name" value="{{ $val->name }}" class="form-control" placeholder="Name">
                      </div>
                    </div>
                 
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Email</label>
                      <div class="input-group">
                        <input type="text" class="form-control" value="{{ $val->email }}" name="email" placeholder="Email">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <label class="input_label_padding_top">Password</label>
                      <div class="input-group">
                        <input type="password" name="password" id="password" value="{{ $val->password }}" class="form-control" placeholder="Password.">
                      </div>
                    </div>
                  
                    <div class="col-md-6">
                      <label class="input_label_padding_top">Confirm  Password</label>
                      <div class="input-group">
                        <input type="password" id="confirm_password" name="password" value="{{ $val->password }}" class="form-control" placeholder="Password.">
                      </div>
                    </div>

                    <div class="col-md-12">
                      <label class="input_label_padding_top">Mobile</label>
                      <div class="input-group">
                        <input type="text" class="form-control" value="{{ $val->mobile }}" name="mobile" placeholder="Mobile">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Permission</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        @if($val->permission[0] == 1)
                            <label class="input_label_padding_top"><input type="checkbox" checked name="tenents_permission" class="" placeholder="">Tenents</label>                        
                        @else
                            <label class="input_label_padding_top"><input type="checkbox"  name="tenents_permission" class="" placeholder="">Tenents</label>
                        @endif
                        @if($val->permission[2] == 1)
                            <label class="input_label_padding_top"><input type="checkbox" checked name="payment_permission" class="" placeholder="">Payments</label>                        
                        @else
                            <label class="input_label_padding_top"><input type="checkbox"  name="payment_permission" class="" placeholder="">Payments</label>
                        @endif

                        @if($val->permission[4] == 1)
                            <label class="input_label_padding_top"><input type="checkbox" checked name="maintenance_pemission" class="" placeholder="">Maintenance Expenses</label>                        
                        @else
                            <label class="input_label_padding_top"><input type="checkbox"  name="maintenance_pemission" class="" placeholder="">Maintenance Expenses</label>
                        @endif

                        <!-- @if($val->permission[6] == 1)
                            <label class="input_label_padding_top"><input type="checkbox" checked name="location_permission" class="" placeholder="">Location</label>                        
                        @else
                            <label class="input_label_padding_top"><input type="checkbox"  name="location_permission" class="" placeholder="">Location</label>
                        @endif -->
                    </div>
                    </div>
                  
                    <div class="col-md-12">
                       <label class="input_label_padding_top">Profile</label> 
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                      <img src="{{ url('/assets/img/staff_profile') }}/<?php echo $val->staff_iamge; ?>"  width="100" height="100">
                      </div>
                    </div>

                    <div class="col-md-12">
                      <!-- <label class="input_label_padding_top">Profile</label> -->
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                        <input type="hidden" name="previous_img" value="{{ $val->staff_iamge }}">
                        <input type="file" name="upload_img" class="form-control" placeholder="">
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Status</label>
                    </div>
                    <div class="col-md-12">
                      <div class="input-group">
                       
                        <select name="status"  class="form-control" id="">
                            <option value="">Select</option>
                            @if($val->staff_status == 0)
                                <option selected value="0">Inactive</option>
                            @else
                                <option value="0">Inactive</option>
                            @endif
                            @if($val->staff_status == 1)
                                <option selected value="1">Active</option>
                            @else
                                <option value="1">Active</option>
                            @endif
                        </select>
                      </div>
                    </div>

                    <div class="col-md-12 mt-4">
                      <div class="input-group d-flex justify-content-center">
                        <button type="submit" id="submitBtn" class="btn btn-outline-success allBtnsize mb-0" data-bs-toggle="modal" data-bs-target="#exportexcel">Save</button>
                      </div>
                    </div>
                  </div>
                </form>
                </div>
            </div>
            @endforeach
          </div>       
        </div>
        </div>
      </div>
    </div>


    @include('admin.components.footer')

    <script>

$(document).ready(function(){
  $("#submitBtn").click(function(){
        var pass  = document.getElementById("password").value;
        var rpass  = document.getElementById("confirm_password").value;
        if(pass != rpass){
            document.getElementById("submitBtn").disabled = true;
            $('#message').html("Entered Password is not matching!! Try Again");
        }else{
            $('#message').html("");
            document.getElementById("submitBtn").disabled = false;
        }
        const btn = document.getElementById("submitBtn");
        setTimeout(()=>{
          btn.disabled = false;
          console.log('Button Activated')}, 2000)
      
  });
});
  
</script>