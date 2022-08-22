<?php
error_reporting(0);

# Coded by L0c4lh34rtz - IndoXploit

# 2022 Re edit by Youez - XploitSec
# Adding Result found.txt if result (password_verify) is OK

# \n -> linux
# \r\n -> windows
$list = explode("\n", file_get_contents($argv[1])); # change \n to \r\n if you're using windows
# ------------------- #

$hash = '$2y$10$hhnC6P3N3EMPjrHIxyrjY.kGzRGNY4bUJXCq.XdsCbNCz3PQfW8kS'; # hash here, NB: use single quote (') , don't use double quote (")

if(isset($argv[1])) {
	foreach($list as $wordlist) {
		$q = print " [+]"; print (password_verify($wordlist, $hash)) ? "$hash -> $wordlist (OK)\n" : "$hash -> $wordlist (SALAH)\n";
		if (password_verify($wordlist, $hash) == "$hash -> $wordlist (OK)") {
			$save = @fopen("found.txt", "a");
			fwrite($save, "Found -> ".$wordlist . "\n");
            fclose($save);
		}
	}
} else {
	print "usage: php ".$argv[0]." wordlist.txt\n";
}
?>
