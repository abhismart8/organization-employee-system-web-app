const login = (loginUrl, loginCredentials) => {
    if(validateEmail(loginCredentials.email) && loginCredentials.password != ''){
        axios.post(loginUrl, {
            email: loginCredentials.email,
            password: loginCredentials.password
        })
        .then(function (response) {
            if(response.data.status == 'success'){
                iziToast.success({
                    message: response.data.message,
                });
                setTimeout(function(){
                    window.location = response.data.redirectUrl;
                }, 1000);
            }else{
                iziToast.error({
                    message: response.data.message,
                });
            }
        })
        .catch(function (err) {
            console.log(err)
        })
    }else{
        let message = '';
        if(!validateEmail(loginCredentials.email)){
            message += 'Please enter a valid email.<br>';
        }
        if(loginCredentials.password == ''){
            message += 'Please enter the password.';
        }
        iziToast.error({
            message: message,
        });
    }
}

const register = (registerUrl, data) => {
    if(data.name != '' && validateEmail(data.email) && data.password != ''){
        axios.post(registerUrl, {
            data: data
        })
        .then(function (response) {
            if(response.data.status == 'success'){
                iziToast.success({
                    message: response.data.message,
                });
                setTimeout(function(){
                    $('#registerModal').modal('hide');
                }, 1000);
            }else if(response.data.status == 'user_exists'){
                iziToast.warning({
                    message: response.data.message,
                });
                setTimeout(function(){
                    $('#registerModal').modal('hide');
                }, 1000);
            }else{
                iziToast.error({
                    message: response.data.message,
                });
            }
        })
        .catch(function (err) {
            console.log(err)
        })
    }else{
        let message = '';
        if(data.name == ''){
            message += 'Please enter the name.<br>';
        }
        if(!validateEmail(data.email)){
            message += 'Please enter a valid email.<br>';
        }
        if(data.password == ''){
            message += 'Please enter the password.';
        }
        iziToast.error({
            message: message,
        });
    }
}