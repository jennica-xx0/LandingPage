<div class="bg-gray-200 text-gray-800 p-2 flex items-center text-sm overflow-hidden">
  <span class="font-bold bg-[#134573] text-white py-1 px-3 rounded-md mr-4 flex-shrink-0">
    Latest Announcements:
  </span>

  <!-- Make the bar full width -->
  <div class="marquee-container flex-1 bg-[#134573] text-yellow-300 rounded-md h-8 relative overflow-hidden">
    <div class="marquee-track absolute inset-0 flex items-center whitespace-nowrap">
      <!-- duplicate content for seamless loop -->
      <span class="px-4">
        Barangay Assembly on November 25, 2024 at the covered court. All residents are invited to attend. — 
        Free anti-rabies vaccination for pets this Saturday. — 
        BIDA Program Clean-up drive schedule for Zone 3 is on Friday morning.
      </span>
      <span class="px-4" aria-hidden="true">
        Barangay Assembly on November 25, 2024 at the covered court. All residents are invited to attend. — 
        Free anti-rabies vaccination for pets this Saturday. — 
        BIDA Program Clean-up drive schedule for Zone 3 is on Friday morning.
      </span>
    </div>
  </div>
</div> 

<style>
  .marquee-container { /* blue pill fills the whole bar */
    /* bg + rounded set via classes */
  }
  .marquee-track {
    animation: ticker 20s linear infinite;
  }
  .marquee-container:hover .marquee-track { animation-play-state: paused; } /* optional */

  /* Translate the duplicated track by half its width for a seamless loop */
  @keyframes ticker {
    0%   { transform: translateX(0); }
    100% { transform: translateX(-50%); }
  }
</style>
