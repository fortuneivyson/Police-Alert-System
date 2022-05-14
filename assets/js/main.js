function mobilePress(n) {

    if(n=='user'){
        var contact = $('input[name=user-mobile]').val();

        if (contact.length === 0) {
            $('#user-msg-mobile').html('');
        }

        if (contact.length < 10) {
            $('#user-msg-mobile').css('color', 'red').html('Number is invalid');
        }

        if ((contact.length === 10 && contact[0] === "0" && (contact[1] === "6" || contact[1] === "7" || contact[1] === "8"))
            || (contact.length === 11 && contact[0] === "2" && contact[1] === "7")) {

            $('#user-msg-mobile').css('color', 'Green').html('Number is valid');
        } else if (contact.length > 10) {
            $('#user-msg-mobile').css('color', 'red').html('Number is invalid');

        }
        else {
            $('#user-msg-mobile').css('color', 'red').html('Number is invalid');
        }
    }else if(n=='police'){
        var contact = $('input[name=police-mobile]').val();

        if (contact.length === 0) {
            $('#police-msg-mobile').html('');
        }

        if (contact.length < 10) {
            $('#police-msg-mobile').css('color', 'red').html('Number is invalid');
        }

        if ((contact.length === 10 && contact[0] === "0" && (contact[1] === "6" || contact[1] === "7" || contact[1] === "8"))
            || (contact.length === 11 && contact[0] === "2" && contact[1] === "7")) {

            $('#police-msg-mobile').css('color', 'Green').html('Number is valid');
        } else if (contact.length > 10) {
            $('#police-msg-mobile').css('color', 'red').html('Number is invalid');

        }
        else {
            $('#police-msg-mobile').css('color', 'red').html('Number is invalid');
        }
    }else if(n=='add'){
        var contact = $('input[name=add-mobile]').val();

        if (contact.length === 0) {
            $('#val-mobile').html('');
        }

        if (contact.length < 10) {
            $('#val-mobile').css('color', 'red').html('Number is invalid');
        }

        if ((contact.length === 10 && contact[0] === "0" && (contact[1] === "6" || contact[1] === "7" || contact[1] === "8"))
            || (contact.length === 11 && contact[0] === "2" && contact[1] === "7")) {

            $('#val-mobile').css('color', 'Green').html('Number is valid');
        } else if (contact.length > 10) {
            $('#val-mobile').css('color', 'red').html('Number is invalid');

        }
        else {
            $('#val-mobile').css('color', 'red').html('Number is invalid');
        }
    }

}

function emailPress(n) {

    var count =0;
    if(n =='add'){
        let email = $('input[name=add-email]').val();
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
                $('#val-email').css('color','red').html('<span>Invalid email</span>');
            }else{
                if(afterDot=='.com' ||afterDot=='.co.za' ||afterDot=='.org.za'||afterDot=='.ac.za' ||afterDot=='.org' ||afterDot=='.tv'){
                    $('#val-email').css('color','green').html('<span>Valid email</span>');
                }else{
                    $('#val-email').css('color','red').html('<span>Invalid email</span>');
                }
            }

        }
        else{
            $('#student-email').css('color','red').html('<span>Invalid email</span>');
        }
    }else if(n =='police'){
        let email = $('input[name=police-email]').val();
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
                $('#police-msg-email').css('color','orange').html('<span>Invalid email</span>');
            }else{
                if(afterDot=='.com' ||afterDot=='.co.za' ||afterDot=='.org.za'||afterDot=='.ac.za' ||afterDot=='.org' ||afterDot=='.tv'){
                    $('#police-msg-email').css('color','green').html('<span>Valid email</span>');
                }else{
                    $('#police-msg-email').css('color','orange').html('<span>Invalid email</span>');
                }
            }

        }
        else{
            $('#police-msg-email').css('color','orange').html('<span>Invalid email</span>');
        }
    }else if(n =='user'){
        let email = $('input[name=user-email]').val();
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
                $('#user-msg-email').css('color','red').html('<span>Invalid email</span>');
            }else{
                if(afterDot=='.com' ||afterDot=='.co.za' ||afterDot=='.org.za'||afterDot=='.ac.za' ||afterDot=='.org' ||afterDot=='.tv'){
                    $('#user-msg-email').css('color','green').html('<span>Valid email</span>');
                }else{
                    $('#user-msg-email').css('color','red').html('<span>Invalid email</span>');
                }
            }

        }
        else{
            $('#user-msg-email').css('color','red').html('<span>Invalid email</span>');
        }
    }


}

