var MongoClient = require('mongodb').MongoClient;

MongoClient.connect('mongodb://localhost:27017/school',function(err, db){
    if(err) throw err;
    
    var cursor = db.collection('students').find({});

    cursor.sort({ _id : 1 });
    
    cursor.each(function(err, doc) {

        console.log( "Updating id " + doc._id);

        if(err) {
            console.dir(err);
            throw err;
        }
        
        if(doc == null) {
            return db.close();
        }

        console.dir(doc);
        
        var scores = doc.scores;
        
        var lowestIndex = 0;
        for (var i=0; i<scores.length; i++) {
            if(scores[lowestIndex].score > scores[i].score) {
                lowestIndex = i;
            }
        }
        
        var removed = scores.splice(lowestIndex, 1);
        
        doc.scores = scores;

        console.dir(doc);
        
        db.collection('students').save(doc, function(err, saved) {
            if(err) {
                console.dir(err);
                throw err;
            }
            
            console.log("For student id " + doc._id + " removed: " + removed + "\n");
        });

        console.log( "Updated id " + doc._id);
    });
});
