@extends('layouts.app') <!-- Extend the master.blade.php file -->

@section('content') <!-- Start the content section -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div> --}}
            <div class="bg-white border rounded shadow p-4">
              <div class="border-b p-2">
                <!-- Header content goes here -->
                List of all trainings
              </div>
              <div class="p-2">
                <!-- Body content goes here -->
                @if(Session::has('message'))
                  <div class="bg-green-500 text-white px-4 py-2 rounded">
                    <!-- Alert content goes here -->
                    {{ Session::get('message') }}
                  </div>
                @endif

                
                <div class="flex flex-col">
                  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 w-full">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                      <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                          <thead
                            class="border-b font-medium dark:border-neutral-500">
                            <tr>
                              <th scope="col" class="px-6 py-4">#</th>
                              <th scope="col" class="px-6 py-4">Name</th>
                              <th scope="col" class="px-6 py-4">Description</th>
                              <th scope="col" class="px-6 py-4">Trainer</th>
                              <th scope="col" class="px-6 py-4">Photo</th>
                              <th scope="col" class="px-6 py-4">Price</th>
                              <th scope="col" class="px-6 py-4">Date</th>
                              <th scope="col" class="px-6 py-4">Time</th>
                              <th scope="col" class="px-6 py-4">Place</th>
                              <th scope="col" class="px-6 py-4">Capacity</th>
                              <th scope="col" class="px-6 py-4">Duration</th>
                              <th scope="col" class="px-6 py-4">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php($i=0)
                            @foreach($trainings as $training)
                            <tr
                              class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                              <td class="whitespace-nowrap px-6 py-4 font-medium">{{ ++$i }}</td>
                              <td class="whitespace-nowrap px-6 py-4">{{ $training->name }}</td>
                              <td class="whitespace-nowrap px-6 py-4">{{ $training->description }}</td>
                              <td class="whitespace-nowrap px-6 py-4">{{ $training->trainer }}</td>
                              <td class="whitespace-nowrap px-6 py-4">
                                @if ($training->photo)
                                  <img src="{{ asset('images/trainings/' . $training->photo) }}" alt="">
                                @else
                                  <img src="{{ asset('images/trainings/default.jpg') }}" alt="">
                                @endif
                              </td>
                              <td class="whitespace-nowrap px-6 py-4">{{ $training->price }}</td>
                              <td class="whitespace-nowrap px-6 py-4">{{ $training->date }}</td>
                              <td class="whitespace-nowrap px-6 py-4">{{ $training->time }}</td>
                              <td class="whitespace-nowrap px-6 py-4">{{ $training->place }}</td>
                              <td class="whitespace-nowrap px-6 py-4">{{ $training->capacity }}</td>
                              <td class="whitespace-nowrap px-6 py-4">{{ $training->duration }}</td>
                              <td class="whitespace-nowrap px-6 py-4">{{ $training->status }}</td>
                              <td class="whitespace-nowrap px-6 py-4">
                                
                               
                                  <a href=" {{ route('user.registration-form',$training->id) }} " class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Register</a>
                                  


                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection <!-- End the content section -->
