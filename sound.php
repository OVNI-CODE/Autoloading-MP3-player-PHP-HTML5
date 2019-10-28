<!DOCTYPE html>
<html lang="en">
<head>
  <?php   $song = strip_tags($_GET[song]);
  
  $pageName = "sound.php";
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
<h2>GitHubDemo files: Sound only</h2><br>
<h4><a href="https://circuit47.com">www.circuit47.com</a></h4>
<br>
  
  
  
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
  			if ( $dirpath[ 8 ] == $pageName ) {
  				$albumname = "";
  			} else {
  				$albumname = $dirpath[ 8 ];
  			}
  			////DISPLAY THE SONGS
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
						if ( $dirpath[ 8 ] == $pageName ) {
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
							echo( "<A href = \"".$pageName."?song=" . $howmanysongs . "\">" );
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
				


				var aud = document.getElementById( "myAudio" );
				aud.onended = function () {

					window.location.replace( '<?php echo $pageName ?>?song=' + num );
				};
			</script>



			<br><br>
	
	
<br><br>
<br>
</html>