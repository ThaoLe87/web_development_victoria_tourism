<?php
	include('include/header.inc');
	include('include/nav.inc');
?>
	<div class="insertform">
		<form action="insert.php" method="post" enctype="multipart/form-data">
			<h2 class="form_header">Insert a new Attraction</h2>
			<label>Name</label>
			<input type="text" name="name" placeholder="Attraction Name" >
			<label>Venue</label>
			<input type="text" name="venue" placeholder="Venue" required>
			<label>Topic</label>
			<input type="text" name="topic" placeholder="Topic" required>
			<label>Details</label>
			<textarea cols="58" rows="5" name="details" placeholder="Details" required></textarea>
			<label>Photo</label>
			<input type="file" name="photo">
			<br><br>
			<button type="submit">Add Attraction</button>
		</form>
	</div>
<?php
	include('include/footer.inc');
?>
		