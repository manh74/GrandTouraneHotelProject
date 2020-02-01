<?php 
if(isset($_POST['about-edit'])){
	$_SESSION['about-edit'] = $_POST['about-edit'];
	?>
	<br>
	<div class="container border border-success">
		<h3 class="text-uppercase" style="color: #ff5722">Edit information</h3>
		<form method="post" action="info.php">
			<div class="row">
				<div class="form-group col-sm-12">
					<label style="size: 15px">Title</label>
					<input type="text" class="form-control" name="title-update" placeholder="Enter title" value="<?php echo $about_edit_by_id[0]['title'] ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label tyle="size: 15px">Content</label>
				<textarea class="form-control" rows="5" name="content-update" placeholder="Enter new content" required><?php echo $about_edit_by_id[0]['content'] ?></textarea>
			</div>
			<button type="submit" name="about-update-submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Submit</button>
			<br>
		</form>
		<br>
	</div>
	<?php
}
?>