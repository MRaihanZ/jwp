@extends('layouts.main')
@section('title', 'JeWePe - Product Detail')
@section('css')

@endsection
@section('content')
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
                <!-- Image gallery -->
                <div class="w-full aspect-w-1 aspect-h-1 rounded-lg overflow-hidden">
                    <!-- Main Image -->
                    <img src="{{ $item->image }}" alt="{{ $item->title }}" class="w-full h-full object-center object-cover">
                </div>

                <!-- Product info -->
                <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
                    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">{{ $item->title }}</h1>

                    <div class="mt-3">
                        <p class="text-3xl text-gray-900">Rp{{ number_format($item->price) }}</p>
                    </div>

                    <div class="mt-6">
                        <h3 class="sr-only">Description</h3>
                        <div class="space-y-6 text-base text-gray-700">
                            <p>
                                {{ $item->description }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <!-- Status -->
                        <div class="flex items-center">
                            <h3 class="text-sm text-gray-600 font-medium me-3">Status</h3>
                            <div class="mt-2 flex items-center">
                                <!-- Example for 'available' status -->
                                @if ($item->status === 'available')
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                        Available
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                        Unavailable
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mt-10 flex">
                        <button type="button"
                            class="max-w-xs flex-1 bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:w-full"
                            id="bookingFormBtn">
                            Booking
                        </button>
                    </div>
                </div>
            </div>
            <div class="min-h-screen hidden items-center justify-center p-4" id="order-form-section">
                <div class="w-full max-w-lg bg-white rounded-lg shadow-md p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Form</h2>

                    <form method="POST" action="{{ route('order', request()->route('slug')) }}">
                        @csrf
                        <!-- Name -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                Nama
                            </label>
                            <input
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                id="name" name="name" type="text" placeholder="Nama..." maxlength="50" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                Email
                            </label>
                            <input
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                id="email" name="email" type="email" placeholder="email@example.com" required>
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="phone_number">
                                Nomor Telp
                            </label>
                            <input
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                id="phone_number" name="phone_number" type="tel" placeholder="08123-4567-891"
                                maxlength="20">
                        </div>

                        <!-- Wedding Date -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="wedding_date">
                                Tanggal Acara
                            </label>
                            <input
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                id="wedding_date" name="wedding_date" type="date">
                        </div>

                        <!-- Address -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                                Alamat
                            </label>
                            <textarea
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                id="address" rows="3" name="address" placeholder="Alamat..."></textarea>
                        </div>

                        <!-- Note -->
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="note">
                                Note
                            </label>
                            <textarea
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                id="note" rows="4" name="note" placeholder="Note..."></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end">
                            <button
                                class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-200"
                                type="submit">
                                Kirim
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        const btn = document.getElementById("bookingFormBtn");
        const element = document.getElementById("order-form-section");

        btn.addEventListener("click", () => {
            if (element.style.display === "none" || element.style.display === "") {
                element.style.display = "flex";
                btn.textContent = "Cancel";
            } else {
                element.style.display = "none";
                btn.textContent = "Booking";
            }
        });
    </script>
@endsection
