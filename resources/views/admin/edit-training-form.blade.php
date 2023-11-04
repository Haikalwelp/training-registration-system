@extends('layouts.app') <!-- Extend the master.blade.php file -->

@section('content') <!-- Start the content section -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border rounded shadow p-4">
              <div class="border-b p-2">
                <!-- Header content goes here -->
                Edit training
              </div>
              <div class="p-2">
                <!-- Body content goes here -->
                @if(Session::has('message'))
                  <div class="bg-green-500 text-white px-4 py-2 rounded">
                    <!-- Alert content goes here -->
                    {{ Session::get('message') }}
                  </div>
                @endif
                <form method="post" action="{{ route('admin.edit-training',$training->id) }}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                    <table class="min-w-full divide-y divide-gray-200">
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Training Name</td>
                            <td class="px-6 py-4">
                                <input type="text" name="name" value="{{ old('name', $training->name) }}" class="p-2 border rounded-md w-full">
                                @error('name')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <!-- ... similar for other rows ... -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Description</td>
                            <td class="px-6 py-4">
                                <textarea name="description" rows="4" class="p-2 border rounded-md w-full">{{ old('description', $training->description) }}</textarea>
                                @error('description')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>                    
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Trainer</td>
                            <td class="px-6 py-4">
                                <input type="text" name="trainer" value="{{ old('trainer', $training->trainer) }}" class="p-2 border rounded-md w-full">
                                @error('trainer')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Photo</td>
                            <td class="px-6 py-4">
                                <input type="file" name="photo" class="p-2 border rounded-md w-full">
                                @error('photo')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Price</td>
                            <td class="px-6 py-4">
                                <input type="number" name="price" value="{{ old('price', $training->price) }}" class="p-2 border rounded-md w-full" min="0.00" max="10000.00" step="0.01">
                                @error('price')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Date</td>
                            <td class="px-6 py-4">
                                <input type="date" name="date" value="{{ old('date', $training->date) }}" class="p-2 border rounded-md w-full">
                                @error('date')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Time</td>
                            <td class="px-6 py-4">
                                <input type="time" name="time" value="{{ old('time', $training->time) }}" class="p-2 border rounded-md w-full">
                                @error('time')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Place</td>
                            <td class="px-6 py-4">
                                <input type="text" name="place" value="{{ old('place', $training->place) }}" class="p-2 border rounded-md w-full">
                                @error('place')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Capacity</td>
                            <td class="px-6 py-4">
                                <input type="number" name="capacity" value="{{ old('capacity', $training->capacity) }}" class="p-2 border rounded-md w-full" min="0">
                                @error('capacity')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Duration</td>
                            <td class="px-6 py-4">
                                <input type="number" name="duration" value="{{ old('duration', $training->duration) }}" class="p-2 border rounded-md w-full" min="0">
                                @error('duration')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">Status</td>
                            <td class="px-6 py-4">
                                <select name="status" class="p-2 border rounded-md w-full">
                                    <option value="available" {{ old('status', $training->status) == 'available' ? 'selected' : '' }}>Available</option>
                                    <option value="not available" {{ old('status', $training->status) == 'not available' ? 'selected' : '' }}>Not Available</option>
                                </select>
                                @error('status')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4"></td>
                            <td class="px-6 py-4">
                                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                                    Save
                                </button>
                                
                                <button onclick="event.preventDefault(); location.href='{{ route('admin.training-list') }}';" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                                    Cancel
                                </button>
                                
                            </td>
                        </tr>
                    </tbody>
                    </table>
                </form>

              </div>
            </div>
        </div>
    </div>
@endsection <!-- End the content section -->
