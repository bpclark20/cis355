<?php

#include helper php file
require 'pageWriter.php';

writeHeader();
writeBodyOpen();

echo "<h2>CRUD - Customers</h2>";
echo "<div class='row'>
				<p>
					<a href='crud_customers_create.php' class='btn btn-success'>Create New Customer</a>
					<a href='../index.php' class='btn btn-primary'>Back to Index</a>
				</p></div>";

writeTableOpen();

echo "<thead>
        <tr>
        <th>Name</th>
        <th>E-mail Address</th>
        <th>Mobile Number</th>
        <th>Action</th></tr>
    </thead>";

#Connect to DB
$pdo = Database::connect();

$sql = "SELECT * FROM customers ORDER BY id ASC";

foreach ($pdo->query($sql) as $row) {
	echo "<tr>";
    echo "<td>". $row['name'] . "</td>";
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['phone'] . '</td>';
    echo '<td width=250>';
   	echo '<a class="btn btn-primary" href="crud_customers_read.php?id='.$row['id'].'">Read</a>';
   	echo '&nbsp;';
   	echo '<a class="btn btn-success" href="crud_customers_update.php?id='.$row['id'].'">Update</a>';
   	echo '&nbsp;';
   	echo '<a class="btn btn-danger" href="crud_customers_delete.php?id='.$row['id'].'">Delete</a>';
   	echo '</td>';
   	echo '</tr>';
}
Database::disconnect();

echo "</table>";
echo "<br>";

writeClosingTags();