var express = require('express');
var app     = express();
var cons    = require('consolidate');

app.engine('html', cons.swig);
app.set('view engine', 'html');
app.set('views', __dirname + "/views03");

app.get('/', function(request, response){
    res.send("Hello World");
});

app.get('*', function(request, response){
    res.send("Server not found", 404);
});

app.listen(8000);
console.log("Server started");