<?PHP
require_once("Database.php");

class AddEmail
{
    const BATCH_SIZE = Database::ITERATION_SIZE;

    public function getData($page = 1)
    {
        $startVlaue = ($page-1) * AddEmail::BATCH_SIZE;
        $offset     = AddEmail::BATCH_SIZE;

        $query = 'SELECT * from pcntl_contacts limit ' . $startVlaue . ', ' .$offset;

        //get DB Connection
        $dbClass = new Database();
        $connection = $dbClass->getConnection();

        $stmt = $connection->query($query);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataCount()
    {
        $query = 'SELECT * from pcntl_contacts';

        //get DB Connection
        $dbClass = new Database();
        $connection = $dbClass->getConnection();

        $stmt = $connection->query($query);

        return $stmt->rowCount();
    }

    public function insertData($email)
    {
        $dbClass = new Database();
        $connection = $dbClass->getConnection();

        $query = "INSERT INTO pcntl_email (`email`) VALUES (?)";

        $statement = $connection->prepare($query);

        $statement->execute(array( $email ));
    }
}