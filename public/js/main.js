var today = gettodayDate();
$(document).ready(function() {
    setTimeout(function() {
        $('.alert').fadeOut('fast');
    }, 15000);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#province').change(function () {
        $.ajax({
            type: "POST",
            url: "getDistrictByProvince",
            data: {
                    id:$("#province").val(),
                    },
            dataType: 'json',
            encode:true,
            success: function (value) {
                $('#district').empty();
                var option = '<option>चयन गर्नुहोस्</option>';
                $('#district').append(option);
                $('#local_level_gov').empty();
                $('#local_level_gov').append(option);
                var option = '<option>चयन गर्नुहोस्</option>';
                $.each(value, function(k, v) {
                    var option = '<option value="'+v.id+'">'+v.name_np+'</option>';
                    $('#district').append(option);
                });
            }

        });
    });

    $('#district').change(function () {
        $.ajax({
            type: "POST",
            url: "getLocalGovbyDistrict",
            data: {
                    id:$("#district").val(),
                    },
            dataType: 'json',
            encode:true,
            success: function (value) {
                $('#local_level_gov').empty();
                var option = '<option>चयन गर्नुहोस्</option>';
                $('#local_level_gov').append(option);
                $.each(value, function(k, v) {
                    var option = '<option value="'+v.id+'">'+v.name_np+'</option>';
                    $('#local_level_gov').append(option);
                });
            }

        });
    });

    $("#dob_bs").nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,
        readOnlyInput: true,
        disableAfter:today,
        // unicodeDate: true,
        onChange: function() {
            var date = NepaliFunctions.ConvertToDateObject($('#dob_bs').val(),'YYYY-MM-DD');
            var ad_date = NepaliFunctions.BS2AD(date);
            var date_format = NepaliFunctions.ConvertDateFormat(ad_date, 'YYYY-MM-DD');
            $('#dob_ad').val(date_format);
            var age = getAge(date_format);
            $('#age').val(NepaliFunctions.ConvertToNumber(age));
        }
    });
});

$(document).ready(function() {
    $("#ctzn_date").nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,
        readOnlyInput: true,
        // unicodeDate: true,
        disableAfter:today,
    });
});

$(document).ready(function() {
    $("#dob_bs_sc").nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,
        readOnlyInput: true,
        disableAfter:today,
        // unicodeDate: true,
        onChange: function() {
            var date = NepaliFunctions.ConvertToDateObject($('#dob_bs_sc').val(),'YYYY-MM-DD');
            var ad_date = NepaliFunctions.BS2AD(date);
            var date_format = NepaliFunctions.ConvertDateFormat(ad_date, 'YYYY-MM-DD');
            $('#dob_ad_sc').val(date_format);
            var age = getAge(date_format);
            if (age<60) {
                $('#dob_ad_sc').val('');
                $('#dob_bs_sc').val('');
                $('#age').val('');
                alert('age not reached');
            }
            else{
                $('#age').val(NepaliFunctions.ConvertToNumber(age));
            }
        }
    });
});
$(document).ready(function() {
    $("#dob_bs_o").nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,
        readOnlyInput: true,
        disableAfter:today,
        // unicodeDate: true,
        onChange: function() {
            var date = NepaliFunctions.ConvertToDateObject($('#dob_bs_o').val(),'YYYY-MM-DD');
            var ad_date = NepaliFunctions.BS2AD(date);
            var date_format = NepaliFunctions.ConvertDateFormat(ad_date, 'YYYY-MM-DD');
            $('#dob_ad_o').val(date_format);
            var age = getAge(date_format);
            if (age>18) {
                $('#dob_ad_o').val('');
                $('#dob_bs_o').val('');
                $('#age').val('');
                alert('Age exceeds!');
            }
            else{
                $('#age').val(NepaliFunctions.ConvertToNumber(age));
            }
        }
    });
});

$(".checkAll").on('change', function(){
    var checked = $(this).is(':checked');
    if(checked){
        $(".printCheck").prop("checked", true);
        $('#printbutton').show();
        $('#listbutton').hide();
    }else{
        $(".printCheck").prop("checked", false);
        $('#printbutton').hide();
        $('#listbutton').show();  
    }
    
});
// $(".checkAll").on('click', function(){
//     $("#myCheck").prop("checked", false);
// });

