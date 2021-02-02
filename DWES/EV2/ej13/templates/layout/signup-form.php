<form action="./bbdd/users.php" method="post">
    <fieldset>
        <legend>User creation</legend>
        <div class="messagge">
            <?php include('./templates/errors/signup-errors.php'); ?>
        </div>

        <label class="mt-1" for="name">Username:</label>

        <input class="f-right" type="text" name="name" placeholder="Username">
        <br><br>

        <label class="mt-1" for="name">Password:</label>
        <input class="f-right" type="password" name="password" placeholder="Password">
        <br><br>

        <label for="user-type">User type:</label>
        <select class="m1" name="type">
            <option value="1">--- Admin ---</option>
            <option value="0">--- User ---</option>
        </select>
        <div style="clear: both;"></div>

        <div class="mt-40">

            <a class="block" href="login.php">Access to login</a>
            <input class="f-right" type="submit" name="user-create" value="Send">
        </div>
        <div style="clear: both;"></div>
    </fieldset>
</form>