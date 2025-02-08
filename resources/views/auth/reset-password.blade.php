<x-guest-layout>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ request()->route('token') }}">

        <!-- UserEmail -->
        <div class="block">
            <x-label for="UserEmail" value="{{ __('Email') }}" />
            <x-input id="UserEmail" class="block mt-1 w-full" type="email" name="UserEmail" :value="old('UserEmail', request()->UserEmail)" required autofocus />
            @error('UserEmail')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-label for="password" value="{{ __('Password') }}" />
            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            @error('password')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button>
                {{ __('Reset Password') }}
            </x-button>
        </div>
    </form>
</x-guest-layout>
