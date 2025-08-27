<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BitcoinHub - Professional Bitcoin Trading Platform')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
<body class="bg-slate-50">
    <!-- Header -->
    <header class="bg-gradient-to-r from-slate-900 to-slate-800 text-white shadow-2xl sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-bitcoin to-bitcoin-dark rounded-lg flex items-center justify-center">
                        <i class="fab fa-bitcoin text-xl text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold">BitcoinHub</h1>
                        <p class="text-xs text-slate-300">Professional Trading</p>
                    </div>
                </div>

                <!-- Live Bitcoin Price -->
                <div class="hidden md:flex items-center space-x-6">
                    <div class="bg-slate-800 rounded-lg px-4 py-2 border border-slate-700">
                        <div class="flex items-center space-x-3">
                            <i class="fab fa-bitcoin text-bitcoin"></i>
                            <div>
                                <div class="flex items-center space-x-2">
                                    <span class="text-sm font-medium">BTC/USD</span>
                                    <span id="btc-price" class="text-lg font-bold text-green-400">$0.00</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <span id="btc-change" class="text-xs">+0.00%</span>
                                    <span class="text-xs text-slate-400">24h</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="hidden lg:flex items-center space-x-8">
                    <a href="/" class="text-white hover:text-bitcoin transition-colors duration-300 font-medium">Home</a>
                    <a href="#trading" class="text-slate-300 hover:text-white transition-colors duration-300">Trading</a>
                    <a href="#analytics" class="text-slate-300 hover:text-white transition-colors duration-300">Analytics</a>
                    <a href="#about" class="text-slate-300 hover:text-white transition-colors duration-300">About</a>
                    <a href="#contact" class="text-slate-300 hover:text-white transition-colors duration-300">Contact</a>
                    <a href="{{ route('admin.login') }}" class="bg-gradient-to-r from-bitcoin to-bitcoin-dark hover:from-bitcoin-dark hover:to-bitcoin text-white px-4 py-2 rounded-lg font-semibold transition-all duration-300 shadow-lg hover:shadow-xl">
                        Admin Panel
                    </a>
                </nav>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="lg:hidden text-white">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="lg:hidden hidden pb-4">
                <div class="bg-slate-800 rounded-lg p-4 mb-4">
                    <div class="flex items-center space-x-3 mb-2">
                        <i class="fab fa-bitcoin text-bitcoin"></i>
                        <span class="text-sm font-medium">BTC/USD</span>
                        <span id="btc-price-mobile" class="text-lg font-bold text-green-400">$0.00</span>
                    </div>
                    <span id="btc-change-mobile" class="text-xs text-green-400">+0.00% (24h)</span>
                </div>
                <nav class="space-y-2">
                    <a href="/" class="block text-white hover:text-bitcoin transition-colors duration-300 font-medium py-2">Home</a>
                    <a href="#trading" class="block text-slate-300 hover:text-white transition-colors duration-300 py-2">Trading</a>
                    <a href="#analytics" class="block text-slate-300 hover:text-white transition-colors duration-300 py-2">Analytics</a>
                    <a href="#about" class="block text-slate-300 hover:text-white transition-colors duration-300 py-2">About</a>
                    <a href="#contact" class="block text-slate-300 hover:text-white transition-colors duration-300 py-2">Contact</a>
                    <a href="{{ route('admin.login') }}" class="block bg-gradient-to-r from-bitcoin to-bitcoin-dark text-white px-4 py-2 rounded-lg font-semibold transition-all duration-300 mt-4">
                        Admin Panel
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Four Column Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                
                <!-- Column 1: Company Info -->
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-8 h-8 bg-gradient-to-r from-bitcoin to-bitcoin-dark rounded-lg flex items-center justify-center">
                            <i class="fab fa-bitcoin text-sm text-white"></i>
                        </div>
                        <h3 class="text-lg font-semibold">BitcoinHub</h3>
                    </div>
                    <p class="text-slate-300 text-sm mb-4 leading-relaxed">
                        Your trusted partner in Bitcoin trading and investment. Professional-grade tools for serious Bitcoin enthusiasts.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-8 h-8 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-bitcoin transition-colors duration-300">
                            <i class="fab fa-twitter text-sm"></i>
                        </a>
                        <a href="#" class="w-8 h-8 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-bitcoin transition-colors duration-300">
                            <i class="fab fa-telegram text-sm"></i>
                        </a>
                        <a href="#" class="w-8 h-8 bg-slate-800 rounded-lg flex items-center justify-center hover:bg-bitcoin transition-colors duration-300">
                            <i class="fab fa-discord text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Column 2: Trading -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Trading</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Live Bitcoin Price</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Trading Charts</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Market Analysis</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Price Alerts</a></li>
                    </ul>
                </div>

                <!-- Column 3: Resources -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Resources</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Bitcoin Guide</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Trading Strategies</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Market News</a></li>
                        <li><a href="#" class="text-slate-300 hover:text-white transition-colors duration-300 text-sm">Educational Content</a></li>
                    </ul>
                </div>

                <!-- Column 4: Contact Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Info</h3>
                    <div class="space-y-3">
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-map-marker-alt text-bitcoin mt-1"></i>
                            <div>
                                <p class="text-slate-300 text-sm">123 Crypto Street</p>
                                <p class="text-slate-300 text-sm">Bitcoin City, BC 12345</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-bitcoin"></i>
                            <p class="text-slate-300 text-sm">support@bitcoinhub.com</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-phone text-bitcoin"></i>
                            <p class="text-slate-300 text-sm">+1 (555) BTC-COIN</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Border and Copyright -->
            <div class="border-t border-slate-700 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="text-sm text-slate-400 mb-4 md:mb-0">
                        © {{ date('Y') }} BitcoinHub. All rights reserved.
                    </div>
                    <div class="flex space-x-6 mb-4 md:mb-0">
                        <a href="#" class="text-slate-400 hover:text-white transition-colors duration-300 text-sm">Privacy Policy</a>
                        <a href="#" class="text-slate-400 hover:text-white transition-colors duration-300 text-sm">Terms of Service</a>
                        <a href="#" class="text-slate-400 hover:text-white transition-colors duration-300 text-sm">Risk Disclaimer</a>
                    </div>
                    <div class="text-sm text-slate-400">
                        Made with ❤️ <span class="text-white font-medium">LaraCopilot</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        $('#mobile-menu-btn').click(function() {
            $('#mobile-menu').toggleClass('hidden');
        });

        // Live Bitcoin Price Update
        function updateBitcoinPrice() {
            // Simulate live price updates
            const basePrice = 43250;
            const variation = (Math.random() - 0.5) * 1000;
            const currentPrice = basePrice + variation;
            const change = (Math.random() - 0.5) * 5;
            const changeClass = change >= 0 ? 'text-green-400' : 'text-red-400';
            const changeSign = change >= 0 ? '+' : '';

            $('#btc-price, #btc-price-mobile').text('$' + currentPrice.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }));
            
            $('#btc-change, #btc-change-mobile').removeClass('text-green-400 text-red-400').addClass(changeClass)
                .text(changeSign + change.toFixed(2) + '%');
        }

        // Update price every 3 seconds
        updateBitcoinPrice();
        setInterval(updateBitcoinPrice, 3000);
    </script>
</body>
</html>