function idPress(n) {

    if(n == 'police'){
        let id = $('input[name=police-id]').val();
        let month = id.substr(2,2);
        let day = id.substr(4,2);
        let gender = id.substr(6,1);

        if(month > 0 && month < 13 && day > 0 && day < 32 && id.length == 13){

            gender >= 5 ? $('#police-msg-id').css('color','green').html('<span>Valid ID</span> ')
                : $('#police-msg-id').css('color','green').html('<span>Valid ID</span>');
            if(gender >= 5){
                $('input[name=police-gender]').val('male');
                $('input[name=gender]').val('male');
            } else{
                $('input[name=police-gender]').val('female');
                $('input[name=gender]').val('female');
            }

        }else{
            $('input[name=police-gender]').val('');
            $('input[name=gender]').val('');
            $('#police-msg-id').css('color','red').html('<span>Invalid ID</span>');
        }
    }else if(n == 'user'){
        let id = $('input[name=user-id]').val();
        let month = id.substr(2,2);
        let day = id.substr(4,2);
        let gender = id.substr(6,1);

        if(month > 0 && month < 13 && day > 0 && day < 32 && id.length == 13){

            gender >= 5 ? $('#user-msg-id').css('color','green').html('<span>Valid ID</span> ')
                : $('#user-msg-id').css('color','green').html('<span>Valid ID</span>');

            if(gender >= 5){
                $('input[name=user-gender]').val('male');
                $('input[name=gender]').val('male');
            } else{
                $('input[name=user-gender]').val('female');
                $('input[name=gender]').val('female');
            }
        }else{
            $('input[name=user-gender]').val('');
            $('input[name=gender]').val('');
            $('#user-msg-id').css('color','red').html('<span>Invalid ID</span>');
        }
    }else if(n == 'add'){
        let id = $('input[name=add-id]').val();
        let month = id.substr(2,2);
        let day = id.substr(4,2);
        let gender = id.substr(6,1);

        if(month > 0 && month < 13 && day > 0 && day < 32 && id.length == 13){

            gender >= 5 ? $('#val-id').css('color','green').html('<span>Valid ID</span> ')
                : $('#val-id').css('color','green').html('<span>Valid ID</span>');

            if(gender >= 5){
                $('input[name=add-gender]').val('male');
                $('input[name=gender]').val('male');
            } else{
                $('input[name=add-gender]').val('female');
                $('input[name=gender]').val('female');
            }
        }else{
            $('input[name=add-gender]').val('');
            $('input[name=gender]').val('');
            $('#val-id').css('color','red').html('<span>Invalid ID</span>');
        }
    }

}

