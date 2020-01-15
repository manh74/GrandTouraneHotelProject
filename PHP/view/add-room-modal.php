<?php if(isset($_SESSION["admin"])){?>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#btAdd">ADD NEW ROOM</button>
<?php } ?>
<div class="product-detail">
	<div style="display: flex; justify-content: space-between;">
		<div class="modal fade" id="btAdd" tabindex="-1" role="dialog" aria-labelledby="addNewRoom" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="addNewRoom">ADD NEW ROOM</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="POST">
							<div class="form-group">
								<label>Link image:</label>
								<input type="text" class="form-control" placeholder="Enter link image" name="image">
							</div>
							<div class="form-group">
								<label for="new-name">Name:</label>
								<input type="text" class="form-control" placeholder="Enter name" name="new-name">
							</div>
							<div class="form-group">
								<label for="new-name">Max:</label>
								<select name="max" class="form-control">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
								</select>

							</div>
							<div class="form-group">
								<label for="new-name">Price:</label>
								<input type="text" class="form-control" placeholder="Enter price" name="new-price">
							</div>
						</div>
						<div class="modal-footer" style="display: flex; justify-content: space-between;">
							<div>
								<a href="https://imgbb.com/"><button type="button" class="btn btn-danger">Get link for image</button></a>
							</div>
							<div>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary" onclick="addNewRoom()" name="upload">Add</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>