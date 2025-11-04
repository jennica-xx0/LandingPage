@extends('layouts.admin')

@section('title', 'User Profile')

@section('content')
<style>
:root{--ink:#0f172a;--muted:#6b7280;--chip:#e7e7e7;--line:#d9dde3;--cream:#fbf8f3;--blue:#79b2cf;--blue-ink:#2b6d8e;--box:#2b78c5}
.wrap{background:var(--cream);border:1px solid #e6e6e6;border-radius:12px;overflow:hidden}
.grid{display:grid;grid-template-columns:1fr 1fr;min-height:520px}
.col{padding:26px}
.divider{border-left:1px solid #cfcfcf}
.header{display:grid;grid-template-columns:170px 1fr;gap:22px;align-items:center}
.ph{width:170px;height:128px;border-radius:12px;border:3px solid var(--blue);background:#eaf3f7;display:grid;place-items:center}
.ph svg{width:64px;height:64px;stroke:var(--blue-ink)}
.name{font:800 36px/1.1 Inter,system-ui;color:#111}
.sub{margin-top:6px;color:#444;font-weight:800;letter-spacing:.2px}
.h2{font:800 20px/1.2 Inter,system-ui;color:#111;margin:18px 0 12px}
.panel{border:2px dashed var(--blue);border-radius:10px;background:#f9fcff}
.phead{padding:10px 12px;border-bottom:1px solid #d7e6f1;background:#eef6fd;font:800 16px Inter;color:#0b3b52}
.pbody{padding:14px}
.g4{display:grid;grid-template-columns:1fr 1fr 1fr 1fr;gap:14px}
.g3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:14px}
.block{display:flex;flex-direction:column;gap:6px}
.lbl{font:800 12px Inter;color:#111}
.input{height:34px;border-radius:8px;background:var(--chip);border:1px solid var(--line);display:flex;align-items:center;padding:0 12px;color:#6b7280;font:700 13px Inter;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.rtitle{font:800 22px Inter;color:#111;margin-bottom:8px}
.ph2{height:118px;border-radius:12px;border:3px solid var(--blue);background:#eaf3f7;display:grid;place-items:center}
.rthumbs{display:grid;grid-template-columns:1fr 1fr;gap:18px;margin:6px 0 14px}
.contact-box{border:3px solid var(--box);border-radius:6px;padding:12px}
.g2{display:grid;grid-template-columns:1fr 1fr;gap:14px}
.actions{display:flex;justify-content:flex-end;gap:14px;padding:14px;margin-top:auto;}
.pill{height:28px;padding:0 16px;border-radius:999px;border:1px solid #bfc6cd;background:#dfe4ea;color:#2b2b2b;font:800 12px Inter;letter-spacing:.3px; cursor:pointer;}
.pill.primary{background:#e6f3fb;border-color:#0b3b52;color:#0b3b52}
@media(max-width:1000px){.grid{grid-template-columns:1fr}.divider{border-left:0;border-top:1px solid #cfcfcf}.header{grid-template-columns:1fr;grid-auto-rows:min-content}.ph{width:100%;}}
</style>

<div class="wrap">
  <div class="grid">
    <div class="col">
      <div class="header">
        <div class="ph">
          <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8">
            <rect x="3" y="6" width="18" height="14" rx="2"/>
            <path d="M9 6l1.2-2h3.6L15 6"/>
            <circle cx="12" cy="13" r="3.5"/>
          </svg>
        </div>
        <div>
          <div class="name">{{ $profileData->full_name }}</div>
          <div class="sub">{{ $profileData->user_id_code }}</div>
        </div>
      </div>

      <div class="panel" style="margin-top:18px">
        <div class="phead">Personal Information</div>
        <div class="pbody">
          <div class="g4">
            <div class="block"><div class="lbl">Last Name:</div><div class="input">{{ $profileData->last_name }}</div></div>
            <div class="block"><div class="lbl">First Name:</div><div class="input">{{ $profileData->first_name }}</div></div>
            <div class="block"><div class="lbl">Middle Name:</div><div class="input">{{ $profileData->middle_name }}</div></div>
            <div class="block"><div class="lbl">Suffix:</div><div class="input">{{ $profileData->suffix }}</div></div>
          </div>

          <div class="g3" style="margin-top:12px">
            <div class="block"><div class="lbl">Age:</div><div class="input">{{ $profileData->age }}</div></div>
            <div class="block"><div class="lbl">Date of Birth:</div><div class="input">{{ $profileData->date_of_birth }}</div></div>
            <div class="block"><div class="lbl">Place of Birth:</div><div class="input">{{ $profileData->place_of_birth }}</div></div>
          </div>

          <div class="g3" style="margin-top:12px">
            <div class="block"><div class="lbl">Gender:</div><div class="input">{{ $profileData->gender }}</div></div>
            <div class="block"><div class="lbl">Civil Status:</div><div class="input">{{ $profileData->civil_status }}</div></div>
            <div class="block"><div class="lbl">Citizenship:</div><div class="input">{{ $profileData->citizenship }}</div></div>
          </div>
        </div>
      </div>
    </div>

    <div class="col divider" style="display:flex; flex-direction:column;">
      <div class="rtitle">Contact Information</div>

      <div class="rthumbs">
        <div class="ph2">
          <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8">
            <rect x="3" y="6" width="18" height="14" rx="2"/>
            <path d="M9 6l1.2-2h3.6L15 6"/>
            <circle cx="12" cy="13" r="3.5"/>
          </svg>
        </div>
        <div class="ph2">
          <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8">
            <rect x="3" y="6" width="18" height="14" rx="2"/>
            <path d="M9 6l1.2-2h3.6L15 6"/>
            <circle cx="12" cy="13" r="3.5"/>
          </svg>
        </div>
      </div>

      <div class="contact-box">
        <div class="g2">
          <div class="block"><div class="lbl">Contact Number:</div><div class="input">{{ $profileData->contact_number }}</div></div>
          <div class="block"><div class="lbl">Email Address:</div><div class="input">{{ $profileData->email }}</div></div>
        </div>

        <div class="g2" style="margin-top:12px">
          <div class="block"><div class="lbl">House Number / Street:</div><div class="input">{{ $profileData->house_street }}</div></div>
          <div class="block"><div class="lbl">Barangay:</div><div class="input">{{ $profileData->barangay }}</div></div>
        </div>

        <div class="block" style="margin-top:12px">
          <div class="lbl">City / Municipality:</div>
          <div class="input">{{ $profileData->city_municipality }}</div>
        </div>
      </div>

      <div class="actions">
        <button class="pill">CLOSE</button>
        <button class="pill primary">EDIT</button>
      </div>
    </div>
  </div>
</div>
@endsection