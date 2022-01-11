<h1> LOGIN </h1>

<div class="message">
    <?= $messange ?>
</div>


<div class="form">
    <form action="/login" method="post">
        <div class="col-md">
            <label for="login" class="form-label">Login</label>
            <input type="text" class="form-control" name="login" id="login" required>
        </div>
        <br>
        <div class="col-md">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary" name="click">Log In</button>
        </div>
        <div>
            <a href="/registration"> You haven`t account? </a>
        </div>
    </form>
</div>
