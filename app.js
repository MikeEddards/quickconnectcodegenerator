const express = require('express')
const path =require('path')
const server = express()


/* route requests for static files to appropriate directory */
server.use('/public', express.static(__dirname))
server.use(express.static(__dirname + '/node_modules'))
server.use('/node_modules',express.static(path.join(__dirname , 'node_modules')));


/* final catch-all route to index.html defined last */
server.get('/*', (req, res) => {
  res.sendFile(__dirname + '//index.html');
})

const port = 8000;
server.listen(port, function() {
  console.log('server listening on port ' + port)
})