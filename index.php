<!DOCTYPE html>
<html lang="en">
<head>
  <?php   $song = strip_tags($_GET[song]);
  
  $pageName = "index.php";
					$imagesize = 300;
					$size = 0;
					//Number of columns plus one
					//$columnnum2="3";//landscape
				//	$columnnum="3";
					

?> 
<title>SnakeBeings Audio</title>

    
    
<style type="text/css">
    body {
	background-color: #cccccc;
	margin-left: 12px;
	
}
 <!-- HIGHLIGHT LISTS OF SONGS -->
.active {
    background: #f00;
}
    
  div {
    float: left;
  }
  span {
    color: blue;
  }
  a:link {
	color: #0A00FF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #0A00FF;
}
a:hover {
	text-decoration: none;
	color: #07F529;
}
a:active {
	text-decoration: none;
	color: #0A00FF;
}
</style>
    

</head>
<body>
<h2>GitHubDemo files:</h2>
<p><a href="download.php">download.php</a> (display a list and download any .mp3 files in this directory)    
<p><a href="text.php">text.php</a> Read and display words from a .txt file   
<p><a href="image.php">image.php</a> Display and resize any images from this directory
<p><a href="sound.php">sound.php </a>Just the .mp3 sound player section of the code    
<p><br>
  
  
  
  <?php
  //count the .mp3 files in the same director
  $howmanysongs = 0;
  // read all  file in the current directory
  if ( $dh = opendir( "." ) ) {
  	$files = array();
  	while ( ( $file = readdir( $dh ) ) !== false ) {
  		array_push( $files, $file );
  	}
  	closedir( $dh );
  	// current directory
  	$songtitle = getcwd() . "\n";
  	$songtitle2 = explode( '/', $songtitle );
  	echo( array_pop( $songtitle2 ) );
  	echo "<br>";
  }
  // Sort the files and display
  natcasesort( $files );
  // echo "<ul>\n";
  foreach ( $files as $file ) {
  	// $title = Title($file);
  	//if($file == ".."){$title ="Up One Level";}
  	if ( is_dir( $file ) ) { ///checks if it is a file or a directory
  		if ( $file != "." ) //get rid of error file readings
  		{}
  	}
  	$path_parts = pathinfo( $file );
  	$file_extention = strtolower( $path_parts[ 'extension' ] );
  	if ( is_file( $file )and $file_extention == "mp3" ) {
  		$bsize = filesize( $file );
  		$mbsize = round( ( $bsize / 1000000 ), 0 ); {
  			$iterator = new DirectoryIterator( dirname( __FILE__ ) );
  			$fullpath = $iterator->getPathname();
  			$dirpath = explode( "/", $fullpath );
  			$dircurrent = dirname( $dirpath[ 3 ] );
  			if ( $dirpath[ 8 ] == "index.php" ) {
  				$albumname = "";
  			} else {
  				$albumname = $dirpath[ 8 ];
  			}
  			////DISPLAY THE SONGS
  			//echo ("<A href = \"index.php?song=".$file."\">".$file."</a><br>");
  			//save to array for first play
  			$allfiles[ $howmanysongs ] = $file;
  			$howmanysongs++;
  		}
  	}
  }
  //save the array to $song2 array at the end of the loop
  if ( !$song ) {
  	$song2 = $allfiles[ 0 ];
  } else {
  	$song2 = $allfiles[ $song ];
  }

  ?>

<br>
</span><a href="
  	https: //circuit47.com">+ OTHER sound series</a> <br>
</p>
	<br>
<audio id="myAudio" controls width="300" height="32" autoplay>
  <source src="<?php echo($song2);?>" type="audio/mpeg">
Your browser does not support the audio element. </audio>

<p>
  <?php 
if(!$song){$song = 0;}
if($song == ($howmanysongs - 1)){$song2 = 0;} else {$song2 = ($song + 1);}?>

<p>
			<?php
			$howmanysongs = 0;
			// read all  file in the current directory and this time print the list onto the page
			if ( $dh = opendir( "." ) ) {
				$files = array();
				while ( ( $file = readdir( $dh ) ) !== false ) {
					array_push( $files, $file );
				}
				closedir( $dh );
			}
			// Sort the files and display
			natcasesort( $files );
			// echo "<ul>\n";
			foreach ( $files as $file ) {
				// $title = Title($file);
				//if($file == ".."){$title ="Up One Level";}
				if ( is_dir( $file ) ) { ///checks if it is a file or a directory
					if ( $file != "." ) //get rid of error file readings
					{}
				}
				$path_parts = pathinfo( $file );
				$file_extention = strtolower( $path_parts[ 'extension' ] );
				if ( is_file( $file )and $file_extention == "mp3" ) {
					$bsize = filesize( $file );
					$mbsize = round( ( $bsize / 1000000 ), 0 ); {
						$iterator = new DirectoryIterator( dirname( __FILE__ ) );
						$fullpath = $iterator->getPathname();
						$dirpath = explode( "/", $fullpath );
						$dircurrent = dirname( $dirpath[ 3 ] );
						if ( $dirpath[ 8 ] == "index.php" ) {
							$albumname = "";
						} else {
							$albumname = $dirpath[ 8 ];
						}
						//save to array for first play
						$allfiles[ $howmanysongs ] = $file;
						////colour the chosen song
						if ( $howmanysongs + 1 == ( $song2 ) ) {
							echo( "<span style=\"color: #F5070B\">" );
						} else {
							echo( "<A href = \"index.php?song=" . $howmanysongs . "\">" );
						}
						////DISPLAY THE SONGS
						echo( $file . "</a></span><br>" );

						$howmanysongs++;
					}
				}
			}
			//end of counting the sound files for the song list code below
			?>


			<br>
  <script>
				//TRANSFERE THE PHP VARIABLE LIST OF SONGS $SONG2 INTO THE JAVASCRIPT VAR NUM AND var somany = $howmanysongs;
				var num = <?php echo $song2 ?>;
				//var newUrl = 'index.php';


				var aud = document.getElementById( "myAudio" );
				aud.onended = function () {

					window.location.replace( '<?php echo $pageName ?>?song=' + num );
				};
			</script>



			<br><br>


			<?php
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
			//START THE LOOP TO PRINT FILES AND TABLE CONTENTS
			//PORTRAIT FILES FIRST

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
				//$new_height2= $ratio*$size[1];
				if ( $new_height > $imagesize ) {
					$new_height = $imagesize;
					$width_ratio = ( $new_height / $size[ 1 ] );
					$new_width = $width_ratio * $size[ 0 ];
				}
				//echo("<a href =\"images.php?price=".$price."&gallery=".$gallery."&item=".$file."\" id=\"".$file."\">");

				echo( "<img src=\"" . $file . "\" width='" . $new_width . "' height='" . $new_height . "' ></a><br>" ); //print images found   
				//print images found and put a <br> line break between each one and then display the filename below if required

				//eCHO THE IMAGE NAME (minus the .jpg)-- comment out the line below if you don't want filenames printed
				echo( "<STRONG><H3>" . substr( $file, 0, -4 ) . "</H2></strong>" );
			}

			//////////////end of image directory reader
			?>
			<br>
			<?php
			// PRINTS A TEXT FROM THE TEXT.TXT FILE INCLUDING ALL INFO ON THE ALBUM
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
			//htmlspecialchars($line) was above to stop hyper links
			?>


			<br>



<h3>&nbsp;</h3>
			<p>&nbsp;</p>
</html>