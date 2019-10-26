<!doctype html>
<html>
<head>

```php	
<?php   $song = strip_tags($_GET[song]);
  
  
	$imagesize = 300;
	$size = 0;				

?> 
	```
<meta charset="utf-8">
<title>Audio Player</title>
</head>

<body>
	
     <p>
        <?php
			$howmanysongs=0;
    // read all  file in the current directory
    if ($dh = opendir(".")) {
        $files = array();
        while (($file = readdir($dh)) !== false) {
          array_push($files, $file);
         }
        closedir($dh);
		// current directory
$pagetitle = getcwd() . "\n";
$pagetitle2 = explode('/', $pagetitle);
echo(array_pop($pagetitle2));
echo"<br>";
    }
   // Sort the files and display
    natcasesort($files);
 
    foreach ($files as $file) {
     
        if(is_dir($file)) {///checks if it is a file or a directory
		 if($file != "."  )//get rid of error file readings
		 		{	}}
		 		$path_parts = pathinfo($file);
$file_extention = strtolower($path_parts['extension']);
if(is_file($file) and $file_extention == "mp3")	 { 
		 	$bsize = filesize($file)  ;
				$mbsize = round(($bsize / 1000000),0);			{
$iterator = new DirectoryIterator(dirname(__FILE__));
$fullpath =  $iterator->getPathname() ;
$dirpath = explode("/", $fullpath);
$dircurrent = dirname($dirpath[3]);
if ($dirpath[8] == "index.php")
{$albumname = "";} else { $albumname = $dirpath[8];}
		////DISPLAY THE SONGS
	
		//save to array for first play
		$allfiles[$howmanysongs] = $file;
		$howmanysongs++;
		}} }
		
		if(!$song){$song2 = $allfiles[0];}else {$song2 = $allfiles[$song];}
		
		
		
	?>
    
       
        </span>
        (+ <a href="..\">www.circuit47.com)</a><a href="https://circuit47.com"></a></p>        
        <audio id="myAudio" controls width="300" height="32" autoplay >
          <source src="<?php echo($song2);?>" type="audio/mpeg">
Your browser does not support the audio element. </audio>        <p>
            <?php 
if(!$song){$song = 0;}
if($song == ($howmanysongs - 1)){$song2 = 0;} else {$song2 = ($song + 1);}?>
          
          <p>
            <?php
			$howmanysongs=0;
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
   // echo "<ul>\n";
    foreach ($files as $file) {
       // $title = Title($file);
		 //if($file == ".."){$title ="Up One Level";}
        if(is_dir($file)) {///checks if it is a file or a directory
		 if($file != "."  )//get rid of error file readings
		 		{	}}
		 		$path_parts = pathinfo($file);
$file_extention = strtolower($path_parts['extension']);
if(is_file($file) and $file_extention == "mp3")	 { 
		 	$bsize = filesize($file)  ;
				$mbsize = round(($bsize / 1000000),0);			{
$iterator = new DirectoryIterator(dirname(__FILE__));
$fullpath =  $iterator->getPathname() ;
$dirpath = explode("/", $fullpath);
$dircurrent = dirname($dirpath[3]);
if ($dirpath[8] == "index.php")
{$albumname = "";} else { $albumname = $dirpath[8];}
		//save to array for first play
		$allfiles[$howmanysongs] = $file;
		////colour the chosen song
		if($howmanysongs+1 == ($song2)){echo("<span style=\"color: #F5070B\">");}else {echo ("<A href = \"index.php?song=".$howmanysongs."\">");}
		////DISPLAY THE SONGS
		echo ($file."</a></span><br>");
		
		$howmanysongs++;
		}} }
		//echo($allfiles[0]);
	?>
            <script>


//var somany = $howmanysongs;
var num = <?php echo $song2 ?>;
	//var newUrl = 'index.php';
	
	 
var aud = document.getElementById("myAudio");
aud.onended = function() {
	
  window.location.replace('index.php?song='+num);
};
            </script>
          </p></td>
              <td width="250" rowspan="4" valign="top"> 
              <table><tr>             <p>&nbsp;
                
				  
				  
				  
				  
				  
				  
				  
				  </p>
                <p></p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>
 
              </tr></table>
</body>
</html>