function passwordPress(n) {

    if(n == 'police'){
        let password = $('input[name=police-password]').val();
        if(password.length > 0) {

            if(password.length < 8){
                $('#police-msg-password').css('color','red').html('Unaccepted Password');
            }
            else if(!(/[a-z]/.test(password))){
                $('#police-msg-password').css('color','red').html('Unaccepted Password');
            }
            else if(!(/[A-Z]/.test(password))){
                $('#police-msg-password').css('color','red').html('Unaccepted Password');
            }
            else if(!(/[0-9]/.test(password))){
                $('#police-msg-password').css('color','red').html('Unaccepted Password');
            }
            else if(!(/[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password))){
                $('#police-msg-password').css('color','red').html('Unaccepted Password');
            }else{
                $('#police-msg-password').css('color','green').html('Accepted Password');
            }
        }else{
            $('#police-msg-password').html('');
        }
    }else if(n == 'user'){
        let password = $('input[name=user-password]').val();
        if(password.length > 0) {

            if(password.length < 8){
                $('#user-msg-password').css('color','red').html('Unaccepted Password');
            }
            else if(!(/[a-z]/.test(password))){
                $('#user-msg-password').css('color','red').html('Unaccepted Password');
            }
            else if(!(/[A-Z]/.test(password))){
                $('#user-msg-password').css('color','red').html('Unaccepted Password');
            }
            else if(!(/[0-9]/.test(password))){
                $('#user-msg-password').css('color','red').html('Unaccepted Password');
            }
            else if(!(/[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password))){
                $('#user-msg-password').css('color','red').html('Unaccepted Password');
            }else{
                $('#user-msg-password').css('color','green').html('Accepted Password');
            }
        }else{
            $('#user-msg-password').html('');
        }
    }else if(n == 'add'){
        let password = $('input[name=add-password]').val();
        if(password.length > 0) {

            if(password.length < 8){
                $('#val-password').css('color','orange').html('Unaccepted Password');
            }
            else if(!(/[a-z]/.test(password))){
                $('#val-password').css('color','orange').html('Unaccepted Password');
            }
            else if(!(/[A-Z]/.test(password))){
                $('#val-password').css('color','orange').html('Unaccepted Password');
            }
            else if(!(/[0-9]/.test(password))){
                $('#val-password').css('color','orange').html('Unaccepted Password');
            }
            else if(!(/[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password))){
                $('#val-password').css('color','orange').html('Unaccepted Password');
            }else{
                $('#val-password').css('color','green').html('Accepted Password');
            }
        }else{
            $('#val-password').html('');
        }
    }

}

function matchPress(n){

    if(n=='user'){
        let password = $('input[name=user-password]').val();
        let password_confirm = $('input[name=user-inputPasswordConfirm]').val();

        if (password_confirm.length === 0) {
            $('#user-msg-confirm').html('');
            return;
        }

        if (password === password_confirm) {
            $('#user-msg-confirm').css('color','green').html('Match');
            return;
        }
        else {
            $('#user-msg-confirm').css('color','red').html('No Match');
            return;
        }
    }else if(n=='police'){
        let password = $('input[name=police-password]').val();
        let password_confirm = $('input[name=police-inputPasswordConfirm]').val();

        if (password_confirm.length === 0) {
            $('#police-msg-confirm').html('');
            return;
        }

        if (password === password_confirm) {
            $('#police-msg-confirm').css('color','green').html('Match');
            return;
        }
        else {
            $('#police-msg-confirm').css('color','red').html('No Match');
            return;
        }
    }else if(n=='add'){
        let password = $('input[name=add-password]').val();
        let password_confirm = $('input[name=add-confirm-password]').val();

        if (password_confirm.length === 0) {
            $('#val-confirm-password').html('');
            return;
        }

        if (password === password_confirm) {
            $('#val-confirm-password').css('color','green').html('Match');
            return;
        }
        else {
            $('#val-confirm-password').css('color','red').html('No Match');
            return;
        }
    }

}

