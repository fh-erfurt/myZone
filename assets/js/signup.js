document.addEventListener('DOMContentLoaded', function()
{
    // Password
    var inputPassword = document.getElementById('newPassword');
    var inputConfirmPassword = document.getElementById('confirmPassword');
    var inputBoxPassword = document.getElementById('input-box-newPassword');
    var inputBoxConfirmPassword = document.getElementById('input-box-confirmPassword');

    // Email
    var inputEmail = document.getElementById('email');
    var inputBoxEmail = document.getElementById('input-box-email');

    // check Password
    if(inputPassword)
        {
            inputPassword.addEventListener('keyup', function()
            {

                var regex1 = /^(?=.*?[A-Z].*?)(?=.*?[a-z].*?)(?=.*?[0-9].*?)(?=.*?[^\w\s].*?).{8,}$/m;
                var regex2 = /^(?=.*?[A-Z].*?[A-Z])(?=.*?[a-z].*?[a-z])(?=.*?[0-9].*?[0-9])(?=.*?[^\w\s].*?[^\w\s]).{8,}$/m;
                var str = this.value;
                if(str.match(regex2))
                {
                   inputBoxPassword.style.border = '1px solid green';
                   inputBoxPassword.style.boxShadow = '0 0.05rem 0.5rem #aaffaa';
                }
                else if(str.match(regex1))
                {
                   inputBoxPassword.style.border = '1px solid #D05706';
                   inputBoxPassword.style.boxShadow = '0 0.05rem 0.5rem #ffae73';
                }
                else
                {
                    inputBoxPassword.style.border = '1px solid red';
                    inputBoxPassword.style.boxShadow = '0 0.05rem 0.5rem #ff9d9d';
                }


            });
        }
    // check Confirm Password and compare to Password
    if(inputConfirmPassword)
        {
            inputConfirmPassword.addEventListener('keyup', function()
            {
                var password = document.getElementById('newPassword').value;
                var password2 = document.getElementById('confirmPassword').value;
                var regex1 = /^(?=.*?[A-Z].*?)(?=.*?[a-z].*?)(?=.*?[0-9].*?)(?=.*?[^\w\s].*?).{8,}$/m;
                var regex2 = /^(?=.*?[A-Z].*?[A-Z])(?=.*?[a-z].*?[a-z])(?=.*?[0-9].*?[0-9])(?=.*?[^\w\s].*?[^\w\s]).{8,}$/m;
                if(password2.match(regex2) && password2 === password)
                {
                    inputBoxConfirmPassword.style.border = '1px solid green';
                    inputBoxConfirmPassword.style.boxShadow = '0 0.05rem 0.5rem #aaffaa';
                }
                else if(password2.match(regex1) && password2 === password)
                {
                    inputBoxConfirmPassword.style.border = '1px solid #D05706';
                    inputBoxConfirmPassword.style.boxShadow = '0 0.05rem 0.5rem #ffae73';
                }
                else
                {
                    inputBoxConfirmPassword.style.border = '1px solid red';
                    inputBoxConfirmPassword.style.boxShadow = '0 0.05rem 0.5rem #ff9d9d';
                }


            });
        }

// check Email
    if(inputEmail)
    {
        inputEmail.addEventListener('keyup',function()
        {
            var regex3 = /[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/m;
            var str = this.value;
            if(str.match(regex3))
            {
                inputBoxEmail.style.border = '1px solid green';
                inputBoxEmail.style.boxShadow = '0 0.05rem 0.5rem #aaffaa';
            }
            else
            {
                inputBoxEmail.style.border = '1px solid red';
                inputBoxEmail.style.boxShadow = '0 0.05rem 0.5rem #ff9d9d';
            }
        });
    }
});