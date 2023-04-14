/* COPY INPUT VALUES TO CARD MOCKUP */
const bounds = document.querySelectorAll('[data-bound]');

for(let i = 0; i < bounds.length; i++) {
  const targetId = bounds[i].getAttribute('data-bound');
  const defValue = bounds[i].getAttribute('data-def');
  const targetEl = document.getElementById(targetId);
  bounds[i].addEventListener('keyup', () => targetEl.innerText = bounds[i].value || defValue );
}


/* TOGGLE CVC DISPLAY MODE */
const cvc_toggler = document.getElementById('cvc_toggler');

cvc_toggler.addEventListener('click', () => {
  const target = cvc_toggler.getAttribute('data-target');
  const el = document.getElementById(target);
  el.setAttribute('type', el.type === 'text' ? 'password' : 'text');
});


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
    alert('Countdown complete!');
    Location.reload();
  }
},  1000);
tick();

