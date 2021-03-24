const socket = io('/')
const videoGrid = document.getElementById('video-grid')
const myPeer = new Peer({host:'peerjs-server.herokuapp.com', secure:true, port:443})
const myVideo = document.createElement('video')
myVideo.muted = true
const peers = {}

// récupération de la vidéo
navigator.mediaDevices.getUserMedia({
    video: true,
    audio: true
}).then(stream => {
    addVideoStream(myVideo, stream)

    // recevoir la vidéo
    myPeer.on('call', call => {
        call.answer(stream)
        const video = document.createElement('video')
        call.on('stream', userVideoStream => {
            addVideoStream(video, userVideoStream)
        })
    })

    socket.on('user-connected', userId => {
        connectToNewUser(userId, stream)
        console.log("user connected")
    })
})

socket.on('user-disconnected', userId => {
    if (peers[userId]) peers[userId].close()
    console.log("user disconnected")
})

myPeer.on('open', id => {
    socket.emit('join-room', ROOM_ID, id)
})

/*socket.emit('join-room', ROOM_ID, 10)

socket.on('user-connected', userId => {
    console.log('User connected: ' + userId) 
})*/

function connectToNewUser(userId, stream){
    const call = myPeer.call(userId, stream)
    const video = document.createElement('video')
    call.on('stream', userVideoStream => {
        addVideoStream(video, userVideoStream)
    })
    call.on('close',() => {
        video.remove()
    })
    peers[userId] = call
}

function addVideoStream(video, stream){
    video.srcObject = stream
    video.addEventListener('loadedmetadata', () => {
        video.play()
    })
    videoGrid.append(video)
}