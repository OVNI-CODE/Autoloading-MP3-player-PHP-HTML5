<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Image reader</title>
</head>

<body>
	
	<p>Back to main <a href="index.php">GitHubDemo</a></p>
	<p>&nbsp;</p>
<?php
	$imagesize = 300;//choose the width you want your images to display as- resize function
	
			/// START THE IMAGE READING FROM THE DIRECTORIES
			$filetype = $_GET[ filetypes ];
			$dh = opendir( "." );
			$files = array();
			while ( ( $file = readdir( $dh ) ) !== false ) {
				$fileurl = $file;

				if ( exif_imagetype( $file ) == IMAGETYPE_JPEG ) {
					//check that the file is a jpg
					array_push( $files, $file );
				}
			}
			closedir( $dh );
			//shuffle($files);// FOR RANDOM GALLERY
			natcasesort( $files ); // FOR ordered GALLERY
			//START THE LOOP TO PRINT FILES
			

			foreach ( $files as $file ) {
				// code to resize images
				$size = getimagesize( $file );
				$new_width = $imagesize;
				if ( $new_width > $size[ 0 ] ) {
					$new_width = $size[ 0 ];
					$new_height = $size[ 1 ];
				}

				if ( $new_width < $size[ 0 ] ) {
					// finds the width of image sets it to $new_width and creates a ratio to apply to the height
					$ratio = ( $new_width / $size[ 0 ] );
					$new_height = $ratio * $size[ 1 ];
				}
				if ( $new_height > $imagesize ) {
					$new_height = $imagesize;
					$width_ratio = ( $new_height / $size[ 1 ] );
					$new_width = $width_ratio * $size[ 0 ];
				}
				

				echo("<img src=\"".$file."\" width='".$new_width."'height='".$new_height."'><br>"); //print images found   
				//print images found and put a <br> line break between each one and then display the filename below if required

				//eCHO THE IMAGE NAME (minus the .jpg)-- comment out the line below if you don't want filenames printed
				echo( "<STRONG><H3>" . substr( $file, 0, -4 ) . "</H2></strong>" );
			}

			//////////////end of image directory reader
			?>
//////////////end of image directory reader
</body>
</html>