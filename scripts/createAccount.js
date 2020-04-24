var firstNameInput = document.querySelector("#firstNameInput");
var lastNameInput = document.querySelector("#lastNameInput");
var emailInput = document.querySelector("#emailInput");
var submitButton = document.querySelector("#submitButton");

function validateForm() {
    
    var emailValid = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailInput.value);
    
    if (firstNameInput.value && lastNameInput.value && emailValid) {
        submitButton.disabled = false;
    } else {
        submitButton.disabled = true;
    }
    
}