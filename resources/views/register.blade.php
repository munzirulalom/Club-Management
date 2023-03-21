<x-auth-page>

    <form class="card card-md" role="form" action="" method="POST">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Create new account</h2>
            <div class="mb-3">
                <label class="form-label required">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name" required>
            </div>
            <div class="mb-3">
                <label class="form-label required">Email address</label>
                <input type="email" class="form-control <?php echo isset($error_email) ? 'is-invalid' : ''; ?>" name="email" placeholder="Enter email"
                    required>
                <?php echo isset($error_email) ? '<div class="invalid-feedback">Email address already exists</div>' : ''; ?>
            </div>
            <div class="mb-3">
                <label class="form-label required">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off"
                    required>
            </div>
            <div class="mb-3">
                <label class="form-label required">Confirm Password</label>
                <input type="password" class="form-control <?php echo isset($error_pass) ? 'is-invalid' : ''; ?>" name="password2"
                    placeholder="Confirm Password" autocomplete="off" required>
                <?php echo isset($error_pass) ? '<div class="invalid-feedback">Confirm password does not match</div>' : ''; ?>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100" name="submit">Create new account</button>
            </div>
        </div>
    </form>
    <div class="text-center text-muted mt-3">
        Don't have account yet? <a href="{{ route('login') }}" tabindex="-1">Sign in</a>
    </div>

</x-auth-page>
