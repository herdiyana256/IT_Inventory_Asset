<!-- resources/views/vendor/filament/auth/login.blade.php -->

<x-filament::auth-card>
    <x-slot name="logo">
        <a href="/">
            <x-filament::logo />
        </a>
    </x-slot>

    <form method="POST" action="{{ route('filament.auth.login') }}">
        @csrf

        <div class="space-y-4">
            <x-filament::input
                label="Email address"
                name="email"
                type="email"
                required
                autofocus
                :value="old('email')"
            />
            <x-filament::input
                label="Password"
                name="password"
                type="password"
                required
            />
            <div class="flex items-center justify-between">
                <x-filament::checkbox
                    name="remember"
                    label="Remember me"
                    :checked="old('remember')"
                />

                <!-- Add "Create User" link here -->
                <a href="{{ route('filament.user.create') }}" class="text-sm text-primary-500 hover:text-primary-700">
                    Create User
                </a>
            </div>
        </div>

        <div class="mt-6">
            <x-filament::button type="submit" class="w-full">
                Sign in
            </x-filament::button>
        </div>
    </form>
</x-filament::auth-card>
