<?php session_start() ?>

<h1> registration </h1>

<div class="message">
    <?= $messange ?>
</div>

<div class="form">
    <form action="/registration" method="post">
        <div class="col-md">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>
        <div class="col-md">
            <label for="login" class="form-label">Login</label>
            <input type="text" class="form-control" name="login" id="login" required>
        </div>
        <div class="col-md">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email"  required>
        </div>
        <br>
        <div class="col-md">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password"  required>
        </div>
        <div class="col-md">
            <label for="confirmPassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword"  required>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="check" id="Check" required>
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Registration</button>
        </div>
    </form>
</div>
