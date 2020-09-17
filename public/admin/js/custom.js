//##################################//
//    Admin Password Validation     //
//##################################//

$(document).ready(function(){
    // Check admin password is correct or not
    $("#currentPassword").keyup(function(){
        var currentPassword = $("#currentPassword").val();
        // alert(currentPassword);
        $.ajax({
            type: 'post',
            url: '/admin/check-admin-pass',
            data: {currentPassword:currentPassword},
            success:function(resp){
                // alert(resp);
                if(resp == 'false')
                {
                    $("#currentPasswordMsg").html("<small class='text-danger'><i class='fa fa-exclamation-circle'></i> Current Password is incorrect!</small>");
                    $("#changePassSubmitBtn").addClass("disabled");
                    $("#currentPassword").removeClass("is-valid");
                    $("#currentPassword").addClass("is-invalid");
                    $("#currentPasswordGlobalMsg").html("<small class='text-danger pt-3'><i class='fa fa-exclamation-circle'></i> Please fix the form field issues!</small>");
                }else if(resp == 'true')
                {
                    $("#currentPasswordMsg").html("<small class='text-success'><i class='fa fa-check-circle'></i> Current Password is correct!</small>");
                    $("#changePassSubmitBtn").removeClass("disabled");
                    $("#currentPassword").removeClass("is-invalid");
                    $("#currentPassword").addClass("is-valid");
                    $("#currentPasswordGlobalMsg").html("");
                }
            },error:function(){
                $("#currentPasswordGlobalMsg").html("<small class='text-danger'><i class='fa fa-exclamation-circle'></i> Something is wrong!</small>");
            }
        });
    });

    // New Password Admin Validation
    $("#newAdminPassword").focus(function(){
        // show messages on focus
        $("#adminPassValidation").removeClass("d-none");
        $("#adminPassValidation").addClass("d-block");
    });
    $("#newAdminPassword").blur(function(){
        // hide messages on blur
        $("#adminPassValidation").removeClass("d-block");
        $("#adminPassValidation").addClass("d-none");
    });

    $("#newAdminPassword").keyup(function()
    {
        var newPassword = $("#newAdminPassword").val();
        // Validate lowercase letters
        var lowerCaseLetters = /[a-z]/g;
        if(newPassword.match(lowerCaseLetters))
        {
            $("#lowercaseValidation").removeClass('text-danger');
            $("#lowercaseValidation").addClass('text-success');
            $('#lowercaseIcon').removeClass('fa-exclamation-circle');
            $("#lowercaseIcon").addClass('fa-check-circle');
            $("#changePassSubmitBtn").removeClass("disabled");
            $("#currentPasswordGlobalMsg").html("");
        }else{
            $("#lowercaseValidation").addClass('text-danger');
            $("#lowercaseValidation").removeClass('text-success');
            $('#lowercaseIcon').addClass('fa-exclamation-circle');
            $("#lowercaseIcon").removeClass('fa-check-circle');
            $("#changePassSubmitBtn").addClass("disabled");
            $("#currentPasswordGlobalMsg").html("<small class='text-danger pt-3'><i class='fa fa-exclamation-circle'></i> Please fix the form field issues!</small>");
        }

        // Validate uppercase letters
        var upperCaseLetters = /[A-Z]/g;
        if(newPassword.match(upperCaseLetters))
        {
            $("#uppercaseValidation").removeClass('text-danger');
            $("#uppercaseValidation").addClass('text-success');
            $('#uppercaseIcon').removeClass('fa-exclamation-circle');
            $("#uppercaseIcon").addClass('fa-check-circle');
            $("#changePassSubmitBtn").removeClass("disabled");
            $("#currentPasswordGlobalMsg").html("");
        }else{
            $("#uppercaseValidation").addClass('text-danger');
            $("#uppercaseValidation").removeClass('text-success');
            $('#uppercaseIcon').addClass('fa-exclamation-circle');
            $("#uppercaseIcon").removeClass('fa-check-circle');
            $("#changePassSubmitBtn").addClass("disabled");
            $("#currentPasswordGlobalMsg").html("<small class='text-danger pt-3'><i class='fa fa-exclamation-circle'></i> Please fix the form field issues!</small>");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if(newPassword.match(numbers))
        {
            $("#numberValidation").removeClass('text-danger');
            $("#numberValidation").addClass('text-success');
            $('#numbersIcon').removeClass('fa-exclamation-circle');
            $("#numbersIcon").addClass('fa-check-circle');
            $("#changePassSubmitBtn").removeClass("disabled");
            $("#currentPasswordGlobalMsg").html("");
        }else{
            $("#numberValidation").addClass('text-danger');
            $("#numberValidation").removeClass('text-success');
            $('#numbersIcon').addClass('fa-exclamation-circle');
            $("#numbersIcon").removeClass('fa-check-circle');
            $("#changePassSubmitBtn").addClass("disabled");
            $("#currentPasswordGlobalMsg").html("<small class='text-danger pt-3'><i class='fa fa-exclamation-circle'></i> Please fix the form field issues!</small>");
        }

        // Validate password length
        if(newPassword.length >= 8)
        {
            $("#lengthValidation").removeClass('text-danger');
            $("#lengthValidation").addClass('text-success');
            $('#lengthIcon').removeClass('fa-exclamation-circle');
            $("#lengthIcon").addClass('fa-check-circle');
            $("#changePassSubmitBtn").removeClass("disabled");
            $("#currentPasswordGlobalMsg").html("");
        }else{
            $("#lengthValidation").addClass('text-danger');
            $("#lengthValidation").removeClass('text-success');
            $('#lengthIcon').addClass('fa-exclamation-circle');
            $("#lengthIcon").removeClass('fa-check-circle');
            $("#changePassSubmitBtn").addClass("disabled");
            $("#currentPasswordGlobalMsg").html("<small class='text-danger pt-3'><i class='fa fa-exclamation-circle'></i> Please fix the form field issues!</small>");
        }

    });

    // Check New Password is matching with Confirm Password
    $("#confirmAdminPassword").keyup(function(){
        var newPassword = $("#newAdminPassword").val();
        var confirmPassword = $("#confirmAdminPassword").val();
        // alert(confirmPassword);
        if(newPassword != confirmPassword)
        {
            $("#confirmPasswordMsg").html("<small class='text-danger'><i class='fa fa-exclamation-circle'></i> Confirm Password not match with New Password!</small>");
            $("#changePassSubmitBtn").addClass("disabled");
            $("#confirmAdminPassword").removeClass("is-valid");
            $("#confirmAdminPassword").addClass("is-invalid");
            $("#currentPasswordGlobalMsg").html("<small class='text-danger pt-3'><i class='fa fa-exclamation-circle'></i> Please fix the form field issues!</small>");
        }else if(newPassword == confirmPassword){
            $("#confirmPasswordMsg").html("<small class='text-success'><i class='fa fa-check-circle'></i> Confirm Password match with New Password!</small>");
            $("#changePassSubmitBtn").removeClass("disabled");
            $("#confirmAdminPassword").removeClass("is-invalid");
            $("#confirmAdminPassword").addClass("is-valid");
            $("#currentPasswordGlobalMsg").html("");
        }
    });
});

