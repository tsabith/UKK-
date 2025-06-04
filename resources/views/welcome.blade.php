<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to PKL Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="antialiased">
    <div class="relative min-h-screen">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="https://file.bakar.my.id/api/public/dl/T9Q-0ceo?inline=true" 
                 class="w-full h-full object-cover"
                 alt="Background">
            <div class="absolute inset-0 bg-gradient-to-b from-blue-900/50 to-blue-950/70"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 min-h-screen flex flex-col items-center justify-center px-6 py-12">
            <!-- Logo/Heading Area -->
            <div class="text-center mb-12">
                <h1 class="text-5xl font-bold text-white mb-4 font-['Inter']">PKL Management</h1>
                <p class="text-xl text-gray-200 max-w-2xl">Manage your practical work experience with ease and efficiency</p>
            </div>

            <!-- Auth Buttons Container -->
            <div class="flex flex-col sm:flex-row gap-4 mt-8 w-full max-w-md justify-center">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" 
                           class="px-8 py-3 bg-blue-600 text-white rounded-lg text-lg font-semibold transition-all hover:bg-blue-700 hover:scale-105 flex-1 text-center">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="px-8 py-3 bg-white text-blue-900 rounded-lg text-lg font-semibold transition-all hover:bg-gray-100 hover:scale-105 flex-1 text-center">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" 
                               class="px-8 py-3 bg-blue-600 text-white rounded-lg text-lg font-semibold transition-all hover:bg-blue-700 hover:scale-105 flex-1 text-center">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>

            <!-- Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16 max-w-5xl w-full px-4">
                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-xl text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                    <h3 class="text-xl font-semibold mb-2">Easy Management</h3>
                    <p class="text-gray-300">Streamline your PKL process with our intuitive management tools.</p>
                </div>
                
                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-xl text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <h3 class="text-xl font-semibold mb-2">Secure Platform</h3>
                    <p class="text-gray-300">Your data is protected with industry-standard security measures.</p>
                </div>
                
                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-xl text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mb-4 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                    </svg>
                    <h3 class="text-xl font-semibold mb-2">Real-time Updates</h3>
                    <p class="text-gray-300">Stay informed with instant notifications and updates.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>