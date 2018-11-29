    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">User Details</h1>
        </div>

		<form id="addUser">
			<div class="form-group">
				<label for="inputFirstName">First Name</label>
				<input type="text" class="form-control" name="first_name" id="inputFirstName" placeholder="Enter First Name" value="<?php echo $user_data->first_name; ?>" required />
			</div>			
			<div class="form-group">
				<label for="inputMiddleName">Middle Name</label>
				<input type="text" class="form-control" name="middle_name" id="inputMiddleName" placeholder="Enter Middle Name" value="<?php echo $user_data->middle_name; ?>" />
			</div>			
			<div class="form-group">
				<label for="inputLastName">Last Name</label>
				<input type="text" class="form-control" name="last_name" id="inputLastName" placeholder="Enter Last Name"  value="<?php echo $user_data->last_name; ?>" required />
			</div>			
			<div class="form-group">
				<label for="inputEmailAddress">E-mail Address</label>
				<input type="email" class="form-control" name="email_address" id="inputEmailAddress" placeholder="Enter E-mail Address" value="<?php echo $user_data->email_address; ?>" required />
			</div>
			<div class="form-group">
				<label for="inputCompany">Company</label>
				<input type="text" class="form-control" name="company" id="inputCompany" placeholder="Enter Company Name" value="<?php echo $user_data->company; ?>" required>
			</div>
			<div class="form-group">
				<label for="inputChannelManager">Channel Manager</label>
				<input type="text" class="form-control" name="channel_manager" id="inputChannelManager" placeholder="Enter Channel Manager" value="<?php echo $user_data->channel_manager; ?>" required>
			</div>
			<div class="form-group">
				<label for="inputRates">Rates</label>
				<input type="number" class="form-control" name="rates" id="inputRates" placeholder="Enter Rates" value="<?php echo $user_data->rates;?>" />
			</div>

			<?php if($is_admin) { ?>
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
				<h5 class="h5">User Code/Password</h5>
			</div>			
			<div class="form-group">
				<input type="text" class="form-control" name="verification_code" id="inputVerificationCode" required><br />
				<button type="button" class="btn btn-sm btn-success" id="generateCode">Generate Code</button>
			</div>

			<?php } ?>

			
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
				<h5 class="h5">Custom Fields</h5>
			</div>
			
			<?php
			foreach ($fields as $row) {
				echo '<div class="form-group">';		
				echo form_label($row->meta_value, $row->meta_key);
								
				switch($row->meta_fieldtype) {
					case 'textfield':
						$data = array(
							'name' => "custom[$row->id]",
							'id' => $row->meta_key,
							'class' => 'form-control'
						);
						echo form_input($data);						
					break;
					case 'textarea':
						$data = array(
							'name' => "custom[$row->id]",
							'id' => $row->meta_key,
							'class' => 'form-control',
						);
						echo form_textarea($data);						
					break;
					case 'dropdown':
						$options = json_decode($row->options);
						echo form_dropdown("custom[$row->id]", $options, null, 'class="form-control"');
					break;
					case 'radio':
						foreach(json_decode($row->options) as $key=>$value) {
							echo '<div class="form-check">';
							echo form_radio("custom[$row->id]", $value, $key == 0 ? TRUE : FALSE, array('class' => 'form-check-input'));
							echo form_label($value, $value);
							echo '</div>';
						}
					break;
					case 'checkbox':
						foreach(json_decode($row->options) as $value) {
							echo '<div class="form-check">';
							echo form_checkbox("custom[$row->id]", $value, FALSE, array('class' => 'form-check-input'));
							echo form_label($value, $value);
							echo '</div>';
						}
					break;
				}			
				echo '</div>';
			}
			?>
			
			<button type="submit" class="btn btn-primary">Add User</button>
		</form>		  
    </main>
	
	<script type="text/javascript">
	$(document).ready(function() {		
		
		var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
		var string_length = 12;
	
		$('#generateCode').on('click', function(e){
			e.preventDefault;
			
			var randomstring = '';
			
			for (var i=0; i<string_length; i++) {
				var rnum = Math.floor(Math.random() * chars.length);
				randomstring += chars.substring(rnum,rnum+1);
			}

			$('#inputVerificationCode').val(randomstring);
		});
	
		$('#addUser').submit(function(e) {
			e.preventDefault();
			var formData = $(this).serialize();
			console.log(formData);

			$.post('<?php echo site_url('admin/usersave');?>', formData).done(function(data){
				console.log(data);
				
				if(data != null) {
					alert('New User Saved');
					//window.location.href = '<?php echo site_url('admin/userview');?>';					
				} else {
					alert('Error Saving User, please try again.');
				}				
			}, "json");			
		}); 
	});
	</script>	