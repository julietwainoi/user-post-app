<section>
    <header>
        <h2 class="text-lg font-weight-bold text-dark">
            Profile Information
        </h2>

        <p class="mt-1 text-muted">
            Update your account's profile information and email address.
        </p>
    </header>

    <!-- Verification Form -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Profile Update Form -->
    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
        @csrf
        @method('patch')

        <!-- Name Field -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Field -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror

            <!-- Email Verification -->
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-muted">
                        Your email address is unverified.

                        <button form="send-verification" class="btn btn-link p-0 text-decoration-underline">
                            Click here to re-send the verification email.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-success">
                            A new verification link has been sent to your email address.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Save Button and Status Message -->
        <div class="d-flex align-items-center gap-4">
            <button type="submit" class="btn btn-primary">Save</button>

            @if (session('status') === 'profile-updated')
                <p class="text-muted ms-3" id="statusMessage">Saved.</p>
            @endif
        </div>
    </form>
</section>

<script>
    // Optional JavaScript to auto-hide the status message after 2 seconds
    document.addEventListener('DOMContentLoaded', function() {
        const statusMessage = document.getElementById('statusMessage');
        if (statusMessage) {
            setTimeout(() => {
                statusMessage.style.display = 'none';
            }, 2000);
        }
    });
</script>
