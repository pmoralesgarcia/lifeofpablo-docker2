<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="webmention" href="https://webmention.io/lifeofpablo.com/webmention" />
	<title>Pablo's Guestbook</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<h1>Guestbook</h1>
<?php
if($_SERVER['REMOTE_USER'])
echo 'Hey , ' . $_SERVER['REMOTE_USER'] . ' !';
    else
    echo 'Please <a href="https://auth.lifeofpablo.com/login?url=https://lifeofpablo.com/guestbook/public/index.php">Sign in</a>';
			                            ?>

<?php 
function display_url($url) {
  # remove scheme and www.
  $url = preg_replace('/^https?:\/\/(www\.)?/', '', $url);
  # if the remaining string has no path components but has a trailing slash, remove the trailing slash
  $url = preg_replace('/^([^\/]+)\/$/', '$1', $url);
  return $url;
}
?>
