<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Reads and prints a text file</title>
</head>

<body>
	
	<p>Back to main <a href="index.php">GitHubDemo</a></p>
	<p>&nbsp;</p>
<?php
			// PRINTS A TEXT FROM THE 'text.txt' FILE if its in the same directory as this code 
				//you can add different filepaths to the 'text.txt' if you like. example: ''../all words/page5text.txt' to do so replace all of the 'text.txt'
			if ( file_exists( 'text.txt' ) ) {
				$lines = file( 'text.txt' );
			} else {
				$lines = 'This page will be updated shortly';
			}

			if ( file_exists( 'text.txt' ) ) {
				// Loop through our array, show HTML source as HTML source; and line numbers too.
				foreach ( $lines as $line_num => $line ) {
					echo "</span> " . $line . "<br /></span>";
				}
			}
			?>
</body>
</html>