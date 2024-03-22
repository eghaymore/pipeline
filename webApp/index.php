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
		<form action="includes/formhanlder.php" method="post">
			<label for="firstname">First Name:</label>
			<input type="text" id="firstname" name="firstname" placeholder="Firstname" required>
        		<br><br>
		
			<label for="lastname">Last Name:</label>
        		<input type="text" id="lastname" name="lastname" placeholder="Lastname" required>
        		<br><br>

        		<button type="submit">Submit</button>
		</form>

	</main>
    </body>
</html>

