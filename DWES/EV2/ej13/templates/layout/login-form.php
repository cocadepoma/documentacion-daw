<form action="./bbdd/users.php" method="post">
    <fieldset class="form-login">
        <legend>User login</legend>
        <div class="messagge">
            <?php include('./templates/errors/login-errors.php'); ?>
        </div>

        <label class="mt-1" for="username">Username</label>
        <input class="f-right" type="text" name="username" placeholder="Username">
        <br><br><br>
        <label class="mt-1" for="password">Password</label>
        <input class="f-right" type="password" name="password" placeholder="Password">
        <br><br>
        <div style="clear: both;"></div>

        <div class="mt-40">
            <a class="block" href="new-users.php">Sign Up</a>
            <input class="f-right" type="submit" value="Login" name="login">
        </div>
        <div style="clear: both;"></div>
    </fieldset>
</form>