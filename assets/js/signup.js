document.addEventListener('DOMContentLoaded', function() {
    var btnSubmit = document.getElementById('submitSignup');
    var inputUsername = document.getElementsByClassName('username'); // TODO FZW get by Id
    var inputPassword = document.getElementsByClassName('password');

    if(btnSubmit)
    {
        btnSubmit.addEventListener('click', function(event){
            var valid = true;
            if(!inputUsername || inputUsername.value.length < 2)
            {
                valid = false;
            }

            var regex = /^(?=.*?[A-Z].*?[A-Z])(?=.*?[a-z].*?[a-z])(?=.*?[0-9].*?[0-9])(?=.*?[^\w\s].*?[^\w\s]).{8,}$/m;
            if(!inputPassword || inputPassword.value.length < 8 || !inputPassword.value.match(regex))
            {
                valid = false;
            }


            if(valid === false)
            {
                event.preventDefault();
                event.stopPropagation();
            }

            return valid;
        });
    }


    if(inputPassword)
    {
        inputPassword.addEventListener('keyup', function(){

            var regex1 = /^(?=.*?[A-Z].*?)(?=.*?[a-z].*?)(?=.*?[0-9].*?)(?=.*?[^\w\s].*?).{8,}$/m;
            var regex2 = /^(?=.*?[A-Z].*?[A-Z])(?=.*?[a-z].*?[a-z])(?=.*?[0-9].*?[0-9])(?=.*?[^\w\s].*?[^\w\s]).{8,}$/m;
            var str = this.value;
            'Passwort zu schwach (jeweils 2 Groß- und Kleinbuchstaben, 2 Zahlen und 2 Sonderzeichen).'
            if(str.match(regex2))
            {
                inputPassword.style.border = '2px solid green';
            }
            else if(str.match(regex1))
            {
                inputPassword.style.border = '2px solid yellow';
            }
            else
            {
                inputPassword.style.border = '2px solid red';
            }
        });
    }
});