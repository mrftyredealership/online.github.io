

/* TIMER COUNTDOWN */
// Get the timer element from the DOM
const timer = document.getElementById('timer');

// Set the initial value of the countdown in seconds
let timeLeft = 5 * 60;

// Update the timer every second
const countdown = setInterval(() => {
  // Decrement the timeLeft variable
  timeLeft--;

  // Update the timer display
  const minutes = Math.floor(timeLeft / 60).toString().padStart(2, '0');
  const seconds = (timeLeft % 60).toString().padStart(2, '0');
  timer.children[0].innerText = minutes[0];
  timer.children[1].innerText = minutes[1];
  timer.children[3].innerText = seconds[0];
  timer.children[4].innerText = seconds[1];

  // Check if the countdown has reached zero
  if (timeLeft <= 0) {
    // Stop the countdown and perform any desired action (e.g. play a sound)
    clearInterval(countdown);
    alert('Otp time Out');
    Location.reload();
  }
},  1000);
tick();


//fjrghi


