<!-- [START BARANGAY OFFICIALS] -->
<div class="bg-[#D2E3EE] py-16 px-4 sm:px-8">
    <div class="container mx-auto">

        <!-- Section Heading -->
        <h2 class="text-4xl sm:text-4xl font-bold text-center mb-12 tracking-wide">
            BARANGAY OFFICIALS
        </h2>

        <!-- Barangay Captain -->
        @if($captain)
        <div class="flex justify-center mb-12">
            <div class="card bg-base-100 shadow-xl w-80 max-w-xs text-center">
                <figure class="px-8 pt-8">
                    <img src="{{ $captain->photo_path ? asset('storage/' . $captain->photo_path) : '/img/kap.jpg' }}" alt="{{ $captain->first_name }} {{ $captain->last_name }}" class="rounded-xl" />
                </figure>
                <div class="card-body items-center text-center">
                    <h3 class="card-title font-bold">{{ $captain->first_name }} {{ $captain->middle_initial }} {{ $captain->last_name }}</h3>
                    <p class="text-sm font-medium">{{ $captain->position }}</p>
                </div>
            </div>
        </div>
        @endif
        <!-- End Barangay Captain -->

        <!-- Kagawad Carousel Section -->
        @if($kagawads->isNotEmpty())
        <div class="relative w-full max-w-6xl mx-auto">
            <div id="kagawad-carousel" class="carousel carousel-center w-full p-4 space-x-4 rounded-box">
                @foreach($kagawads as $kagawad)
                <div class="carousel-item">
                    <div class="card bg-base-100 shadow-md w-64">
                        <figure class="px-10 pt-6">
                            <img src="{{ $kagawad->photo_path ? asset('storage/' . $kagawad->photo_path) : '/img/kagawad-placeholder.jpg' }}" alt="{{ $kagawad->first_name }} {{ $kagawad->last_name }}" class="rounded-xl h-48 w-full object-cover" />
                        </figure>
                        <div class="card-body items-center text-center p-4">
                            <h3 class="card-title text-base font-bold">{{ $kagawad->first_name }} {{ $kagawad->middle_initial }} {{ $kagawad->last_name }}</h3>
                            <p class="text-s space-x-4 font-medium">{{ $kagawad->position }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Carousel Navigation Buttons -->
             <button id="prev-btn" class="btn btn-circle btn-ghost absolute top-1/2 -translate-y-1/2 left-0 sm:-left-4">❮</button>
            <button id="next-btn" class="btn btn-circle btn-ghost absolute top-1/2 -translate-y-1/2 right-0 sm:-right-4">❯</button>
        </div>
        @endif
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