<?php if(isset($_POST["edit-room"])){
	?>
	<br>
	<div class="container border border-success">
		<h3 class="text-uppercase" style="color: #ff5722">Edit Room</h3>
		<form method="post">
			<div class="row">
				<div class="form-group col-sm-12">
					<label style="size: 15px">Link image:</label>
					<input type="text" class="form-control" name="links-room" placeholder="Enter link" value="<?php echo $room_edit_by_id[0]['image'] ?>" required>
				</div>
				<div class="form-group col-sm-12">
					<label style="size: 15px">Name:</label>
					<input type="text" class="form-control" name="names-room" placeholder="Enter name" value="<?php echo $room_edit_by_id[0]['name'] ?>" required>
				</div>
				<div class="form-group col-sm-12">
					<label style="size: 15px">Max:</label>
					<input type="text" class="form-control" name="maxs" placeholder="Enter number" value="<?php echo $room_edit_by_id[0]['max'] ?>" required>
				</div>
				<div class="form-group col-sm-12">
					<label style="size: 15px">Price:</label>
					<input type="text" class="form-control" name="prices" placeholder="Enter price" value="<?php echo $room_edit_by_id[0]['price'] ?>" required>
				</div>
			</div>
			<a href="https://imgbb.com/"><button type="button" class="btn btn-danger btn-lg">Get link</button></a>
			<button type="submit" name="cancel" id="form-submit" class="btn btn-secondary btn-lg pull-right ">Cancel</button>
			&emsp;
			<button type="submit" name="room-update-submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Submit</button>
			<br>
		</form>
		<br>
	</div>
	<?php
}
?>