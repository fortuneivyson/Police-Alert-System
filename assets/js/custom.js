
function mobilePress() {

    var contact = $('input[name=inputMobile]').val();

    if (contact.length === 0) {
        $('#msg-mobile').html('');
    }

    if (contact.length < 10) {
        $('#msg-mobile').css('color', 'red').html('Number is invalid');
    }

    if ((contact.length === 10 && contact[0] === "0" && (contact[1] === "6" || contact[1] === "7" || contact[1] === "8"))
        || (contact.length === 11 && contact[0] === "2" && contact[1] === "7")) {

        $('#msg-mobile').css('color', 'Green').html('Number is valid');
    } else if (contact.length > 10) {
        $('#msg-mobile').css('color', 'red').html('Number is invalid');

    }
    else {
        $('#msg-mobile').css('color', 'red').html('Number is invalid');
    }
}


function emailPress() {

        var count =0;
        let email = $('input[name=inputEmail]').val();
        let dotpos = email.indexOf(".");
        let afterDot = email.substr(dotpos,email.length -1);
        var iChar = ".";

        for (var i = 0; i < email.length; i++) {
            if (iChar.indexOf(email.charAt(i)) != -1) {
                count= count+1;
            }
        }

        if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email))
        {
            if(count > 2 || count ==0){
                $('#msg-email').css('color','red').html('Email is invalid');
            }else{
                if(afterDot=='.com' ||afterDot=='.co.za' ||afterDot=='.org.za'||afterDot=='.ac.za' ||afterDot=='.org' ||afterDot=='.tv'){
                    $('#msg-email').css('color','green').html('Email is valid');
                }else{
                    $('#msg-email').css('color','red').html('Email is invalid');
                }
            }

        }else{
            $('#msg-email').css('color','red').html('Email is invalid');
        }
}

function idPress() {

    let id = $('input[name=inputId]').val();
    let month = id.substr(2,2);
    let day = id.substr(4,2);
    let gender = id.substr(6,1);

    if(month > 0 && month < 13 && day > 0 && day < 32 && id.length == 13){

        gender >= 5 ? $('#msg-id').css('color','green').html('Identity number is valid')
                    : $('#msg-id').css('color','green').html('Identity number is valid');

        if(gender >= 5){
            $('input[name=inputGender]').val('male');
            $('input[name=register]').val('male');
        } else{
            $('input[name=inputGender]').val('female');
            $('input[name=register]').val('female');
        }
    }else{
        $('#msg-id').css('color','red').html('Identity number is invalid');
        $('input[name=inputGender]').val('');
        $('input[name=register]').val('');
    }
}

function passwordPress() {

    let password = $('input[name=inputPassword]').val();
    if(password.length > 0) {

        if(password.length < 8){
            $('#msg-password').css('color','red').html('Weak');
        }
        else if(!(/[a-z]/.test(password))){
            $('#msg-password').css('color','red').html('Weak');
        }
        else if(!(/[A-Z]/.test(password))){
            $('#msg-password').css('color','red').html('Weak');
        }
        else if(!(/[0-9]/.test(password))){
            $('#msg-password').css('color','red').html('Weak');
        }
        else if(!(/[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password))){
            $('#msg-password').css('color','red').html('Weak');
        }else{
            $('#msg-password').css('color','green').html('Strong');
        }
    }else{
        $('#msg-password').html('');
    }
}

function matchPress(){
    let password = $('input[name=inputPassword]').val();
    let password_confirm = $('input[name=inputPasswordConfirm]').val();

    if (password_confirm.length === 0) {
        $('#msg-confirm').html('');
        return;
    }

    if (password === password_confirm) {
        $('#msg-confirm').css('color','green').html('Password match');
        return;
    }
    else {
        $('#msg-confirm').css('color','red').html('Password dont match');
        return;
    }
}

function sendForm(){

    if($('#msg-confirm').css('color') =='rgb(255, 0, 0)'){
        $('input[name=inputPasswordConfirm]').focus();
        return false;
    }
    if($('input[name=inputPassword]').val() !== $('input[name=inputPasswordConfirm]').val()){
        $('#msg-confirm').css('color','red').html('Password dont match');
        $('input[name=inputPasswordConfirm]').focus();
        return false;
    }
    if($('#msg-email').css('color') =='rgb(255, 0, 0)'){
        $('input[name=inputEmail]').focus();
        return false;
    }

    if($('#msg-password').css('color') =='rgb(255, 0, 0)'){
        $('input[name=inputPassword]').focus();
        return false;
    }
    if($('#msg-id').css('color') =='rgb(255, 0, 0)'){
        $('input[name=inputId]').focus();
        return false;
    }

    if($('#msg-mobile').css('color') =='rgb(255, 0, 0)'){
        $('input[name=inputMobile]').focus();
        return false;
    }
    return true;

}

$(function () {
   $('.btn-profile').on('click',function () {
      $('.user-card-full').hide();
      $('.edit-profile').show();
   });
});
