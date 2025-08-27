@extends('layouts.app')

@section('title', '404 - Page Not Found')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-white flex items-center justify-center px-4">
    <div class="text-center max-w-2xl mx-auto">
        <!-- Bitcoin 404 Icon -->
        <div class="mb-8">
            <div class="w-32 h-32 bg-gradient-to-r from-bitcoin to-bitcoin-dark rounded-full flex items-center justify-center mx-auto mb-6 animate-pulse">
                <i class="fab fa-bitcoin text-5xl text-white"></i>
            </div>
        </div>

        <!-- Error Content -->
        <h1 class="text-4xl md:text-6xl font-bold text-slate-800 mb-4">404</h1>
        <h2 class="text-2xl md:text-3xl font-semibold text-slate-600 mb-6">Page Not Found</h2>
        <p class="text-lg text-slate-500 mb-8 leading-relaxed">
            This Bitcoin page seems to have gone mining! Let's get you back to trading.
        </p>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
            <a href="/" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-bitcoin to-bitcoin-dark hover:from-bitcoin-dark hover:to-bitcoin text-white rounded-xl font-semibold transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                <i class="fas fa-home mr-2"></i>
                Back to Trading
            </a>
            <button onclick="history.back()" class="inline-flex items-center px-6 py-3 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 rounded-xl font-semibold transition-all duration-300 shadow-md hover:shadow-lg">
                <i class="fas fa-arrow-left mr-2"></i>
                Go Back
            </button>
        </div>

        <!-- Bitcoin Price Widget -->
        <div class="max-w-md mx-auto bg-slate-800 rounded-2xl p-6 text-white">
            <h3 class="text-lg font-semibold mb-4">Current Bitcoin Price</h3>
            <div class="flex items-center justify-center space-x-3">
                <i class="fab fa-bitcoin text-bitcoin text-2xl"></i>
                <div>
                    <div class="text-2xl font-bold" id="error-btc-price">$43,250.00</div>
                    <div class="text-sm text-green-400" id="error-btc-change">+2.45% (24h)</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection