<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - BitcoinHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        bitcoin: '#f7931a',
                        'bitcoin-dark': '#e8860c'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full mx-4">
        <!-- Login Card -->
        <div class="bg-white/10 backdrop-blur-md rounded-3xl shadow-2xl border border-white/20 overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-bitcoin to-bitcoin-dark p-8 text-center">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fab fa-bitcoin text-2xl text-white"></i>
                </div>
                <h1 class="text-2xl font-bold text-white mb-2">BitcoinHub Admin</h1>
                <p class="text-orange-100">Trading Platform Management</p>
            </div>

            <!-- Login Form -->
            <div class="p-8">
                @if ($errors->any())
                    <div class="bg-red-500/10 border border-red-500/20 rounded-xl p-4 mb-6">
                        <div class="flex items-center space-x-2 text-red-400">
                            <i class="fas fa-exclamation-circle"></i>
                            <span class="text-sm">{{ $errors->first() }}</span>
                        </div>
                    </div>
                @endif

                <form action="/admin/login" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-white mb-2">Email Address</label>
                        <input type="email" name="email" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-slate-300 focus:outline-none focus:ring-2 focus:ring-bitcoin focus:border-transparent" placeholder="Enter your email">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-white mb-2">Password</label>
                        <input type="password" name="password" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-slate-300 focus:outline-none focus:ring-2 focus:ring-bitcoin focus:border-transparent" placeholder="Enter your password">
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-bitcoin to-bitcoin-dark hover:from-bitcoin-dark hover:to-bitcoin text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Sign In to Admin Panel
                    </button>
                </form>

                <!-- Demo Credentials -->
                <div class="mt-8 p-6 bg-slate-800/50 rounded-2xl border border-slate-700">
                    <h3 class="text-lg font-semibold text-white mb-4 flex items-center">
                        <i class="fas fa-key text-bitcoin mr-2"></i>
                        Demo Credentials
                    </h3>
                    <div class="space-y-3 text-sm">
                        <div class="bg-slate-700/50 rounded-lg p-3">
                            <div class="text-slate-300 mb-1">Super Admin</div>
                            <div class="text-white font-medium">admin@bitcoinhub.com</div>
                            <div class="text-bitcoin">admin123</div>
                        </div>
                        <div class="bg-slate-700/50 rounded-lg p-3">
                            <div class="text-slate-300 mb-1">Trading Manager</div>
                            <div class="text-white font-medium">manager@bitcoinhub.com</div>
                            <div class="text-bitcoin">manager123</div>
                        </div>
                        <div class="bg-slate-700/50 rounded-lg p-3">
                            <div class="text-slate-300 mb-1">Market Analyst</div>
                            <div class="text-white font-medium">analyst@bitcoinhub.com</div>
                            <div class="text-bitcoin">analyst123</div>
                        </div>
                    </div>
                </div>

                <!-- Back to Website -->
                <div class="mt-6 text-center">
                    <a href="/" class="inline-flex items-center text-slate-300 hover:text-white transition-colors duration-300">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to BitcoinHub
                    </a>
                </div>
            </div>
        </div>

        <!-- Live Bitcoin Price Widget -->
        <div class="mt-6 bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20 text-center">
            <div class="text-slate-300 text-sm mb-2">Live Bitcoin Price</div>
            <div class="text-2xl font-bold text-bitcoin mb-1" id="login-btc-price">$43,250.00</div>
            <div class="text-sm text-green-400" id="login-btc-change">+2.45% (24h)</div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Live Bitcoin price updates
        function updateLoginBitcoinPrice() {
            const basePrice = 43250;
            const variation = (Math.random() - 0.5) * 1000;
            const currentPrice = basePrice + variation;
            const change = (Math.random() - 0.5) * 5;
            const changeClass = change >= 0 ? 'text-green-400' : 'text-red-400';
            const changeSign = change >= 0 ? '+' : '';

            $('#login-btc-price').text('$' + currentPrice.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }));
            
            $('#login-btc-change').removeClass('text-green-400 text-red-400').addClass(changeClass)
                .text(changeSign + change.toFixed(2) + '% (24h)');
        }

        updateLoginBitcoinPrice();
        setInterval(updateLoginBitcoinPrice, 3000);
    </script>
</body>
</html>