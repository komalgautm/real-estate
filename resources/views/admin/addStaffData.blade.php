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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Add Staff</li>
          </ol>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
        <div class="container-fluid pt-1 py-4 px-0">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card p-5">
                  <form action="{{ url('/admin/add_staff_data') }}" method="POST" class="information_form" enctype="multipart/form-data">
                    @csrf
                  <div class="row">
                    <div class="col-md-12">
                      <div class="input-group d-flex justify-content-center">
                        <h5><strong>Add Staff</strong></h5>
                      </div>
                    </div>
                  </div>
                  <div id="message"> </div>
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Name</label>
                      <div class="input-group">
                        <input type="text" name="staff_name" class="form-control" placeholder="Name">
                      </div>
                    </div>
                 
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Email</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="email" placeholder="Email">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <label class="input_label_padding_top">Password</label>
                      <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password.">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <label class="input_label_padding_top">Confirm  Password</label>
                      <div class="input-group">
                        <input type="password" id="confirm_password" name="password" class="form-control" placeholder="Password.">
                      </div>
                    </div>

                    <div class="col-md-12">
                      <label class="input_label_padding_top">Mobile</label>
                      <div class="input-group">
                        <input type="text" class="form-control" name="mobile" placeholder="Mobile">
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Permission</label>
                      <div class="input-group included_Excluded">
                        <label class="input_label_padding_top"><input type="checkbox" name="tenents_permission" class="" placeholder="">Tenents</label>                        
                        <label class="input_label_padding_top"><input type="checkbox" name="payment_permission" class="" placeholder="">Payments</label>
                        <label class="input_label_padding_top"><input type="checkbox" name="maintenance_pemission" class="" placeholder="">Maintenance Expenses</label>
                        <!-- <label class="input_label_padding_top"><input type="checkbox" name="location_permission" class="" placeholder="">Location</label> -->
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Profile</label>
                      <div class="input-group">
                        <input type="file" name="uploadfile" class="form-control" placeholder="">
                      </div>
                    </div>
                  
                    
                    <div class="col-md-12 mt-3">                    

                      <div class="input-group d-flex justify-content-center">
                        <button type="submit" id="submitBtn" class="btn btn-outline-success allBtnsize mb-0" data-bs-toggle="modal" data-bs-target="#exportexcel">Save</button>
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