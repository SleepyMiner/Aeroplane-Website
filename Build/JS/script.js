// Opening button for hamburger menu
document.getElementById('toggleButtonClose').addEventListener('click', function () {
  document.getElementById('menuItems').classList.toggle('hidden');
});

// Closing button for hamburger menu
document.getElementById('openButton').addEventListener('click', function () {
  document.getElementById('menuItems').classList.toggle('hidden');
});

function changeTab(event, index) {
  var tabButtons = document.getElementById('tab-buttons').children;
  var tabPanels = document.getElementById('tab-panels').children;

  // Remove the active utility classes from all tabs (bg-white, text-blue-600)
  // And hide all tab content (with the "hidden" utility)
  for (var i = 0; i < tabButtons.length; i++) {
      tabButtons[i].classList.remove('text-blue-600');
      tabButtons[i].classList.remove('bg-white');
      tabButtons[i].classList.add('text-white');
      tabPanels[i].classList.add('hidden');
  }

  // Add the active utility classes to the currently active tab (bg-white, text-blue-600)
  // And show the current tab content (remove the "hidden" utility)
  tabButtons[index].classList.remove('text-white');
  tabButtons[index].classList.add('text-blue-600');
  tabButtons[index].classList.add('bg-white');
  tabPanels[index].classList.remove('hidden');
}

// Switch between login and signup
document.addEventListener('DOMContentLoaded', function () {
  var registerButton = document.getElementById('registerButton');
  if (registerButton) {
      registerButton.addEventListener('click', function () {
          window.location.href = "../php/registerPage.php";
      });
  }

  var loginButton = document.getElementById('loginButton');
  if (loginButton) {
      loginButton.addEventListener('click', function () {
          window.location.href = "../php/loginPage.php";
      });
  }
});

// Password Toggle
document.addEventListener('DOMContentLoaded', function () {
  const passwordInput = document.getElementById('password');
  const confirmPasswordInput = document.getElementById('confirmPassword');
  const togglePassword = document.getElementById('togglePassword');

  if (togglePassword) {
      togglePassword.addEventListener('click', function () {
          if (passwordInput.type === 'password') {
              passwordInput.type = 'text';
              confirmPasswordInput.type = 'text';
          } else {
              passwordInput.type = 'password';
              confirmPasswordInput.type = 'password';
          }
      });
  }
});

// Password Visibility Toggle
document.addEventListener('DOMContentLoaded', function () {
  const passwordInput = document.getElementById('passwordInput');
  const togglePasswordVisibility = document.getElementById('togglePasswordVisibility');

  if (togglePasswordVisibility) {
      togglePasswordVisibility.style.cursor = 'pointer';

      togglePasswordVisibility.addEventListener('click', function () {
          if (passwordInput.type === 'password') {
              passwordInput.type = 'text';
          } else {
              passwordInput.type = 'password';
          }
      });
  }
});

// Confirm Password
function validateForm() {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var passwordError = document.getElementById("passwordError");

    if (password !== confirmPassword) {
        passwordError.innerText = "Passwords do not match!";
        return false;
    }

    if (password.length < 8) {
        passwordError.innerText = "Password must be at least 8 characters long!";
        return false;
    }

    var formData = new FormData(document.querySelector("form"));

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    // Registration was successful, you can optionally redirect the user here
                    window.location.href = 'homePage.php';// Redireecting to homePage
                    alert("Registraion Successfull");
                } else {
                    passwordError.innerText = response.message; // Display registration error
                }
            } else {
                alert("Error: Unable to register. Please try again later."); // Handle server errors
            }
        }
    };

    // Instead of submitting the form directly, send an AJAX request
    xhr.open("POST", "registerProcess.php", true);
    xhr.send(formData);

    // Prevent the form from submitting
    return false;
}

document.getElementById("username").addEventListener("input", function() {
    document.getElementById("usernameAvailability").innerText = ""; // Clear username availability message
});

document.getElementById("email").addEventListener("input", function() {
    document.getElementById("emailAvailability").innerText = ""; // Clear email availability message
});


//Checking Login info

function validateLoginForm() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("passwordInput").value;
    var errorContainer = document.getElementById("errorContainer");

    errorContainer.innerText = '';

    if (username.trim() === "") {
        errorContainer.innerText = "Username is required!";
        return false;
    }

    if (password.trim() === "") {
        errorContainer.innerText = "Password is required!";
        return false;
    }

    // Send an AJAX request to the server
    var xmr = new XMLHttpRequest();
    xmr.onreadystatechange = function() {
        if (xmr.readyState === 4) {
            //console.log(JSON.parse(xhr.responseText)); // Add this line
            if (xmr.status === 200) {
                var response = JSON.parse(xmr.responseText);
                if (response.success) {
                    // Redirect or show success message
                    alert("Login Successful");
                    window.location.href = 'homePage.php';
                   
                } else {
                    // Show the error message from the server
                    errorContainer.innerText = response.message;
                }
            } else {
                // Handle server error (if any)
                console.error('Error:', xmr.status);
            }
        }
    };

    xhr.open("POST", "loginProcess.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("username=" + encodeURIComponent(username) + "&password=" + encodeURIComponent(password));

    // Prevent form from submitting
    return false;
}



