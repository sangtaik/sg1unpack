<?php

$fd = fopen('/data/SCRIPT.PAK', 'rb');

list($junk, $file_count) = unpack('N*', fread($fd, 4));

echo $file_count;

$offset = array();

$filesize = array();

$filename = array();

for($i=0; $i< $file_count; $i++) {
  
  list($junk, $offset[$i]) = unpack('N*', fread($fd, 4));

  list($junk, $filesize[$i]) = unpack('N*', fread($fd, 4));
  
  $filename[$i] = 'package/' . rtrim(fread($fd, 16));
}

for($i=0; $i< $file_count; $i++) {
	$offset[$i] = 0x800 * $offset[$i];
}

for($i=0; $i< $file_count; $i++) {
	if ($i < $file_count -1) {
		$filesize[$i] = $offset[$i+1] - $offset[$i];
	} 
	echo "hex index : " . dechex($offset[$i]). ", " . $offset[$i] . ", file size : " . $filesize[$i] . "\n";
}


for($i=0; $i<$file_count; $i++) {
  $fo = fopen($filename[$i], 'w');
  fseek($fd, $offset[$i], SEEK_SET);
  //echo "offset : " . $offset[$i] . "  , SEEK : " . $seekvalue . "\n";

  fputs($fo, fread($fd, $filesize[$i]));
  fclose($fo);
}
fclose($fd);

?>