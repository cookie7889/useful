document.querySelector('._top-reg-form').addEventListener('submit', function (e) {
    let name = document.querySelector('.top-reg-input-cont .__LOGIN').value;
    let email = document.querySelector('.top-reg-input-cont .__EMAIL').value;
    let mobile = document.querySelector('.top-reg-input-cont ._reg-phone').value;
    let pas = document.querySelector('.top-reg-input-cont .__PASSWORD').value;
    let pasConf = document.querySelector('.top-reg-input-cont .__CONFIRM_PASSWORD').value;

    let errBoxName = document.querySelector('._err-box-name');
    let errBoxEmail = document.querySelector('._err-box-email');
    let errBoxPhone = document.querySelector('._err-box-phone');
    let errBoxPas = document.querySelector('._err-box-pas');

    let nameErr = emailErr = mobileErr = pasErr = true;


    if (name == "") {
        errBoxName.innerHTML = 'Пожалуйста, введите логин';
    } else {
        let regex = /[A-Za-z0-9\s]{3,}/;
        if (regex.test(name) === false) {
            errBoxName.innerHTML = 'Логин минимум 3 символа';
        } else {
            errBoxName.innerHTML = '';
            nameErr = false;
        }
    }

    if (email == "") {
        errBoxEmail.innerHTML = 'Пожалуйста, введите адрес вашей электронной почты';
    } else {
        // Регулярное выражение для базовой проверки электронной почты
        let regex = /^\S+@\S+\.\S+$/;
        if (regex.test(email) === false) {
            errBoxEmail.innerHTML = 'Пожалуйста, введите действительный адрес электронной почты';
        } else {
            errBoxEmail.innerHTML = '';
            emailErr = false;
        }
    }

    if (mobile == "") {
        errBoxPhone.innerHTML = 'Пожалуйста, введите номер вашего мобильного телефона';
    } else {
        errBoxPhone.innerHTML = '';
        mobileErr = false;
    }
    

    if (pas == '' || pasConf == '') {
        errBoxPas.innerHTML = 'Пожалуйста, введите пароль';
    } else {
        if (pas != pasConf) {
            errBoxPas.innerHTML = 'Пароли должны совпадать';
        } else {
            errBoxPas.innerHTML = '';
            pasErr = false;
        }
    }

    if ((nameErr || emailErr || mobileErr || pasErr) == true) {
        e.preventDefault();
        return false;
    } else {

    }
});





function printError(hintMsg) {
    document.querySelector('_err-box').innerHTML = hintMsg;
}

function validateForm() {
    // Получение значений элементов формы
    let name = document.querySelector('.top-reg-input-cont .__LOGIN').value;
    let email = document.querySelector('.top-reg-input-cont .__EMAIL').value;
    let mobile = document.querySelector('.top-reg-input-cont ._reg-phone').value;
    let password = document.querySelector('.top-reg-input-cont .__PASSWORD').value;
    let passwordConf = document.querySelector('.top-reg-input-cont .__CONFIRM_PASSWORD').value;


    // Определяем переменные ошибок со значением по умолчанию
    let nameErr = emailErr = mobileErr = countryErr = genderErr = true;

    // Проверяем имя
    if (name == "") {
        printError("Пожалуйста, введите ваше имя");
    } else {
        let regex = /^[a-zA-Z\s]+$/;
        if (regex.test(name) === false) {
            printError("Пожалуйста, введите правильное имя");
        } else {
            printError("");
            nameErr = false;
        }
    }

    // Проверяем адрес электронной почты
    if (email == "") {
        printError("Пожалуйста, введите адрес вашей электронной почты");
    } else {
        // Регулярное выражение для базовой проверки электронной почты
        var regex = /^\S+@\S+\.\S+$/;
        if (regex.test(email) === false) {
            printError("Пожалуйста, введите действительный адрес электронной почты");
        } else {
            printError("");
            emailErr = false;
        }
    }

    // Проверяем номер мобильного телефона
    if (mobile == "") {
        printError("Пожалуйста, введите номер вашего мобильного телефона");
    } else {
        var regex = /^[1-9]\d{9}$/;
        if (regex.test(mobile) === false) {
            printError("Пожалуйста, введите действительный 10-значный номер мобильного телефона");
        } else {
            printError("");
            mobileErr = false;
        }
    }





    // Запрещаем отправку формы в случае ошибок
    if ((nameErr || emailErr || mobileErr) == true) {
        return false;
    } else {

    }
};