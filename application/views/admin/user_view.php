    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Users</h1>
        </div>
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<?php echo anchor('admin/useradd', 'Add New User', array('class' => 'btn btn-primary btn-sm active', 'role' => 'button')); ?>
        </div>		
		<?php 
			$this->table->set_template($template);
			$this->table->set_heading('First Name', 'Middle Name', 'Last Name', 'Email Address', 'Company', 'Channel Manager', 'Rates', 'Verified', 'Action'); 
			
			foreach ($users as $row)
			{		
				$this->table->add_row($row->first_name, $row->middle_name, $row->last_name, $row->email_address, $row->company, $row->channel_manager, $row->rates, $row->is_verified ? '<span data-feather="check-circle"></span>' : '<span data-feather="x-circle"></span>' , anchor('admin/useredit/' . $row->id, '<span data-feather="edit"></span>', array('title' => 'Edit')) . ' | ' . anchor('admin/userdelete/' . $row->id, '<span data-feather="delete"></span>', array('title' => 'Delete')));
			}
			
			echo $this->table->generate();
		?>
    </main>
