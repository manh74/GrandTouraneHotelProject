<div class="product-detail">
	<div style="display: flex; justify-content: space-between;">
		<div class="modal fade" id="btAddFood" tabindex="-1" role="dialog"  aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="addNewFood">ADD NEW FOOD</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="POST">
							<div class="form-group">
								<label>Link image:</label>
								<input type="text" class="form-control" placeholder="Enter link image" name="image-food">
							</div>
							<div class="form-group">
								<label for="new-name">Name:</label>
								<input type="text" class="form-control" placeholder="Enter name" name="new-name-food">
							</div>
							<div class="form-group">
								<label for="new-name">Price:</label>
								<input type="text" class="form-control" placeholder="Enter price" name="new-price-food">
							</div>
							<div class="form-group">
								<label for="new-name">Info:</label>
								<input type="text" class="form-control" placeholder="Enter information" name="new-info">
							</div>
						</div>
						<div class="modal-footer" style="display: flex; justify-content: space-between;">
							<div>
								<a href="https://imgbb.com/"><button type="button" class="btn btn-danger">Get link for image</button></a>
							</div>
							<div>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary" name="upload-food">Add</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>