<?php
  get_template_part('header');
  get_template_part('alerts');
?>

<div class="card rounded-3 mx-auto shadow" style="max-width: calc(var(--bs-breakpoint-sm) - 5rem);">
  <div class="card-body p-4">
    <div class="text-black">
      <div class="ms-3">
        <img src="<?php echo getProfileImage($tenant['profile_image']) ?>" alt="Photo of <?php echo $tenant['name']; ?>" width="120" height="120" loading="lazy" style="object-fit: cover;object-position: center;" class="rounded-circle">
        <hr>
        <h5 class="mb-1 fs-2"><?php echo $tenant['name']; ?></h5>
        <p class="mb-2 pb-1 fw-light" style="color: #2b2a2a;font-size: .9rem;"><?php echo $tenant['email']; ?></p>
        <div class="d-flex flex-column justify-content-start align-items-stretch rounded-3 p-4 mb-2"
          style="background-color: #efefef;">
          <div>
            <p class="small text-muted mb-0">Contact Number</p>
            <p class="mb-0"><?php echo $tenant['contact']; ?></p>
          </div>
          <hr>
          <div>
            <p class="small text-muted mb-0">Room</p>
            <p class="mb-0"><?php echo $tenant['room']; ?></p>
          </div>
          <hr>
          <div>
            <p class="small text-muted mb-0">Rent Started</p>
            <p class="mb-0"><?php echo convertDate($tenant['rent_start'], 'M d, Y'); ?></p>
          </div>
        </div>
        <div class="d-flex pt-1 gap-1">
          <a href="/tenant/edit?id=<?php echo $tenant['id']; ?>" class="btn btn-primary flex-grow-1">Update Profile</a>
          <a href="/" class="btn btn-outline-secondary flex-grow-1">Go Back</a>
          <form action="/tenant/delete" method="POST" class="d-inline-block flex-grow-1" style="max-width: fit-content;">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?php echo $tenant['id']; ?>">
            <button class="btn btn-outline-danger" type="submit">Remove</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_template_part('footer'); ?>