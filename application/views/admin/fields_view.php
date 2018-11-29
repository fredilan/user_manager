    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Custom User Fields</h1>
        </div>
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<?php echo anchor('admin/fieldadd', 'Add New Custom Field', array('class' => 'btn btn-primary btn-sm active', 'role' => 'button')); ?>
        </div>		
		<?php 
			$this->table->set_template($template);
			$this->table->set_heading('Field ID', 'Field Label', 'Field Type', 'Option Values', 'Action'); 
			
			foreach ($fields as $row)
			{		
				$this->table->add_row($row->meta_key, $row->meta_value, $row->meta_fieldtype, $row->options, ($row->global_enable ? anchor('admin/fielddisable/' . $row->id, '<span data-feather="file-minus" style="color: #ff0000;"></span>', array('title' => 'Disable Globally')) : anchor('admin/fieldenable/' . $row->id, '<span data-feather="file-plus"></span>', array('title' => 'Enable Globally'))) . ' | ' . anchor('admin/fielddelete/' . $row->id, '<span data-feather="delete"></span>', array('title' => 'Delete')));
			}
			
			echo $this->table->generate();
		?>
    </main>
