<?php
function PageName() {
  return substr( $_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"],"/") +1);
}
$current_page = PageName();
?>
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="col-md-4 sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link <?= $current_page !== 'index.php' ? 'collapsed' : null ?>" href="index.php">
          <i class="bi bi-grid fs-5"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?= $current_page !== 'brgy_officials.php' && $current_page !== 'add_brgy_official.php' && $current_page !== 'edit_official.php' && $current_page !== 'brgy_position.php' ? 'collapsed' : null ?>" data-bs-target="#offi-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-circle fs-5"></i><span>Brgy. Officials</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="offi-nav" class="nav-content collapse <?= $current_page =='brgy_officials.php' || $current_page == 'add_brgy_official.php' || $current_page == 'brgy_position.php' ||  $current_page == 'edit_official.php' ? 'show' : null ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="brgy_officials.php" class="<?= $current_page=='brgy_officials.php' ||  $current_page == 'edit_official.php' || $current_page=='add_brgy_official.php' ? 'active' : null ?>">
              <i class="bi bi-circle"></i><span>List of Official</span>
            </a>
          </li>
          <li>
            <a href="brgy_position.php" class=" <?= $current_page=='brgy_position.php' ? 'active' : null ?>">
              <i class="bi bi-circle"></i><span>Add Position</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link <?= $current_page !== 'residents.php' && $current_page !== 'add_new_resident.php' && $current_page !== 'edit_resident.php' ? 'collapsed' : null ?>" data-bs-target="#res-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people fs-5"></i><span>Residents</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="res-nav" class="nav-content collapse <?= $current_page =='residents.php' || $current_page == 'add_new_resident.php' || $current_page == 'archive.php' || $current_page ==
        'edit_resident.php' ? 'show' : null ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="residents.php" class="<?= $current_page =='residents.php' || $current_page == 'add_new_resident.php' || $current_page ==
           'edit_resident.php' ? 'active' : null ?>">
              <i class="bi bi-circle"></i><span>List of Resident</span>
            </a>
          </li>
          <li>
            <a href="archive.php" class="<?= $current_page=='archive.php' ? 'active' : null ?>">
              <i class="bi bi-circle"></i><span>Archive Resident</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link <?= $current_page !== 'blotter.php' && $current_page !== 'add_blotter.php' && $current_page !== 'edit_blotter.php' ? 'collapsed' : null ?>" href="blotter.php">
          <i class="bi bi-clipboard fs-5"></i>
          <span>Blotter</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?= $current_page !== 'request_certificate.php' ? 'collapsed' : null ?>" href="request_certificate.php">
          <i class="bi bi-file-earmark-text fs-5"></i>
          <span>Barangay Forms</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?= $current_page !== 'reports.php' ? 'collapsed' : null ?>" href="reports.php">
          <i class="bi bi-flag fs-5"></i>
          <span>Reports</span>
        </a>
      </li>

      <!-- End Dashboard Nav -->
      <?php if (isset($_SESSION['id']) && $_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Co-Admin'): ?>
      <li class="nav-item">
        <a class="nav-link <?= $current_page !== 'activity_log.php' && $current_page !== 'new_user.php' && $current_page !== 'purok.php' ? 'collapsed' : null ?>" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gear fs-5"></i><span>Settings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse <?= $current_page =='activity_log.php' || $current_page == 'new_user.php' || $current_page == 'purok.php' ? 'show' : null ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="activity_log.php" class="<?= $current_page=='activity_log.php' ? 'active' : null ?>">
              <i class="bi bi-circle"></i><span>Activity log</span>
            </a>
          </li>
          <li>
            <a href="new_user.php" class="<?= $current_page == 'new_user.php'  ? 'active' : null ?>">
              <i class="bi bi-circle"></i><span>Add User</span>
            </a>
          </li>
          <li>
            <a href="purok.php" class="<?= $current_page == 'purok.php' ? 'active' : null ?>">
              <i class="bi bi-circle"></i><span>Add Purok</span>
            </a>
          </li>
          <li>
            <a href="#brgy_info" data-bs-toggle="modal">
              <i class="bi bi-circle"></i><span>Barangay Information</span>
            </a>
          </li>
          <li>
            <a href="#price" data-bs-toggle="modal">
              <i class="bi bi-circle"></i><span>Change the cost of each certificate requested..</span>
            </a>
          </li>
          <li>
            <a href="../backup/backup.php" data-bs-toggle="modal">
              <i class="bi bi-circle"></i><span>Back-up Database</span>
            </a>
          </li>
           <li>
            <a href="#restore" data-bs-toggle="modal">
              <i class="bi bi-circle"></i><span>Restore Database</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->      
    <?php endif; ?>
    </ul>

  </aside><!-- End Sidebar-->