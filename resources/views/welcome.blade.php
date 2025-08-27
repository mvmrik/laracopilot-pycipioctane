@extends('layouts.app')

@section('title', 'BitcoinHub - Professional Bitcoin Trading Platform')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 overflow-hidden">
    <!-- Bitcoin Background Animation -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 left-10 animate-pulse">
            <i class="fab fa-bitcoin text-6xl text-bitcoin"></i>
        </div>
        <div class="absolute top-40 right-20 animate-bounce delay-1000">
            <i class="fab fa-bitcoin text-4xl text-bitcoin"></i>
        </div>
        <div class="absolute bottom-40 left-1/4 animate-pulse delay-500">
            <i class="fab fa-bitcoin text-5xl text-bitcoin"></i>
        </div>
    </div>

    <div class="relative z-10 text-center text-white max-w-6xl mx-auto px-4">
        <div class="mb-8">
            <div class="w-24 h-24 bg-gradient-to-r from-bitcoin to-bitcoin-dark rounded-full flex items-center justify-center mx-auto mb-6 animate-pulse">
                <i class="fab fa-bitcoin text-4xl text-white"></i>
            </div>
        </div>

        <h1 class="text-5xl md:text-7xl font-bold mb-6 bg-clip-text text-transparent bg-gradient-to-r from-white via-bitcoin to-white">
            Trade Bitcoin Like a Pro
        </h1>
        <p class="text-xl md:text-2xl mb-8 text-slate-200 max-w-3xl mx-auto">
            Advanced Bitcoin trading platform with real-time data, professional charts, and powerful analytics for serious traders
        </p>

        <!-- Live Bitcoin Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 max-w-4xl mx-auto">
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                <div class="text-3xl font-bold text-bitcoin mb-2" id="hero-btc-price">$43,250.00</div>
                <div class="text-sm text-slate-300">Current Bitcoin Price</div>
                <div class="text-green-400 text-sm mt-1" id="hero-btc-change">+2.45% (24h)</div>
            </div>
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                <div class="text-3xl font-bold text-blue-400 mb-2">$847.2B</div>
                <div class="text-sm text-slate-300">Market Cap</div>
                <div class="text-green-400 text-sm mt-1">+1.8% (24h)</div>
            </div>
            <div class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20">
                <div class="text-3xl font-bold text-purple-400 mb-2">$28.4B</div>
                <div class="text-sm text-slate-300">24h Volume</div>
                <div class="text-orange-400 text-sm mt-1">+12.3% (24h)</div>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button onclick="scrollToSection('trading')" class="bg-gradient-to-r from-bitcoin to-bitcoin-dark hover:from-bitcoin-dark hover:to-bitcoin text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <i class="fas fa-chart-line mr-2"></i>
                Start Trading
            </button>
            <button onclick="scrollToSection('analytics')" class="bg-white/20 backdrop-blur-md border border-white/30 text-white px-8 py-4 rounded-xl font-semibold hover:bg-white/30 transition-all duration-300">
                <i class="fas fa-analytics mr-2"></i>
                View Analytics
            </button>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <i class="fas fa-chevron-down text-white text-2xl"></i>
    </div>
</section>

