<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Maggotism International Download</title>
</head>
<body>

<?php
$filetype = $_GET[filetypes];
    // read all  file in the current directory
    if ($dh = opendir(".")) {
        $files = array();
        while (($file = readdir($dh)) !== false) {
          
                array_push($files, $file);
            
        }
        closedir($dh);
    }
   
    // Sort the files and display
 natcasesort($files);
//sort($files);

    echo "<ul>\n";
	
	
    foreach ($files as $file) {
        $title = Title($file);
		
		 if($file == ".."){$title ="(Up One Level)";}

        if(is_dir($file)) {///checks if it is a file or a directory
		 if($file != "."  )//get rid of error file readings
		 				{	
          
      			 }}

		////////////////////////
		//check if its a file
		//check if its an mp3
		
		$path_parts = pathinfo($file);

$file_extention = strtolower($path_parts['extension']);


//look for zip files first and display them
if(is_file($file) and $file_extention == "zip")
		 	
		{
			 
		 	$bsize = filesize($file)  ;
				$mbsize = round(($bsize / 1000000),0);			{
        echo "<li><a href='".$file."'>".$title."</a> (Size = ".$bsize." Bytes)</li>\n";
		}}
		echo "<br>";
		//second look for .mp3 files and display them
	if(is_file($file) and $file_extention == "mp3")
		 	
		{
			 //optional kb file size or Byte size
		 	$bsize = filesize($file)  ;
				$kbsize = round(($bsize / 1000),0);			{
        echo "<li><a href='".$file."'>".$title."</a>       (Size = ".$kbsize." Kb)</li>\n";
		}}	
		
		
		
		
		
		
    }
	
	
	
	
    echo "</ul>\n";
   
    // Function to get a human readable title from the filename
    function Title($filename) {
        $title = substr($filename, 0, strlen($filename));
        $title = str_replace('-', ' ', $title);
        $title = ucwords($title);
        return $title;
    }
?>
</body>
</html>