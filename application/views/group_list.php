 <div class="container">

   
 <h3>Classes</h3>


  <div class="row">
 
<div class="col-md-12">
<br> 
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		<div id="message"></div>
		
		 <a href="<?php echo site_url('user/add_new_group');?>" class="btn btn-success">Add New Class</a>
	</br><br/>
<table class="table table-bordered">
<tr>
 <th><?php echo $this->lang->line('group_name');?></th>

 
<th><?php echo $this->lang->line('action');?> </th>
</tr>
<?php 
if(count($group_list)==0){
	?>
<tr>
 <td colspan="3"><?php echo $this->lang->line('no_record_found');?></td>
</tr>	
	
	
	<?php
}

foreach($group_list as $key => $val){
?>
<tr>
 <td> <?php echo $val['group_name'];?></td>


<td>
<a href="<?php echo site_url('user/edit_group/'.$val['gid']);?>"><img src="<?php echo base_url('images/edit.png');?>"></a>
<a href="<?php echo site_url('user/pre_remove_group/'.$val['gid']);?>"><img src="<?php echo base_url('images/cross.png');?>"></a>

</td>
</tr>

<?php 
}
?>
 
</table>

 
</div>

</div>



</div>
