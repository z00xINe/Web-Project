document.getElementById("loginForm").addEventListener("submit", function(event) {
    let username = document.getElementById("username").value.trim();
    let password = document.getElementById("password").value.trim();
    let errorMessage = document.getElementById("error-message");

    if (username === "" || password === "") {
        event.preventDefault();
        errorMessage.textContent = "Please fill in all fields!";
    }
});
