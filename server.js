const express = require('express')
const app = express()

app.use(express.json())
app.use( express.static( './index.html' ) );
app.listen(4000, () => console.log(`All ears on port: 4000`))