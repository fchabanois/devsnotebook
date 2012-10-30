<?php
header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 864000)); 

header("Content-type: image/jpg");
readfile("notebook2.jpg");
?>