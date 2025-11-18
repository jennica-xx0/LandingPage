<div class="bg-[#D2E3EE] py-10 px-4 sm:px-8">
    <div class="container mx-auto">


        <h2 class="text-4xl sm:text-4xl font-bold text-center mb-8 tracking-wide">
            BARANGAY OFFICIALS
        </h2>


        {{-- Static Captain Section --}}
        <div class="flex justify-center mb-8"> {{-- Keeping mb-8 here to space the Captain nicely from the title --}}
            <div class="card bg-base-100 shadow-xl w-70 max-w-xs text-center">
                <figure class="px-8 pt-8">
                    {{-- Static Captain Image --}}
                    <img src="/img/kap.jpg" alt="Barangay Captain" class="rounded-xl" />
                </figure>
                <div class="card-body items-center text-center">
                    <h3 class="card-title font-bold">Richard B. Bassig</h3>
                    <p class="text-sm font-medium">Barangay Captain</p>
                </div>
            </div>
        </div>
       
        <div class="relative w-full max-w-7xl mx-auto">
            {{-- Removed p-4 from the carousel container to start spacing immediately after the Captain --}}
            <div id="kagawad-carousel" class="carousel carousel-center w-full space-x-8 rounded-box">
               
                {{-- Kagawad 1 (Hermino O. Dela Cruz Example) --}}
                <div class="carousel-item">
                    <div class="card bg-base-100 shadow-md w-64 ml-5">
                        <figure class="px-8 pt-6">
                            <img src="https://scontent.fmnl4-4.fna.fbcdn.net/v/t1.15752-9/582018165_1210464940988259_8180293860543631282_n.png?_nc_cat=100&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeGEZ-y2AY4dKz4Wdo62oRfMG11jvCMIjd4bXWO8IwiN3qPXsn08XAvMPdtelF_r6si83ZwsNqEHm90X4Jh-HhIJ&_nc_ohc=51bNZdgwWW4Q7kNvwFUxVm6&_nc_oc=AdmwQE4ecP00GoZbbmXEJ-6ZwKhPWIPYVEOizVHFLavASPlh4ujISi6aeeQ71DgO3Wlz21XoNsksTQ-gApYSt8kR&_nc_zt=23&_nc_ht=scontent.fmnl4-4.fna&oh=03_Q7cD3wE0xVXPJMVi4wJm8Qjbco9prkZzGYSlQvjWwciAu-rIdA&oe=6943A83F" alt="Kagawad 1" class="rounded-xl h-55 w-60 object-cover"/>
                        </figure>
                        <div class="card-body items-center text-center p-4">
                            <h3 class="card-title text-base font-semibold">Hermino O. Dela Cruz</h3>
                            <p class="text-s space-x-4 font-medium">Barangay Kagawad</p>
                        </div>
                    </div>
                </div>


                {{-- Kagawad 2 --}}
                  <div class="carousel-item">
                    <div class="card bg-base-100 shadow-md w-64 mr-2">
                        <figure class="px-8 pt-6">
                            <img src="https://scontent.fmnl4-4.fna.fbcdn.net/v/t1.15752-9/578823699_679250648372124_2396603277643124040_n.png?_nc_cat=102&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeHHXjWFxX3Y7tWswywoc9LQ5KmBU1pCtz_kqYFTWkK3PycFA6-5WxzSHTnPAM9hVLfKYwPlW_pF2gQEz5fAOiDn&_nc_ohc=l6lyREeLp7oQ7kNvwEjgiZO&_nc_oc=AdmsTcqpC9FQDccEg6ZGZbyqIBVf3W5Emr2-4q5FelV1lSeuKawe3-gsoMLaa7e5A5_b2Y2Dt3Abl99ghEoX5Sai&_nc_zt=23&_nc_ht=scontent.fmnl4-4.fna&oh=03_Q7cD3wEoAyPXSEiszih9189w4yGxp7ydYHVz7cLeuXnaMzVxOA&oe=694394DC" alt="Kagawad 1" class="rounded-xl h-55 w-60 object-cover" />
                        </figure>
                        <div class="card-body items-center text-center p-4">
                            <h3 class="card-title text-base font-semibold">Angelo Cesar S. Barretto</h3>
                            <p class="text-s space-x-4 font-medium">Barangay Kagawad</p>
                        </div>
                    </div>
                </div>
               
                {{-- Kagawad 3 --}}
                  <div class="carousel-item">
                    <div class="card bg-base-100 shadow-md w-64 mr-2">
                        <figure class="px-8 pt-6">
                            <img src="https://scontent.fmnl4-2.fna.fbcdn.net/v/t1.15752-9/578731008_2209389612919929_8114556832687415373_n.png?_nc_cat=101&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeHRe0G09rnk1U8HyKLeqIewcyYDy-l1gMFzJgPL6XWAwRsGvY4hObGGMGqx5jiT2RKRO8jvd6peSrIGrNfy4mUJ&_nc_ohc=Rm_0mJ13DFUQ7kNvwEdGP5i&_nc_oc=AdlJvGRHDGXSoHhf8VDMRQFGf0R9WinilMx2Fu4m9KJKG9DggTkr2eVObEcfI9uoVtRfri2sbgXSn59QMeh8OKf4&_nc_zt=23&_nc_ht=scontent.fmnl4-2.fna&oh=03_Q7cD3wHMCFZJYoAuLaiM7vlVAQmazHD16ZMZaqQtQ29I6d1vzQ&oe=69439FC2" alt="Kagawad 1" class="rounded-xl h-55 w-60 object-cover" />
                        </figure>
                        <div class="card-body items-center text-center p-4">
                            <h3 class="card-title text-base font-semibold">Aeron James C. Ingua</h3>
                            <p class="text-s space-x-4 font-medium">Barangay Kagawad</p>
                        </div>
                    </div>
                </div>


                {{-- Kagawad 4 --}}
                   <div class="carousel-item">
                    <div class="card bg-base-100 shadow-md w-64">
                        <figure class="px-8 pt-6">
                            <img src="https://scontent.fmnl4-7.fna.fbcdn.net/v/t1.15752-9/582430510_1547503546599772_826143542478139071_n.png?_nc_cat=108&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeFZZYihqo6V8dxqpE-WzdSa9uNA6vm5Zmz240Dq-blmbCymaWf5_QqFMQgn6KcZMu7717vNar8C-vMusPK6Q68I&_nc_ohc=5RsdG-s0GAwQ7kNvwG_IL-b&_nc_oc=AdmH4FPcWy71fmWMDu0haQ9EiTvDRKDT7c0-nTjvRuSPlWn7RIdZfWvXYsHTvRLcpiQI5GgLvu_HxnCeT1LiAGhN&_nc_zt=23&_nc_ht=scontent.fmnl4-7.fna&oh=03_Q7cD3wG-i3Py-W7eYdVVdiNaf8kFtnaEyyNZr6E2pK34sO522Q&oe=69437FD8" alt="Kagawad 1" class="rounded-xl h-55 w-60 object-cover" />
                        </figure>
                        <div class="card-body items-center text-center p-4">
                            <h3 class="card-title text-base font-semibold">John Paul A. Bulos</h3>
                            <p class="text-s space-x-4 font-medium">Barangay Kagawad</p>
                        </div>
                    </div>
                </div>
               
                {{-- Kagawad 5 --}}
                  <div class="carousel-item">
                    <div class="card bg-base-100 shadow-md w-64">
                        <figure class="px-8 pt-6">
                            <img src="https://scontent.fmnl4-6.fna.fbcdn.net/v/t1.15752-9/581988518_2021745981996140_1793409315719316420_n.png?_nc_cat=111&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeFYmzMPwVJMGzIOEnSYaKQ1PFwicwsbl448XCJzCxuXjr_M2p4T8e5YveHGdkMH1i9sQCXibMRGy2ownMnWoUzO&_nc_ohc=TQqmSmAmPeYQ7kNvwFXUW0o&_nc_oc=Adlt47fU2zuGMSsFx7aJy-OVqaOU8RVxpCVg55Hq5B4c9aSpJs7xxTCqGbq4ynCkgCHcvN-mAWCxx7ZB0FdmqHJr&_nc_zt=23&_nc_ht=scontent.fmnl4-6.fna&oh=03_Q7cD3wHfvwY2rP-742MRe0UEgg9C9Y2xzIBvoE7BjiJmCAr2Wg&oe=69439B42" alt="Kagawad 1" class="rounded-xl h-55 w-60 object-cover" />
                        </figure>
                        <div class="card-body items-center text-center p-4">
                            <h3 class="card-title text-base font-semibold">Patrocinia E. Claudio</h3>
                            <p class="text-s space-x-4 font-medium">Barangay Kagawad</p>
                        </div>
                    </div>
                </div>
                {{-- Kagawad 6 --}}
                   <div class="carousel-item">
                    <div class="card bg-base-100 shadow-md w-64">
                        <figure class="px-8 pt-6">
                            <img src="https://scontent.fmnl4-1.fna.fbcdn.net/v/t1.15752-9/582328251_1531464928119042_3894313545446648179_n.png?_nc_cat=106&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeHET3oiAMccNYjt60t4_oe2uG0XVqo5FAi4bRdWqjkUCGDH457eB4OMm4QOa1egNH7zD003I7JoCt_sjKTZtWxi&_nc_ohc=1HQJOwc1dr0Q7kNvwG-weFb&_nc_oc=AdkxQGIluSVCemfsFuvEc9MkOy6RyWatNj6LQe-uk7QbKdiYO8gumV6GcOMbJMkmQHCEMlRvRLFmcCNz3SNGoFQC&_nc_zt=23&_nc_ht=scontent.fmnl4-1.fna&oh=03_Q7cD3wETUYcEVyA7bGEQ7LFCVTAAVwBCPfrUEa5gEOsYKFR8DA&oe=6943A86F" alt="Kagawad 1" class="rounded-xl h-55 w-60 object-cover" />
                        </figure>
                        <div class="card-body items-center text-center p-4">
                            <h3 class="card-title text-base font-semibold">Joseph S. Porcalla</h3>
                            <p class="text-s space-x-4 font-medium">Barangay Kagawad</p>
                        </div>
                    </div>
                </div>
               
                {{-- Kagawad 7 --}}
                   <div class="carousel-item">
                    <div class="card bg-base-100 shadow-md w-64">
                        <figure class="px-8 pt-6">
                            <img src="https://scontent.fmnl4-3.fna.fbcdn.net/v/t1.15752-9/582229031_854724507051184_2429386195480127403_n.png?_nc_cat=110&ccb=1-7&_nc_sid=9f807c&_nc_eui2=AeE4eNEMowBOOombKCz7cz2GDNNoDah_B9sM02gNqH8H25-xGJcwMdyZI4vnTOB5-gjYTnqRXJ83ETTlqyASdXr-&_nc_ohc=AXYDOVcG368Q7kNvwGBqj-Q&_nc_oc=Adndu1ChcHMFIFhJvqG8mc0RWbbStPejgKtJsNqxlJ9_f0CfGZOuQcMhDvuQ73TGbvt-6NOtADI0Y79lgit69BcJ&_nc_zt=23&_nc_ht=scontent.fmnl4-3.fna&oh=03_Q7cD3wHFrL5rzaEQZG1CzX5YejVfCp15rPMvavakeXbpNbNyvg&oe=69439F43" alt="Kagawad 1" class="rounded-xl h-55 w-60 object-cover" />
                        </figure>
                        <div class="card-body items-center text-center p-4">
                            <h3 class="card-title text-base font-semibold">Redd Louise T. Abanes</h3>
                            <p class="text-s space-x-4 font-medium">Barangay Kagawad</p>
                        </div>
                    </div>
                </div>


            </div>
           
            <button id="prev-btn" class="btn btn-circle btn-ghost absolute top-1/2 -translate-y-1/2 left-0 sm:-left-4">❮</button>
            <button id="next-btn" class="btn btn-circle btn-ghost absolute top-1/2 -translate-y-1/2 right-0 sm:-right-4">❯</button>
        </div>
        {{-- Note: The <style> and <script> blocks from the original file are kept below to retain the carousel functionality --}}
    </div>
</div>
