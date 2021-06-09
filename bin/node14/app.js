const express = require('express');
const app = express();
const http = require('http');
const server = http.createServer(app);
const io = require('socket.io')(http,{
  cros: {
    origin: "http://127.0.0.1",
    methods: ["GET","POST"]
  }
});
//server.get("/",function(req,res){
//	res.send("Hello! from docker");
//})
server.listen(3000, function(){
	console.log('app listening on 3000');
});


//const http = require('http');
//http.get("/",function(req,res){
//       res.send("Hello! from docker");
//})
//http.listen(3000, function(){
 //       console.log('app listening on port 3000');
//});

//const io = require('socket.io')(app);
    io.on('connect',function(socket){
       console.log('hi');
    });

