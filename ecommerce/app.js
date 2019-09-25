const express = require('express');
const mongoose = require('mongoose');
require("dotenv").config(); //require env config pkg

//app
const app = express();

//db
mongoose
    .connect(process.env.DATABASE, {
        useNewUrlParser: true,
        useCreateIndex: true,
        useUnifiedTopology: true
    })
    .then(() => console.log("DB Connected"))
    .catch(err=>{
        console.log(err);
    });

//routes
app.get('/', (req, res) => {
    res.send('hello from node!!');
});

const port = process.env.PORT || 8000;

app.listen(port, () => {
    console.log(`server is running on port${port}`);
})