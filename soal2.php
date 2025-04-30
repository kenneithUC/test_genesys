<?php
$x = 5;
for ($i = 1; $i <= $x; $i++) {
    echo str_repeat(" ", $x - $i);
    echo str_repeat("*", 2 * $i - 1);
    echo "\n";
}
?>
