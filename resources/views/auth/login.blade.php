<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Sign in · Modern Access</title>
    <!-- Tailwind + Inter font + subtle backdrop improvements -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Custom smooth behavior & extra design refinement -->
    <style>
        /* custom glassmorphic edge glow & form transitions */
        body {
            background: radial-gradient(ellipse at 30% 40%, #111827, #030712);
        }
        .glass-card {
            background: rgba(17, 24, 39, 0.65);
            backdrop-filter: blur(14px);
            border: 1px solid rgba(75, 85, 99, 0.35);
            transition: transform 0.2s ease, box-shadow 0.3s ease;
        }
        .glass-card:hover {
            box-shadow: 0 25px 40px -12px rgba(0, 0, 0, 0.5);
        }
        .input-glow:focus {
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.4), 0 0 0 1px rgba(99, 102, 241, 0.6);
        }
        .shake-animation {
            animation: shake 0.2s ease-in-out 0s 2;
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        /* subtle gradient button animation */
        .btn-gradient {
            background: linear-gradient(105deg, #4f46e5 0%, #6366f1 45%, #818cf8 100%);
            transition: all 0.25s ease;
            background-size: 120% auto;
        }
        .btn-gradient:hover {
            background: linear-gradient(105deg, #6366f1 0%, #818cf8 50%, #a5b4fc 100%);
            transform: translateY(-2px);
            box-shadow: 0 12px 20px -12px #4f46e580;
        }
        .btn-gradient:active {
            transform: translateY(1px);
        }
        /* focus visible improvement */
        *:focus-visible {
            outline: 2px solid #818cf8;
            outline-offset: 2px;
            border-radius: 0.5rem;
        }
        /* error list styling */
        .error-list li {
            position: relative;
            padding-left: 1.5rem;
        }
        .error-list li::before {
            content: "⚠️";
            position: absolute;
            left: 0;
            top: 0;
            font-size: 0.8rem;
            opacity: 0.8;
        }
    </style>
</head>
<body class="h-full antialiased font-sans">

<div class="relative flex min-h-full flex-col justify-center px-4 py-12 sm:px-6 lg:px-8 overflow-hidden">
    <!-- decorative animated orbs / background elegance (no functional impact) -->
    <div class="absolute inset-0 -z-10 overflow-hidden">
        <div class="absolute -top-40 -right-32 h-80 w-80 rounded-full bg-indigo-700/20 blur-3xl"></div>
        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 h-72 w-96 rounded-full bg-purple-600/15 blur-3xl"></div>
        <div class="absolute top-1/3 left-0 h-64 w-64 rounded-full bg-blue-500/10 blur-2xl"></div>
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-md lg:max-w-md">
        <!-- Branding & card container -->
        <div class="glass-card rounded-2xl p-8 shadow-2xl md:p-10 transition-all duration-300">
            <!-- Logo and company -->
            <div class="flex justify-center mb-6">
                <div class="rounded-full bg-gradient-to-tr from-indigo-500/30 to-indigo-400/10 p-2.5 backdrop-blur-sm">
                    <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="h-11 w-auto" />
                </div>
            </div>
            <div class="text-center space-y-1">
                <h2 class="text-3xl font-bold tracking-tight text-white bg-gradient-to-r from-white to-indigo-200 bg-clip-text text-transparent">Welcome back</h2>
                <p class="text-sm text-gray-400">Sign in to access your dashboard</p>
            </div>
            
            <!-- ERROR DISPLAY ELEGANT (preserves backend communication) -->
            @if ($errors->any())
                <div class="mt-6 rounded-xl bg-red-950/30 border-l-4 border-red-500 p-4 backdrop-blur-sm">
                    <div class="flex items-start gap-3">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.502 0L3.428 16.5c-.77.833.192 2.5 1.732 2.5z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-sm font-semibold text-red-300">Authentication error</h3>
                            <ul class="error-list mt-1 space-y-1 text-sm text-red-200/90 list-none pl-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <!-- FORM — same action, method, fields, CSRF 100% preserved -->
            <form action="{{ route('action.login') }}" method="POST" class="mt-8 space-y-6">
                @csrf
                <!-- Email field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-200 tracking-wide">Email address</label>
                    <div class="mt-2 relative group">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400 group-focus-within:text-indigo-400 transition-colors">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                        </div>
                        <input id="email" type="email" name="email" required autocomplete="email"
                            class="block w-full rounded-xl bg-black/40 border border-white/15 py-3 pl-10 pr-4 text-white placeholder:text-gray-500 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-500/40 outline-none transition-all duration-200 input-glow" 
                            placeholder="your@email.com" />
                    </div>
                </div>

                <!-- Password field with show/hide toggle (purely cosmetic, no controller change) -->
                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium text-gray-200">Password</label>
                        <div class="text-sm">
                            <a href="#" class="font-medium text-indigo-300 hover:text-indigo-200 transition duration-150 hover:underline underline-offset-2">Forgot password?</a>
                        </div>
                    </div>
                    <div class="mt-2 relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="block w-full rounded-xl bg-black/40 border border-white/15 py-3 pl-10 pr-12 text-white placeholder:text-gray-500 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-500/40 outline-none transition-all duration-200 input-glow"
                            placeholder="••••••••" />
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-indigo-300 transition focus:outline-none" aria-label="Show password">
                            <svg id="eyeIcon" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Sign in button (enhanced gradient, no functional changes) -->
                <div>
                    <button type="submit" class="btn-gradient flex w-full justify-center rounded-xl px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-600/20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 transition-all duration-200">
                        <span class="flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            Sign in
                        </span>
                    </button>
                </div>
            </form>

            <!-- Trial link - exactly same style but visually polished -->
            <p class="mt-8 text-center text-sm text-gray-400 border-t border-white/5 pt-6">
                Not a member?
                <a href="#" class="font-semibold text-indigo-300 hover:text-indigo-200 transition-all duration-200 hover:underline underline-offset-3 ml-1">Start a 14 day free trial <span aria-hidden="true">→</span></a>
            </p>
        </div>
        <!-- subtle additional footer (optional) design only -->
        <div class="mt-6 text-center text-xs text-gray-500 opacity-70">
            Secure encrypted access
        </div>
    </div>
</div>

<!-- lightweight password visibility toggle (purely UX, doesn't touch backend) -->
<script>
    (function() {
        const toggleBtn = document.getElementById('togglePassword');
        if (toggleBtn) {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            toggleBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                // toggle eye icon appearance
                if (type === 'text') {
                    eyeIcon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                    `;
                } else {
                    eyeIcon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    `;
                }
            });
        }
        // optional input shake effect when error appears? (clean extra but doesn't break)
        if (document.querySelector('.error-list')) {
            const errorContainer = document.querySelector('.error-list');
            if(errorContainer) {
                const formCard = document.querySelector('.glass-card');
                if(formCard) formCard.classList.add('shake-animation');
                setTimeout(() => {
                    if(formCard) formCard.classList.remove('shake-animation');
                }, 600);
            }
        }
    })();
</script>
</body>
</html>