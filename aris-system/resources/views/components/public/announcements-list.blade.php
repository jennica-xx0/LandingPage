@php
    $announcements = [
        (object) [
            'date' => '2025-10-21',
            'title' => 'MAGANDANG UMAGA, DAANG BAKAL!',
            'content' => 'Mag-ingat po sa umuusong sakit na Influenza (Trangkaso). Ugaliing maghugas ng kamay, uminom ng maraming tubig, at magsuot ng face mask kung kinakailangan.'
        ],
        (object) [
            'date' => '2025-10-17',
            'date_range' => '17-20', 
            'title' => 'GUSTO MO BA MAG TUPAD?',
            'content' => 'Tara na, kabarangay! Isa itong magandang pagkakataon para sa karagdagang hanapbuhay at tulong mula sa pamahalaan.'
        ],
        (object) [
            'date' => '2025-10-13',
            'title' => 'TARA, BASA TAYO!',
            'content' => 'Alam niyo ba? May Mini Library tayo sa 2nd Floor ng Barangay Daang Bakal Hall! Bukas ito para sa lahat ng estudyante at residente ng Barangay Daang Bakal.'
        ],
        (object) [
            'date' => '2025-10-10',
            'title' => 'WORLD HEALTH DAY',
            'content' => 'Nakikiisa ang Barangay Daang Bakal sa pagdiriwang ng World Mental Health Day! Tandaan -- ang kalusugang pang-isipan ay kasinghalaga ng kalusugang pisikal.'
        ],
        (object) [
            'date' => '2025-10-07',
            'title' => 'REHAB REFERRAL DESK',
            'content' => 'Nakikiisa ang Barangay Daang Bakal sa pagdiriwang ng World Mental Health Day! Tandaan -- ang kalusugang pang-isipan ay kasinghalaga ng kalusugang pisikal.'
        ],
    ];
@endphp

<div class="bg-base-100 py-16 px-4 sm:px-8">
    <div class="container mx-auto max-w-6xl">

        <h2 class="text-4xl sm:text-4xl font-bold font-black text-center mb-12 tracking-wide mb-8">ANNOUNCEMENTS</h2>

        <div class="max-w-6xl mx-auto px-5 flex flex-row gap-4 items-center">
            <img src="{{ asset('/img/announcement.png') }}" alt="Announcement Icon" class="h-15 w-15 mr-2">

            <div class="form-control w-full">
                <label class="relative block w-full">
                    <span class="sr-only">Search</span>
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                       
                        <svg class="h-5 w-5 text-slate-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 104.5 4.5a7.5 7.5 0 0012.15 12.15z" />
                        </svg>
                    </span>
                    <input type="text" name="q" placeholder="Search announcements..."
                        class="input input-bordered w-full bg-transparent pl-10 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-slate-300" />
                </label>
            </div>
        </div>

        <div class="max-w-6xl mx-auto mt-6 px-5">
            <a href="#"
                class="inline-block border-b-2 border-blue-800 text-blue-800 font-bold text-sm tracking-wider pb-1 px-2 rounded-t-md hover:bg-blue-50 transition-colors">ALL</a>
        </div>

        <div class="space-y-6 max-w-6xl mx-auto mt-4">

            @forelse($announcements as $announcement)
                <div
                    class="flex items-start space-x-6 p-4 pl-0 rounded-lg hover:bg-base-200 transition-colors duration-200 cursor-pointer">
                    <div class="text-center flex-shrink-0 w-20">
                        <p class="text-xl font-bold text-blue-800">
                            {{ \Carbon\Carbon::parse($announcement->date)->format('M') }}</p>
                        <p class="text-2xl font-bold">
                            {{ $announcement->date_range ?? \Carbon\Carbon::parse($announcement->date)->format('d') }}</p>
                    </div>
                    <div class="border-l-2 border-gray-300 pl-6">
                        <h3 class="font-bold text-lg uppercase tracking-wide">{{ $announcement->title }}</h3>
                        <div class="flex items-center text-sm text-gray-500 mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Posted on: {{ \Carbon\Carbon::parse($announcement->date)->format('F d, Y') }}</span>
                        </div>
                        <p class="mt-2">{{ $announcement->content }}</p>
                    </div>
                </div>
            @empty
                <div class="text-center py-10 text-gray-500">
                    <p>No announcements found.</p>
                </div>
            @endforelse

            <p class="text-center pt-8 max-w-4xl mx-auto">
                Para sa karagdagang mga update, bisitahin lamang ang Opisyal na Facebook Page ng Barangay Daang Bakal!
            </p>
        </div>
    </div>
</div>