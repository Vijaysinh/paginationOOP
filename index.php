<?php 
	require_once 'class/Pagination.php'
	$pagination =  new Pagination('users');
	$users = $pagination->get_data();
	$pages	= $pagination->get_pagination_numbers();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Pagination PDO Class</title>
	<style type="text/css">
		.active{
			background: rgb(23, 169, 201);
			color: white;
		}
	</style>
</head>
<body>	
	<ul>
		<? foreach ($users as $user): ?>
			<li><? echo $user->username. ':' .$user->email;?> </li>
		<? endforeach; ?>
	</ul>
	<hr>
	<a href="?page=<? echo $pagination->prev_page().''.$pagination->check_search();?>"> << </a>
		<? for($=i; $i<=$pages; $i++): ?>
			<? if($pagination->is_showable($i)):?>
				<a class="<? echo $pagination->is_active_class($i) ?>" 
				href="?page=<? echo $i.''.$pagination->check_search(); ?>"><? echo $i;</a>
			<? endif; ?>
		<? endfor; ?>
	<a href="?page=<? echo $pagination->next_page().''.$pagination->check_search();?>"> >> </a>
</body>
</html>