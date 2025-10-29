
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
                    <img src="/img/kap.jpg" alt="Barangay Captain" class="rounded-xl" />
                </figure>
                <div class="card-body items-center text-center">
                    <h3 class="card-title font-bold">Richard B. Bassig</h3>
                    <p class="text-sm font-medium">Barangay Captain</p>
                </div>
            </div>
        </div>
        <!-- End Barangay Captain -->

        <!-- Kagawad Carousel Section with Controls -->
        <div class="relative w-full max-w-6xl mx-auto">
            <div id="kagawad-carousel" class="carousel carousel-center w-full p-4 space-x-4 rounded-box">

                <!-- Kagawad 1 -->
                <div class="carousel-item">
                    <div class="card bg-base-100 shadow-md w-64">
                        <figure class="px-6 pt-6">
                            <img src="/img/kagawad1.jpg" alt="Hermino O. Dela Cruz" class="rounded-xl" />
                        </figure>
                        <div class="card-body items-center text-center p-4">
                            <h3 class="card-title text-base font-bold">Hermino O. Dela Cruz</h3>
                            <p class="text-xs font-medium">Barangay Kagawad</p>
                        </div>
                    </div>
                </div>

                <!-- Kagawad 2 -->
                <div class="carousel-item">
                    <div class="card bg-base-100 shadow-md w-64">
                        <figure class="px-6 pt-6">
                            <img src="/img/kagawad2.jpg" alt="Angelo Cesar S. Barretto" class="rounded-xl" />
                        </figure>
                        <div class="card-body items-center text-center p-4">
                            <h3 class="card-title text-base font-bold">Angelo Cesar S. Barretto</h3>
                            <p class="text-xs font-medium">Barangay Kagawad</p>
                        </div>
                    </div>
                </div>

                <!-- Kagawad 3 -->
                <div class="carousel-item">
                    <div class="card bg-base-100 shadow-md w-64">
                        <figure class="px-6 pt-6">
                            <img src="/img/kagawad3.jpg" alt="Aeron James C. Ingua" class="rounded-xl" />
                        </figure>
                        <div class="card-body items-center text-center p-4">
                            <h3 class="card-title text-base font-bold">Aeron James C. Ingua</h3>
                            <p class="text-xs font-medium">Barangay Kagawad</p>
                        </div>
                    </div>
                </div>

                <!-- Kagawad 4 -->
                <div class="carousel-item">
                    <div class="card bg-base-100 shadow-md w-64">
                        <figure class="px-6 pt-6">
                            <img src="/img/kagawad4.jpg" alt="John Paul A. Bulos" class="rounded-xl" />
                        </figure>
                        <div class="card-body items-center text-center p-4">
                            <h3 class="card-title text-base font-bold">John Paul A. Bulos</h3>
                            <p class="text-xs font-medium">Barangay Kagawad</p>
                        </div>
                    </div>
                </div>

                <!-- Kagawad 5 -->
                <div class="carousel-item">
                    <div class="card bg-base-100 shadow-md w-64">
                        <figure class="px-6 pt-6">
                            <img src="/img/kagawad5.jpg" alt="Kagawad 5" class="rounded-xl" />
                        </figure>
                        <div class="card-body items-center text-center p-4">
                            <h3 class="card-title text-base font-bold">Juan C. Dela Cruz 5</h3>
                            <p class="text-xs font-medium">Barangay Kagawad</p>
                        </div>
                    </div>
                </div>

                <!-- Kagawad 6 -->
                <div class="carousel-item">
                     <div class="card bg-base-100 shadow-md w-64">
                        <figure class="px-6 pt-6">
                            <img src="/img/kagawad6.jpg" alt="Kagawad 6" class="rounded-xl" />
                        </figure>
                        <div class="card-body items-center text-center p-4">
                            <h3 class="card-title text-base font-bold">Juan C. Dela Cruz 6</h3>
                            <p class="text-xs font-medium">Barangay Kagawad</p>
                        </div>
                    </div>
                </div>

                <!-- Kagawad 7 -->
                <div class="carousel-item">
                    <div class="card bg-base-100 shadow-md w-64">
                        <figure class="px-6 pt-6">
                            <img src="/img/kagawad7.jpg" alt="Kagawad 7" class="rounded-xl" />
                        </figure>
                        <div class="card-body items-center text-center p-4">
                            <h3 class="card-title text-base font-bold">Juan C. Dela Cruz 7</h3>
                            <p class="text-xs font-medium">Barangay Kagawad</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel Navigation Buttons -->
            <button id="prev-btn" class="btn btn-circle btn-ghost absolute top-1/2 -translate-y-1/2 left-0 sm:-left-4">❮</button>
            <button id="next-btn" class="btn btn-circle btn-ghost absolute top-1/2 -translate-y-1/2 right-0 sm:-right-4">❯</button>
        </div>
    </div>
</div>

<!-- JavaScript for Carousel Controls -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const carousel = document.getElementById('kagawad-carousel');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');

        if (carousel && prevBtn && nextBtn) {
            // Scroll by the width of the visible container for a "page by page" scroll
            nextBtn.addEventListener('click', () => {
                carousel.scrollBy({ left: carousel.clientWidth, behavior: 'smooth' });
            });
            prevBtn.addEventListener('click', () => {
                carousel.scrollBy({ left: -carousel.clientWidth, behavior: 'smooth' });
            });
        }
    });
</script>
<!-- [END BARANGAY OFFICIALS] -->

    