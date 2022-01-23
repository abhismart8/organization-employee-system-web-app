const validateEmail = (email) => {
    let validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (validRegex.test(email)) {
        return true;
    }
    return false;
}

const copyClipboard = element => {
    element.select();
    element.setSelectionRange(0, element.value.length);
    document.execCommand('copy');
    iziToast.success({
        'timeout' : 1000,
        'transitionIn' : 'fadeIn',
        'transitionOut' : 'fadeOut',
        'progressBar': false,
        'ballon' : true,
        'message' : 'Copied to clipboard'
    })
}