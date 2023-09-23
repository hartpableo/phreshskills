window.addEventListener('load', () => {

  removeAlerts(document.querySelectorAll('.alert'));

  (imageInput) && imageInput.addEventListener('change', previewSelectedImage);

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