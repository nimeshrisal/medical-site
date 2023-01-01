              <!-- partial:../../partials/_footer.html -->
              <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                  <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"><script>document.write(/\d{4}/.exec(Date())[0])</script></span>
                </div>
              </footer>
              <!-- partial -->
            </div>
          </div>
        </div>


    <!-- plugins:js -->
    <script src="{{asset('/skydash/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('/skydash/vendors/chart.js/Chart.min.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- <script src="{{asset(' /skydash/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script> -->
    <script src="{{asset(' /skydash/vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset(' /js/nepali.datepicker.v3.7.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <script src="{{ asset(' /js/main.js') }}"></script>
    <!-- inject:js -->
    @yield('scripts')
    <script src="{{asset('/skydash/js/off-canvas.js')}}"></script>
    <script src="{{asset('/skydash/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('/skydash/js/template.js')}}"></script>
    <script src="{{asset('/skydash/js/settings.js')}}"></script>
    <script src="{{asset('/skydash/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('/skydash/js/file-upload.js')}}"></script>
    <!-- <script src="{{asset('/skydash/js/typeahead.js')}}"></script> -->
    <script src="{{asset('/skydash/js/select2.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{asset('/js/validate.min.js')}}"></script>
    <script src="{{asset('/js/additional.validate.min.js')}}"></script>
    <script src="../site/js/main.js"></script>
    



    @stack('scripts')

    <!-- End custom js for this page-->
  </body>
</html>
