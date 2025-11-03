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
        (object)['name' => 'Juan C. Dela Cruz 5', 'position' => 'Barangay Kagawad', 'photo' => '/img/kagawad5.jpg'],
        (object)['name' => 'Juan C. Dela Cruz 6', 'position' => 'Barangay Kagawad', 'photo' => '/img/kagawad6.jpg'],
        (object)['name' => 'Juan C. Dela Cruz 7', 'position' => 'Barangay Kagawad', 'photo' => '/img/kagawad7.jpg'],
    ];
@endphp

<!-- [START BARANGAY OFFICIALS] -->
<div class="bg-[#D2E3EE] py-16 px-4 sm:px-8">
    <div class="container mx-auto">

        <!-- Section Heading -->
        <h2 class="text-4xl sm:text-5xl font-black text-center mb-12 text-gray-800 tracking-wide">
            BARANGAY OFFICIALS
        </h2>

        <!-- Barangay Captain -->
        <div class="flex justify-center mb-12">
            <div class="card bg-base-100 shadow-xl w-full max-w-xs text-center">
                <figure class="px-10 pt-10">
                    <img src="{{ asset($captain->photo) }}" alt="{{ $captain->name }}" class="rounded-xl" />
                </figure>
                <div class="card-body items-center text-center">
                    <h3 class="card-title font-bold">{{ $captain->name }}</h3>
                    <p class="text-sm font-medium">{{ $captain->position }}</p>
                </div>
            </div>
        </div>
        <!-- End Barangay Captain -->

        <!-- Kagawad Carousel Section -->
        <div class="relative w-full max-w-6xl mx-auto">
            <div id="kagawad-carousel" class="carousel carousel-center w-full p-4 space-x-4 rounded-box">
                @foreach($kagawads as $kagawad)
                <div class="carousel-item">
                    <div class="card bg-base-100 shadow-md w-64">
                        <figure class="px-6 pt-6">
                            <img src="{{ asset($kagawad->photo) }}" alt="{{ $kagawad->name }}" class="rounded-xl" />
                        </figure>
                        <div class="card-body items-center text-center p-4">
                            <h3 class="card-title text-base font-bold">{{ $kagawad->name }}</h3>
                            <p class="text-xs font-medium">{{ $kagawad->position }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Carousel Navigation Buttons -->
            <button id="prev-btn" class="btn btn-circle btn-ghost absolute top-1/2 -translate-y-1/2 left-0 sm:-left-4">❮</button>
            <button id="next-btn" class="btn btn-circle btn-ghost absolute top-1/2 -translate-y-1/2 right-0 sm:-right-4">❯</button>
        </div>
    </div>
</div>

<!-- Add this style tag for the grabbing cursor effect -->
<style>
    #kagawad-carousel {
        cursor: grab;
        user-select: none; /* Prevents text selection while dragging */
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }
    #kagawad-carousel.active {
        cursor: grabbing;
    }
</style>

<!-- MODIFIED JavaScript for Draggable Carousel -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const carousel = document.getElementById('kagawad-carousel');
        if (!carousel) return;

        // --- 1. Existing Button Logic ---
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        if (prevBtn && nextBtn) {
            nextBtn.addEventListener('click', () => carousel.scrollBy({ left: carousel.clientWidth, behavior: 'smooth' }));
            prevBtn.addEventListener('click', () => carousel.scrollBy({ left: -carousel.clientWidth, behavior: 'smooth' }));
        }

        // --- 2. New Draggable Logic ---
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
            const walk = (x - startX) * 2; // Multiplier makes dragging feel more responsive
            carousel.scrollLeft = scrollLeft - walk;
        });
    });
</script>
<!-- [END BARANGAY OFFICIALS] -->