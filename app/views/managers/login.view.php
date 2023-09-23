<?php
  get_template_part('header');
  get_template_part('alerts', [
    'errors' => $errors
  ]);
?>

  <form action="/manager/authenticate" method="POST" class="mx-auto p-5 rounded-4 border shadow-lg" style="max-width: var(--bs-breakpoint-sm);">
    <h2 class="fs-4 m-0 fw-bold w-100 d-inline-flex justify-content-start align-items-center gap-3 lh-1">
      <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#3a0ddb" class="bi bi-person-check" viewBox="0 0 16 16" aria-hidden="true">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
        <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
      </svg>
      Management Login
    </h2>
    
    <hr>

    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="<?php echo old('name') ?? ''; ?>">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" value="<?php echo old('password') ?? ''; ?>">
    </div>
    <div class="btn-group btn-group mt-3">
      <button type="submit" class="btn btn-primary">Login</button>
    </div>
  </form>

<?php get_template_part('footer'); ?>