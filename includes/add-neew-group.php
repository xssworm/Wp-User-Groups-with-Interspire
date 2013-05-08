<?php 
	$action = admin_url('admin.php?page=addnew-user-group');
	$Ugdb = new UgDbManagement();
	
	if($_REQUEST['group_id'] > 0){
		$group = $Ugdb->get_group($_REQUEST['group_id']);
		
		if($group){
			$metas = $Ugdb->get_group_metas($_REQUEST['group_id']);
		}
		
		//var_dump($group);
		//var_dump($metas);
	}
?>


<style>
	.group-selectbox{
		min-width: 255px;
	}
</style>

<div class="wrap">

	<h2>Group Information</h2>
	
	<?php 
		if($_REQUEST['message'] == 1){
			?>
			<div class="updated"><p> Group Information saved </p></div>
			<?php 
		}
	?>
	
	<form action="<?php echo $action; ?>" method="post">
	
		<input type="hidden" name="page" value="<?php echo $_REQUEST['page']; ?>">
		<input type="hidden" name="add-new-group" value="Y" />
		
		<?php 
			if($_REQUEST['group_id'] > 0){
				?>
				<input type="hidden" name="group_id" value="<?php echo trim($_REQUEST['group_id']); ?>" />
				<?php 
			}
		?>
		
		<table class="form-table" >
			<tbody>
				<tr>
					<th scope="row"><label for="group_name">Group Name</label></th>
					<td><input id="group_name" size="40" type="text" name="group_name" value="<?php echo $group['name']; ?>" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="group_domain">Group Domain</label></th>
					<td><input size="40" type="text" name="group_domain" value="<?php echo $group['domain']; ?>" id="group_domain" /></td>
				</tr>
				<tr>
					<th scope="row"><label for="group_password">Group Password </label></th>
					<td><input size="40" type="text" id="group_password" name="group_password" value="<?php echo $metas['password']; ?>" /></td>
				</tr>
				
				<tr>
					<th scope="row"> <label for="group_interspire_list" > InterSpire List </label></th>
					<td>
						<select id="group-interspire_list" class="group-selectbox" name="group_interspire_list">
							<option value="">Choose</option>
							<option value="">List B</option>
						</select>
					</td>
				</tr>
				
			</tbody>
		</table>
		
		<p>
			<?php if($_REQUEST['group_id'] > 0) : ?>
				<input type="submit" value="Update Group" class="button button-primary" />
			<?php else: ?>
				<input type="submit" value="Add Group" class="button button-primary" />
			<?php endif; ?>
		</p>
		
	</form>
	
</div>