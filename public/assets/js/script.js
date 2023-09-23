window.addEventListener('load', () => {

  removeAlerts(document.querySelectorAll('.alert'));

  (imageInput) && imageInput.addEventListener('change', previewSelectedImage);

  // Get all "navbar-burger" elements
  const navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
  
  // Check if there are any navbar burgers
  if (navbarBurgers.length > 0) {
    navbarBurgers.forEach(function (el) {
      el.addEventListener('click', function () {
        let target = document.getElementById('main-nav');
        target.classList.toggle('hidden');
      });
    });
  }

}, {passive: true})

// remove alert after x seconds
function removeAlerts(alerts) {
  if (alerts.length) {
    for (let i = 0; i < alerts.length; i++) {
      alerts[i].style.animationDelay = `${([i] * 800) + 1000}ms`;
      alerts[i].classList.add('fadeout');
      setTimeout(() => {
        alerts[i].remove();
      }, 2600 + (500 * [i]));
    }
  }
}

// preview image on upload
const imageInput = document.getElementById('profile-image');
const previewImage = document.getElementById('preview-image');

function previewSelectedImage() {
  const file = imageInput.files[0];
  if (file) {
    previewImage.classList.remove('visually-hidden');
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function(e) {
        previewImage.src = e.target.result;
    }
  }
}