<div style="margin: auto; max-width: 600px; width: 100%; padding: 2em;">
    <h2 class="col-6 tm-text-primary">
        Login
    </h2>
    <?php flash('login') ?>
    <form method="post" enctype="multipart/form-data">
    <input type="hidden" name="type" value="login">
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                placeholder="Email/Username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Login</button>
    </form>
</div>