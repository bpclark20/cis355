<?php
#include helper php file
require 'pageWriter.php';

# This process inserts a record

# 1. Connect to database
$pdo = Database::connect();


# 2. Assign user data to variables
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];

# 3: Assign MySQL query code to a variable
$sql = "INSERT INTO customers (fname, lname, phone) VALUES ('$fname', '$lname', '$phone')";

# 4: insert the data into the database
$pdo->query($sql);  #Execute the query
Database::disconnect();

writeHeader();
writeBodyOpen();

echo "<a href='display_list.php'><h2>Display List of Customers</h2></a>";

echo "<h3>Your info has been added</h3><br>";

writeClosingTags();