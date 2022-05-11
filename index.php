<?php
require "connection.php";
$sql= 'SELECT * FROM person';
$statement= $connection->prepare($sql);
$statement -> execute();
$person= $statement->fetchAll(PDO::FETCH_OBJ);
require "header.php";
?>
<div class="container">
	<div class="card mt-4">
		<div class="card-header"><h2>all peaple</h2></div>
		<div class="card-body">
           <table class="table table-bordered" >
			   <tr>
				   <th>ID</th>
				   <th>NAME</th>
				   <th>EMAIL</th>
				   <th>ACTION</th></tr>
				   <?php foreach($person as $p): ?>
				   <tr>
                    <td><?=$p->id ;   ?></td>
					<td><?=$p->name ;   ?></td>
					<td><?=$p->email;   ?></td>
					<td>
<a href="edit.php?id=<?=$p->id ; ?>" class="btn btn-info">update</a>
<a onclick="return confirm('are you sure you want to delete this entry')" 
href="delete.php?id=<?=$p->id ;?>" class="btn btn-danger"> delete</a>
                   </td>
				   </tr>

	<?php endforeach; ?>
</table>
</div>
</div>
</div>