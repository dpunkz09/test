<x-auth-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- User ID and User Name (same value) -->
        <div class="mb-4">
            <label for="UserID" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                User ID
            </label>
            <input id="UserID" type="text" name="UserID" value="{{ old('UserID') }}" required autofocus
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-800 dark:border-gray-600">
            @error('UserID')
            <span class="text-red-500 dark:text-red-400 text-xs italic">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="UserEmail" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                Email
            </label>
            <input id="UserEmail" type="email" name="UserEmail" value="{{ old('UserEmail') }}" required
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-800 dark:border-gray-600">
            @error('UserEmail')
            <span class="text-red-500 dark:text-red-400 text-xs italic">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                Password
            </label>
            <input id="password" type="password" name="password" required
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-800 dark:border-gray-600">
            @error('password')
            <span class="text-red-500 dark:text-red-400 text-xs italic">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                Confirm Password
            </label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-800 dark:border-gray-600">
            @error('password_confirmation')
            <span class="text-red-500 dark:text-red-400 text-xs italic">{{ $message }}</span>
            @enderror
        </div>

        <!-- Register Button -->
        <div class="flex items-center justify-between">
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline dark:bg-blue-700 dark:hover:bg-blue-500 dark:text-gray-300">
                Register
            </button>
        </div>
    </form>
</x-auth-layout>
