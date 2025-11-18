{{-- Final FAQ Chatbot Component --}}


<button id="faq-toggle" class="fixed z-50 right-4 bottom-4 size-12 rounded-full grid place-items-center
          bg-[#232c54] text-white shadow-2xl
         ring-2 ring-white hover:scale-105 active:scale-95 transition-transform" aria-controls="faq-chat"
  aria-expanded="false" aria-label="Open FAQ chat">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-7 h-7" fill="currentColor">
    <path d="M7 7h10a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H9.6l-3.2 2.4A1 1 0 0 1 5 18.5V9a2 2 0 0 1 2-2z" />
  </svg>
  <span id="faq-dot" class="absolute -top-0.5 -right-0.5 w-3 h-3 rounded-full bg-error ring-2 ring-white"></span>
</button>


<section id="faq-chat" class="fixed w-80 h-[30rem] right-4 bottom-20
         bg-base-100 rounded-2xl shadow-2xl border border-base-300
         flex flex-col opacity-0 pointer-events-none
         transition-all duration-300 ease-out" role="dialog" aria-modal="true" aria-labelledby="faq-title">


  {{-- UPDATED HEADER --}}
  <header class="px-4 py-3 rounded-t-2xl bg-[#134573CC] text-white flex items-center justify-between">
    <div class="flex items-center gap-2">
      <span class="inline-block w-2.5 h-2.5 bg-success rounded-full"></span>
      <h3 id="faq-title" class="font-semibold">Frequently Asked Questions</h3>
    </div>
    <button id="faq-close" class="btn btn-ghost btn-sm btn-circle text-white" aria-label="Close">✕</button>
  </header>


  <div id="faq-body" class="flex-1 overflow-y-auto p-4 space-y-3">
    <div class="chat chat-start">
      <div class="chat-image avatar">
        <div class="w-8 rounded-full"><img src="https://api.dicebear.com/8.x/thumbs/svg?seed=Bot" alt="Assistant"></div>
      </div>
      <div class="chat-bubble bg-base-200 text-base-content">Hello! Type a question or select one of the topics below.
      </div>
    </div>
  </div>


  <div class="border-t border-base-300 p-3 space-y-3">
    <div class="form-control">
      <input id="faq-input" type="text" placeholder="Type to filter questions..."
        class="input input-sm input-bordered w-full" autocomplete="off" />
    </div>
    <div id="faq-chipwrap" class="max-h-24 overflow-y-auto flex flex-wrap gap-2"></div>
  </div>
</section>


<style>
  #faq-chat {
    transform: translateY(1rem);
  }


  #faq-chat.is-open {
    opacity: 1;
    transform: translateY(0);
    pointer-events: auto;
  }
</style>


