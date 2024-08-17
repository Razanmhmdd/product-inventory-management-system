document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();  

    let isValid = true;
    const username = document.getElementById('username').value.trim();  
    const password = document.getElementById('password').value.trim();

    document.getElementById('usernameError').textContent = '';
    document.getElementById('passwordError').textContent = '';

    if (username == "") {
        document.getElementById('usernameError').textContent = 'Username is required.';
        isValid = false;
    }

    if (password == "") {
        document.getElementById('passwordError').textContent = 'Password is required.';
        isValid = false;
    }

    if (isValid) {
        console.log(username,password)
    }
});