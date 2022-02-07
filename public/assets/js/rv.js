$(document).ready(function(){
    $('img').bind('contextmenu', function(e) {
        return false;
    });
    $("#signup").prop("disabled", true);
    //$('#registerform').validate();
    $('.iCheck-flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-red',
    radioClass: 'iradio_flat-red',
    increaseArea: '20%' // optional
     });
     $(".custom-file-input").on("change", function() {
        $("#signup").prop("disabled", false);
        if(this.files[0].size > 2097152){
            $("#signup").prop("disabled", true);
            $(this).val('');
            $(this).siblings(".custom-file-label").addClass("selected").html('Choose image (Max 2MB)');
            $('#alert-msg').addClass("alert-danger");
            $('#alert-msg').html("Image file is too big!");
            $('#alert-msg').show();
            alert("File is too big!");
        return false;
        }
        $('#alert-msg').hide();
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
     $('#confirmcheck').on('ifChanged', function(event) {
        if(event.target.checked){
        $('#next').removeAttr("disabled");
    }else{
        $('#next').attr("disabled", true);
    }
    });
    $("form").on("submit", function (e) {
        if(!$("#tfslip").val()){
        $("#signup").prop("disabled", true);
        $('#alert-msg').show();
        $('#alert-msg').addClass("alert-danger");
        $('#alert-msg').html("Image Can't Be Empty");
        return false;
         }
         $('#alert-msg').hide();
    $('#back').attr("disabled", true);
    $("#signup").prop("disabled", true);
    $("#signup").html(
    `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
    );
    });
    $("#join").on("change", function () {
        var val = $(this).val();
if(val === "1") {
    $("#nickname").val("");
    $("#nicklabel").html("Nickname Line Square Reveluv INA Union");
    $("#nickinfo").html("Enter Your Nickname In Line Square <b>Reveluv INA Union</b>");
    $("#nickname").attr("placeholder", "Nickname").blur().focus();
    $("#nick").show();
     }
    else if(val === "2") {
    $("#nickname").val("");
    $("#nicklabel").html("Twitter Username");
    $("#nickinfo").html("Enter Your Twitter Username");
    $("#nickname").attr("placeholder", "@username").blur().focus();
    $("#nick").show();
    }
    });
    $("#next").click(function(){
        var settings = {
        "async": true,
        "crossDomain": true,
        "url": url+"/api/next",
        "method": "POST",
        "data": {'step': 2},
        beforeSend: function(xhr) {
            $('#next').attr("disabled", true);
            $("#next").html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`);
            xhr.setRequestHeader("Authorization", 'Bearer ' + localStorage.getItem('AUTH-TOKEN'));
        },"headers": {"accept": "application/json"}
    }
    $.ajax(settings).done(function(response) {
        location.reload();
    }).fail(function(response) {
        $('#alert-message').show();
        $('#alert-msg').addClass("alert-danger");
        $('#alert-msg').html(response.message);
    });
    });
    $("#finish").click(function(){
        var settings = {
            "async": true,
            "crossDomain": true,
            "url": url+"/api/next",
            "method": "POST",
            "data": {'step': 1},
            beforeSend: function(xhr) {
                $("#signup").prop("disabled", true);
                $('#finish').attr("disabled", true);
                $("#finish").html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`);
                xhr.setRequestHeader("Authorization", 'Bearer ' + localStorage.getItem('AUTH-TOKEN'));
            },"headers": {"accept": "application/json"}
        }
        $.ajax(settings).done(function(response) {
            window.location.replace(url);
        }).fail(function(response) {
            $('#alert-message').show();
            $('#alert-msg').addClass("alert-danger");
            $('#alert-msg').html(response.message);
        });
        });  
    $("#back").click(function(){
        var settings = {
        "async": true,
        "crossDomain": true,
        "url": url+"/api/next",
        "method": "POST",
        "data": {'step': 1},
        beforeSend: function(xhr) {
            $("#signup").prop("disabled", true);
            $('#back').attr("disabled", true);
            $("#back").html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`);
            xhr.setRequestHeader("Authorization", 'Bearer ' + localStorage.getItem('AUTH-TOKEN'));
        },"headers": {"accept": "application/json"}
    }
    $.ajax(settings).done(function(response) {
        location.reload();
    }).fail(function(response) {
        $('#alert-message').show();
        $('#alert-msg').addClass("alert-danger");
        $('#alert-msg').html(response.message);
    });
    });  
        });