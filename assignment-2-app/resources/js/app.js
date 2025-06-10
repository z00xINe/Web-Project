import './bootstrap';

//show the name of the file in the custom file uploader
document.getElementById("fileInput").addEventListener("change", function () {
    let fileName = this.files.length > 0 ? this.files[0].name : "No file chosen";
    document.getElementById("fileName").textContent = fileName;
});

//validate password
function validatePassword() {
    document.getElementById("password_state").style.display = "block";

    var curr_val = document.getElementById("password").value,
        validation_state = [0, 0, 0];

    //8 letters
    if (curr_val.length >= 8) {
        validation_state[0] = 1;
    }

    //at least 1 numerical
    if (/\d/.test(curr_val)) {
        validation_state[1] = 1;
    }

    //special character
    if (/[^A-Za-z0-9]/.test(curr_val)) {
        validation_state[2] = 1;
    }

    // Apply results on page
    var passwordStateChildren = document.getElementById("password_state").children;
    for (var i = 0; i < 3; i++) {
        if (validation_state[i] === 1) {
            passwordStateChildren[i].classList.remove("failed");
            passwordStateChildren[i].classList.add("success");
        } else {
            passwordStateChildren[i].classList.remove("success");
            passwordStateChildren[i].classList.add("failed");
        }
    }

    if (validation_state[0] === 1 && validation_state[1] === 1 && validation_state[2] === 1) {
        document.getElementById("password").classList.remove("failedInput");
        return true;
    } else {
        document.getElementById("password").classList.add("failedInput");
        return false;
    }

}
document.getElementById("password").addEventListener("input", validatePassword);

//validate confitm password
function validateConfirmPassword() {
    var confirm_pass_val = document.getElementById("confPassword").value,
        pass_val = document.getElementById("password").value;

    var confirm_pass_err_span = document.getElementById("confirmPassERR");

    if (confirm_pass_val !== pass_val) {
        document.getElementById("confPassword").classList.add("failedInput");
        confirm_pass_err_span.style.display = "block"; // Show error message
        return false;
    } else {
        document.getElementById("confPassword").classList.remove("failedInput");
        confirm_pass_err_span.style.display = "none"; // Hide error message
        return true;
    }
}
document.getElementById("confPassword").addEventListener("change", validateConfirmPassword);

//validate email
function validateEmail() {
    var emailInput = document.getElementById("email").value;
    var emailError = document.getElementById("emailERR");

    //if the input is empty
    if (emailInput === "") {
        emailError.style.display = "block";
        document.getElementById("email").classList.add("failedInput");
        emailError.innerHTML = "Email cannot be empty.";
        return false;
    }

    //basic email validation expression
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (!emailRegex.test(emailInput)) {
        emailError.style.display = "block";
        document.getElementById("email").classList.add("failedInput");
        emailError.innerHTML = "Wrong Email Format. ";
        return false;
    }

    //No errors
    emailError.style.display = "none";
    document.getElementById("email").classList.remove("failedInput");
    return true;
}
document.getElementById("email").addEventListener("change", validateEmail);

//validate whatsapp phone & phone
function isNumbers(input) {
    var regex = /^[0-9]+$/;
    var result = regex.test(input.value);

    if (result) {
        input.classList.remove("failedInput");
    } else {
        input.classList.add("failedInput");
    }
    return result;
}

const phoneNumInput = document.getElementById("PhoneNum");
phoneNumInput.addEventListener("change", function () {
    isNumbers(phoneNumInput);
});
const whatsNumInput = document.getElementById("whatsappNum");
phoneNumInput.addEventListener("change", function () {
    isNumbers(phoneNumInput);
});

//validate full name
function isLetters(input) {
    var regex = /^[A-Za-z\s]+$/;
    var result = regex.test(input.value);
    if (result) {
        input.classList.remove("failedInput");
    } else {
        input.classList.add("failedInput");
    }
    return result;
}

const fullNameInput = document.getElementById("fullName");
fullNameInput.addEventListener("change", function () {
    isLetters(fullNameInput);
});

//validate username
function userCheck(input) {
    var regex = /^[A-Za-z0-9]+$/;
    var result = regex.test(input.value);
    if (result) {
        input.classList.remove("failedInput");
    } else {
        input.classList.add("failedInput");
    }
    return result;
}

const userNameInput = document.getElementById("userName");
userNameInput.addEventListener("input", function () {
    userCheck(userNameInput);
});

//run fullcheck
window.full_validation = full_validation;
function full_validation() {
    const isPasswordValid = validatePassword();
    const isConfirmPasswordValid = validateConfirmPassword();
    const isEmailValid = validateEmail();
    const isPhoneNumValid = isNumbers(document.getElementById("PhoneNum"));
    const isWhatsappNumValid = true;
    const isFullNameValid = isLetters(document.getElementById("fullName"));
    const isUserNameValid = userCheck(document.getElementById("userName"));
    const whatsappFullValidation = true;

    const allValid = whatsappFullValidation && isPasswordValid && isConfirmPasswordValid && isEmailValid && isPhoneNumValid && isWhatsappNumValid && isFullNameValid && isUserNameValid;

    if (allValid) {
        return true;
    } else {
        return false;
    }
}

//whatsapp validation
window.validation = validation;
function validation() {
    var num = document.getElementById("whatsappNum").value;
    if (num.length > 0) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == "valid") {
                    document.getElementById("check").innerHTML = "valid";
                    document.getElementById("check").className = "verify-true";
                    return true;
                }
                else {
                    document.getElementById("check").innerHTML = "invalid";
                    document.getElementById("check").className = "verify-false";
                    return false;
                }
            }
        };
        xmlhttp.open("GET", "API_Ops?q=" + num, true);
        xmlhttp.send();
    }
}

//submission prevent and do full validation
document.getElementById("signForm").addEventListener("submit", function (event) {
    event.preventDefault();
    if (full_validation()) {
        this.submit();
    }
});

window.updateFileName = updateFileName;
function updateFileName() {
    const input = document.getElementById('fileInput');
    const fileName = input.files.length > 0 ? input.files[0].name : 'No photo selected';
    document.getElementById('fileName').textContent = fileName;
}