<!-- Live Trading Section -->
<section id="trading" class="py-20 bg-gradient-to-br from-slate-50 to-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-bold text-slate-800 mb-6">
                Live Bitcoin Trading
            </h2>
            <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                Professional-grade Bitcoin trading interface with real-time price data and advanced charting tools
            </p>
        </div>

        <!-- Trading Interface -->
        <div class="bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden">
            <!-- Trading Header -->
            <div class="bg-gradient-to-r from-slate-800 to-slate-700 text-white p-6">
                <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center">
                    <div class="flex items-center space-x-4 mb-4 lg:mb-0">
                        <div class="w-12 h-12 bg-bitcoin rounded-xl flex items-center justify-center">
                            <i class="fab fa-bitcoin text-xl text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold">BTC/USD</h3>
                            <p class="text-slate-300">Bitcoin to US Dollar</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-3xl font-bold" id="trading-btc-price">$43,250.00</div>
                        <div class="text-green-400" id="trading-btc-change">+$1,025.50 (+2.45%)</div>
                    </div>
                </div>
            </div>

            <!-- Chart Controls -->
            <div class="bg-slate-50 border-b border-slate-200 p-4">
                <div class="flex flex-wrap items-center justify-between">
                    <div class="flex items-center space-x-2 mb-2 lg:mb-0">
                        <span class="text-sm font-medium text-slate-700">Timeframe:</span>
                        <div class="flex space-x-1">
                            <button onclick="changeTimeframe('1D')" class="timeframe-btn active px-3 py-1 text-sm rounded-lg bg-bitcoin text-white font-medium">1D</button>
                            <button onclick="changeTimeframe('1W')" class="timeframe-btn px-3 py-1 text-sm rounded-lg bg-slate-200 text-slate-700 hover:bg-slate-300 font-medium">1W</button>
                            <button onclick="changeTimeframe('1M')" class="timeframe-btn px-3 py-1 text-sm rounded-lg bg-slate-200 text-slate-700 hover:bg-slate-300 font-medium">1M</button>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                            <span class="text-sm text-slate-600">Live Data</span>
                        </div>
                        <button class="text-sm text-bitcoin hover:text-bitcoin-dark font-medium">
                            <i class="fas fa-expand-arrows-alt mr-1"></i>
                            Fullscreen
                        </button>
                    </div>
                </div>
            </div>

            <!-- Chart Container -->
            <div class="p-6">
                <div class="w-full overflow-x-auto">
                    <div style="width: 100%; height: 500px; min-width: 800px;">
                        <canvas id="bitcoinChart" width="800" height="500" class="w-full h-full"></canvas>
                    </div>
                </div>
                <p class="text-sm text-slate-500 mt-4 text-center">
                    <i class="fas fa-info-circle mr-1"></i>
                    Professional TradingView-style chart with real-time Bitcoin price data
                </p>
            </div>

            <!-- Trading Stats -->
            <div class="bg-slate-50 p-6 border-t border-slate-200">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-slate-800">$44,275</div>
                        <div class="text-sm text-slate-600">24h High</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-slate-800">$42,180</div>
                        <div class="text-sm text-slate-600">24h Low</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-slate-800">$28.4B</div>
                        <div class="text-sm text-slate-600">24h Volume</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-slate-800">19.8M</div>
                        <div class="text-sm text-slate-600">Circulating Supply</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Analytics Section -->
