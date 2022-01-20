const express = require('express');
const mysql   = require('mysql');``

const app        = express();
const server     = require('http').createServer(app);
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: 'nganu',
  database: 'manajemen_proyek'
})

connection.connect()

const io = require('socket.io')(server, {
    cors: { origin: "*"}
});

io.on('connection', (socket) => {
    socket.on('init', (data) => {
        connection.query(`SELECT * FROM chattings WHERE chat_id = ?;`, [data.id], function(errors, results) {
            const response = data
            response.data  = results

            socket.emit('loaded', response);
        })
    });

    socket.on('send', (data) => {
        connection.query(`INSERT INTO chattings SET ?;`, [data.inputs], function(_, results) {
            const response = data.credential
            response.data  = data.inputs

            io.emit('receive', response);
        })
    });
});

server.listen(3000, () => {
    console.log('Server is running');
});
