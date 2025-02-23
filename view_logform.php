<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		th{
			
			background-color: darkgoldenrod;
			height: 2rem;
			font-size: 5rem;
			font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
			
		}
		td {
			color: black;
			border: 1px solid gray;
			height: 4rem;
			text-transform: capitalize;
			font-size: 2rem;
			
			
		}
		tr {
			background-color: cornflowerblue;
			filter: opacity(80%);
			border-radius: 10px;
		}
		body {
			background-image: url('05cItXL96l4LE9n02WfDR0h-5.webp');
			justify-content: center;
			display: flex;
			align-items: center;
		}
		.btn {
			background-color: brown;
			border-radius: 10px;
			text-decoration: none;
			padding: 5px 2px;
			
		}
		a {
			color: wheat;
		}

	</style>
</head>
<body>
	


<section style="margin: 50px 0;">
		<div class="container">
			<table class="table table-dark">
				<thead>
				  <tr>
					<th scope="col">Id</th>
					<th scope="col">Email</th>
					<th scope="col">Password</th>
					
					
					
				  </tr>
				</thead>
				<tbody>
					<?php 
						require_once "conn.php";
						$sql_query = "SELECT * FROM logform";
						if ($result = $conn ->query($sql_query)) {
							while ($row = $result -> fetch_assoc()) { 
								$id = $row['id'];
                                $email = $row['email'];
								$password = $row['password'];
					?>
					
					<tr class="trow">
						<td><?php echo $id; ?></td>
                        <td><?php echo $email; ?></td>
						<td><?php echo $password; ?></td>
					

						
						<td><a href="update.php?id=<?php echo $id; ?>" class="btn btn-primary">Edit</a></td>
						<td><a href="delete_logform.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a></td>
					</tr>

					<?php
							} 
						} 
					?>
				</tbody>
			  </table>
		</div>
	</section>

</body>
</html>