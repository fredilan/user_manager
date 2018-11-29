    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Add Custom User Field</h1>
        </div>
		
		<form id="addCustomField">
			<div class="form-group">
				<label for="inputFieldLabel">Field Label</label>
				<input type="text" class="form-control" id="inputFieldLabel" name="field_label" placeholder="Enter Label of New Field">
			</div>			
			<div class="form-group">
				<label for="inputFieldDescriptor">Field Name/ID</label>
				<input type="text" class="form-control" id="inputFieldDescriptor" name="field_id" placeholder="Enter ID of New Field">
			</div>			
			<div class="form-group">
				<label for="selectFieldType">Field Type</label>
				<select class="form-control" id="selectFieldType" name="field_type">
					<option value="textfield">Text Field</option>
					<option value="textarea">Text Area</option>
					<option value="dropdown">Dropdown</option>
					<option value="radio">Radio</option>
					<option value="checkbox">Checkbox</option>
				</select>
			</div>			
			<div class="form-group" id="fieldOptions">
				<label for="optionsFieldType">Field Type Options</label>				
				<div class="field_wrapper">
					<div>
						<input type="text" name="field_option[]" value="" class="form-control" />
						<a href="javascript:void(0);" class="add_button" title="Add field">Add Option</a>
					</div>
				</div>								
			</div>
			<button type="submit" class="btn btn-primary">Add Custom Field</button>
		</form>		  
    </main>
	
	<script type="text/javascript">
	$(document).ready(function(){
		var maxField = 20; //Input fields increment limitation
		var addButton = $('.add_button'); //Add button selector
		var wrapper = $('.field_wrapper'); //Input field wrapper
		var fieldHTML = '<div><input type="text" name="field_option[]" value="" class="form-control" /><a href="javascript:void(0);" class="remove_button">Remove Option</a></div>';
		var x = 1; //Initial field counter is 1

		//Once add button is clicked
		$(addButton).click(function(){
			//Check maximum number of input fields
			if(x < maxField){ 
				x++; //Increment field counter
				$(wrapper).append(fieldHTML); //Add field html
			}
		});
		
		//Once remove button is clicked
		$(wrapper).on('click', '.remove_button', function(e){
			e.preventDefault();
			$(this).parent('div').remove(); //Remove field html
			x--; //Decrement field counter
		});
		
		$('#addCustomField').submit(function(e){
			e.preventDefault();
			var formData = $(this).serialize();
			
			$.post('<?php echo site_url('admin/fieldsave');?>', formData).done(function(data){
				if(data != null) {
					alert('Custom Field Saved');
					window.location.href = '<?php echo site_url('admin/fieldview');?>';					
				} else {
					alert('Error Saving Field, please try again.');
				}				
			}, "json");			
		}); 
	});
	</script>