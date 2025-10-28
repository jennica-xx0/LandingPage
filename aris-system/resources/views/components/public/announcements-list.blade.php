<!-- resources/views/components/public/announcements-list.blade.php -->
<div class="bg-base-100 py-16 px-4 sm:px-8">
    <div class="container mx-auto max-w-5xl">

        <!-- Section Heading -->
        <h2 class="text-4xl font-bold text-center mb-8">ANNOUNCEMENTS</h2>

        <!-- Search Input (transparent + icon inside) -->
        <div class="max-w-4xl mx-auto px-5 flex flex-row gap-4">
            <img src="/img/announcement.png" alt="City Seal" class="h-10  ">
            <div class="form-control mb-10 w-full">
                <label class="relative block w-full">
                    <!-- icon -->
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-slate-500 pointer-events-none"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35M16.65 10.5a6.15 6.15 0 11-12.3 0 6.15 6.15 0 0112.3 0z" />
                    </svg>

                    <input type="text" name="q" placeholder="Search announcements..."

                        class="input input-bordered w-full bg-transparent pl-10 pr-3
                  focus:outline-none focus:ring-2 focus:ring-slate-300" />
                </label>
            </div>
        </div>

        <!-- Announcements List -->
        <div class="space-y-6 max-w-4xl mx-auto">

            <!-- List Item 1 -->
            <div class="flex items-start space-x-6 p-4 pl-0 rounded-lg hover:bg-base-200 transition-colors duration-200 cursor-pointer">
                <div class="text-center flex-shrink-0 w-20">
                    <p class="text-xl font-bold text-primary">OCT</p>
                    <p class="text-4xl font-bold">21</p>
                </div>
                <div class="border-l-2 border-gray-300 pl-6">
                    <h3 class="font-bold text-lg uppercase tracking-wide">BARANGAY ASSEMBLY DAY FOR SECOND SEMESTER 2024</h3>
                    <p class="text-gray-600 mt-1">
                        All residents are invited to attend the Barangay Assembly for the second semester of 2024. This will be held at the Barangay Daang Bakal covered court...
                    </p>
                </div>
            </div>

            <!-- List Item 2 -->
            <div class="flex items-start space-x-6 p-4 pl-0 rounded-lg hover:bg-base-200 transition-colors duration-200 cursor-pointer">
                <div class="text-center flex-shrink-0 w-20">
                    <p class="text-xl font-bold text-primary">OCT</p>
                    <p class="text-4xl font-bold">18</p>
                </div>
                <div class="border-l-2 border-gray-300 pl-6">
                    <h3 class="font-bold text-lg uppercase tracking-wide">FREE ANTI-RABIES VACCINATION DRIVE</h3>
                    <p class="text-gray-600 mt-1">
                        In cooperation with the City Veterinary Office, we will be conducting a free anti-rabies vaccination for cats and dogs this Saturday...
                    </p>
                </div>
            </div>

            <!-- List Item 3 -->
            <div class="flex items-start space-x-6 p-4 pl-0 rounded-lg hover:bg-base-200 transition-colors duration-200 cursor-pointer">
                <div class="text-center flex-shrink-0 w-20">
                    <p class="text-xl font-bold text-primary">OCT</p>
                    <p class="text-4xl font-bold">15</p>
                </div>
                <div class="border-l-2 border-gray-300 pl-6">
                    <h3 class="font-bold text-lg uppercase tracking-wide">BIDA PROGRAM: BARANGAY CLEAN-UP DRIVE</h3>
                    <p class="text-gray-600 mt-1">
                        Join us in maintaining the cleanliness of our community. The scheduled clean-up drive for Zones 1 and 2 will be on Friday morning...
                    </p>
                </div>
            </div>

        </div>

    </div>
</div>