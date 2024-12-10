const showPasswordCheckBox = document.getElementById('showPassword');
const passwordInput = document.getElementById('password');
const confirm_password = document.getElementById('confirm_password');

showPasswordCheckBox.addEventListener('change', function(){
    if(showPasswordCheckBox.checked){
        passwordInput.type = 'text';
        confirm_password.type = 'text';
    }
    else
    {
        passwordInput.type = 'password';
        confirm_password.type = 'password';
    }
})