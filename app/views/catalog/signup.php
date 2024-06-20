<?php $this->view("catalog/header", $data); ?>

<div style="margin: auto; max-width: 600px; width: 100%; padding: 2em;">
    <h2 class="col-6 tm-text-primary">
        Sign Up
    </h2>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
        <label for="email">Email address</label>
            <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                placeholder="Email address" required>
        </div>
        <div class="form-group">
        <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
</div>

<?php $this->view("catalog/footer", $data); ?>