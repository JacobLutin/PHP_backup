<?php
session_start();
require_once('php/global.php');
?>

<?php require_once('php/header.php') ?>

<?php

$current_user = new User;

$current_user->get_by_id($_SESSION['user_id']);

$friend_ids = $current_user->friend_list;
$friend_ids = explode(';', $friend_ids);
$friend_ids = array_filter($friend_ids);

$friends = [];

foreach ($friend_ids as $id) {
    $friend = new User;
    $id = intval($id);
    $friend->get_by_id($id);
    array_push($friends, $friend);
}

if (isset($_POST['remove_friend'])) {

    if (isset($_GET['user_id'])) {

        $friend_to_remove = $_GET['user_id'];

        $current_user->remove_friend($friend_to_remove);

        unset($_GET['user_id']);

        $location = strtok($location, '?');
    }


}

?>


<div class="container">
    <ul>
        <?php foreach($friends as $friend): ?>
            <li><?php print($friend->get_username()) ?> <a href="profile.php?user_id=<?= $friend->id ?>">-></a></li>
            <div class="form">
                <form action="<?= $location ?>?user_id=<?= $friend->id ?>" method="POST">
                    <input type="submit" name="remove_friend" value="Remove friend" class="btn btn-danger">
                </form>
            </div>
        <?php endforeach ?>
    </ul>
</div>

<?php require_once('php/footer.php') ?>
