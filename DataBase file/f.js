var mysql = require('mysql');

var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "job_station" // Replace with your actual database name
});

con.connect(function(err) {
    if (err) throw err;
    console.log("Connected!");

    // Define the SQL query to retrieve specific columns from the 'jobpost_apply' table
    var query = "SELECT `id`, `jid`, `status`, `applyDate` FROM `jobpost_apply` WHERE 1";

    // Execute the query
    con.query(query, function (err, result, fields) {
        if (err) throw err;

        // Display the results in a table format
        console.log("Results:");

        // Display column names
        console.log("|" + Object.keys(result[0]).map(column => `${column}`).join("|") + "|");

        // Display rows
        result.forEach(row => {
            console.log("|" + Object.values(row).map(value => `${value}`).join("|") + "|");
        });

        // Close the database connection
        con.end();
    });
});
