@extends('layouts.admin')

@section('title', 'Add New User')

@section('content')
<style>
  :root{
    --ink:#0f172a; --muted:#6b7280; --chip:#e9ecef; --line:#d9dde3; --cream:#fbf8f3;
    --blue:#79b2cf; --blue-ink:#2b6d8e;
  }

  /* Full screen, no card */
  main.content{ padding:0 !important; background:var(--cream); }
  .screen{ position:fixed; inset:64px 0 0 0; background:var(--cream); overflow:auto; }

  /* Two columns with a crisp vertical divider */
  .grid{ display:grid; grid-template-columns:1fr 1fr; min-height:100%; }
  .col{ padding:24px 28px; display:flex; flex-direction:column; }
  .col > * + *{ margin-top:24px; }              /* section rhythm */
  .col--right{ position:relative; }
  .col--right::before{
    content:""; position:absolute; left:0; top:0; bottom:0; width:1px; background:#cfcfcf; transform:translateX(-0.5px);
  }

  /* Header */
  .header{ display:grid; grid-template-columns:170px minmax(0,1fr); gap:22px; align-items:center; }
  .ph{
    width:170px; height:128px; border-radius:12px; border:3px solid var(--blue);
    background:#eaf3f7; display:grid; place-items:center; flex-shrink:0;
  }
  .ph svg{ width:64px; height:64px; stroke:var(--blue-ink); }
  .name{ font:800 32px/1.1 Inter,system-ui; color:#111; }
  .sub{ margin-top:6px; color:#374151; font:700 12px Inter; letter-spacing:.2px; }

  .section-title{ font:800 16px Inter; color:#111; margin-bottom:6px; }

  /* Field grids + exact, even gaps */
  .g4, .g3, .g2{ display:grid; gap:12px; }
  .g4{ grid-template-columns:repeat(4,1fr); }
  .g3{ grid-template-columns:repeat(3,1fr); }
  .g2{ grid-template-columns:repeat(2,1fr); }

  .block{ display:flex; flex-direction:column; gap:6px; }
  .lbl{ font:800 12px Inter; color:#111; }

  /* Inputs (chip style) */
  .input{
    height:34px; border-radius:8px; background:var(--chip);
    border:1px solid var(--line); width:100%; padding:0 12px;
    color:#111; font:700 13px Inter; outline:none;
  }
  .input::placeholder{ color:#9ca3af; font-weight:600; }
  .input[disabled]{ background:#e0e0e0; color:#444; cursor:not-allowed; }
  input[type="date"]::-webkit-calendar-picker-indicator{ opacity:0; cursor:pointer; }

  /* Right column thumbnails (fixed size) */
  .rthumbs{ display:grid; grid-template-columns:repeat(2, 200px); gap:18px; }
  .ph2{
    width:200px; height:128px; border-radius:12px; border:3px solid var(--blue);
    background:#eaf3f7; display:grid; place-items:center; flex-shrink:0;
  }
  .ph2 svg{ width:44px; height:44px; stroke:var(--blue-ink); }

  /* CONTACT FIELDS: remove box entirely -> identical spacing as left side */
  .contact-fields > * + *{ margin-top:12px; }   /* same vertical rhythm as left groups */

  /* Bottom actions */
  .actions{ margin-top:24px; display:flex; justify-content:flex-end; gap:12px; }
  .pill{
    height:28px; padding:0 16px; border-radius:999px; border:1px solid #bfc6cd;
    background:#dfe4ea; color:#2b2b2b; font:800 12px Inter; letter-spacing:.3px;
    display:inline-flex; align-items:center; cursor:pointer; text-decoration:none;
  }
  .pill.primary{ background:#e6f3fb; border-color:#0b3b52; color:#0b3b52; }

  /* Responsive */
  @media (max-width:1024px){
    .grid{ grid-template-columns:1fr; }
    .col--right::before{ display:none; }
  }
  @media (max-width:640px){
    .header{ grid-template-columns:1fr; text-align:center; }
    .ph{ margin:0 auto; }
    .g4,.g3,.g2{ grid-template-columns:1fr; }
    .rthumbs{ grid-template-columns:repeat(2, 1fr); justify-content:center; }
    .ph2{ width:100%; }
  }
</style>

<div class="screen">
  <form method="POST" action="{{ route('admin.users.store') }}">
    @csrf
    <div class="grid">
      {{-- LEFT --}}
      <div class="col">
        <div class="header">
          <div class="ph">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
              <rect x="3" y="6" width="18" height="14" rx="2"/>
              <path d="M9 6l1.2-2h3.6L15 6"/>
              <circle cx="12" cy="13" r="3.5"/>
            </svg>
          </div>
          <div>
            <div class="name">Richard Bassig</div>
            <div class="sub">SADM-K8209</div>
          </div>
        </div>

        <div>
          <div class="section-title">Personal Information</div>
          <div class="g4">
            <div class="block"><div class="lbl">Last Name:</div><input class="input" value="Bassig"></div>
            <div class="block"><div class="lbl">First Name:</div><input class="input" value="Richard"></div>
            <div class="block"><div class="lbl">Middle Name:</div><input class="input" value="Barretto"></div>
            <div class="block"><div class="lbl">Suffix:</div><input class="input" value=""></div>
          </div>
          <div class="g3" style="margin-top:12px">
            <div class="block"><div class="lbl">Age:</div><input class="input" value="50 years old" disabled></div>
            <div class="block"><div class="lbl">Date of Birth:</div><input class="input" value="01/12/1975" disabled></div>
            <div class="block"><div class="lbl">Place of Birth:</div><input class="input" value="Mandaluyong City" disabled></div>
          </div>
          <div class="g3" style="margin-top:12px">
            <div class="block"><div class="lbl">Gender:</div><input class="input" value="Male" disabled></div>
            <div class="block"><div class="lbl">Civil Status:</div><input class="input" value="Married" disabled></div>
            <div class="block"><div class="lbl">Citizenship:</div><input class="input" value="Filipino" disabled></div>
          </div>
        </div>
      </div>

      {{-- RIGHT --}}
      <div class="col col--right">
        <div>
          <div class="section-title">Contact Information</div>

          <div class="rthumbs">
            <div class="ph2">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <rect x="3" y="6" width="18" height="14" rx="2"/>
                <path d="M9 6l1.2-2h3.6L15 6"/>
                <circle cx="12" cy="13" r="3.5"/>
              </svg>
            </div>
            <div class="ph2">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <rect x="3" y="6" width="18" height="14" rx="2"/>
                <path d="M9 6l1.2-2h3.6L15 6"/>
                <circle cx="12" cy="13" r="3.5"/>
              </svg>
            </div>
          </div>

          <!-- Contact fields WITHOUT the box -->
          <div class="contact-fields">
            <div class="g2" style="margin-top:12px">
              <div class="block"><div class="lbl">Contact Number:</div><input class="input" value="09178345621" disabled></div>
              <div class="block"><div class="lbl">Email Address:</div><input class="input" value="richardbassig@gmail.com" disabled></div>
            </div>
            <div class="g2" style="margin-top:12px">
              <div class="block"><div class="lbl">Password:</div><input type="password" class="input" placeholder=""></div>
              <div class="block"><div class="lbl">Confirm Password:</div><input type="password" class="input" placeholder=""></div>
            </div>
            <div class="g2" style="margin-top:12px">
              <div class="block"><div class="lbl">House Number / Street:</div><input class="input" value="123-D Haig St." disabled></div>
              <div class="block"><div class="lbl">Barangay:</div><input class="input" value="Brgy. Daang Bakal" disabled></div>
            </div>
            <div class="block" style="margin-top:12px">
              <div class="lbl">City / Municipality:</div>
              <input class="input" value="Mandaluyong City" disabled>
            </div>
          </div>
        </div>

        <div class="actions">
          <a href="{{ route('admin.users.index') }}" class="pill">CLOSE</a>
          <button type="submit" class="pill primary">EDIT</button>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection
