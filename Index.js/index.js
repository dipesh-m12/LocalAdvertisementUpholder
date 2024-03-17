const WebSocket = require('ws');
let count = 0;
const wss = new WebSocket.Server({ port: 8080 });

wss.on('connection', function connection(ws) {
    console.log('Client connected');
    console.log(`Total Clients:${++count}\n`);

    ws.on('message', function incoming(message) {
        console.log('Requested Delete for:', message.toString());

        wss.clients.forEach(function each(client) {
            if (client !== ws && client.readyState === WebSocket.OPEN) {
                client.send(`${message}`);
            }
        });
    });
    ws.on('close', function () {
        console.log('Client disconnected');
        console.log(`Total Clients:${--count}\n`);
    });
});
