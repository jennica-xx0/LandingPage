@php
$tickerText = "MAGANDANG UMAGA, DAANG BAKAL! — GUSTO MO BA MAG TUPAD? — TARA, BASA TAYO! — WORLD HEALTH DAY — REHAB REFERRAL DESK";
@endphp


<div class="text-gray-800 p-2 flex items-center text-sm overflow-hidden border-b border-gray-200">
  <span class="font-bold bg-[#134573] text-white py-1 px-3 rounded-md mr-4 flex-shrink-0">
    Latest Announcements:
  </span>


  <div class="marquee-container flex-1 bg-[#134573] text-yellow-300 rounded-md h-8 relative overflow-hidden">
    <div class="marquee-track absolute inset-0 flex items-center whitespace-nowrap">


      <span class="px-4">
        {{ $tickerText }}
      </span>
      <span class="px-4" aria-hidden="true">
        {{ $tickerText }}
      </span>
    </div>
  </div>
</div>


<style>
  /* Custom CSS for the marquee effect */
  .marquee-track {
    animation: ticker 20s linear infinite;
  }


  .marquee-container:hover .marquee-track {
    animation-play-state: paused;
  }


  @keyframes ticker {
    0% {
      transform: translateX(0);
    }


    100% {
      transform: translateX(-50%);
    }
  }
</style>