<section id="analytics" class="py-20 bg-gradient-to-br from-slate-800 to-slate-900">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Bitcoin Analytics
            </h2>
            <p class="text-xl text-slate-300 max-w-3xl mx-auto">
                Comprehensive Bitcoin market analysis with professional-grade tools and insights
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Market Sentiment -->
            <div class="bg-white/10 backdrop-blur-md rounded-3xl p-8 border border-white/20">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Market Sentiment</h3>
                    <div class="w-12 h-12 bg-green-500/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-smile text-green-400 text-xl"></i>
                    </div>
                </div>
                <div class="text-center mb-6">
                    <div class="text-4xl font-bold text-green-400 mb-2">Bullish</div>
                    <div class="text-slate-300">74% Positive Sentiment</div>
                </div>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-slate-300">Fear & Greed Index</span>
                        <span class="text-green-400 font-semibold">72/100</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-slate-300">Social Volume</span>
                        <span class="text-orange-400 font-semibold">High</span>
                    </div>
                </div>
            </div>

            <!-- Price Prediction -->
            <div class="bg-white/10 backdrop-blur-md rounded-3xl p-8 border border-white/20">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Price Targets</h3>
                    <div class="w-12 h-12 bg-bitcoin/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-target text-bitcoin text-xl"></i>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-slate-300">Resistance</span>
                        <span class="text-red-400 font-semibold">$45,500</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-slate-300">Current</span>
                        <span class="text-bitcoin font-semibold">$43,250</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-slate-300">Support</span>
                        <span class="text-green-400 font-semibold">$41,800</span>
                    </div>
                </div>
                <div class="mt-6 p-4 bg-bitcoin/10 rounded-xl">
                    <div class="text-sm text-slate-300 mb-1">Next Target</div>
                    <div class="text-lg font-bold text-bitcoin">$47,200</div>
                </div>
            </div>

            <!-- Technical Analysis -->
            <div class="bg-white/10 backdrop-blur-md rounded-3xl p-8 border border-white/20">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-white">Technical Analysis</h3>
                    <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-chart-line text-purple-400 text-xl"></i>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-slate-300">RSI (14)</span>
                        <span class="text-orange-400 font-semibold">68.5</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-slate-300">MACD</span>
                        <span class="text-green-400 font-semibold">Bullish</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-slate-300">Moving Average</span>
                        <span class="text-green-400 font-semibold">Above 50MA</span>
                    </div>
                </div>
                <div class="mt-6 p-4 bg-green-500/10 rounded-xl">
                    <div class="text-sm text-slate-300 mb-1">Overall Signal</div>
                    <div class="text-lg font-bold text-green-400">Strong Buy</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-gradient-to-br from-slate-50 to-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-bold text-slate-800 mb-6">
                Why Choose BitcoinHub?
            </h2>
            <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                Professional Bitcoin trading platform built for serious traders and investors
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Real-time Data -->
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-slate-200">
                <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-bolt text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 mb-4">Real-time Data</h3>
                <p class="text-slate-600 mb-6">Live Bitcoin price updates with millisecond precision for professional trading decisions.</p>
                <ul class="space-y-2 text-sm text-slate-600">
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Live price feeds</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Real-time charts</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Instant notifications</li>
                </ul>
            </div>

            <!-- Advanced Charts -->
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-slate-200">
                <div class="w-16 h-16 bg-gradient-to-r from-bitcoin to-bitcoin-dark rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-chart-line text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 mb-4">TradingView Charts</h3>
                <p class="text-slate-600 mb-6">Professional-grade charting tools with multiple timeframes and technical indicators.</p>
                <ul class="space-y-2 text-sm text-slate-600">
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Multiple timeframes</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Technical indicators</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Drawing tools</li>
                </ul>
            </div>

            <!-- Secure Platform -->
            <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-slate-200">
                <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-shield-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 mb-4">Bank-level Security</h3>
                <p class="text-slate-600 mb-6">Military-grade encryption and security protocols to protect your Bitcoin investments.</p>
                <ul class="space-y-2 text-sm text-slate-600">
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> SSL encryption</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> Cold storage</li>
                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i> 2FA protection</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 bg-gradient-to-br from-slate-800 to-slate-900">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                    Built for Bitcoin Professionals
                </h2>
                <p class="text-xl text-slate-300 mb-8 leading-relaxed">
                    BitcoinHub was created by professional traders who understand the unique needs of Bitcoin trading. 
                    Our platform combines institutional-grade tools with user-friendly interfaces.
                </p>
                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-bitcoin mb-2">500K+</div>
                        <div class="text-slate-300">Active Traders</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-bitcoin mb-2">$2.5B+</div>
                        <div class="text-slate-300">Trading Volume</div>
                    </div>
                </div>
                <button class="bg-gradient-to-r from-bitcoin to-bitcoin-dark hover:from-bitcoin-dark hover:to-bitcoin text-white px-8 py-4 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl">
                    <i class="fas fa-rocket mr-2"></i>
                    Start Trading Now
                </button>
            </div>
            <div class="relative">
                <div class="bg-white/10 backdrop-blur-md rounded-3xl p-8 border border-white/20">
                    <h3 class="text-2xl font-bold text-white mb-6">Platform Features</h3>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-bitcoin rounded-lg flex items-center justify-center">
                                <i class="fas fa-check text-white"></i>
                            </div>
                            <div>
                                <div class="text-white font-semibold">Professional Charts</div>
                                <div class="text-slate-300 text-sm">TradingView-style interface</div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-bitcoin rounded-lg flex items-center justify-center">
                                <i class="fas fa-check text-white"></i>
                            </div>
                            <div>
                                <div class="text-white font-semibold">Real-time Data</div>
                                <div class="text-slate-300 text-sm">Live Bitcoin price feeds</div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-bitcoin rounded-lg flex items-center justify-center">
                                <i class="fas fa-check text-white"></i>
                            </div>
                            <div>
                                <div class="text-white font-semibold">Advanced Analytics</div>
                                <div class="text-slate-300 text-sm">Professional market analysis</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-gradient-to-br from-slate-50 to-white">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-bold text-slate-800 mb-6">
                Get Started Today
            </h2>
            <p class="text-xl text-slate-600">
                Join thousands of professional Bitcoin traders on our platform
            </p>
        </div>

        <div class="bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <!-- Contact Form -->
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-slate-800 mb-6">Contact Our Team</h3>
                    <form class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Full Name</label>
                            <input type="text" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-bitcoin focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Email Address</label>
                            <input type="email" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-bitcoin focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Trading Experience</label>
                            <select class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-bitcoin focus:border-transparent">
                                <option>Beginner</option>
                                <option>Intermediate</option>
                                <option>Advanced</option>
                                <option>Professional</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Message</label>
                            <textarea rows="4" class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-bitcoin focus:border-transparent"></textarea>
                        </div>
                        <button class="w-full bg-gradient-to-r from-bitcoin to-bitcoin-dark hover:from-bitcoin-dark hover:to-bitcoin text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Send Message
                        </button>
                    </form>
                </div>

                <!-- Contact Info -->
                <div class="bg-gradient-to-br from-bitcoin to-bitcoin-dark p-8 text-white">
                    <h3 class="text-2xl font-bold mb-6">Get In Touch</h3>
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div>
                                <div class="font-semibold">Office Location</div>
                                <div class="text-orange-100">123 Crypto Street<br>Bitcoin City, BC 12345</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-envelope text-white"></i>
                            </div>
                            <div>
                                <div class="font-semibold">Email Support</div>
                                <div class="text-orange-100">support@bitcoinhub.com</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-phone text-white"></i>
                            </div>
                            <div>
                                <div class="font-semibold">Phone Support</div>
                                <div class="text-orange-100">+1 (555) BTC-COIN</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center">
                                <i class="fas fa-clock text-white"></i>
                            </div>
                            <div>
                                <div class="font-semibold">Trading Hours</div>
                                <div class="text-orange-100">24/7 - Bitcoin Never Sleeps</div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 p-4 bg-white/10 rounded-xl">
                        <div class="text-sm mb-2">Current Bitcoin Price</div>
                        <div class="text-2xl font-bold" id="contact-btc-price">$43,250.00</div>
                        <div class="text-sm text-green-300" id="contact-btc-change">+2.45% (24h)</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Smooth scrolling function
    function scrollToSection(sectionId) {
        document.getElementById(sectionId).scrollIntoView({
            behavior: 'smooth'
        });
    }

    // Chart timeframe functionality
    let currentTimeframe = '1D';
    
    function changeTimeframe(timeframe) {
        currentTimeframe = timeframe;
        
        // Update active button
        document.querySelectorAll('.timeframe-btn').forEach(btn => {
            btn.classList.remove('active', 'bg-bitcoin', 'text-white');
            btn.classList.add('bg-slate-200', 'text-slate-700');
        });
        
        event.target.classList.remove('bg-slate-200', 'text-slate-700');
        event.target.classList.add('active', 'bg-bitcoin', 'text-white');
        
        // Simulate chart update
        updateChart(timeframe);
    }

    // Simulate chart updates
    function updateChart(timeframe) {
        console.log(`Updating chart to ${timeframe} timeframe`);
        // In a real application, this would update the chart data
    }

    // Initialize simple chart visualization
    function initChart() {
        const canvas = document.getElementById('bitcoinChart');
        if (!canvas) return;
        
        const ctx = canvas.getContext('2d');
        const width = canvas.width;
        const height = canvas.height;

        // Clear canvas
        ctx.clearRect(0, 0, width, height);

        // Draw grid
        ctx.strokeStyle = '#e2e8f0';
        ctx.lineWidth = 1;
        
        for (let i = 0; i <= 10; i++) {
            const y = (height / 10) * i;
            ctx.beginPath();
            ctx.moveTo(0, y);
            ctx.lineTo(width, y);
            ctx.stroke();
        }
        
        for (let i = 0; i <= 20; i++) {
            const x = (width / 20) * i;
            ctx.beginPath();
            ctx.moveTo(x, 0);
            ctx.lineTo(x, height);
            ctx.stroke();
        }

        // Generate sample Bitcoin price data
        const dataPoints = 50;
        const basePrice = 43250;
        let prices = [];
        let currentPrice = basePrice;
        
        for (let i = 0; i < dataPoints; i++) {
            currentPrice += (Math.random() - 0.5) * 500;
            prices.push(currentPrice);
        }

        // Draw price line
        const minPrice = Math.min(...prices);
        const maxPrice = Math.max(...prices);
        const priceRange = maxPrice - minPrice;

        ctx.strokeStyle = '#f7931a';
        ctx.lineWidth = 3;
        ctx.beginPath();

        for (let i = 0; i < prices.length; i++) {
            const x = (width / (prices.length - 1)) * i;
            const normalizedPrice = (prices[i] - minPrice) / priceRange;
            const y = height - (normalizedPrice * height * 0.8) - (height * 0.1);
            
            if (i === 0) {
                ctx.moveTo(x, y);
            } else {
                ctx.lineTo(x, y);
            }
        }
        
        ctx.stroke();

        // Add gradient fill
        ctx.fillStyle = 'rgba(247, 147, 26, 0.1)';
        ctx.beginPath();
        ctx.moveTo(0, height);
        
        for (let i = 0; i < prices.length; i++) {
            const x = (width / (prices.length - 1)) * i;
            const normalizedPrice = (prices[i] - minPrice) / priceRange;
            const y = height - (normalizedPrice * height * 0.8) - (height * 0.1);
            ctx.lineTo(x, y);
        }
        
        ctx.lineTo(width, height);
        ctx.closePath();
        ctx.fill();
    }

    // Initialize chart when page loads
    $(document).ready(function() {
        setTimeout(initChart, 1000);
        
        // Update chart every 5 seconds
        setInterval(initChart, 5000);
    });

    // Update all Bitcoin prices
    function updateAllBitcoinPrices() {
        const basePrice = 43250;
        const variation = (Math.random() - 0.5) * 1000;
        const currentPrice = basePrice + variation;
        const change = (Math.random() - 0.5) * 5;
        const changeClass = change >= 0 ? 'text-green-400' : 'text-red-400';
        const changeSign = change >= 0 ? '+' : '';

        const priceText = '$' + currentPrice.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
        
        const changeText = changeSign + change.toFixed(2) + '%';

        // Update all price displays
        $('#hero-btc-price, #trading-btc-price, #contact-btc-price').text(priceText);
        $('#hero-btc-change, #trading-btc-change, #contact-btc-change').removeClass('text-green-400 text-red-400').addClass(changeClass).text(changeText);
    }

    // Update prices every 3 seconds
    setInterval(updateAllBitcoinPrices, 3000);
    updateAllBitcoinPrices();
</script>
@endsection