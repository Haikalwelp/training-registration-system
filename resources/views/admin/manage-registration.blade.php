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
        List of registrations
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
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-6 py-4">#</th>
                                    <th scope="col" class="px-6 py-4">Registration Date</th>
                                    <th scope="col" class="px-6 py-4">Applicant Name</th>
                                    <th scope="col" class="px-6 py-4">Training</th>
                                    <th scope="col" class="px-6 py-4">Date</th>
                                    <th scope="col" class="px-6 py-4">Status</th>
                                    <th scope="col" class="px-6 py-4">Proof of Payment</th>
                                    <th scope="col" class="px-6 py-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=0)
                                @foreach($trainingRegistrations as $trainingRegistration)
                                <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{ ++$i }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $trainingRegistration->created_at }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $trainingRegistration->user->name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $trainingRegistration->training->name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $trainingRegistration->training->date }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        @if($trainingRegistration->status == 0)
                                        Pending
                                        @elseif($trainingRegistration->status == 1)
                                        Approved
                                        @elseif($trainingRegistration->status == 2)
                                        Rejected
                                        @else
                                        Unknown Status
                                        @endif

                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">


                                        <a href="{{ asset('uploads/proof/'.$trainingRegistration->proofofpayment) }}" class="">{{ $trainingRegistration->proofofpayment }}</a>


                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <form method="post" action=" {{ route('admin.edit-registration-status',$trainingRegistration->id) }}">
                                            <input type="hidden" name="_method" value="PATCH">
                                            @csrf
                                            <button type="submit" name="submit" value="approve" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Approve</a>
                                                <button type="submit" name="submit" value="reject" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Reject</button>
                                        </form>
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