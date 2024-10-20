@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-blue-400 to-blue-600">
    <div class="w-full max-w-md bg-white/30 backdrop-blur-lg p-8 shadow-lg rounded-lg">
        <h2 class="text-3xl font-semibold text-center text-white mb-6">Login to Your Account</h2>

        <!-- Error Message -->
        @if (session('status'))
            <div class="bg-red-500 text-white p-3 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Input -->
            <div class="mb-4">
                <label for="email" class="block text-white mb-1">Email Address</label>
                <input type="email" id="email" name="email"
                    class="w-full p-3 rounded-lg border border-white/30 bg-white/20 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-blue-300"
                    placeholder="Enter your email" required autofocus />
            </div>

            <!-- Password Input -->
            <div class="mb-4">
                <label for="password" class="block text-white mb-1">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full p-3 rounded-lg border border-white/30 bg-white/20 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-blue-300"
                    placeholder="Enter your password" required />
            </div>

            <!-- Remember Me + Forgot Password -->
            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center text-white">
                    <input type="checkbox" name="remember" class="mr-2"> Remember Me
                </label>
                <a href="{{ route('password.request') }}" class="text-sm text-blue-300 hover:underline">Forgot Password?</a>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full p-3 bg-blue-500 hover:bg-blue-600 text-white rounded-lg font-semibold transition-all duration-300">
                Login
            </button>
        </form>

        <!-- Register Link -->
        <p class="mt-6 text-center text-white">
            Don't have an account? 
            <a href="{{ route('register') }}" class="text-blue-300 hover:underline">Register</a>
        </p>
    </div>
</div>
@endsection
