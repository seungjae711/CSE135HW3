Name: Sungjae Choi
PID: A14699728

Link for homepage: http://142.93.206.205:8081

Login information
ID: Aman              ID: Asha                ID: Michael
Password:1         Password:2          Password:3

1) The architecture you chose, and the various tradeoffs that led you to picking this particular architecture.
I decided to send the collector script at end after page load, so the collector can send loading time and basic client characteristics whenever users enter the website and the collector also can send error data and event data whenever users do some activities such as click or scroll. The collector sends the data to different endpoints depending on kind of data. 
And then at each endpoints my api stores the data in database(MySQL). I used PHP to handle all the server side task between my website and database(MySQL). For me, it seems that PHP enables me to easily communicate with database by using some queries in PHP. 
After user login, api enables to see tables of each kind of data by fetching data from MySQL using some queries. 

2) Which kind of database you picked (SQL/ NoSQL) and why
I used SQL because I think that I can easily store, fetch or delete data with some sql queries.

3) What data you were hoping to collect, which APIs provided you with that data, and why you wanted to collect that data
1.	Data of basic Client Characteristics (resolution, browser, and platform) to see users’ information who connect the website
2.	Data of client events such as “click” and “scroll” to see users’ information about activities on the website
3.	Data of JavaScript errors (Errors which when calling undefined JavaScript function) to see if functions works on the website
4.	Data of page loading speed (simply calculating the page loading speed) to see how fast users are able to connect to the website


4) What approach you took to collecting the data - collect all vs collect specifically and why
Collector.js
For each test page, there is collector.js.
The collector collects 
5.	Page loading speed (simply calculating the page loading speed)
6.	JavaScript errors (Errors which when calling undefined JavaScript function)
7.	Client events such as “click” and “scroll”
8.	Basic Client Characteristics (resolution, browser, and platform)
And the collector sends the collected data to each endpoint using Ajax.

Endpoints
At each endpoint, the data sent from the collector are stored in mysql database.
142.93.206.205/api/basicC  <= Receives basic client characteristics and store them into database
142.93.206.205/api/errors  <= Receives errors logs and stores them into database 
142.93.206.205/api/Events  <=Receives events logs and stores them into database
142.93.206.205/api/Speed  < Receives browser speed and store them into database

5) Your reasoning behind the trade offs in all aspects of the assignment (philosophically and technically)
The data collector collects data whenever users load the website, send them to endpoint and stores in MySQL, so the collector does not miss any data about the users and users’ activities on the website. 

6) What questions you hope your data will help answer
1. What kind of browsers users who connect to the website use?
2. What kind of activities the users do on the website?
3. How fast the users enter the website?
 
7) Your architecture and all implementation details
On homepage, there are three links to test data collector.
Get Some Errors: On this page, you just need to click “Click me” button to get an error.
Click or Scroll: On this page, you just need to click “Click me please!” buttons and scroll down this page to collect users’ events.
Test your speed: On this page, you just enter into this page to calculate your browser’s speed.

I used AJAX to send data collected by collector.js to endpoint 
One of example code is
        $.ajax({
            url: 'api/basicC/index.php',
            data: {width: findwidth, height: findheight, browser: resultB, platform: findplatform},
            type: 'POST',
            success: function(response) {
            //alert(response);
            }
        });

And then each endpoint stores the data into MySQL by using some queries.
One of example code is
    $conn = new mysqli("localhost","root","tmdwo3264","basic");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $sql = "INSERT INTO errors (error,time) VALUE('$error', '$time')";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

Look at data history: On this page, you need to login using above login information.
And after login, you can see four links to see tables showing four kind of clients’ data
Basic Client Characteristics
Speed
Errors
Events
One of example code to fetch data from MySQL is
<?php
$con=mysqli_connect("localhost","root","tmdwo3264","basic");
$sql= "SELECT * FROM errors ";
$result = $con->query($sql);
?>
