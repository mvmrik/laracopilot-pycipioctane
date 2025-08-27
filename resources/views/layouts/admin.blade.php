<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - BitcoinHub')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gradient-to-b from-slate-900 to-slate-800 text-white min-h-screen fixed left-0 top-0 z-50">
            <div class="p-6">
                <!-- Logo -->
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-10 h-10 bg-gradient-to-r from-bitcoin to-bitcoin-dark rounded-lg flex items-center justify-center">
                        <i class="fab fa-bitcoin text-xl text-white"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold">BitcoinHub Admin</h2>
                        <p class="text-sm text-slate-300">Trading Platform</p>
                    </div>
                </div>

                <!-- User Info -->
                @if(session('admin_user'))
                <div class="bg-slate-800 rounded-xl p-4 mb-6 border border-slate-700">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-bitcoin rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div>
                            <div class="text-sm font-medium text-white">{{ session('admin_user')['name'] }}</div>
                            <div class="text-xs text-slate-300">{{ session('admin_user')['role'] }}</div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Navigation -->
                <nav class="space-y-2">
                    <!-- Dashboard -->
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 text-white bg-bitcoin rounded-lg hover:bg-bitcoin-dark transition-colors duration-200">
                        <i class="fas fa-tachometer-alt w-5 h-5"></i>
                        <span>Dashboard</span>
                    </a>

                    <!-- Users Management -->
                    <a href="{{ route('admin.users') ?? '#' }}" 
                       @if(!Route::has('admin.users')) onclick="alert('Users management coming soon!')" @endif
                       class="flex items-center space-x-3 px-4 py-3 text-slate-300 hover:text-white hover:bg-slate-700 rounded-lg transition-colors duration-200">
                        <i class="fas fa-users w-5 h-5"></i>
                        <span>Users</span>
                        @if(!Route::has('admin.users'))
                            <span class="ml-auto text-xs bg-orange-500 text-white px-2 py-1 rounded-full">Soon</span>
                        @endif
                    </a>

                    <!-- Transactions -->
                    <a href="{{ route('admin.transactions') ?? '#' }}" 
                       @if(!Route::has('admin.transactions')) onclick="alert('Transactions management coming soon!')" @endif
                       class="flex items-center space-x-3 px-4 py-3 text-slate-300 hover:text-white hover:bg-slate-700 rounded-lg transition-colors duration-200">
                        <i class="fas fa-exchange-alt w-5 h-5"></i>
                        <span>Transactions</span>
                        @if(!Route::has('admin.transactions'))
                            <span class="ml-auto text-xs bg-orange-500 text-white px-2 py-1 rounded-full">Soon</span>
                        @endif
                    </a>

                    <!-- Analytics -->
                    <a href="{{ route('admin.analytics') ?? '#' }}" 
                       @if(!Route::has('admin.analytics')) onclick="alert('Analytics coming soon!')" @endif
                       class="flex items-center space-x-3 px-4 py-3 text-slate-300 hover:text-white hover:bg-slate-700 rounded-lg transition-colors duration-200">
                        <i class="fas fa-chart-bar w-5 h-5"></i>
                        <span>Analytics</span>
                        @if(!Route::has('admin.analytics'))
                            <span class="ml-auto text-xs bg-orange-500 text-white px-2 py-1 rounded-full">Soon</span>
                        @endif
                    </a>

                    <!-- Trading Pairs -->
                    <a href="{{ route('admin.trading') ?? '#' }}" 
                       @if(!Route::has('admin.trading')) onclick="alert('Trading management coming soon!')" @endif
                       class="flex items-center space-x-3 px-4 py-3 text-slate-300 hover:text-white hover:bg-slate-700 rounded-lg transition-colors duration-200">
                        <i class="fas fa-chart-line w-5 h-5"></i>
                        <span>Trading</span>
                        @if(!Route::has('admin.trading'))
                            <span class="ml-auto text-xs bg-orange-500 text-white px-2 py-1 rounded-full">Soon</span>
                        @endif
                    </a>

                    <!-- Reports -->
                    <a href="{{ route('admin.reports') ?? '#' }}" 
                       @if(!Route::has('admin.reports')) onclick="alert('Reports coming soon!')" @endif
                       class="flex items-center space-x-3 px-4 py-3 text-slate-300 hover:text-white hover:bg-slate-700 rounded-lg transition-colors duration-200">
                        <i class="fas fa-file-alt w-5 h-5"></i>
                        <span>Reports</span>
                        @if(!Route::has('admin.reports'))
                            <span class="ml-auto text-xs bg-orange-500 text-white px-2 py-1 rounded-full">Soon</span>
                        @endif
                    </a>

                    <!-- Settings -->
                    <a href="{{ route('admin.settings') ?? '#' }}" 
                       @if(!Route::has('admin.settings')) onclick="alert('Settings coming soon!')" @endif
                       class="flex items-center space-x-3 px-4 py-3 text-slate-300 hover:text-white hover:bg-slate-700 rounded-lg transition-colors duration-200">
                        <i class="fas fa-cog w-5 h-5"></i>
                        <span>Settings</span>
                        @if(!Route::has('admin.settings'))
                            <span class="ml-auto text-xs bg-orange-500 text-white px-2 py-1 rounded-full">Soon</span>
                        @endif
                    </a>
                </nav>
            </div>

            <!-- Bottom Actions -->
            <div class="absolute bottom-0 left-0 right-0 p-6 space-y-3">
                <!-- Back to Website -->
                <a href="/" class="w-full flex items-center justify-center space-x-2 px-4 py-3 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white rounded-lg font-semibold transition-all duration-300 shadow-lg hover:shadow-xl">
                    <i class="fas fa-arrow-left w-4 h-4"></i>
                    <span>Back to Website</span>
                </a>

                <!-- Logout -->
                <a href="{{ route('admin.logout') }}" class="w-full flex items-center justify-center space-x-2 px-4 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg font-semibold transition-all duration-300">
                    <i class="fas fa-sign-out-alt w-4 h-4"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 ml-64">
            <!-- Top Header -->
            <header class="bg-white shadow-sm border-b border-slate-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-slate-800">@yield('page-title', 'Dashboard')</h1>
                        <p class="text-slate-600">@yield('page-description', 'Bitcoin trading platform management')</p>
                    </div>
                    
                    <!-- Live Bitcoin Price -->
                    <div class="bg-slate-800 rounded-lg px-4 py-2">
                        <div class="flex items-center space-x-3">
                            <i class="fab fa-bitcoin text-bitcoin"></i>
                            <div>
                                <div class="flex items-center space-x-2">
                                    <span class="text-sm font-medium text-white">BTC/USD</span>
                                    <span id="admin-btc-price" class="text-lg font-bold text-green-400">$43,250.00</span>
                                </div>
                                <div class="text-xs text-slate-400">
                                    <span id="admin-btc-change" class="text-green-400">+2.45%</span>
                                    <span>24h</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Live Bitcoin price updates for admin
        function updateAdminBitcoinPrice() {
            const basePrice = 43250;
            const variation = (Math.random() - 0.5) * 1000;
            const currentPrice = basePrice + variation;
            const change = (Math.random() - 0.5) * 5;
            const changeClass = change >= 0 ? 'text-green-400' : 'text-red-400';
            const changeSign = change >= 0 ? '+' : '';

            $('#admin-btc-price').text('$' + currentPrice.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }));
            
            $('#admin-btc-change').removeClass('text-green-400 text-red-400').addClass(changeClass)
                .text(changeSign + change.toFixed(2) + '%');
        }

        updateAdminBitcoinPrice();
        setInterval(updateAdminBitcoinPrice, 3000);
    </script>
</body>
</html>