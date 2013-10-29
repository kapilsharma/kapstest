<?PHP
require_once("AddEmail.php");

$addEmail = new AddEmail();

//some dummy calculation
$dataCount = Database::ITERATION_SIZE;
$records = $addEmail->getDataCount();
$pages = intval($records / $dataCount) + 1; 
echo "total records = $records \n";
echo "pages = $pages \n";

$counter = array();

for ($i=1; $i<=$pages; $i++) {
    echo "Page $i started \n";
    $data = $addEmail->getData($i);

    $pid = pcntl_fork();

    if ($pid == 0) { // Child
        $counter[$i] = 0;
        foreach ($data as $key => $value) {
            $addEmail->insertData($value['email']);

            $counter[$i]++;

            if($counter[$i] % 100 == 0) {
                echo $counter[$i] . " records processed for child $i \n";
            }
        }

        echo "Page $i ending \n";
        exit($i);
    }
}

while (pcntl_waitpid(0, $status) != -1) {
    $status = pcntl_wexitstatus($status);
    echo "Child $status completed \n";
}