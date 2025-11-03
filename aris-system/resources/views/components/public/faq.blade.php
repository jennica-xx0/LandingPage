<!doctype html>
<html lang="en" data-theme="light">

<body class="min-h-screen bg-base-200">

  <button id="faq-toggle"
    class="fixed z-50 right-[calc(1rem+env(safe-area-inset-right))]
                   bottom-[calc(1rem+env(safe-area-inset-bottom))]
                   size-16 rounded-full grid place-items-center
                   bg-primary text-primary-content shadow-2xl
                   ring-2 ring-white hover:scale-[1.03] active:scale-95 transition"
    aria-controls="faq-chat" aria-expanded="false" aria-label="Open FAQ chat">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
         class="w-7 h-7" fill="currentColor">
      <path d="M7 7h10a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H9.6l-3.2 2.4A1 1 0 0 1 5 18.5V9a2 2 0 0 1 2-2z"/>
    </svg>
    <span id="faq-dot" class="absolute -top-0.5 -right-0.5 w-3 h-3 rounded-full bg-error ring-2 ring-white"></span>
  </button>

  <section id="faq-chat"
    class="fixed w-80 h-[30rem] right-[calc(1rem+env(safe-area-inset-right))]
           bottom-[calc(5.5rem+env(safe-area-inset-bottom))]
           bg-base-100 rounded-2xl shadow-2xl border border-base-300
           flex flex-col translate-y-4 opacity-0 pointer-events-none
           transition-all duration-300 ease-out"
    role="dialog" aria-modal="true" aria-labelledby="faq-title">
    <header class="px-4 py-3 rounded-t-2xl bg-primary text-primary-content flex items-center justify-between">
      <div class="flex items-center gap-2">
        <span class="inline-block w-2.5 h-2.5 bg-success rounded-full"></span>
        <h3 id="faq-title" class="font-semibold">Frequently Asked Questions</h3>
      </div>
      <button id="faq-close" class="btn btn-ghost btn-sm btn-circle text-primary-content" aria-label="Close">✕</button>
    </header>

    <div id="faq-body" class="flex-1 overflow-y-auto p-4 space-y-3">
      <div class="chat chat-start">
        <div class="chat-image avatar">
          <div class="w-8 rounded-full">
            <img src="https://api.dicebear.com/8.x/thumbs/svg?seed=Bot" alt="Assistant">
          </div>
        </div>
        <div class="chat-bubble bg-base-200 text-base-content">
          Hello! How can I help you today? Select a question below or type your own.
        </div>
      </div>
    </div>

    <div class="border-t border-base-300 p-3">
      <div class="form-control">
        <label class="input input-bordered flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 21l-4.35-4.35M16.65 10.5a6.15 6.15 0 11-12.3 0 6.15 6.15 0 0112.3 0z"/>
          </svg>
          <input id="faq-input" type="text" placeholder="Type a question… (Enter to send)" class="grow" autocomplete="off">
        </label>
      </div>
      <div id="faq-chipwrap" class="mt-3 max-h-24 overflow-y-auto flex flex-wrap gap-2"></div>
    </div>
  </section>

  <style>
    #faq-chat.is-open { opacity: 1; transform: translateY(0); pointer-events: auto; }
    .chat-end .chat-image { margin-right: -6px; align-self: flex-end; }
  </style>

  <script>
    
    const FAQS = [
      { q: "How do I register for an account?", a: "Go to Login → Register. Fill in your details and upload a valid ID (students may use school ID). Wait for admin approval." },
      { q: "What documents can I request online?", a: "You can request: \n• Barangay Clearance\n• Barangay Certificate\n• Indigency Clearance\n• Resident Certificate" },
      { q: "How can I request a document?", a: "After logging in, go to Requests → Choose document type → Complete the form → Submit." },
      { q: "How will I know if my document is ready?", a: "You will receive an in-site notification and/or email. You can also track status under Profile → Requests." },
      { q: "What should I bring when claiming my document?", a: "Bring a valid ID and your reference code/tracking number." },
      { q: "Can I file a complaint online?", a: "Yes. Go to Complaints → File Complaint. Provide details and attachments if available." },
      { q: "What are the barangay’s working hours?", a: "Monday–Friday, 8:00 AM–5:00 PM (excluding holidays). The online system is accessible 24/7." },
      { q: "What are the barangay’s curfew hours?", a: "10:00 PM–4:00 AM, unless otherwise announced." }
    ];

    const $ = s => document.querySelector(s);
    const chat = $('#faq-chat'), body = $('#faq-body'), input = $('#faq-input');
    const chips = $('#faq-chipwrap'), toggle = $('#faq-toggle'), closeB = $('#faq-close'), dot = $('#faq-dot');

    const nl2br = s => (s || '').replace(/\n/g, '<br>');
    const scrollBottom = () => (body.scrollTop = body.scrollHeight);
    const bubble = (msg, who='bot') => {
      const wrap = document.createElement('div');
      wrap.className = `chat ${who === 'user' ? 'chat-end' : 'chat-start'}`;

      const imgWrap = document.createElement('div');
      imgWrap.className = 'chat-image avatar';
      const box = document.createElement('div'); box.className = 'w-8 rounded-full';
      const img = document.createElement('img');
      img.alt = who === 'user' ? 'You' : 'Assistant';
      img.src = who === 'user' ? 'https://api.dicebear.com/8.x/thumbs/svg?seed=You' : 'https://api.dicebear.com/8.x/thumbs/svg?seed=Bot';
      box.appendChild(img); imgWrap.appendChild(box); wrap.appendChild(imgWrap);

      const b = document.createElement('div');
      b.className = who === 'user'
        ? 'chat-bubble chat-bubble-primary text-primary-content max-w-[85%]'
        : 'chat-bubble bg-base-200 text-base-content max-w-[85%]';
      b.innerHTML = nl2br(msg);
      wrap.appendChild(b);

      body.appendChild(wrap); scrollBottom();
    };
    const open = () => { chat.classList.add('is-open'); toggle.setAttribute('aria-expanded', 'true'); dot?.classList.add('hidden'); setTimeout(() => input.focus(), 60); };
    const close = () => { chat.classList.remove('is-open'); toggle.setAttribute('aria-expanded', 'false'); };
    const best = q => {
      const s = q.trim().toLowerCase(); if (!s) return null;
      return FAQS.find(f => f.q.toLowerCase().includes(s)) || FAQS.find(f => s.includes(f.q.toLowerCase().slice(0,8)));
    };
    const renderChips = items => {
      chips.innerHTML = '';
      items.forEach(f => {
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'btn btn-xs md:btn-sm btn-outline normal-case';
        btn.textContent = f.q;
        btn.addEventListener('click', () => { bubble(f.q, 'user'); bubble(f.a, 'bot'); });
        chips.appendChild(btn);
      });
    };

    toggle.addEventListener('click', () => chat.classList.contains('is-open') ? close() : open());
    closeB.addEventListener('click', close);
    document.addEventListener('keydown', e => { if (e.key === 'Escape' && chat.classList.contains('is-open')) close(); });
    input.addEventListener('keydown', e => {
      if (e.key === 'Enter') {
        e.preventDefault();
        const q = input.value.trim(); if (!q) return;
        bubble(q, 'user'); const hit = best(q);
        bubble(hit ? hit.a : 'Sorry, I couldn’t find an exact match. Try keywords like “register”, “complaint”, or “document”.', 'bot');
        input.value = '';
      }
    });
    let t; input.addEventListener('input', e => {
      clearTimeout(t); const val = e.target.value.toLowerCase();
      t = setTimeout(() => renderChips(FAQS.filter(f => f.q.toLowerCase().includes(val))), 150);
    });

    renderChips(FAQS);
  </script>
</body>
</html>
