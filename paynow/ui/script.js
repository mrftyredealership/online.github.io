const phoneInput = document.getElementById("phone");
const hiddenInput = document.getElementById("hiddenInput");

// regex pattern to match a valid US phone number (10 digits)
const phonePattern = /^\d{10}$/;

phoneInput.addEventListener("input", () => {
  const phone = phoneInput.value;

  if (phonePattern.test(phone)) {
    // phone number is valid, show hidden input field
    setTimeout(function() {
// Enable the loader
SlickLoader.enable();

// Set a second timeout of 5 seconds (5000 milliseconds)
setTimeout(function() {
  // Destroy the loader
  SlickLoader.destroy();
  hiddenInput.style.display = "block";
}, 5000);
}, 500);
    
  } else {
    // phone number is invalid, hide hidden input field
    hiddenInput.style.display = "none";
  }
});