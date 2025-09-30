@extends('layouts.main')
@section('title', 'JeWePe - Home')
@section('css')

@endsection
@section('content')
    <div>
        <!-- Hero Section -->
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
                <span class="block">Professional Wedding</span>
                <span class="block text-indigo-600">Organizer</span>
            </h1>
            <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                Wujudkan Pernikahan Impian Bersama Kami
            </p>
        </div>

        <!-- Catalog Section -->
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                <!-- Product Card 1 -->
                @foreach ($catalogs as $item)
                    <a href="/detail/{{ $item->catalog_id }}" class="group">
                        <div
                            class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                            <img src="{{ $item->image }}" alt="{{ $item->title }}"
                                class="w-full h-full object-center object-cover group-hover:opacity-75">
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">{{ $item->title }}</h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">Rp{{ number_format($item->price) }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
