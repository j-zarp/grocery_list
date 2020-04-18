
<!-- store last modification time -->
<?php
$stat = stat('.last_modif');
echo 'last modification at: ' . $stat['mtime']; /* time of last modification (Unix timestamp) */
?>


