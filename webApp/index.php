<!doctype html>
<html>
    <head>
        <title>Hello World</title>
        <meta name="description" content="Our first page">
        <meta name="keywords" content="html tutorial template">
    </head>
    <body>
	<?php
		echo '<h1>Hello World!</h1>';
		echo '<p>Hello git Hooks!</p>';
	?>
	<main>
<!-- NOTE: the required attribute is not enough to stop the user from submitting an empty form! user can still submit the form by using the inspect tool-->
<!-- Frontend stuff does not provide security! -->
		<form action="includes/formhandler.php" method="post">
			<label for="firstname">First Name:</label>
			<input type="text" id="firstname" name="firstname" placeholder="Firstname" required>
        		<br><br>
		
			<label for="lastname">Last Name:</label>
        		<input type="text" id="lastname" name="lastname" placeholder="Lastname" required>
        		<br><br>

			<label for="areacode">Zipcode:</label>
			<input type="text" id="areacode" name="areacode" placeholder="Zipcode" required>
        		<br><br>

			<label for="phone">Phone:</label>
			<input type="text" id="phone" name="phone" placeholder="Phone" required>
        		<br><br>

			<label for="email">Email:</label>
			<input type="text" id="email" name="email" placeholder="Email" required>
        		<br><br>

			<label for="total">Total:</label>
			<input type="text" id="total" name="total" placeholder="Total" required>
        		<br><br>





        		<button type="submit">Submit</button>
		</form>

	</main>
    </body>
</html>

