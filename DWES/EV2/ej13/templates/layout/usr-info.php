<div class="form-buttons">
    <h4><small>User </small><?php if (isset($_SESSION['user'])) echo $_SESSION['user']; ?></h4>
    <form action="./bbdd/users.php" method="post">
        <input type="submit" value="Close Session" name="close">
    </form>
</div>