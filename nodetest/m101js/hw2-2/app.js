var MongoClient = require('mongodb').MongoClient;

MongoClient.connect('mongodb://localhost:27017/weather', function(err, db) {

    if (err) {
        throw err;
    }

    $query = {}
    $sort = { "State" : 1, "Temperature" : -1};

    var cursor = db.collection('data').find($query);
    cursor.sort($sort);

    var currentState = "";

    cursor.each(function(err,doc){

        if(err) {
            throw err;
        }

        if(doc == null) {
            return db.close();
        }

        if (doc.State != currentState) {
            currentState = doc.State;

            doc.month_high = true;

            console.dir(doc);

            db.collection('data').save(doc, function(err, saved) {
                if(err) {
                    throw err;
                }

                console.log("Highest temperature for " + currentState + " is " + doc.Temperature);
            });
        }

    });

});

/*
Hint: If you select all the weather documents, you can sort first by state, then by temperature. 
Then you can iterate through the documents and know that whenever the state changes you have reached the highest temperature for that state. 

{
    "_id" : ObjectId("520bea012ab230549e749cff"),
    "Day" : 1,
    "Time" : 54,
    "State" : "Vermont",
    "Airport" : "BTV",
    "Temperature" : 39,
    "Humidity" : 57,
    "Wind Speed" : 6,
    "Wind Direction" : 170,
    "Station Pressure" : 29.6,
    "Sea Level Pressure" : 150,
    "month_high" : true
}
*/