/**
 * Hello world example using express.
 * Express is module and web framework for NodeJS.
 */

//Include express library
var express = require('express');

//Creating object of express
var app = express();

app.get('/', function(request, response){
    res.send("Hello World");
});

app.listen(8000);
console.log("Server started");

/*
Running this example will give following error

node 02helloexpress.js

module.js:340
    throw err;
          ^
Error: Cannot find module 'express'
    at Function.Module._resolveFilename (module.js:338:15)
    at Function.Module._load (module.js:280:25)
    at Module.require (module.js:364:17)
    at require (module.js:380:17)
    at Object.<anonymous> (D:\projects\git\kapstest\nodetest\02helloexpress.js:7:15)
    at Module._compile (module.js:456:26)
    at Object.Module._extensions..js (module.js:474:10)
    at Module.load (module.js:356:32)
    at Function.Module._load (module.js:312:12)
    at Function.Module.runMain (module.js:497:10)

Error message clearly show module 'express' is not available.

We need to install module 'express'. We can either do it locally for project or system wide.
For now, lets do it for project only.

There are two ways to install module for project:

1. npm install express

OR 

2. create package.json as follow:

    {
        "name" : "hello_express",
        "version" : "0.1.1",
        "description" : "npm introduction",
        "main" : "02helloexpress.js",
        "dependencies" : {
            "express" : "~3.2.6"
        },
        "author" : "Kapil Sharma",
        "license" : "Whatever fit your need"
    }

Once package.json available, following command will install required files

npm install
*/