$(".printCheck").on('click', function() {
    if($(".printCheck:checked").length > 0 ){
        // console.log('here');
        $('#printbutton').show();
        $('#listbutton').hide();
    }else{
        // console.log('there');
        $('#printbutton').hide();
        $('#listbutton').show();
    }
});

// on click function to save print request
$("#printbutton").on('click',function(e) {
    e.preventDefault();
    var checkbox_value = "";
    var token = "{{ csrf_token() }}";
    $(":checkbox").each(function () {
        var ischecked = $(this).is(":checked");
        if (ischecked) {
            checkbox_value = $('.printCheck:checked').serializeArray();
        }
    });
    // console.log(checkbox_value);

    $.ajax({
        type: "POST",
        url: "sCardPrintRequest",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
                "id":checkbox_value,
                },
        // beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
        dataType: 'json',
        encode:true,
        success: function (value) {
            if(value.success){
                // console.log(value.success);
                $('#printbutton').hide();
                $('#listbutton').show();
                $(".checkAll").prop("checked", false);
                $(".printCheck").prop("checked", false);
                $(".alert_message").prepend('<div class="alert alert-success">'+value.success+'</div>');
            }
            if(value.error){
                // console.log(value.error);
                $(".alert_message").prepend('<div class="alert alert-danger">'+value.error+'</div>');
            }
        }

    });
});

//on click funtion to approve and add verifier details
$('#s_approveButton').on('click', function (e) {
    var baseUrl = $("#baseUrl").val();
    var host = baseUrl +'/getActiveVerifier';
    console.log(baseUrl);
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: host,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        // data: {
        //         id:$("#province").val(),
        //         },
        dataType: 'json',
        encode:true,
        success: function (value) {
            $('#s_pop_up').show();
            $('#s_approveButton').hide();
            $('#printFirst').hide();
            $('#printLast').hide();
            $('#s_verifier_select').empty();
            var option = '<option>चयन गर्नुहोस्</option>';
            $('#s_verifier_select').append(option);
            $.each(value, function(k, v) {
                var option = '<option value="'+v.id+'">'+v.name_np+' ('+v.position_np+')'+'</option>';
                $('#s_verifier_select').append(option);
            });
        }

    });
})

$("#s_verifierButton").on('click',function(e) {
    e.preventDefault();
    var baseUrl = $("#baseUrl").val();
    var host = baseUrl +'/sCardApproval';
    // console.log(host);
    // var print_id = $('#print_id')
    var id = $('#s_verifier_select').val();
    var senior_id = $('#senior_id').val();
    var a_date = $('#dob_bs').val();
    $.ajax({
        type: "GET",
        url: host,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
                "id":id,
                "senior_id":senior_id,
                "a_date": a_date,
                },
        // beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
        dataType: 'json',
        encode:true,
        success: function (value) {
            if(value.success){
                // console.log(value.success);
                $(".alert_message").prepend('<div class="alert alert-success">'+value.success+'</div>');
                // $('#s_pop_up').hide();
                // alert('Print request have been approved.');
                location.reload(true);
            }
            if(value.error){
                // console.log(value.error);
                $(".alert_message").prepend('<div class="alert alert-danger">'+value.error+'</div>');
            }
        }
    });
});

$("#d_verifierButton").on('click',function(e) {
    e.preventDefault();
    var baseUrl = $("#baseUrl").val();
    var host = baseUrl +'/dCardApproval';
    var id = $('#s_verifier_select').val();
    var dis_id = $('#dis_id').val();
    var a_date = $('#dob_bs').val();
    console.log(baseUrl,a_date);
    $.ajax({
        type: "GET",
        url: host,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
                "id":id,
                "dis_id":dis_id,
                "a_date": a_date,
                },
        // beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
        dataType: 'json',
        encode:true,
        success: function (value) {
            if(value.success){
                // console.log(value.success);
                $(".alert_message").prepend('<div class="alert alert-success">'+value.success+'</div>');
                // $('#s_pop_up').hide();
                // alert('Print request have been approved.');
                location.reload(true);
            }
            if(value.error){
                // console.log(value.error);
                $(".alert_message").prepend('<div class="alert alert-danger">'+value.error+'</div>');
            }
        }
    });
});


