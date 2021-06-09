//const express = require('express');
//const app = express();
//app.get("/",function(req,res){
//	res.send("Hello! from docker");
//})
//app.listen(3000, function(){
//	console.log('app listening on port 3000');
//});





const http = require('http');
http.get("/",function(req,res){
        res.send("Hello! from docker");
})
http.listen(3000, function(){
        console.log('app listening on port 3000');
});

const io = require('socket.io')(http);
    io.on('connect',function(socket){
       console.log('hi');
    });

