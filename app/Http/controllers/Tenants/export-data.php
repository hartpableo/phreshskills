<?php

ob_start();

use Core\App;
use Core\Database;
use Core\Session;

$db = App::resolve(Database::class);

$tenantsData = $db->query('select * from tenants order by id desc')->findAll();

if (!isset($_POST) || !count($tenantsData)) {
  Session::flash('errors', [
    'export_error' => 'Something went wrong with the export!'
  ]);

  redirect();
}

/**
 * ============
 * Markup Start
*/
$markup = "
<table class='table table-striped border'>
      <thead>
        <tr>
          <th scope='col'>ID</th>
          <th scope='col'>&nbsp;<span class='visually-hidden'>Profile Image</span></th>
          <th scope='col'>Name</th>
          <th scope='col'>Email Address</th>
          <th scope='col'>Contact Number</th>
          <th scope='col'>Room</th>
          <th scope='col'>Rent Start</th>
        </tr>
      </thead>
      <tbody>
";

foreach ($tenantsData as $tenant) :

  $profileImage = getProfileImage($tenant['profile_image']);
  $rentStart = convertDate($tenant['rent_start'], 'M d, Y');

  $markup .= "
  <tr>
    <th scope='row'>{$tenant['id']}</th>
    <td>{$profileImage}</td>
    <td>{$tenant['name']}</td>
    <td>{$tenant['email']}</td>
    <td>{$tenant['contact']}</td>
    <td>{$tenant['room']}</td>
    <td>{$rentStart}</td>
  </tr>
  ";

endforeach;

$markup .= "
  </tbody>
</table>
";
/**
 * Markup End
 * ==========
*/

$datenow = date('M-Y');
ob_end_clean();

header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename:Tenants-Data--{$datenow}.xls");
echo $markup;