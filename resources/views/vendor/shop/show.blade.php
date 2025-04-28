@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
        <div class="p-6">
            <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">{{ $shop->name }}</h1>
            <!-- Add your shop details here -->
        </div>
    </div>
</div>
@endsection