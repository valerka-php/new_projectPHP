

<div class="message">
    <?php if (isset($_POST['click'])) {
        echo 'Saved changes';
    } ?>
</div>


<div class="form settings">
    <form action="/profile/settings" method="post">
        <div class="mb-6 ">
            <label for="pathTxt" class="form-label">Path for .txt</label>
            <input type="txt" class="form-control" name="pathTxt" placeholder="relative path"
                   value="<?php echo $_COOKIE['txt'] ?>">
        </div>
        <div class="mb-6">
            <label for="pathCsv" class="form-label">Path for .csv</label>
            <input type="txt" class="form-control" name="pathCsv" placeholder="relative path"
                   value="<?php echo $_COOKIE['csv'] ?>">
        </div>
        <hr>
        <div class="mb-6">
            <label for="host" class="form-label q">host name</label>
            <input type="txt" class="form-control q" name="host" value="<?php echo $_COOKIE['host'] ?>">
        </div>
        <div class="mb-6">
            <label for="database" class="form-label">Data base name</label>
            <input type="txt" class="form-control" name="db" value="<?php echo $_COOKIE['db'] ?>">
        </div>
        <div class="mb-6">
            <label for="user" class="form-label">User</label>
            <input type="txt" class="form-control" name="user" value="<?php echo $_COOKIE['user'] ?>">
        </div>
        <div class="mb-6">
            <label for="password" class="form-label">Password</label>
            <!--            не знаю нужно ли хранить пароль в личном кабинете в куках но я его тоже добавил =) -->
            <input type="password" class="form-control" name="pass" value="<?php echo $_COOKIE['pass'] ?>">
        </div>
        <div class="button">
            <a class="btn btn-primary" href="/profile">Back</a>
            <button type="submit" class="btn btn-primary" name="click">Save</button>
        </div>

    </form>
</div>

