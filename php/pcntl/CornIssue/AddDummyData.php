<?PHP
require_once("Database.php");

$queryTruncate = "truncate table pcntl_contacts";
$queryInsert   = "INSERT INTO pcntl_contacts (`id` ,`name` ,`email`) " . 
                            "VALUES ( NULL , ?, ?)";

//get DB Connection
$dbClass = new Database();
$connection = $dbClass->getConnection();

//Truncate table
try {
    $connection->query($queryTruncate);
} catch (PDOException $ex) {
    echo "An Error occured while truncating! Error Message: " . $ex->getMessage();
}

//Insert dummy data
$statement = $connection->prepare($queryInsert);
for($i = 0; $i < Database::DATA_SIZE; $i++) {
    echo "inserting Data " . ($i+1);
    $j = $i+1;
    $number = ($j>99) ? $j : (($j > 9) ? "0".$j : "00".$j);
    $statement->execute(array( 'name-'.$number, 'name.' . $number . '@example.com'));
}

