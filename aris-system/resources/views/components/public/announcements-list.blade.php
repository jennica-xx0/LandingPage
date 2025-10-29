
<!-- resources/views/components/public/announcements-list.blade.php -->
<div class="bg-base-100 py-16 px-4 sm:px-8">
    <div class="container mx-auto max-w-5xl">

        <!-- Section Heading -->
        <h2 class="text-4xl font-bold text-center mb-8">ANNOUNCEMENTS</h2>

        <!-- Search Input -->
        <div class="max-w-4xl mx-auto px-5 flex flex-row gap-4">
            <img src="/img/announcement.png" alt="City Seal" class="h-10">
            <div class="form-control w-full">
                <label class="relative block w-full">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-slate-500 pointer-events-none" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16.65 10.5a6.15 6.15 0 11-12.3 0 6.15 6.15 0 0112.3 0z" />
                    </svg>
                    <input type="text" name="q" placeholder="Search announcements..." class="input input-bordered w-full bg-transparent pl-10 pr-3 focus:outline-none focus:ring-2 focus:ring-slate-300" />
                </label>
            </div>
        </div>

        <!-- MODIFIED: "ALL" Filter Button (now a clickable link) -->
        <div class="max-w-4xl mx-auto mt-6 px-5">
            <a href="#" class="inline-block border-b-2 border-blue-800 text-blue-800 font-bold text-sm tracking-wider pb-1 px-2 rounded-t-md hover:bg-blue-50 transition-colors">ALL</a>
        </div>

        <!-- Announcements List -->
        <div class="space-y-6 max-w-4xl mx-auto mt-4">

            <!-- List Item 1 -->
            <div class="flex items-start space-x-6 p-4 pl-0 rounded-lg hover:bg-base-200 transition-colors duration-200 cursor-pointer">
                <div class="text-center flex-shrink-0 w-20">
                    <p class="text-xl font-bold text-blue-800">OCT</p>
                    <!-- MODIFIED: Resized date number -->
                    <p class="text-3xl font-bold">21</p>
                </div>
                <div class="border-l-2 border-gray-300 pl-6">
                    <h3 class="font-bold text-lg uppercase tracking-wide">MAGANDANG UMAGA, DAANG BAKAL!</h3>
                    <div class="flex items-center text-sm text-gray-500 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" /></svg>
                        <span>Posted on: October 21, 2024</span>
                    </div>
                    <p class="text-gray-600 mt-2">
                        Mag-ingat po sa umuusong sakit na Influenza (Trangkaso). Ugaliing maghugas ng kamay, uminom ng maraming tubig, at magsuot ng face mask kung kinakailangan.
                    </p>
                </div>
            </div>

            <!-- List Item 2 -->
            <div class="flex items-start space-x-6 p-4 pl-0 rounded-lg hover:bg-base-200 transition-colors duration-200 cursor-pointer">
                <div class="text-center flex-shrink-0 w-20">
                    <p class="text-xl font-bold text-blue-800">OCT</p>
                    <!-- MODIFIED: Resized date range number -->
                    <p class="text-2xl font-bold">17-20</p>
                </div>
                <div class="border-l-2 border-gray-300 pl-6">
                    <h3 class="font-bold text-lg uppercase tracking-wide">GUSTO MO BA MAG TUPAD?</h3>
                    <div class="flex items-center text-sm text-gray-500 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" /></svg>
                        <span>Duration: Oct 17 to Oct 20, 2024</span>
                    </div>
                    <p class="text-gray-600 mt-2">
                        Tara na, kabarangay! Isa itong magandang pagkakataon para sa karagdagang hanapbuhay at tulong mula sa pamahalaan.
                    </p>
                </div>
            </div>

            <!-- List Item 3 -->
            <div class="flex items-start space-x-6 p-4 pl-0 rounded-lg hover:bg-base-200 transition-colors duration-200 cursor-pointer">
                <div class="text-center flex-shrink-0 w-20">
                    <p class="text-xl font-bold text-blue-800">OCT</p>
                    <!-- MODIFIED: Resized date number -->
                    <p class="text-3xl font-bold">13</p>
                </div>
                <div class="border-l-2 border-gray-300 pl-6">
                    <h3 class="font-bold text-lg uppercase tracking-wide">TARA, BASA TAYO!</h3>
                    <div class="flex items-center text-sm text-gray-500 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" /></svg>
                        <span>Posted on: October 13, 2024</span>
                    </div>
                    <p class="text-gray-600 mt-2">
                        Alam niyo ba? May Mini Library tayo sa 2nd Floor ng Barangay Daang Bakal Hall! Bukas ito para sa lahat ng estudyante at residente ng Barangay Daang Bakal.
                    </p>
                </div>
            </div>

            <p class="text-center pt-8 max-w-4xl mx-auto">
                Para sa karagdagang mga update, bisitahin lamang ang Opisyal na Facebook Page ng Barangay Daang Bakal!
            </p>
        </div>

    </div>
</div>
