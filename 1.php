<?php

$str = "&quot;Plunkett&apos;s Road&quot";

// Outputs: Is your name O\'Reilly?
echo addslashes($str);
echo '<br>';
echo htmlspecialchars_decode($str,ENT_QUOTES);
echo  '<br>';
echo addslashes('&#39s');





//echo '<ul><li><a href="#" onclick="geocode('.$lat.','.$lng.','.$qty.',\''.$locc.'\',\''.$loce.'\')">'. $locc .'</a></li></ul>';
//
//echo '<ul><li><a href="#" onclick="geocode(22.343343,124343242,1,\'山頂\',\'Plunkett\'s Road\')">'. $locc .'</a></li></ul>';
//
//echo '<ul><li><a href="#" onclick="geocode(22.343343,124343242,1,\'山頂\',\'Plunkett Road\')">'. $locc .'</a></li></ul>';








?>