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
                    <img src="https://plus.unsplash.com/premium_photo-1663076211121-36754a46de8d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                        alt="A pair of red and white running shoes." class="w-full h-full object-center object-cover">
                </div>

                <!-- Product info -->
                <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
                    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">Wedding Standard</h1>

                    <div class="mt-3">
                        <p class="text-3xl text-gray-900">Rp50.000.000</p>
                    </div>

                    <div class="mt-6">
                        <h3 class="sr-only">Description</h3>
                        <div class="space-y-6 text-base text-gray-700">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam suscipit, lectus sed auctor
                                posuere, ligula sem consequat nunc, a vehicula lectus odio ac purus. Suspendisse consequat
                                urna ac enim imperdiet scelerisque sed at urna. Nulla mattis malesuada vehicula. Maecenas
                                ultrices ipsum sed lectus facilisis vehicula. Sed faucibus at ipsum sed fringilla. Sed quis
                                mi porttitor, tempus massa nec, egestas orci. Curabitur sollicitudin turpis vel nibh
                                pellentesque, sit amet porttitor sem ultricies. Curabitur suscipit, velit et finibus
                                finibus, arcu justo finibus diam, a elementum ante felis ac felis. Donec vitae elementum
                                lectus. Ut a maximus tellus. Sed porttitor quam tellus, vel fermentum nibh dignissim vel.
                                Nunc vitae metus tincidunt, ultricies ligula non, vestibulum dolor. Cras massa urna, dictum
                                nec tincidunt at, rutrum sit amet libero. Mauris fermentum congue nunc, sed vulputate sapien
                                imperdiet ut. Donec ac venenatis lectus, sit amet aliquam mi. Proin nec pellentesque purus.
                            </p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <!-- Status -->
                        <div class="flex items-center">
                            <h3 class="text-sm text-gray-600 font-medium me-3">Status</h3>
                            <div class="mt-2 flex items-center">
                                <!-- Example for 'available' status -->
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    Available
                                </span>

                                <!-- Example for 'unavailable' status (commented out) -->
                                <!--
                                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                                                    Unavailable
                                                                </span>
                                                                -->
                            </div>
                        </div>
                    </div>
                    <div class="mt-10 flex">
                        <button type="submit"
                            class="max-w-xs flex-1 bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:w-full">
                            Booking
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
