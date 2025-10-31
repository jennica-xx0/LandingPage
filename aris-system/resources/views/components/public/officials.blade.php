@php
    // Mock data for officials
    $captain = (object)[
        'name' => 'Richard B. Bassig',
        'position' => 'Barangay Captain',
        'photo' => '/img/kap.jpg'
    ];

    $kagawads = [
        (object)['name' => 'Hermino O. Dela Cruz', 'position' => 'Barangay Kagawad', 'photo' => '/img/kagawad1.jpg'],
        (object)['name' => 'Angelo Cesar S. Barretto', 'position' => 'Barangay Kagawad', 'photo' => '/img/kagawad2.jpg'],
        (object)['name' => 'Aeron James C. Ingua', 'position' => 'Barangay Kagawad', 'photo' => '/img/kagawad3.jpg'],
        (object)['name' => 'John Paul A. Bulos', 'position' => 'Barangay Kagawad', 'photo' => '/img/kagawad4.jpg'],
        (object)['name' => 'Patrocinia E. Claudio', 'position' => 'Barangay Kagawad', 'photo' => '/img/kagawad5.jpg'],
        (object)['name' => 'Joseph S. Porcalla', 'position' => 'Barangay Kagawad', 'photo' => '/img/kagawad6.jpg'],
        (object)['name' => 'Redd Louise T. Abanes', 'position' => 'Barangay Kagawad', 'photo' => '/img/kagawad7.jpg'],
    ];
@endphp

<!-- [START BARANGAY OFFICIALS] -->
<div class="bg-[#D2E3EE] py-10 px-2 sm:px-8">
    <div class="container mx-auto">

        <!-- Section Heading -->
        <h2 class="text-4xl sm:text-5xl font-black text-center mb-12 tracking-wide">
            BARANGAY OFFICIALS
        </h2>

        <!-- Barangay Captain (SIZING STANDARDIZED TO KAGAWAD CARD) -->
        <div class="flex justify-center mb-10">
            {{-- FIX: Changed max-w-xs to w-64 and adjusted padding/font sizes to match Kagawad card styling --}}
            <div class="card bg-base-100 shadow-xl w-70 text-center font-semibold"> 
                <figure class="px-6 pt-6"> {{-- Reduced from px-10 to match Kagawad figure padding --}}
                    <img src="{{ asset($captain->photo) }}" alt="{{ $captain->name }}" class="rounded-xl" draggable="false" />
                </figure>
                <div class="card-body items-center text-center p-4"> {{-- Standardized card-body padding --}}
                    <h3 class="card-title text-xl font-semibold">{{ $captain->name }}</h3> {{-- Reduced text size from text-xl to text-base to match Kagawad h3 --}}
                    <p class="text-base font-bold">{{ $captain->position }}</p> {{-- Adjusted font weight/size to match Kagawad p --}}
                </div>
            </div>
        </div>
        <!-- End Barangay Captain -->

        <!-- Kagawad Carousel Section (Kept as is, using w-64) -->
        <div class="relative w-full mx-auto">
            <div id="kagawad-carousel" class="carousel carousel-center w-full p-4 space-x-25 rounded-box">
                @foreach($kagawads as $kagawad)
                <div class="carousel-item">
                    <div class="card bg-base-100 shadow-md w-64">
                        <figure class="px-6 pt-6">
                            <img src="{{ asset($kagawad->photo) }}" alt="{{ $kagawad->name }}" class="rounded-xl" draggable="false" />
                        </figure>
                        <div class="card-body items-center text-center p-4">
                            <h3 class="card-title text-xl font-semibold">{{ $kagawad->name }}</h3>
                            <p class="text-base font-bold">{{ $kagawad->position }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Carousel Navigation Buttons (Enlarged from previous step) -->
            <button id="prev-btn" class="btn btn-circle btn-ghost btn-xl p-4 absolute top-1/2 -translate-y-1/2 left-0 sm:-left-5 z-10">❮</button>
            <button id="next-btn" class="btn btn-circle btn-ghost btn-xl p-4 absolute top-1/2 -translate-y-1/2 right-0 sm:-right-5 z-10">❯</button>
        </div>
    </div>
</div>

<!-- Style tag remains the same -->
<style>
    #kagawad-carousel { cursor: grab; user-select: none; }
    #kagawad-carousel.active { cursor: grabbing; }
</style>

<!-- JavaScript remains the same -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const carousel = document.getElementById('kagawad-carousel');
        if (!carousel) return;

        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        if (prevBtn && nextBtn) {
            nextBtn.addEventListener('click', () => carousel.scrollBy({ left: carousel.clientWidth, behavior: 'smooth' }));
            prevBtn.addEventListener('click', () => carousel.scrollBy({ left: -carousel.clientWidth, behavior: 'smooth' }));
        }

        let isDown = false;
        let startX;
        let scrollLeft;
        carousel.addEventListener('mousedown', (e) => {
            isDown = true;
            carousel.classList.add('active');
            startX = e.pageX - carousel.offsetLeft;
            scrollLeft = carousel.scrollLeft;
        });
        carousel.addEventListener('mouseleave', () => {
            isDown = false;
            carousel.classList.remove('active');
        });
        carousel.addEventListener('mouseup', () => {
            isDown = false;
            carousel.classList.remove('active');
        });
        carousel.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - carousel.offsetLeft;
            const walk = (x - startX) * 2;
            carousel.scrollLeft = scrollLeft - walk;
        });
    });
</script>
<!-- [END BARANGAY OFFICIALS] -->