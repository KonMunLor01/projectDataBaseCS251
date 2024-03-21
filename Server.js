var mysql = require('mysql');
var express = require('express');
var session = require('express-session');
var bodyParser = require('body-parser');
var path = require('path');

/*var connection = mysql.createConnection({
    host: 'sql12.freemysqlhosting.net',
    user: 'sql12579031',
    password: 'w2ULiiS6dj',
    database: 'sql12579031'
});*/

var app = express();

/*app.use(express.static(''))*/

app.get('/getHome', function(req, res) {
        res.redirect('/Main');
        // res.send('Welcome back, ' + req.session.username * '!');
});