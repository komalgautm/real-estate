@include('staff.staffcomponents.staffHeader')

 
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->

    <div class="container-fluid">
    <nav class="navbar navbar-main navbar-expand-lg px-0 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-0">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Home</a></li>
            <li class="breadcrumb-item text-sm text-dark">Admin</li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit Payment</li>
          </ol>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
        <div class="container-fluid pt-1 py-4 px-0">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card p-5">
                  <form action="{{ url('/staff/update_staff_payment') }}" method="POST" class="information_form" enctype="multipart/form-data">
                    @csrf
                    @foreach($payment as $payment_data)
                    <?php //dd($payment); ?>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="input-group d-flex justify-content-center">
                        <h5><strong>Edit Payment Details</strong></h5>
                      </div>
                    </div>
                  </div>
                  <div id="message"> </div>
                  <div class="row mt-1">
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Payment Type</label>
                      <input type="hidden" name="payment_id" value="{{ $payment_data->id }}">
                      <div class="input-group">
                        <select name="payment_type" class="form-control" id="">
                          <option value="0">Select</option>
                            <?php if($payment_data->payment_type == 1){ ?>
                              <option selected value="1">Rent</option>
                            <?php  } else { ?>
                              <option value="1">Rent</option>
                            <?php }?>
                            <?php if($payment_data->payment_type == 2){ ?>
                              <option selected value="2">Maintenance</option>
                            <?php  } else { ?>
                              <option value="2">Maintenance</option>
                            <?php }?>
                        </select>
                      </div>
                    </div>
                      
                    <div class="row mt-1">
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Payment Mode</label>
                      <div class="input-group">
                        <select name="payment_mode" class="form-control" id="">
                          <option value="0">Select</option>
                            <?php if($payment_data->payment_mode == 1){ ?>
                              <option selected value="1">Cash</option>
                            <?php  } else { ?>
                              <option value="1">Cash</option>
                            <?php }?>
                            <?php if($payment_data->payment_mode == 2){ ?>
                              <option selected value="2">Cheque</option>
                            <?php  } else { ?>
                              <option value="2">Cheque</option>
                            <?php }?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <label class="input_label_padding_top">Amount</label>
                      <div class="input-group">
                        <input type="text" class="form-control" value="{{ $payment_data->amount }}" name="amount" placeholder="Amount">
                      </div>
                    </div>
                 
                    <div class="col-md-12">
                      <label class="input_label_padding_top">Cheque No.</label>
                      <div class="input-group">
                        <input type="text" class="form-control" value="{{ $payment_data->cheque_no }}" name="cheque_num" placeholder="Amount">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <label class="input_label_padding_top">Cheque Status</label>
                      <div class="input-group">
                        <select name="cheque_status" class="form-control" id="">
                          <option value="">Select</option>
                          <?php if( $payment_data->cheque_status == 1 ) { ?>
                            <option selected value="1">Cleared</option>
                          <?php } else { ?>
                            <option value="1">Cleared</option>
                          <?php } ?>
                          <?php if( $payment_data->cheque_status == 2 ) { ?>
                            <option selected value="2">Returened</option>
                          <?php } else { ?>
                            <option value="2">Returened</option>
                          <?php } ?>
                          <?php if( $payment_data->cheque_status == 3 ) { ?>
                            <option selected value="3">Cancelled</option>
                          <?php } else { ?>
                            <option value="3">Cancelled</option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <label class="input_label_padding_top">Cheaque Image</label>
                      <div class="input-group">
                          <img src="{{ url('assets/img/cheque_img/'.$payment_data->cheque_image) }}" alt="" width="200" height="100" srcset="">
                          <input type="hidden" name="cheque" value="{{ $payment_data->cheque_image }}">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <!-- <label class="input_label_padding_top">Profile</label> -->
                      <div class="input-group">
                        <input type="file" name="cheque_image" class="form-control" placeholder="">
                      </div>
                    </div>
                    <div class="col-md-12 mt-3">                    
                      <div class="input-group d-flex justify-content-center">
                        <button type="submit" id="submitBtn" class="btn btn-outline-success allBtnsize mb-0" data-bs-toggle="modal" data-bs-target="#exportexcel">Save</button>
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