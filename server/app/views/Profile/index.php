<?php


use app\models\Profile;

session_start();

if (isset($_POST['logout'])) {
    $_SESSION['user'] = false;
    $_SESSION['changeConfig'] = null;
    header('location: /');
}

//print_r($_POST)

?>


<div class="content">
    <div class="addInfo">
        <form action="/profile/formData" method="post">
            <button name="typeFile" value="sql" class="addButton"> add into the table</button>
        </form>
    </div>
    <div class="addInfo">
        <form action="/profile/formData" method="post">
            <button name="typeFile" value="txt" class="addButton"> add into txt</button>
        </form>
    </div>
    <div class="addInfo">
        <form action="/profile/formData" method="post">
            <button name="typeFile" value="csv" class="addButton"> add into csv</button>
        </form>
    </div>
</div>

<?php
//        print_r($_POST);

if (isset($_POST['sql'])) $_SESSION['currentSqlTable'] = $_POST['sql'] ?>
<div class="content head">
    <div class="container sql">
        <form action="/profile" method="post">
            <select name="sql" class="form-select" aria-label="Default select example">
                <option value="<?= $_SESSION['currentSqlTable'] ?>"><?= $_SESSION['currentSqlTable'] ?></option>
                <?php foreach ($tables as $name) : ?>
                    <?php if (($_SESSION['currentSqlTable']) !== $name): ?>
                        <option value="<?= $name ?>"><?= $name ?></option>
                    <?php endif; ?>
                <?php endforeach; ?>
            </select> <br>
            <button class="btn-primary " id="btn" type="submit">Select | Refresh</button>
        </form>


    </div>
    <div class="container txt-out">
        <form action="/profile" method="post">

            <?php
            //            print_r($_POST);
            if (isset($_POST['txt'])) {
                $_SESSION["currentTxt"] = $_POST['txt'];
//                print_r($_POST['txt']);
            }
            $model = new Profile;
            $model->scandir($_COOKIE['txt'], 'txt', $_SESSION["currentTxt"]);
            ?>
            <br>
            <button class="btn-primary " id="btn" type="submit">Select | Refresh</button>
        </form>

    </div>
    <div class="container csv-out">
        <form action="/profile" method="post">
            <?php
            if (isset($_POST['csv'])) {
                $_SESSION['currentCsv'] = $_POST['csv'];
            }
            $model->scandir($_COOKIE['csv'], 'csv', $_SESSION['currentCsv']);

            ?>
            <br>
            <button class="btn-primary " id="btn" type="submit">Select | Refresh</button>
        </form>
    </div>

</div>

<div class="content out">
    <div class="sql overflow">
        <div><p> <?= $_SESSION['currentSqlTable'] ?></p></div>
        <?php $dataTable = $_SESSION['sql'] ?>
        <?php if (!empty($dataTable)): ?>
            <?php foreach ($dataTable as $arr): ?>
                <table class="table">
                    <?php if (empty($titleCol)): ?>
                        <?php foreach ($arr as $key => $value) {
                            $titleCol[] = $key;
                        } ?>
                        <thead>
                        <tr>
                            <?php for ($i = 0; $i < count($titleCol); $i++): ?>
                                <th><?= $titleCol[$i] ?></th>
                            <?php endfor; ?>
                        </tr>
                        </thead>
                    <?php endif; ?>

                    <?php $_SESSION['titleColSql'] = $titleCol; ?>

                    <tbody>

                    <?php foreach ($arr as $value) {
                        $dataCol[] = $value;
                    } ?>

                    <tr>
                        <?php for ($i = 0; $i < count($dataCol); $i++): ?>
                            <td><?= $dataCol[$i] ?></td>
                        <?php endfor; ?>
                    </tr>
                    <?php unset($dataCol) ?>
                    </tbody>
                </table>
            <?php endforeach; ?>
        <?php endif; ?>


    </div>
    <div class="txt-out">
        <div><p> <?= $_SESSION['currentTxt'] ?></p></div>
        <textarea class="addText" disabled>
             <?php
             if (isset($_SESSION['txt'])){
                 foreach ($_SESSION['txt'] as $v) echo $v ;
             }
             ?>
        </textarea>

    </div>
    <div class="csv-out ">
        <div><p> <?= $_SESSION['currentCsv'] ?></p></div>
        <div class="addText">
            <table style="width: 400px">
               <?php if (isset($_SESSION['csv'])) : ?>
                <?php foreach ($_SESSION['csv'] as $valueRow) : ?>
                    <tr>
                        <?php for ($i = 0; $i < count($valueRow); $i++): ?>

                            <td style="border: 1px solid black"> <?= $valueRow[$i] ?></td>

                        <?php endfor; ?>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </table>

        </div>
    </div>
</div>
