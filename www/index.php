<?php

echo "<p>Hello World!</p>";

require dirname(__FILE__) . '/le_php-master/logentries.php';

// The following levels are available
$log->Debug("Debug de bug.");
$log->Info("Informative.");
$log->Notice("Notice me noticing you.");
$log->Warn("I'm warning you!");
$log->Crit("Nat 20! Crit!");
$log->Error("Error. Error. Error.");
$log->Alert("Alert: Bee-doo-bee-doo-bee-doo.");
$log->Emerg("Emergencia!");