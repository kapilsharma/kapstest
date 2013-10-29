<?PHP
require_once('DbConfig.php');

class Database
{
    const DATA_SIZE = 16073;
    const ITERATION_SIZE = 1000;

    public function getConnection()
    {
        $host = 'mysql:host=' . DbConfig::DBHOST . ';dbname=' . DbConfig::DBNAME . ';charset=utf8';
        
        return new PDO($host, DbConfig::DBUSER, DbConfig::DBPASS);
    }
}