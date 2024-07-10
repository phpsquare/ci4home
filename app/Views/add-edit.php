<div class="main-wrapper">
	<div class="top-bg gradient-45deg-indigo-purple"></div>

	<div id="main-content">

	<div class="title-wrap">
		<div class="page-title"><h3 class="white-text"><?php echo $page_heading?></h3></div>
		<div class="btn-wrap add-new">
			
		</div>
	</div>

		<div class="container edit-container">
			<div class="card">
				<?php echo form_open_multipart($action_url);?>
				<?php 
				if($message){
					?>
					<div class="row">
						<div class="col s12 red-text text-darken-2">
							<?=$message?>
						</div>
					</div>
					<?php
				}
				?>
				<div class="edit-row">
			        
			      <!--  <div class="input-field">
			          	form_input($name)
			            <label for="name">Name</label>
			            <span class="helper-text" data-error="Required field"></span>
			        </div> -->
			        
			        
                    
                    <div class="input-field" >
                    	<input type="text" id="full_name" name="full_name" value="" required>
                    	
                    </div>

                    <div class="input-field" >
                    	<input type="text" id="email" name="email" value="" required>
                    	
                    </div>

			        <div class="input-field">
			        	
	        			<?php echo form_button($submit)?>
			        </div>
			    </div>
				<?php echo form_close();?>


				
			</div>
			
		</div>
	</div>
</div>