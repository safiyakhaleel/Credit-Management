<?php
	include 'database.php';
	$sql = "SELECT * FROM users";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
?>	
		<tr>
			<td><?=$row['id'];?></td>
			<td><?=$row['username'];?></td>
			<td><?=$row['email'];?></td>
			<td><?=$row['credit'];?></td>
			<td><a href="transferto.php?userid=<?php echo $row["id"]; ?>">Transfer From</a></td>
		</tr>
<?php	
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($conn);
?>