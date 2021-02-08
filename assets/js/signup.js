document.addEventListener('DOMContentLoaded', function()
{
    // Password
    var inputPassword = document.getElementById('newPassword');
    var inputConfirmPassword = document.getElementById('confirmPassword');
    var inputBoxPassword = document.getElementById('input-box-newPassword');
    var inputBoxConfirmPassword = document.getElementById('input-box-confirmPassword');

    //Email
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
                    inputBoxPassword.style.backgroundColor = 'green';
                    inputPassword.style.backgroundColor = 'green';
                }
                else if(str.match(regex1))
                {
                    inputBoxPassword.style.backgroundColor = 'orange';
                    inputPassword.style.backgroundColor = 'orange';
                }
                else
                {
                    inputBoxPassword.style.backgroundColor = 'red';
                    inputPassword.style.backgroundColor = 'red';
                }


            });
        }

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
                    inputBoxConfirmPassword.style.backgroundColor = 'green';
                    inputConfirmPassword.style.backgroundColor = 'green';
                }
                else if(password2.match(regex1) && password2 === password)
                {
                    inputBoxConfirmPassword.style.backgroundColor = 'orange';
                    inputConfirmPassword.style.backgroundColor = 'orange';
                }
                else
                {
                    inputBoxConfirmPassword.style.backgroundColor = 'red';
                    inputConfirmPassword.style.backgroundColor = 'red';
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
                inputEmail.style.backgroundColor = 'green';   // wird auf website bei autocomplete nicht umgesetzt? # TODO FZ Email green when Autocomplete
                inputBoxEmail.style.backgroundColor = 'green';
                inputEmail.style.borderRadius = '10px';       // optional
            }
            else
            {
                inputEmail.style.backgroundColor = 'red';
                inputBoxEmail.style.backgroundColor = 'red';
            }
        });
    }
});