<?php

/**
 * List all users with a link to edit
 */

require "../config.php";
require "../common.php";

try {
  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM guestbook ";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "templates/header.php"; ?>
        
<h2>View Guestbook Entries </h2>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Website</th>
            <th>Date</th>
            <th>Message</th>
            <th>Date</th>
           <!--  <th>Edit</th> -->
        </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><?php echo escape($row["id"]); ?></td>
            <td><?php echo escape($row["firstname"]); ?></td>
            <td><?php echo escape($row["lastname"]); ?></td>
            <td><?php echo escape($row["website"]); ?></td>
            <td><?php echo escape($row["date"]); ?></td>
            <td><?php echo escape($row["message"]); ?></td>
            <td><?php echo escape($row["date"]); ?> </td>
           <!--  <td><a href="update-single.php?id=<?php echo escape($row["id"]); ?>">Edit</a></td> -->
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<div class="wm_summary">
  <ul class="menicons">
    <li class="micon"><i class="material-icons">star_border</i><span id="wm_like1"></span>&nbsp;likes</li>
    <li class="micon"><i class="material-icons-outlined">description</i><span id="wm_ment1"></span>&nbsp;mentions</li>
    
    <li class="micon"><i class="material-icons">chat_bubble_outline</i><span id="wm_reply1"></span></li>
    
    <li class="micon"><i class="material-icons">repeat</i><span id="wm_repost1"></span></li>
    
    <li class="micon"><i class="material-icons">bookmark_border</i><span id="wm_bkmk1"></span>&nbsp;bookmarks</li>
    
</div>
<hr>
<div id="mentionpanel"></div> 

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>
