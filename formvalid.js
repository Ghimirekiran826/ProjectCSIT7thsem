function validateForm() {
  // Get form elements
  var name = document.forms["myForm"]["name"].value;
  var email = document.forms["myForm"]["email"].value;
  var password = document.forms["myForm"]["password"].value;
  
  // Check if fields are empty
  if (name == "" || email == "" || password == "") {
    alert("Please fill out all fields.");
    return false;
  }
  
  // Check if email is valid
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    alert("Please enter a valid email address.");
    return false;
  }
  
  // Check if password is at least 8 characters long
  if (password.length < 8) {
    alert("Password must be at least 8 characters long.");
    return false;
  }
  
  // If all checks pass, return true
  return true;
}
