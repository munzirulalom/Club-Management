<x-auth-page>

    @error('phone')
        <div class="invalid-feedback">
            <i class="bx bx-radio-circle"></i>
            {{ $message }}
        </div>
    @enderror

    <form class="card card-md" action="#" method="POST">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Login to your account</h2>
            <div class="mb-3">
                <label class="form-label required">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" required>
            </div>
            <div class="mb-2">
                <label class="form-label required">
                    Password
                    <span class="form-label-description">
                        <a href="{{ route('forgot-password') }}">I forgot password</a>
                    </span>
                </label>
                <div class="input-group input-group-flat">
                    <input type="password" class="form-control" name="password" placeholder="Password"
                        autocomplete="off" required>
                </div>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100" name="submit">Sign in</button>
            </div>
        </div>
    </form>
    <div class="text-center text-muted mt-3">
        Don't have account yet? <a href="{{ route('register') }}" tabindex="-1">Sign up</a>
    </div>
</x-auth-page>
