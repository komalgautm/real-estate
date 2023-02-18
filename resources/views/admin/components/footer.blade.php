<footer class="card footer py-4">

        <div class="container-fluid">

          <div class="row align-items-center justify-content-lg-between">

            <div class="col-lg-12 mb-lg-0 mb-4">

              <div class="copyright text-center text-sm text-muted text-lg-center">

                  Copyright © 2022 <i class="fa fa-heart"></i>

                <a href="#!" class="font-weight-bold" target="_blank">Real Estate</a> All rights reserved. 

              </div>

            </div>

       

          </div>

        </div>

      </footer>

  </main>

  

  <!--   Core JS Files   -->

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <script src="{{ url('/assets/js/core/popper.min.js')}}"></script>

  <script src="{{ url('/assets/js/core/bootstrap.min.js')}}"></script>

  <script src="{{ url('/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>

  <script src="{{ url('/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>

  <script src="{{ url('/assets/js/plugins/chartjs.min.js') }}"></script>
  
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

  <script src="https://cdn.zingchart.com/zingchart.min.js"></script>

  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>



  <script>

    var win = navigator.platform.indexOf('Win') > -1;

    if (win && document.querySelector('#sidenav-scrollbar')) {

      var options = {

        damping: '0.5'

      }

      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);

    }

  </script>

  <script src="{{ url('/assets/js/custom.js') }}"></script>



  <script type="text/javascript">

    $(document).ready(function() {

        $('#example').DataTable();

    } );

  </script>



</body>



</html>