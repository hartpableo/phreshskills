<?php
  get_template_part('header');
  get_template_part('alerts', [
    'errors' => $errors
  ]);
?>

  <form action="/tenant/store" method="POST" enctype="multipart/form-data" class="mx-auto p-5 rounded-4 border shadow-lg" style="max-width: var(--bs-breakpoint-sm);">
  
    <h2 class="fs-4 m-0 fw-bold w-100 d-inline-flex justify-content-start align-items-center gap-3 lh-1">
      <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#3a0ddb" class="bi bi-person-fill-add" viewBox="0 0 16 16" aria-hidden="true">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
        <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
      </svg>
      Add New Tenant
    </h2>

    <hr>

    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="<?php echo old('name') ?? ''; ?>">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo old('email') ?? ''; ?>">
    </div>
    <div class="mb-3">
      <label class="form-label" for="contact">Contact Number</label>
      <input type="tel" id="contact" name="contact" class="form-control" value="<?php echo old('contact') ?? ''; ?>">
    </div>
    <div class="mb-3">
      <img id="preview-image" class="visually-hidden" width="120" height="120" loading="lazy" style="object-fit: cover;object-position: center;" aria-hidden="true">
      <label for="profile-image" class="form-label d-block mt-2">Profile Picture</label>
      <input class="form-control" type="file" id="profile-image" name="profile-image">
    </div>
    <div class="mb-3">
      <label class="form-label" for="room">Room</label>
      <input type="text" id="room" name="room" class="form-control" value="<?php echo old('room') ?? ''; ?>">
    </div>
    <div class="mb-3">
      <label class="form-label" for="rent_start">Rent Started</label>
      <input type="date" id="rent_start" name="rent_start" class="form-control" value="<?php echo old('rent_start') ?? ''; ?>">
    </div>
    <div class="btn-group btn-group mt-3">
      <button type="submit" class="btn btn-primary">Create</button>
      <a href="/" class="btn btn-secondary">Go Back</a>
    </div>
  </form>

<?php get_template_part('footer'); ?>