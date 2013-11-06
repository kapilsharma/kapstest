var MongoClient = require('mongodb').MongoClient;

MongoClient.connect('mongodb://localhost:27017/school',function(err, db){
    if(err) throw err;
    
    db.collection('students').find().toArray(function(err, docs){

        if(err) throw err;

        var records = 0;

        for(var i=0; i<docs.length; i++) {
            console.log("record " + i);
            var lowestIndex = 0;
            var scores = docs[i].scores;

            console.dir(scores);

            for (var j=0; j<scores.length; j++) {
                if(scores[lowestIndex].score > scores[j].score) {
                    lowestIndex = j;
                }
            }
            
            var removed = scores.splice(lowestIndex, 1);

            console.dir(scores);

            db.collection('students').update({ _id : docs[i]._id }, {$set : { 'scores' : scores}}, function(err, updated){
                if(err) throw err;

                if(++records == docs.length) {
                    db.close();
                }
            });
        }

    });
});