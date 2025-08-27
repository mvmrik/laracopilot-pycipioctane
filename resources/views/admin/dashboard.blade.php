@extends('layouts.admin')

@section('title', 'Dashboard - BitcoinHub Admin')
@section('page-title', 'Dashboard')
@section('page-description', 'Bitcoin trading platform overview and analytics')

@section('content')
<!-- KPI Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Users -->
    <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100 hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-600">Total Users</p>
                <p class="text-3xl font-bold text-slate-800">24,847</p>
                <div class="flex items-center mt-2">
                    <i class="fas fa-arrow-up text-green-500 text-xs mr-1"></i>
                    <span class="text-green-500 text-sm font-medium">+12.5%</span>
                    <span class="text-slate-500 text-sm ml-1">vs last month</span>
                </div>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-users text-blue-600 text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Trading Volume -->
    <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100 hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-600">24h Volume</p>
                <p class="text-3xl font-bold text-slate-800">$2.8B</p>
                <div class="flex items-center mt-2">
                    <i class="fas fa-arrow-up text-green-500 text-xs mr-1"></i>
                    <span class="text-green-500 text-sm font-medium">+8.2%</span>
                    <span class="text-slate-500 text-sm ml-1">vs yesterday</span>
                </div>
            </div>
            <div class="w-12 h-12 bg-bitcoin/10 rounded-xl flex items-center justify-center">
                <i class="fas fa-chart-line text-bitcoin text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Active Trades -->
    <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100 hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-600">Active Trades</p>
                <p class="text-3xl font-bold text-slate-800">1,284</p>
                <div class="flex items-center mt-2">
                    <i class="fas fa-arrow-up text-green-500 text-xs mr-1"></i>
                    <span class="text-green-500 text-sm font-medium">+15.7%</span>
                    <span class="text-slate-500 text-sm ml-1">vs last hour</span>
                </div>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-exchange-alt text-green-600 text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Platform Revenue -->
    <div class="bg-white rounded-2xl p-6 shadow-lg border border-slate-100 hover:shadow-xl transition-shadow duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-slate-600">Revenue</p>
                <p class="text-3xl font-bold text-slate-800">$847K</p>
                <div class="flex items-center mt-2">
                    <i class="fas fa-arrow-up text-green-500 text-xs mr-1"></i>
                    <span class="text-green-500 text-sm font-medium">+22.1%</span>
                    <span class="text-slate-500 text-sm ml-1">vs last month</span>
                </div>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-dollar-sign text-purple-600 text-xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
    <!-- Trading Volume Chart -->
    <div class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-lg font-semibold text-slate-800">Trading Volume</h3>
                <p class="text-sm text-slate-600">24-hour trading activity</p>
            </div>
            <div class="flex space-x-2">
                <button class="px-3 py-1 text-sm bg-bitcoin text-white rounded-lg">24H</button>
                <button class="px-3 py-1 text-sm bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300">7D</button>
                <button class="px-3 py-1 text-sm bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300">30D</button>
            </div>
        </div>
        <div class="w-full overflow-x-auto">
            <div style="width: 600px; height: 300px;">
                <canvas id="volumeChart" width="600" height="300"></canvas>
            </div>
        </div>
    </div>

    <!-- User Growth Chart -->
    <div class="bg-white rounded-2xl shadow-lg border border-slate-100 p-6">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="text-lg font-semibold text-slate-800">User Growth</h3>
                <p class="text-sm text-slate-600">New user registrations</p>
            </div>
            <div class="flex space-x-2">
                <button class="px-3 py-1 text-sm bg-blue-600 text-white rounded-lg">Monthly</button>
                <button class="px-3 py-1 text-sm bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300">Weekly</button>
            </div>
        </div>
        <div class="w-full overflow-x-auto">
            <div style="width: 600px; height: 300px;">
                <canvas id="userChart" width="600" height="300"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity & Top Traders -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Recent Transactions -->
    <div class="bg-white rounded-2xl shadow-lg border border-slate-100">
        <div class="p-6 border-b border-slate-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-slate-800">Recent Transactions</h3>
                <button class="text-bitcoin hover:text-bitcoin-dark text-sm font-medium">View All</button>
            </div>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-arrow-up text-green-600"></i>
                        </div>
                        <div>
                            <div class="font-medium text-slate-800">Buy BTC</div>
                            <div class="text-sm text-slate-600">user_bitcoin_trader</div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="font-semibold text-slate-800">0.5 BTC</div>
                        <div class="text-sm text-slate-600">$21,625</div>
                    </div>
                </div>

                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-arrow-down text-red-600"></i>
                        </div>
                        <div>
                            <div class="font-medium text-slate-800">Sell BTC</div>
                            <div class="text-sm text-slate-600">crypto_master_2024</div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="font-semibold text-slate-800">1.2 BTC</div>
                        <div class="text-sm text-slate-600">$51,900</div>
                    </div>
                </div>

                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-arrow-up text-green-600"></i>
                        </div>
                        <div>
                            <div class="font-medium text-slate-800">Buy BTC</div>
                            <div class="text-sm text-slate-600">hodl_forever</div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="font-semibold text-slate-800">0.25 BTC</div>
                        <div class="text-sm text-slate-600">$10,812</div>
                    </div>
                </div>

                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-arrow-up text-green-600"></i>
                        </div>
                        <div>
                            <div class="font-medium text-slate-800">Buy BTC</div>
                            <div class="text-sm text-slate-600">bitcoin_believer</div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="font-semibold text-slate-800">2.1 BTC</div>
                        <div class="text-sm text-slate-600">$90,825</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Traders -->
    <div class="bg-white rounded-2xl shadow-lg border border-slate-100">
        <div class="p-6 border-b border-slate-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-slate-800">Top Traders</h3>
                <button class="text-bitcoin hover:text-bitcoin-dark text-sm font-medium">View Leaderboard</button>
            </div>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                <div class="flex items-center justify-between p-4 bg-gradient-to-r from-bitcoin/10 to-bitcoin-dark/10 rounded-xl border border-bitcoin/20">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-bitcoin rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-sm">1</span>
                        </div>
                        <div>
                            <div class="font-semibold text-slate-800">crypto_whale_king</div>
                            <div class="text-sm text-slate-600">Volume: $2.4M</div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-green-600 font-semibold">+24.5%</div>
                        <div class="text-sm text-slate-600">P&L</div>
                    </div>
                </div>

                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-slate-400 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-sm">2</span>
                        </div>
                        <div>
                            <div class="font-semibold text-slate-800">bitcoin_maximalist</div>
                            <div class="text-sm text-slate-600">Volume: $1.8M</div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-green-600 font-semibold">+18.2%</div>
                        <div class="text-sm text-slate-600">P&L</div>
                    </div>
                </div>

                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-orange-400 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-sm">3</span>
                        </div>
                        <div>
                            <div class="font-semibold text-slate-800">satoshi_disciple</div>
                            <div class="text-sm text-slate-600">Volume: $1.2M</div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-green-600 font-semibold">+15.7%</div>
                        <div class="text-sm text-slate-600">P&L</div>
                    </div>
                </div>

                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-slate-300 rounded-full flex items-center justify-center">
                            <span class="text-slate-600 font-bold text-sm">4</span>
                        </div>
                        <div>
                            <div class="font-semibold text-slate-800">diamond_hands_pro</div>
                            <div class="text-sm text-slate-600">Volume: $950K</div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-green-600 font-semibold">+12.3%</div>
                        <div class="text-sm text-slate-600">P&L</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Initialize Volume Chart
    const volumeCtx = document.getElementById('volumeChart').getContext('2d');
    new Chart(volumeCtx, {
        type: 'bar',
        data: {
            labels: ['00:00', '04:00', '08:00', '12:00', '16:00', '20:00'],
            datasets: [{
                label: 'Trading Volume',
                data: [2.1, 1.8, 2.5, 3.2, 2.8, 2.4],
                backgroundColor: 'rgba(247, 147, 26, 0.8)',
                borderColor: '#f7931a',
                borderWidth: 2,
                borderRadius: 8
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '$' + value + 'B';
                        }
                    }
                }
            }
        }
    });

    // Initialize User Growth Chart
    const userCtx = document.getElementById('userChart').getContext('2d');
    new Chart(userCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'New Users',
                data: [1200, 1800, 2400, 2100, 2800, 3200],
                borderColor: '#3b82f6',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: false,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value.toLocaleString();
                        }
                    }
                }
            }
        }
    });
</script>
@endsection