document.addEventListener('DOMContentLoaded', function()
{
    var inputBox = document.getElementById('newPassword');
    var inputBox_2 = document.getElementById('confirmPassword');
    var inputPassword = document.getElementById('newPassword');
    var inputPassword_2 = document.getElementById('confirmPassword');


if(inputPassword)
    {
        inputPassword.addEventListener('keyup', function()
        {

            var regex1 = /^(?=.*?[A-Z].*?)(?=.*?[a-z].*?)(?=.*?[0-9].*?)(?=.*?[^\w\s].*?).{8,}$/m;
            var regex2 = /^(?=.*?[A-Z].*?[A-Z])(?=.*?[a-z].*?[a-z])(?=.*?[0-9].*?[0-9])(?=.*?[^\w\s].*?[^\w\s]).{8,}$/m;
            var str = this.value;
            if(str.match(regex2))
            {
                inputBox.style.backgroundColor = 'green';
            }
            else if(str.match(regex1))
            {
                inputBox.style.backgroundColor = 'orange';
            }
            else
            {
                inputBox.style.backgroundColor = 'red';
            }


        });
    }


if(inputPassword_2)
    {
        inputPassword_2.addEventListener('keyup', function()
        {

            var regex1 = /^(?=.*?[A-Z].*?)(?=.*?[a-z].*?)(?=.*?[0-9].*?)(?=.*?[^\w\s].*?).{8,}$/m;
            var regex2 = /^(?=.*?[A-Z].*?[A-Z])(?=.*?[a-z].*?[a-z])(?=.*?[0-9].*?[0-9])(?=.*?[^\w\s].*?[^\w\s]).{8,}$/m;
            var str = this.value;
            if(str.match(regex2))
            {
                inputBox_2.style.backgroundColor = 'green';
            }
            else if(str.match(regex1))
            {
                inputBox_2.style.backgroundColor = 'orange';
            }
            else
            {
                inputBox_2.style.backgroundColor = 'red';
            }


        });
    }
});