var FormWizard = function () {
    return {
        init: function () {
            $('.button-next').click(function(){
                var password = $("input[name=password]").val();
                var rpassword = $("input[name=rpassword]").val();
                if(rpassword != password){
                    document.getElementById("submit_form_password").setCustomValidity('Пароли не совпадают');
                } else {
                    document.getElementById("submit_form_password").setCustomValidity('');
                }
            });
            $('li.disabled-link a').click(function(){
                return false;
            });
        }
    };

}();