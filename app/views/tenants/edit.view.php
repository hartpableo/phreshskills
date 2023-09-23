<?php
  get_template_part('header');
  get_template_part('alerts', [
    'errors' => $errors
  ]);
?>

  <form action="/tenant/update" method="POST" enctype="multipart/form-data" class="mx-auto p-5 rounded-4 border shadow-lg" style="max-width: var(--bs-breakpoint-sm);">
    <h2 class="fs-4 m-0 fw-normal"></strong></h2>
    <h2 class="fs-4 m-0 fw-bold w-100 d-inline-flex justify-content-start align-items-center gap-3 lh-1">
      <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#3a0ddb" class="bi bi-pencil-square" viewBox="0 0 16 16" aria-hidden="true">
        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
      </svg>
      Edit Profile: <span class="fw-normal"><?php echo $tenant['name']; ?></span>
    </h2>
    
    <hr>
    
    <input type="hidden" name="id" value="<?php echo $tenant['id']; ?>">
    <input type="hidden" name="orig-profile-image" value="<?php echo $tenant['profile_image']; ?>">
    <input type="hidden" name="_method" value="PATCH">

    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="<?php echo $tenant['name'] ?? ''; ?>">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $tenant['email']; ?>">
    </div>
    <div class="mb-3">
      <label class="form-label" for="contact">Contact Number</label>
      <input type="tel" id="contact" name="contact" class="form-control" value="<?php echo $tenant['contact']; ?>">
    </div>
    <div class="mb-3">
      <img id="preview-image" src="<?php echo getProfileImage($tenant['profile_image']) ?>" alt="Photo of <?php echo $tenant['name']; ?>" width="120" height="120" loading="lazy" style="object-fit: cover;object-position: center;" aria-hidden="true">
      <label for="profile-image" class="form-label d-block mt-2">Profile Picture</label>
      <input class="form-control w-full" type="file" id="profile-image" name="profile-image">
    </div>
    <div class="mb-3">
      <label class="form-label" for="room">Room</label>
      <input type="text" id="room" name="room" class="form-control" value="<?php echo $tenant['room']; ?>">
    </div>
    <div class="btn-group btn-group mt-3">
      <button type="submit" class="btn btn-primary">Update</button>
      <a href="/" class="btn btn-secondary">Go Back</a>
    </div>
  </form>

<?php get_template_part('footer'); ?>