<?php
get_template_part('header');
get_template_part('search', [
  'tenants' => $tenants
]);
get_template_part('alerts'); 
?>

<?php if (!empty($tenants)) : ?>
  <table class="table table-striped border">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">&nbsp;<span class="visually-hidden">Profile Image</span></th>
          <th scope="col">Name</th>
          <th scope="col">Email Address</th>
          <th scope="col">Contact Number</th>
          <th scope="col">Room</th>
          <th scope="col">Rent Start</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
  <?php foreach ($tenants as $tenant) : ?>
        <tr>
          <th scope="row"><?php echo $tenant['id']; ?></th>
          <td>
            <img src="<?php echo getProfileImage($tenant['profile_image']) ?>" alt="Photo of <?php echo $tenant['name']; ?>" width="60" height="60" loading="lazy" style="object-fit: cover;object-position: center;">
          </td>
          <td><?php echo $tenant['name']; ?></td>
          <td><a href="mailto:<?php echo $tenant['email']; ?>"><?php echo $tenant['email']; ?></a></td>
          <td><a href="tel:<?php echo $tenant['contact'];?>"><?php echo $tenant['contact'];?></a></td>
          <td><?php echo $tenant['room']; ?></td>
          <td><?php echo convertDate($tenant['rent_start'], 'M d, Y'); ?></td>
          <td>
            <a href="/tenant/profile?id=<?php echo $tenant['id']; ?>" class="btn btn-primary btn-sm">View Profile</a>
            <a href="/tenant/edit?id=<?php echo $tenant['id']; ?>" class="btn btn-warning btn-sm">Edit Profile</a>
            <form action="/tenant/delete" method="POST" class="d-inline-block">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="id" value="<?php echo $tenant['id']; ?>">
              <button class="btn btn-danger btn-sm" type="submit">Remove</button>
            </form>
          </td>
        </tr>
  <?php endforeach; ?>
    </tbody>
  </table>
<?php else : ?>
  <h2>No tenants yet...</h2>
<?php endif; ?>

<?php get_template_part('footer'); ?>