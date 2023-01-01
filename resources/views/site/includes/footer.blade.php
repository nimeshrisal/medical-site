
<!-- footer start -->
<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget">
                        <div class="footer_logo">
                            <a href="#">
                                <img src="../site/img/footer_logo.png" alt="">
                            </a>
                        </div>
                        <p>
                                Firmament morning sixth subdue darkness 
                                creeping gathered divide.
                        </p>
                        <div class="socail_links">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="ti-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ti-twitter-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-xl-2 offset-xl-1 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                                Departments
                        </h3>
                        <ul>
                            @foreach($services as $service)
                            <li><a href="{{route('service.detail',$service->id)}}">{{$service->title}}</a></li>
                            @endforeach
                           
                        </ul>

                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-lg-2">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                                Useful Links
                        </h3>
                        <ul>
                            <li><a href="{{route('blog')}}">Blogs</a></li>
                            <li><a href="{{route('doctors')}}">Doctors</a></li>
                            <li><a href="{{route('contact')}}">Contact</a></li>
                            <li><a class="popup-with-form" href="#test-form"> Appointment</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                                Address
                        </h3>
                        <p>
                            {{$site->address}}<br>
                            {{$site->contact_no}}<br>
                            {{$site->email}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end  -->
<!-- link that opens popup -->

<!-- form itself end-->
<form id="test-form" class="white-popup-block mfp-hide"  action="{{route('appointments.save')}}" method="POST" >
    {{csrf_field()}}
    <div class="popup_box ">
        <div class="popup_inner">
            <h3>Make an Appointment</h3>
            {{-- <form id="test-form" class="white-popup-block mfp-hide"> --}}
                <div class="row">
                    <div class="col-xl-6">
                        <input id="datepicker" class="form-control" name="date" placeholder="Pick date" id="date">
                    </div>
                    {{-- <div class="col-xl-6">
                        <input id="datepicker2" placeholder="Suitable time">
                    </div> --}}
                    <div class="col-xl-6 form-group">
                        <select class="form-control wide dept" id="" name="department">
                            <option data-display="Select Department">Department</option>
                            <?php $dept = getDept(); ?>
                            @foreach ($dept as $item)
                                <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xl-6 form-group">
                        <select class="form-control wide " id="doc" name="doctor">
                            <option data-display="Doctors">Doctors</option>
                        </select>
                    </div>
                    <div class="col-xl-6">
                        <input type="text" class="form-control" placeholder="Name" name="name">
                    </div>
                    <div class="col-xl-6">
                        <input type="text" class="form-control" placeholder="Phone no." name="phone_no">
                    </div>
                    <div class="col-xl-12">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                    </div>
                    <div class="col-xl-12">
                        <button type="submit" id="submit" class="boxed-btn3">Confirm</button>
                    </div>
                </div>
            {{-- </form> --}}
        </div>
    </div>
</form>
<!-- form itself end -->

<!-- JS here -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="../site/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="../site/js/vendor/jquery-1.12.4.min.js"></script>
<script src="../site/js/popper.min.js"></script>
<script src="../site/js/bootstrap.min.js"></script>
<script src="../site/js/owl.carousel.min.js"></script>
<script src="../site/js/isotope.pkgd.min.js"></script>
<script src="../site/js/ajax-form.js"></script>
<script src="../site/js/waypoints.min.js"></script>
<script src="../site/js/jquery.counterup.min.js"></script>
<script src="../site/js/imagesloaded.pkgd.min.js"></script>
<script src="../site/js/scrollIt.js"></script>
<script src="../site/js/jquery.scrollUp.min.js"></script>
<script src="../site/js/wow.min.js"></script>
<script src="../site/js/nice-select.min.js"></script>
<script src="../site/js/jquery.slicknav.min.js"></script>
<script src="../site/js/jquery.magnific-popup.min.js"></script>
<script src="../site/js/plugins.js"></script>
<script src="../site/js/gijgo.min.js"></script>
<!--contact js-->
<script src="../site/js/contact.js"></script>
<script src="../site/js/jquery.ajaxchimp.min.js"></script>
<script src="../site/js/jquery.form.js"></script>
<script src="../site/js/jquery.validate.min.js"></script>
<script src="../site/js/mail-script.js"></script>

<script src="../site/js/main.js"></script>
<script>
$('#datepicker').datepicker({
    iconsLibrary: 'fontawesome',
    icons: {
        rightIcon: '<span class="fa fa-caret-down"></span>'
    }
});
$('#datepicker2').datepicker({
    iconsLibrary: 'fontawesome',
    icons: {
        rightIcon: '<span class="fa fa-caret-down"></span>'
    }

});

$('.dept').on('change',function(){
    var id = $(this).val();
    $.ajax({
        type: 'get',
        url : '{{route("sortDoc")}}',
        data:{
            'id':id
        },
        success: function(data){
            op = ''
            // console.log(data)
            $.each(data.doc,function(key, item) {
                // console.log(item);
                op += '<option value="'+item.id+'">'+item.name+'</option>'
            });
            // console.log(op);
            $('#doc').empty();
            $('#doc').append(op);
        }
    })
})
// $(function() {
// $('.js-example-basic-multiple').select2();
// });

</script>
</body>

</html>