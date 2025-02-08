@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-bold mb-4">Verify Your Email Address</h1>

        @if (session('message'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <p class="mb-4">
            Thanks for signing up! Before you can play, please verify your email address by clicking on the link we just emailed to you. If you didn't receive the email, we will gladly send you another. If you do not verify your email, you cannot login ingame.
        </p>

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Resend Verification Email
            </button>
        </form>
    </div>
</div>
@endsection
