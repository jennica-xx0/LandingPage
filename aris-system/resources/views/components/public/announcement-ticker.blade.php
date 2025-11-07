@php
$announcements = [
(object)[
'title' => 'MAGANDANG UMAGA, DAANG BAKAL!',
'content' => 'Mag-ingat po sa umuusong sakit na Influenza (Trangkaso). Ugaliing maghugas ng kamay, uminom ng maraming tubig, at magsuot ng face mask kung kinakailangan.'
],
(object)[
'title' => 'GUSTO MO BA MAG TUPAD?',
'content' => 'Tara na, kabarangay! Isa itong magandang pagkakataon para sa karagdagang hanapbuhay at tulong mula sa pamahalaan.'
],
(object)[
'title' => 'TARA, BASA TAYO!',
'content' => 'Alam niyo ba? May Mini Library tayo sa 2nd Floor ng Barangay Daang Bakal Hall! Bukas ito para sa lahat ng estudyante at residente ng Barangay Daang Bakal.'
],
(object)[
'date' => '2025-10-10',
'title' => 'WORLD HEALTH DAY',
'content' => 'Nakikiisa ang Barangay Daang Bakal sa pagdiriwang ng World Mental Health Day! Tandaan -- ang kalusugang pang-isipan ay kasinghalaga ng kalusugang pisikal.'
],
(object)[
'date' => '2025-10-07',
'title' => 'REHAB REFERRAL DESK',
'content' => 'Isa sa mga serbisyong hatid ng Barangay Daang Bakal ay ang Rehab Referral Desk, na naglalayong tulungan ang ating mga kabaranggay na nangangalingan ng gabay.'
],
];

$tickerText = collect($announcements)->pluck('title')->implode(' — ');
@endphp

<div class=" text-gray-800 p-2 flex items-center text-sm overflow-hidden">
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