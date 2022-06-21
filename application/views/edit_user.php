 <div class="container">

   
 <h3><?php echo $title;?></h3>
   
 

  <div class="row">
     <form method="post" action="<?php echo site_url('user/update_user/'.$uid);?>">
	
<div class="col-md-8">
<br> 
 <div class="login-panel panel panel-default">
		<div class="panel-body"> 
	
	
	
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		
				<div class="form-group">	 
				<?php echo $this->lang->line('group_name');?>: <?php echo $result['group_name'];?> 
				</div>
				
				
		
				<div class="form-group">	 
					<label for="inputEmail" class="sr-only"><?php echo $this->lang->line('email_address');?></label> 
					<input type="email" id="inputEmail" name="email" value="<?php echo $result['email'];?>" class="form-control" placeholder="<?php echo $this->lang->line('email_address');?>" required autofocus>
			</div>
			<div class="form-group">	  
					<label for="inputPassword" class="sr-only"><?php echo $this->lang->line('password');?></label>
					<input type="password" id="inputPassword" name="password"   value=""  class="form-control" placeholder="<?php echo $this->lang->line('password');?>"   >
			 </div>
				<div class="form-group">	 
					<label for="inputEmail" class="sr-only"><?php echo $this->lang->line('first_name');?></label> 
					<input type="text"  name="first_name"  class="form-control"  value="<?php echo $result['first_name'];?>"  placeholder="<?php echo $this->lang->line('first_name');?>"   autofocus>
			</div>
				<div class="form-group">	 
					<label for="inputEmail" class="sr-only"><?php echo $this->lang->line('last_name');?></label> 
					<input type="text"   name="last_name"  class="form-control"  value="<?php echo $result['last_name'];?>"  placeholder="<?php echo $this->lang->line('last_name');?>"   autofocus>
			</div>
				<div class="form-group">	 
					<label for="inputEmail" class="sr-only"><?php echo $this->lang->line('contact_no');?></label> 
					<input type="text" name="contact_no"  class="form-control"  value="<?php echo $result['contact_no'];?>"  placeholder="<?php echo $this->lang->line('contact_no');?>"   autofocus>
			</div>

	
		

				<div class="form-group">	 
					<label   ><?php echo $this->lang->line('select_group');?></label> 
					<select class="form-control" name="gid"  onChange="getexpiry();" id="gid">
					<?php 
					foreach($group_list as $key => $val){
						?>
						
						<option value="<?php echo $val['gid'];?>" <?php if($result['gid']==$val['gid']){ echo 'selected';}?> ><?php echo $val['group_name'];?> </option>
						<?php 
					}
					?>
					</select>
			</div>
		


				<div class="form-group">	 
					<label   ><?php echo $this->lang->line('account_type');?></label> 
					<select class="form-control" name="su">
						<?php 
						foreach($account_type as $ak =>$val){
						?>
						<option value="<?php echo $val['account_id'];?>"<?php if($result['su']==$val['account_id']){ echo 'selected';}?> ><?php echo $val['account_name'];?></option>
						<?php 
						}
						?>
						 
					</select>
			</div>

 				<div class="form-group">	 
					<label   ><?php echo $this->lang->line('account_status');?></label> 
					<select class="form-control" name="user_status">
						<option value="Active" <?php if($result['user_status']=='Active'){ echo 'selected';}?>  ><?php echo $this->lang->line('active');?></option>
						<option value="Inactive" <?php if($result['user_status']=='Inactive'){ echo 'selected';}?>  ><?php echo $this->lang->line('inactive');?></option>
					</select>
			</div>
	<?php 
	foreach($custom_form as $fk => $fval){
 
	?>
				<div class="form-group">	 
					<label for="inputEmail"  ><?php echo $fval['field_title']; ?></label> 
					<input type="<?php echo $fval['field_type']; ?>" name="custom[<?php echo $fval['field_id']; ?>]"  class="form-control" value="<?php echo $custom_form_user[$fval['field_id']]; ?>"  <?php echo $fval['field_validate']; ?> >
			</div>
	
	<?php
	}
	?>	
 
	<button class="btn btn-default" type="submit"><?php echo $this->lang->line('submit');?></button>
 
		</div>
</div>
 
 
 
 
</div>
      </form>
</div>




</div>


 



</div>
