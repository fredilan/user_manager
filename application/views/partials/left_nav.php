        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
			<?php if($name = $this->session->is_admin) { ?>
              <li class="nav-item">
				<?php echo anchor('admin/index', '<span data-feather="home"></span>Admin', array('class' => 'nav-link')); ?>
              </li>
              <li class="nav-item">
				<?php echo anchor('admin/userview', '<span data-feather="users"></span>Users', array('class' => 'nav-link')); ?>
              </li>
              <li class="nav-item">
				<?php echo anchor('admin/fieldview', '<span data-feather="file"></span>Custom User Fields', array('class' => 'nav-link')); ?>
              </li>
			<?php } else { ?>
              <li class="nav-item">
				<?php echo anchor('user/main', '<span data-feather="file"></span>User Details', array('class' => 'nav-link')); ?>
              </li>
			<?php } ?>
	          <li class="nav-item">
				<?php echo anchor('user/logout', '<span data-feather="log-out"></span>Log Out', array('class' => 'nav-link')); ?>
              </li>
            </ul>
          </div>
        </nav>