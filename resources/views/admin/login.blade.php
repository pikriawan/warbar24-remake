@push('styles')
    @vite('resources/css/admin-login.css')
@endpush
<x-root-layout>
    <main class="main">
        <img src="/images/warteg-bahari-24.svg" alt="Warteg Bahari 24" width="128">
        <h1 class="login-title">Login</h1>
        <form class="login-form" action="/admin/login" method="post">
            @csrf
            <div class="form-field">
                <label class="label" for="username">Username</label>
                <input class="text-field" id="username" name="username" placeholder="Username Anda" required>
            </div>
            <div class="form-field">
                <label class="label" for="password">Password</label>
                <input class="text-field" type="password" id="password" name="password" placeholder="Password Anda" required>
            </div>
            @error('login')
                <p class="error-text">Username atau password salah</p>
            @enderror
            <button class="button button-primary">Login</button>
        </form>
    </main>
</x-root-layout>
