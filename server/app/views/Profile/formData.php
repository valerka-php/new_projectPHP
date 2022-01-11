<?php
session_start();
?>
<div>
    <form action="/profile" method="post" class="right">
        <button type="submit" class="btn btn-primary btn-lg">back</button>
    </form>
</div>

<div class="message" style="margin-bottom: 15px">
    <?= $_SESSION['msg'] ?>
    <?php unset($_SESSION['msg']) ?>
</div>

<?php //print_r($_POST) ?>


<?php if ($_POST['typeFile'] !== 'sql' && $_POST['type'] !== 'sql'): ?>
    <div class="content add " style="border-radius: 25px;background-color: dodgerblue">
        <form action="/profile/formData" method="post">
            <div class="mb-6 ">
                <label for="path" class="form-label">File name</label>
                <input type="txt" class="form-control" id="path" name="fileName"
                       value="<?= $_SESSION["current" . ucfirst($_POST['typeFile'])] ?>"
                       style="border-radius: 25px; margin-bottom: 15px; text-align: center">
            </div>
            <div class="mb-6">
                <textarea class="addText" name="data" placeholder="text" autofocus>

                </textarea>
            </div>
            <button class="addButton" name="type" value="<?= $_POST['typeFile'] ?>"> save</button>
        </form>
    </div>
<?php else : ?>
    <div class="sql" style="border-radius: 25px ; background-color: dodgerblue">
        <div><p style="color: white ; font-size: 25px ; background-color: black; border-radius: 25px"> Selected table ->
                | <?= $_SESSION['currentSqlTable'] ?> |</p></div>
        <form action="/profile/formData" method="post">
            <?php foreach ($_SESSION['titleColSql'] as $k => $v): ?>
                <?php if ($k !== 0): ?>
                    <input style="margin-bottom: 2px; background-color: lightgrey" type="txt" class="form-control"
                           name="<?= $v ?>" placeholder="<?= $v ?>" disabled>
                    <input style="margin-bottom: 10px" type="txt" class="form-control" name="<?= $v ?>"
                           placeholder="insert data here" required>
                <?php endif; ?>
            <?php endforeach; ?>

            <button class="addButton" name="type" value="<?= $_POST['typeFile'] ?>"> save</button>
        </form>
    </div>
<?php endif; ?>




