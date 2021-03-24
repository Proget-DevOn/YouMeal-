// pour lancer le serveur : npm run devStart

require("dotenv").config()
const express = require('express')
const app = express()
const server = require('http').Server(app)
const io = require('socket.io')(server)
const { v4: uuidV4 } = require('uuid')

// pour obtenir un identifiant aléatoire de room
app.set('view engine', 'ejs')
app.use(express.static('public'))

// ajoute un identifiant au lien
app.get('/', (req, res) => {
    res.redirect(`/${uuidV4()}`)
})

app.get('/:room', (req, res) => {
    res.render('room', {roomId: req.params.room})
})

io.on('connection', socket => {
    socket.on('join-room', (roomId, userId) => {
        socket.join(roomId)
        //socket.to(roomId).broadcast.emit('user-connected', userId)
        socket.to(roomId).emit('user-connected', userId)

        socket.on('disconnect', () => {
            socket.to(roomId).emit('user-disconnected', userId)
        })
    })
})

const port = process.env.PORT || 3000
server.listen(port, () => console.log(`Le serveur tourne avec le port ${port}`))