<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address, and we will email you a password reset link.') }}
    </div>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- UserEmail -->
        <div class="block">
            <x-label for="UserEmail" value="{{ __('Email') }}" />
            <x-input id="UserEmail" class="block mt-1 w-full" type="email" name="UserEmail" :value="old('UserEmail')" required autofocus />
            @error('UserEmail')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button>
                {{ __('Email Password Reset Link') }}
            </x-button>
        </div>
    </form>
</x-guest-layout>