$("#single_verifierButton").on('click',function(e) {
    e.preventDefault();
    var baseUrl = $("#baseUrl").val();
    var host = baseUrl +'/singleCardApproval';
    var id = $('#s_verifier_select').val();
    var single_id = $('#single_id').val();
    var a_date = $('#dob_bs').val();
    console.log(baseUrl,single_id);
    $.ajax({
        type: "GET",
        url: host,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
                "id":id,
                "single_id":single_id,
                "a_date": a_date,
                },
        // beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
        dataType: 'json',
        encode:true,
        success: function (value) {
            if(value.success){
                // console.log(value.success);
                $(".alert_message").prepend('<div class="alert alert-success">'+value.success+'</div>');
                // $('#s_pop_up').hide();
                // alert('Print request have been approved.');
                location.reload(true);
            }
            if(value.error){
                // console.log(value.error);
                $(".alert_message").prepend('<div class="alert alert-danger">'+value.error+'</div>');
            }
        }
    });
});
$("#orphan_verifierButton").on('click',function(e) {
    e.preventDefault();
    var baseUrl = $("#baseUrl").val();
    var host = baseUrl +'/orphanCardApproval';
    var id = $('#s_verifier_select').val();
    var orphan_id = $('#orphan_id').val();
    var a_date = $('#dob_bs').val();
    console.log(baseUrl,orphan_id);
    $.ajax({
        type: "GET",
        url: host,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
                "id":id,
                "orphan_id":orphan_id,
                "a_date": a_date,
                },
        // beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
        dataType: 'json',
        encode:true,
        success: function (value) {
            if(value.success){
                // console.log(value.success);
                $(".alert_message").prepend('<div class="alert alert-success">'+value.success+'</div>');
                // $('#s_pop_up').hide();
                // alert('Print request have been approved.');
                location.reload(true);
            }
            if(value.error){
                // console.log(value.error);
                $(".alert_message").prepend('<div class="alert alert-danger">'+value.error+'</div>');
            }
        }
    });
});

$("#printButton").on('click',function(e) {
     window.print();
});

$(document).ready(function() {
    $('#fiscalYear').change(function () {
        var fiscalyear = $("#fiscalYear").val();
        var firstyear = fiscalyear.substring(0, 4);

        var firstdate = getFirstDate(firstyear);
        var lastdate  = getLastDate(firstyear);

        $('#firstdate').val(firstdate);
        $('#lastdate').val(lastdate);
    });
});


function getFirstDate(firstyear){
    var firstdate_np =  firstyear + '-04-01';
    var fdate = NepaliFunctions.ConvertToDateObject(firstdate_np,'YYYY-MM-DD');
    var ad_fdate = NepaliFunctions.BS2AD(fdate);
    var firstdate = NepaliFunctions.ConvertDateFormat(ad_fdate, 'YYYY-MM-DD');
    return firstdate;
}

function getLastDate(firstyear){
    var lastyear = ++firstyear;
    var lastday = NepaliFunctions.GetDaysInBsMonth(lastyear,3);
    var lastdate_np =  lastyear + '-03-'+lastday;
    var date = NepaliFunctions.ConvertToDateObject(lastdate_np,'YYYY-MM-DD');
    var ad_date = NepaliFunctions.BS2AD(date);
    var lastdate = NepaliFunctions.ConvertDateFormat(ad_date, 'YYYY-MM-DD');
    return lastdate;
}



function getAge(dateString){
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) 
    {
        age--;
    }

    return age;
}


function gettodayDate(){
    var tdaten = NepaliFunctions.GetCurrentBsDate();
    var formatted = NepaliFunctions.ConvertDateFormat(tdaten, "YYYY-MM-DD");
    return formatted;
}

function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
