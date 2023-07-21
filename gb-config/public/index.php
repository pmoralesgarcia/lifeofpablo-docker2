<?php include "templates/header.php"; ?>


<ul>
			<?php
				     if($_SERVER['REMOTE_USER'])
echo '<li><a href="create.php"><strong>Create Guestbook Entry</strong></a> - Come say hello!</li>';
else
echo 'Please sign in using your domain to post on guestbook.';
			?>
	<li><a href="update.php"><strong>Read Guestbook Entries</strong></a> -See other visitors posts!</li>
</ul>


			<?php
				     if($_SERVER['REMOTE_USER'] == 'https://lifeofpablo.com/')
echo '
<ul>
	<li><a href="update.php"><strong>Update</strong></a> - edit a user</li>
	<li><a href="delete.php"><strong>Delete</strong></a> - delete a user</li>
</ul>
';
else
echo '<a href="panel">Panel</a>';
			?>

<?php include "templates/footer.php"; ?>
