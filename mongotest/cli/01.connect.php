<?PHP

//Get connection
$connection = new MongoClient();

//Get database
$db         = $connection->phpclidb;

//Get Collection
$first      = $db->first;

//Create new document to insert
$doc = array(
            "name"     => "MongoDB",
            "type"     => "database",
            "count"    => 1,
            "info"     => (object)array( "x" => 203, "y" => 102),
            "versions" => array("0.9.7", "0.9.8", "0.9.9")
        );

//Insert document
$first->insert($doc);