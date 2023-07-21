<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */

require "../config.php";
require "../common.php";

if (isset($_POST['submit'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

  try  {
    $connection = new PDO($dsn, $username, $password, $options);
    
    $new_user = array(
      "firstname" => $_POST['firstname'],
      "lastname"  => $_POST['lastname'],
      "website"     => $_POST['website'],
      "website"       => $_POST['website'],
      "message"  => $_POST['message']
    );

    $sql = sprintf(
      "INSERT INTO %s (%s) values (%s)",
      "guestbook",
      implode(", ", array_keys($new_user)),
      ":" . implode(", :", array_keys($new_user))
    );
    
    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}
?>
<?php require "templates/header.php"; ?>

  <?php if (isset($_POST['submit']) && $statement) : ?>
    <blockquote><?php echo escape($_POST['firstname']); ?> successfully added.</blockquote>
  <?php endif; ?>

  <h2>Add a user</h2>

  <form method="post">
    <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
    <label for="firstname">First Name</label>
    <input required type="text" name="firstname" id="firstname">
    <label for="lastname">Last Name</label>
    <input requiredtype="text" name="lastname" id="lastname">
    <label for="website">Website</label>
    <input readonly type="text" name="website" value="<?php echo $_SERVER['REMOTE_USER']; ?>"id="website">
    <label for="message">Message</label>
    <textarea name="message" id="message"></textarea>
    <input type="submit" name="submit" value="Submit">
  </form>

  <a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>
