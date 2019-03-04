const express = require('express');
const app = express();




app.get('/', (req, res) => {
    var html1 = `<!DOCTYPE html><html><body style="background:green">`;
    var html2 = `</body></html>`;
    res.setHeader('content-type', 'application/json');
    //res.writeHead(200, {'Content-Type': 'text/html'});
    //res.send(`${html1}`);
    res.send(`${html1}<p>Hello Web World from Language JavaScript on ${new Date()} enjoy my COLOR page</p>${html2}`);
    //res.sed(`${html2}`)
    res.end();
});

app.get('/foo',(req, res) => {
    var url = require('url');
    var queryData = url.parse(req.url, true).query;
    var html1 = `<!DOCTYPE html><html><body style="background:${color}">`;
    var html2 = `</body></html>`;
    var currentdate = new Date();
    var date = currentdate.getDate() + " /" 
    +currentdate.getMonth() +" /"
    + currentdate.getFullYear() +" "
    + currentdate.getHours() + ":"  
    + currentdate.getMinutes() + ":" 
    + currentdate.getSeconds();;
    var name = queryData.name;
    var color = queryData.color;
    res.send(`${html1}<p>Hello ${name} World from Language JavaScript on ${date} enjoy my COLOR page</p>${html2}`);
});

app.post('/foo',(req, res) =>{
    var qs = require('querystring');
    var body = '';
    req.on('data', function(data) {
        body += data;
    });
    res.send(`${body}`)
});

app.listen(3000, () => console.log('Listening on port 3000...'))