<script>
  document.addEventListener('DOMContentLoaded', function () {
    // --- 1. DEFINE YOUR QUESTIONS AND ANSWERS ---
    const FAQS = [
      {
        q: "How do I register?",
        a: "Visit the official Barangay Information System link: https://Baris.com. Residents can register online by filling out the registration form. If you experience any difficulty using the system, you may visit the barangay office, where the staff will assist you with the registration process and just bring valid id for verification.",
        keywords: ["account", "sign up", "join", "new user"]
      },
      {
        q: "What types of documents can I request online?",
        a: "You can request: Barangay Clearance, Barangay Certificate, Indigency Clearance, and Resident Certificate.",
        keywords: ["papers", "forms", "available", "list"]
      },
      {
        q: "How can I request a document?",
        a: "Once registered, log in to your account and go to the Homepage. Click the Request Document button, choose the type of document you need, fill out the required details, and submit your request for processing.",
        keywords: ["apply", "get", "obtain", "process"]
      },
      {
        q: "How will I know if my requested document is ready for pickup?",
        a: "After submitting your request, the processing time is typically within 24 hours. You will receive a notification or email once your document is ready for pickup at the barangay office.",
        keywords: ["status", "track", "check", "notification", "ready"]
      },
      {
        q: "What should I bring when claiming my document?",
        a: "Please bring a valid ID or provide your reference code number as proof of tracking number when claiming your document.",
        keywords: ["claim", "collect", "requirements", "id"]
      },
      {
        q: "Can I file a complaint online?",
        a: "Yes. Log in to your account, navigate to the Homepage, and click the Submit Complaint button. You can then write and submit your complaint directly through the system.",
        keywords: ["report", "issue", "blotter", "concern"]
      },
      {
        q: "What are the barangay’s working hours?",
        a: "The barangay office is open from Monday to Friday, 8:00 AM to 5:00 PM, excluding holidays. For online transactions, the system is accessible 24/7 for residents’ convenience.",
        keywords: ["office hours", "schedule", "open", "close", "time"] // <-- KEYWORD ADDED
      },
      {
        q: "What are the barangay’s curfew hours?",
        a: "The official curfew hours are from 10:00 PM to 4:00 AM, unless otherwise adjusted by barangay announcements or local ordinances. Residents are encouraged to stay indoors during these hours for safety and community order.",
        keywords: ["late", "night", "restrictions", "time"] // <-- KEYWORD ADDED
      }
    ];


    // --- 2. GET THE HTML ELEMENTS ---
    const faqToggleBtn = document.getElementById('faq-toggle');
    const faqCloseBtn = document.getElementById('faq-close');
    const faqChatWindow = document.getElementById('faq-chat');
    const faqBody = document.getElementById('faq-body');
    const faqChipsContainer = document.getElementById('faq-chipwrap');
    const faqInput = document.getElementById('faq-input');
    const faqNotificationDot = document.getElementById('faq-dot');


    // --- 3. HELPER FUNCTIONS ---


    function renderChips(filterText = '') {
      faqChipsContainer.innerHTML = '';
      const lowerCaseFilter = filterText.toLowerCase();
      FAQS.forEach(faq => {
        if (faq.q.toLowerCase().includes(lowerCaseFilter)) {
          const chip = document.createElement('button');
          chip.className = 'btn btn-xs md:btn-sm btn-outline normal-case';
          chip.textContent = faq.q;
          chip.addEventListener('click', () => {
            addBubble(faq.q, 'user');
            addBubble(faq.a, 'bot');
          });
          faqChipsContainer.appendChild(chip);
        }
      });
    }


    function toggleChat(show) {
      if (show) {
        faqChatWindow.classList.add('is-open');
        faqNotificationDot.style.display = 'none';
      } else {
        faqChatWindow.classList.remove('is-open');
      }
    }


    function addBubble(message, sender) {
      const chatClass = (sender === 'user') ? 'chat-end' : 'chat-start';
      const bubbleClass = (sender === 'user') ? 'bg-[#E7F0F6]' : 'bg-base-300';
      const messageHTML = `<div class="chat ${chatClass}"><div class="chat-bubble ${bubbleClass}">${message.replace(/\n/g, '<br>')}</div></div>`;
      faqBody.insertAdjacentHTML('beforeend', messageHTML);
      faqBody.scrollTop = faqBody.scrollHeight;
    }


    function findBestMatch(userInput) {
      const lowerCaseInput = userInput.toLowerCase().trim();
      if (!lowerCaseInput) return null;


      // Create a list of all words the user typed
      const searchWords = lowerCaseInput.split(/\s+/);


      const scoredFaqs = FAQS.map(faq => {
        // Combine the question and its keywords into one searchable string
        const searchableText = `${faq.q.toLowerCase()} ${faq.keywords.join(' ')}`;


        let score = 0;
        // Check if any of the user's typed words appear in our searchable text
        searchWords.forEach(word => {
          if (searchableText.includes(word)) {
            score++;
          }
        });


        return { ...faq, score }; // Return the faq with its score
      })
        .filter(faq => faq.score > 0) // Keep only FAQs that got a score > 0
        .sort((a, b) => b.score - a.score); // Sort by the highest score first


      // Return the best match (the one with the highest score), or null if no matches
      return scoredFaqs.length > 0 ? scoredFaqs[0] : null;
    }


    // --- 4. SETUP AND EVENT LISTENERS ---


    renderChips();


    faqInput.addEventListener('keydown', (event) => {
      if (event.key === 'Enter') {
        const userInput = faqInput.value;
        if (!userInput.trim()) return;


        addBubble(userInput, 'user');
        const match = findBestMatch(userInput);


        if (match) {
          addBubble(match.a, 'bot');
        } else {
          addBubble("Sorry, I can't answer that question. For further details, please visit the barangay hall or contact us directly.", 'bot');
        }


        faqInput.value = '';
        renderChips();
      }
    });


    faqInput.addEventListener('input', () => {
      renderChips(faqInput.value);
    });


    faqToggleBtn.addEventListener('click', () => toggleChat(true));
    faqCloseBtn.addEventListener('click', () => toggleChat(false));
  });
</script>