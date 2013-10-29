<?php
//Just retirning random number
function getRandomTimeToProcess($end = 10, $start = 1) {
    return rand($start, $end);
}
    
//Total selected contacts in database
$totalContacts = 15796;

//Select 1000 contacts at a time
$contactInIteration = 1000;

//Total loop needed
$contactLoop = intval($totalContacts/$contactInIteration) + 1;

$arr = array();

//For hardcoded example, we will get 16 loops.
//Next, run that 16 loops in parallel
for ($i=0; $i<$contactLoop; $i++) {
    
    $pid = pcntl_fork();
    
    if ($pid == 0) { // Child
		//Process 1000 records
		$time = getRandomTimeToProcess();
		sleep($time);
		$arr[$i] = "1";
		echo "\n Process i = " . $i . " complete in " . $time . " seconds ";
		exit($i);
    }
}

while (pcntl_waitpid(0, $status) != -1) {
    $status = pcntl_wexitstatus($status);
    echo "Child $status completed\n";
}

print_r($arr);