function sendForm(n){

    if(n=='user'){
        if($('#user-msg-confirm').css('color') =='rgb(255, 0, 0)'){
            $('input[name=user-inputPasswordConfirm]').focus();
            return false;
        }

        if($('input[name=user-password]').val() !== $('input[name=user-inputPasswordConfirm]').val()){
            $('#user-msg-confirm').css('color','red').html('No Match');
            $('input[name=user-inputPasswordConfirm]').focus();
            return false;
        }
        if($('#user-msg-mobile').css('color') =='rgb(255, 0, 0)'){
            $('input[name=user-mobile]').focus();
            return false;
        }

        if($('#user-msg-email').css('color') =='rgb(255, 0, 0)'){
            $('input[name=user-email]').focus();
            return false;
        }

        if($('#user-msg-password').css('color') =='rgb(255, 0, 0)'){
            $('input[name=stuff-password]').focus();
            return false;
        }
        if($('#user-msg-id').css('color') =='rgb(255, 0, 0)'){
            $('input[name=user-id]').focus();
            return false;
        }
    }else if(n=='police') {
        if ($('#police-msg-confirm').css('color') == 'rgb(255, 0, 0)') {
            $('input[name=police-inputPasswordConfirm]').focus();
            return false;
        }

        if ($('input[name=police-password]').val() !== $('input[name=police-inputPasswordConfirm]').val()) {
            $('#police-msg-confirm').css('color', 'red').html('No Match');
            $('input[name=police-inputPasswordConfirm]').focus();
            return false;
        }
        if ($('#police-msg-mobile').css('color') == 'rgb(255, 0, 0)') {
            $('input[name=police-mobile]').focus();
            return false;
        }

        if ($('#police-msg-email').css('color') == 'rgb(255, 0, 0)') {
            $('input[name=police-email]').focus();
            return false;
        }

        if ($('#police-msg-password').css('color') == 'rgb(255, 0, 0)') {
            $('input[name=police-password]').focus();
            return false;
        }
        if ($('#police-msg-id').css('color') == 'rgb(255, 0, 0)') {
            $('input[name=police-id]').focus();
            return false;

        }
    }else if(n=='add'){
            if($('#val-confirm-password').css('color') =='rgb(255, 0, 0)'){
                $('input[name=add-confirm-password]').focus();
                return false;
            }

            if($('input[name=add-password]').val() !== $('input[name=add-confirm-password]').val()){
                $('#val-confirm-password').css('color','red').html('No Match');
                $('input[name=add-confirm-password]').focus();
                return false;
            }
            if($('#val-mobile').css('color') =='rgb(255, 0, 0)'){
                $('input[name=add-mobile]').focus();
                return false;
            }

            if($('#val-email').css('color') =='rgb(255, 0, 0)'){
                $('input[name=add-email]').focus();
                return false;
            }

            if($('#val-password').css('color') =='rgb(255, 0, 0)'){
                $('input[name=add-password]').focus();
                return false;
            }
            if($('#val-id').css('color') =='rgb(255, 0, 0)'){
                $('input[name=add-id]').focus();
                return false;
            }
    }


    return true;
}

function searchFug(){

    var val = $('.search-fugitive').val()

    for (var i=0;i<$('.fugitive-profile').length;i++)
    {
        var txt =$('.fugitive-profile:nth-child('+(i+2)+')').find('.card-category').text();
        if(txt.indexOf(val) > -1){
            $('.fugitive-profile:nth-child('+(i+2)+')').show();
        }else{
            $('.fugitive-profile:nth-child('+(i+2)+')').hide();
        }

    }
     $('.fugitive-profile:visible').length < 1? $('.no-results').show():$('.no-results').hide();


}


