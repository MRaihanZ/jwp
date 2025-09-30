@extends('layouts.main')
@section('title', 'JeWePe - Order')
@section('css')

@endsection
@section('content')
    <div class="min-h-screen">
        <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Wedding Order</h1>
                    <p class="mt-1 text-sm text-gray-600">Manage and track all client submissions.</p>
                </div>
            </div>

            <!-- Inquiry Table -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Client Details</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Wedding Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Submitted</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">

                            @foreach ($orders as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $item->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $item->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $item->wedding_date }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            @if ($item->status === 'requested') class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800" @elseif($item->status === 'approved') class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800" @else class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800" @endif>
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->created_at }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('admin.order.update', ['firstSlug' => $item->order_id, 'secondSlug' => 'approved']) }}"
                                            class="text-green-600 hover:text-green-900">Terima</a>
                                        <span class="mx-1">|</span>
                                        <a href="{{ route('admin.order.update', ['firstSlug' => $item->order_id, 'secondSlug' => 'rejected']) }}"
                                            class="text-red-600 hover:text-red-900">Tolak</a>
                                        <span class="mx-1">|</span>
                                        <a href="{{ route('admin.order.delete', ['slug' => $item->order_id]) }}"
                                            class="text-red-600 hover:text-red-900">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