$(function () {
   $('.btn-profile').on('click',function () {
      $('.user-card-full').hide();
      $('.edit-profile').show();
   });

    $('.delete-user').on('click',function () {

        var id = this.id;
        $('input[name=delete-user]').val(id);
        $('.delete-user-msg').html('<i class="fa fa-trash text-danger"></i> Delete user with id '+id+'?');

        $('#delete-user').modal('show');
    });

    $('.delete-police').on('click',function () {

        var id = this.id;
        $('input[name=delete-police]').val(id);
        $('.delete-police-msg').html('<i class="fa fa-trash text-danger"></i> Delete police with id '+id+'?');

        $('#delete-police').modal('show');
    });

    $('.edit-police').on('click', function () {

        $('input[name=edit-police]').val(this.id);

        $.ajax({
          type: 'POST',
          url: './handler.php',
          data: {
            getpolice: this.id
          },
          dataType: 'json',
          success: function (response) {

            $('input[name=police-last-name]').val(response.pol_name);
            $('input[name=police-first-name]').val(response.pol_surname);
            $('input[name=police-email]').val(response.email);
            $('input[name=police-id]').val(response.idNo);
            $('input[name=police-gender]').val(response.gender);
            $('input[name=police-mobile]').val(response.mobile);
            $('input[name=police-password]').val(response.password);

          }});
        $('#edit-police').modal('show');
    });

    $('.edit-user').on('click', function () {

        $('input[name=edit-user]').val(this.id);

        $.ajax({
            type: 'POST',
            url: './handler.php',
            data: {
                getUser: this.id
            },
            dataType: 'json',
            success: function (response) {

                $('input[name=user-last-name]').val(response.last_name);
                $('input[name=user-first-name]').val(response.first_name);
                $('input[name=user-email]').val(response.email);
                $('input[name=user-id]').val(response.idNo);
                $('input[name=user-gender]').val(response.gender)
                $('input[name=user-mobile]').val(response.mobile);
                $('input[name=user-password]').val(response.password);

            }});
        $('#edit-user').modal('show');
    });


    $('.edit-fugitive').on('click', function () {

        $('input[name=edit-fugitive]').val(this.id);

        $.ajax({
            type: 'POST',
            url: './handler.php',
            data: {
                getFugitive: this.id
            },
            dataType: 'json',
            success: function (response) {

                $('input[name=fugitive-last-name]').val(response.last_name);
                $('input[name=fugitive-first-name]').val(response.first_name);
                $('input[name=fugitive-email]').val(response.email);
                $('select[name=fugitive-gender]').val(response.gender);
                $('textarea[name=fugitive-about]').val(response.about);
                if(response.image ==''){
                    $('input[name=fugitive-image]').attr('required',true);
                }


            }});
        $('#edit-fugitive').modal('show');
    });

    $('.fug_report').on('click', function () {

        $.ajax({
            type: 'POST',
            url: './handler.php',
            data: {
                getFugitive: this.id
            },
            dataType: 'json',
            success: function (response) {

                $('.fug_about').html(response.about);
                $('.fug_gender').html(response.gender);
                if(response.image ==''){
                    $('.fug_image').attr('src','../police/criminals/profile.png');
                }else{
                    $('.fug_image').attr('src','../police/criminals/'+response.image);
                }

                $('.fug_name').html(response.first_name);
                $('.fug_surname').html(response.last_name);

            }});
        $('#fug_report').modal('show');
    });

    $('.delete-fugitive').on('click',function () {
        $('input[name=delete-fugitive]').val(this.id);
        $('form[name=fugitive-form]').submit();
    });

    $('.add-fugitive').on('click',function () {

        $('#add-fugitive').modal('show');
    });

    $('.new-account').on('click',function () {

        $('#new-account').modal('show');
    });


    $('.alert-img').on('click',function () {

        $('#alert-img').modal('show');
    });

    $('.view-list').on('click',function () {

        $('.alert-list').html('');
        $.ajax({
            type: 'POST',
            url: './handler.php',
            data: {
                alertList: this.id
            },
            dataType: 'json',
            success: function (response) {

                $.each(response,function (key,data) {

                    $('.alert-list').append(
                        " <tr>" +
                        "      <td>" +data.first_name+' '+data.last_name+"</td>" +
                        "       <td>"+data.case_number+"</td>" +
                        "       <td>" +data.date+"</td>" +
                        '       <td  class="text-right">' +
                        '         <button class="btn btn-primary view-report" data-dismiss="modal"  onclick="viewReport('+data.case_number+')">View</button>' +
                        '         <button class="btn btn-danger delete-case" data-dismiss="modal"  onclick="deleteCase('+data.case_number+')">Delete</button>' +
                        "       </td>" +
                        " </tr>");
                });

            }});
        $('#view-list').modal('show');

    });

    $('.crime-report').on('click',function () {

        var lat =localStorage.getItem('lat');
        var lng = localStorage.getItem('lng');

        $.ajax({
            type: 'POST',
            url: './handler.php',
            data: {report:this.id,
            lat:lat,
            lng:lng},
            dataType: 'json',
            success: function(response){
            }
        });
        window.location.reload();
    });

    $('.about-fug').on('click',function () {

        $.ajax({
            type: 'POST',
            url: './handler.php',
            data: {view_about: $(this).attr('for')},
            dataType: 'json',
            success: function(response){

            console.log(response)
            }
        });

    });



});

function deleteCase(id) {
    $('input[name=delete-case]').val(id);
    $('.lbl-case').html('Are you sure you want to delete case number <span class="text-danger">'+id+'?</span>');
    $('#delete-case').modal('show');
}

function viewReport(id) {
    $.ajax({
        type: 'POST',
        url: './handler.php',
        data: {getAlert:id},
        dataType: 'json',
        success: function(response){

            $('#reportMap').attr('src',"https://www.google.com/maps/embed/v1/place?q="+response.lat+","+response.lng+"&key=AIzaSyAQi5jU-qYbiD4LwyrOrJllLCGaZyRBSUM");

        }
    });
    $('#view-report').modal('show');
}
