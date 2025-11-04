@extends('layouts.admin')

@section('title', 'Announcements')

@section('content')
<div class="page-head">
    <div class="page-title">ANNOUNCEMENTS</div>
</div>

<div class="space-y-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="p-6 rounded-xl border border-[var(--brand)] bg-blue-50 text-center">
            <div class="text-4xl font-extrabold text-[var(--brand)]">{{ $total_announcements }}</div>
            <div class="mt-1 text-sm font-bold text-[var(--brand)] tracking-wider">TOTAL ANNOUNCEMENTS</div>
        </div>
        <div class="p-6 rounded-xl border border-[var(--brand)] bg-blue-50 text-center">
            <div class="text-4xl font-extrabold text-[var(--brand)]">{{ $ended_announcements }}</div>
            <div class="mt-1 text-sm font-bold text-[var(--brand)] tracking-wider">ENDED ANNOUNCEMENTS</div>
        </div>
        <div class="p-6 rounded-xl border border-[var(--brand)] bg-blue-50 text-center">
            <div class="text-4xl font-extrabold text-[var(--brand)]">{{ $ongoing_announcements }}</div>
            <div class="mt-1 text-sm font-bold text-[var(--brand)] tracking-wider">ONGOING ANNOUNCEMENTS</div>
        </div>
    </div>

    <div class="flex justify-between items-center">
        <div class="flex items-center gap-4">
            <button class="primary-btn !py-2 !px-4 !rounded-lg !gap-2">
                <span>CALENDAR</span><i class="fa-solid fa-chevron-down text-xs"></i>
            </button>
            <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                <button @click="open = !open" class="primary-btn !py-2 !px-4 !rounded-lg !gap-2">
                    <span>STATUS: {{ ucfirst($status ?? 'All') }}</span><i class="fa-solid fa-chevron-down text-xs"></i>
                </button>
                <div x-show="open"
                     x-transition
                     class="absolute top-full left-0 mt-2 z-10 w-48 bg-white rounded-lg shadow-lg border border-gray-200"
                     style="display: none;">
                    <a href="{{ route('admin.announcements.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">All</a>
                    <a href="{{ route('admin.announcements.index', ['status' => 'ongoing']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Ongoing</a>
                    <a href="{{ route('admin.announcements.index', ['status' => 'scheduled']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Scheduled</a>
                    <a href="{{ route('admin.announcements.index', ['status' => 'ended']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Ended</a>
                </div>
            </div>
        </div>

        <button type="button" id="addAnnouncementBtn" class="primary-btn">
            <span>ADD ANNOUNCEMENT</span><i class="fa-solid fa-circle-plus"></i>
        </button>
    </div>

    <div class="card table-wrap">
        <table>
            <thead>
            <tr>
                <th>Title</th><th>Start Date</th><th>End Date</th><th>Status</th><th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($announcements as $announcement)
                @php
                    $now = \Carbon\Carbon::now();
                    $startDate = $announcement->start_date ? \Carbon\Carbon::parse($announcement->start_date) : null;
                    $endDate = $announcement->end_date ? \Carbon\Carbon::parse($announcement->end_date) : null;
                    $status_text = 'Ongoing';
                    if ($endDate && $endDate->isPast()) { $status_text = 'Ended'; }
                    elseif ($startDate && $startDate->isFuture()) { $status_text = 'Scheduled'; }
                @endphp
                <tr>
                    <td>{{ Str::limit($announcement->title, 40) }}</td>
                    <td>{{ $startDate ? $startDate->format('m/d/Y') : 'N/A' }}</td>
                    <td>{{ $endDate ? $endDate->format('m/d/Y') : 'N/A' }}</td>
                    <td>{{ $status_text }}</td>
                    <td>
                        <div class="col-actions">
                            <button type="button" class="icon-btn icon-view" title="View" data-announcement='@json($announcement)'>
                                <i class="fa-regular fa-eye"></i>
                            </button>
                            <button data-announcement='@json($announcement)' class="icon-btn icon-edit edit-btn" title="Edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center py-4">No announcements found for the selected status.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>

    @if ($announcements->hasPages())
        <div class="flex justify-end pt-4">{{ $announcements->links() }}</div>
    @endif
</div>

{{-- ADD/EDIT MODAL --}}
<div id="announcementModal" class="exact-modal" aria-hidden="true" role="dialog">
    <div class="exact-modal__overlay" data-close></div>
    <div class="exact-modal__panel" role="document" aria-labelledby="modalTitle">
        <div class="exact-modal__header">
            <div class="flex items-center gap-3">
                <img src="{{ asset('img/barangaylogo.jpg') }}" alt="Logo" class="w-8 h-8 rounded-full object-cover">
                <h3 id="modalTitle" class="exact-modal__title">Barangay Daang Bakal</h3>
            </div>
            <button type="button" class="exact-modal__close" aria-label="Close" data-close>
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form id="announcementForm" method="POST" action="">
            @csrf
            <div id="method-field"></div>
            <div class="exact-modal__body">
                <div class="block"><label for="title" class="lbl">Title:</label><input type="text" name="title" id="title" class="input exact-input" required></div>
                <div class="block"><label for="content" class="lbl">Content:</label><textarea name="content" id="content" class="textarea exact-textarea" rows="4" required></textarea></div>
                <div class="block"><label for="start_date" class="lbl">Start Date:</label><div class="exact-date__wrap"><input type="date" name="start_date" id="start_date" class="input exact-input"><span class="exact-date__icon"><i class="fa-solid fa-calendar-days"></i></span></div></div>
                <div class="block"><label for="end_date" class="lbl">End Date:</label><div class="exact-date__wrap"><input type="date" name="end_date" id="end_date" class="input exact-input"><span class="exact-date__icon"><i class="fa-solid fa-calendar-days"></i></span></div></div>
            </div>
            <div class="exact-modal__footer">
                <button type="button" class="exact-btn exact-btn--cancel" data-close>CANCEL</button>
                <button type="submit" id="modalSubmitButton" class="exact-btn exact-btn--add">ADD</button>
            </div>
        </form>
    </div>
</div>

{{-- VIEW MODAL --}}
<div id="viewAnnouncementModal" class="exact-modal" aria-hidden="true" role="dialog">
    <div class="exact-modal__overlay" data-close></div>
    <div class="exact-modal__panel" role="document">
        <div class="exact-modal__header">
            <div class="flex items-center gap-3">
                <img src="{{ asset('img/barangaylogo.jpg') }}" alt="Logo" class="w-8 h-8 rounded-full object-cover">
                <h3 class="exact-modal__title">Barangay Daang Bakal</h3>
            </div>
            <button type="button" class="exact-modal__close" aria-label="Close" data-close>
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="exact-modal__body">
            <div class="block"><label class="lbl">Title:</label><input type="text" id="view_title" class="input exact-input" readonly></div>
            <div class="block"><label class="lbl">Content:</label><textarea id="view_content" class="textarea exact-textarea" rows="4" readonly></textarea></div>
            <div class="block"><label class="lbl">Start Date:</label><div class="exact-date__wrap"><input type="text" id="view_start_date" class="input exact-input" readonly></div></div>
            <div class="block"><label class="lbl">End Date:</label><div class="exact-date__wrap"><input type="text" id="view_end_date" class="input exact-input" readonly></div></div>
        </div>
        <div class="exact-modal__footer">
            <button type="button" class="exact-btn exact-btn--cancel" data-close>CLOSE</button>
        </div>
    </div>
</div>

<style>
.exact-modal{position:fixed;inset:0;display:none;z-index:9999;}
.exact-modal.open{display:block;}
.exact-modal__overlay{position:absolute;inset:0;background:rgba(0,0,0,.45);}
.exact-modal__panel{position:relative;margin:4vh auto;width:min(600px, 92%);background:#f3ede5;border-radius:18px;box-shadow:0 24px 60px rgba(0,0,0,.35);border:2px solid #101010;overflow:hidden;}
.exact-modal__header{background:#2e658d;color:#fff;padding:12px 16px;display:flex;align-items:center;justify-content:space-between;gap:12px;border-bottom:1px solid rgba(0,0,0,.12);}
.exact-modal__title{font-weight:700;font-size:16px;}
.exact-modal__close{background:transparent;border:0;cursor:pointer;color:#fff;font-size:18px;line-height:1;}
.exact-modal__body{padding:16px 18px 8px;}
.exact-modal__body .block{margin-bottom:1rem;}
.exact-modal__body .lbl{display:block;font-weight:600;margin-bottom:6px;}
.exact-modal__body .input, .exact-modal__body .textarea{width:100%;background:#ffffff;border:1px solid #e5e7eb;border-radius:10px;padding:10px 12px;box-shadow:0 1px 0 rgba(0,0,0,.05) inset, 0 1px 2px rgba(0,0,0,.06);outline:none;}
.exact-modal__body .textarea{min-height:110px;resize:vertical;}
.exact-date__wrap{position:relative;}
.exact-date__icon{position:absolute;right:6px;top:50%;transform:translateY(-50%);background:#eef0f2;border:1px solid #cfd6dc;border-radius:6px;width:34px;height:28px;display:grid;place-items:center;color:#5b6670;}
#view_start_date, #view_end_date { padding-right: 2.5rem; } /* Space for fake icon */
#view_start_date + .exact-date__icon, #view_end_date + .exact-date__icon { pointer-events: none; }
.exact-modal__footer{display:flex;justify-content:flex-end;gap:10px;padding:14px 18px;background:transparent;border-top:1px solid rgba(0,0,0,.08);}
.exact-btn{border:0;border-radius:999px;padding:10px 18px;font-weight:700;box-shadow:0 1px 2px rgba(0,0,0,.08);cursor:pointer;}
.exact-btn--cancel{background:#b9c9d6;color:#203544;}
.exact-btn--add{background:#2e9b58;color:#0d1e11;}
.exact-btn:active{transform:translateY(1px);}
</style>
@endsection

@push('scripts')
<script src="//unpkg.com/alpinejs" defer></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Shared elements and functions
    function lockScroll(lock){
        if(lock){
            document.body.dataset.prevOverflow = document.body.style.overflow || '';
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = document.body.dataset.prevOverflow || '';
            delete document.body.dataset.prevOverflow;
        }
    }

    // --- ADD/EDIT MODAL ---
    const modal = document.getElementById('announcementModal');
    if (modal) {
        const form = document.getElementById('announcementForm');
        const methodField = document.getElementById('method-field');
        const submitBtn = document.getElementById('modalSubmitButton');
        const modalTitle = document.getElementById('modalTitle');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const titleEl = document.getElementById('title');
        const contentEl = document.getElementById('content');
        const startEl = document.getElementById('start_date');
        const endEl = document.getElementById('end_date');

        function openModal(){ modal.classList.add('open'); modal.setAttribute('aria-hidden','false'); lockScroll(true); setTimeout(()=>titleEl?.focus(),10); }
        function closeModal(){ modal.classList.remove('open'); modal.setAttribute('aria-hidden','true'); lockScroll(false); form?.reset(); methodField.innerHTML=''; submitBtn.textContent='ADD'; submitBtn.className='exact-btn exact-btn--add'; }

        window.openAddModal = function(){
            form.reset();
            form.action = "{{ route('admin.announcements.store') }}";
            modalTitle.textContent = "Add New Announcement";
            methodField.innerHTML = "";
            submitBtn.textContent = "ADD";
            submitBtn.className = "exact-btn exact-btn--add";
            openModal();
        }
        window.openEditModal = function(button){
            const a = JSON.parse(button.getAttribute('data-announcement'));
            form.reset();
            form.action = `/admin/announcements/${a.id}`;
            methodField.innerHTML = `<input type="hidden" name="_method" value="PUT">`;
            titleEl.value = a.title ?? '';
            contentEl.value = a.content ?? '';
            startEl.value = a.start_date ? String(a.start_date).split(' ')[0] : '';
            endEl.value = a.end_date ? String(a.end_date).split(' ')[0] : '';
            modalTitle.textContent = "Edit Announcement";
            submitBtn.textContent = "SAVE";
            submitBtn.className = "exact-btn exact-btn--add";
            openModal();
        }
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(form);
            try {
                const res = await fetch(form.action, { method: 'POST', headers: { 'X-CSRF-TOKEN': csrfToken, 'Accept': 'application/json' }, body: formData });
                if(res.ok){ location.reload(); }
                else if(res.status === 422){ const data = await res.json(); let msg = 'Please fix the following errors:\n'; for(const k in data.errors){ msg += `- ${data.errors[k].join(', ')}\n`; } alert(msg); }
                else { throw new Error('Server error'); }
            } catch(err) { console.error(err); alert('An unexpected error occurred. Please try again.'); }
        });
    }

    // --- VIEW MODAL ---
    const viewModal = document.getElementById('viewAnnouncementModal');
    if (viewModal) {
        const viewTitleEl = document.getElementById('view_title');
        const viewContentEl = document.getElementById('view_content');
        const viewStartEl = document.getElementById('view_start_date');
        const viewEndEl = document.getElementById('view_end_date');
        
        function openViewModal(button) {
            const a = JSON.parse(button.getAttribute('data-announcement'));
            viewTitleEl.value = a.title ?? '';
            viewContentEl.value = a.content ?? '';
            viewStartEl.value = a.start_date ? new Date(a.start_date).toLocaleDateString('en-US', { month: '2-digit', day: '2-digit', year: 'numeric' }) : 'N/A';
            viewEndEl.value = a.end_date ? new Date(a.end_date).toLocaleDateString('en-US', { month: '2-digit', day: '2-digit', year: 'numeric' }) : 'N/A';
            viewModal.classList.add('open'); viewModal.setAttribute('aria-hidden','false'); lockScroll(true);
        }
        window.openViewModal = openViewModal;
    }

    // --- GLOBAL CLICK/KEY HANDLERS ---
    document.addEventListener('click', (ev) => {
        const addBtn = ev.target.closest('#addAnnouncementBtn');
        const editBtn = ev.target.closest('.edit-btn');
        const viewBtn = ev.target.closest('.icon-view');
        const closeEl = ev.target.closest('[data-close]');

        if(addBtn){ window.openAddModal(); return; }
        if(editBtn){ window.openEditModal(editBtn); return; }
        if(viewBtn){ window.openViewModal(viewBtn); return; }
        if(closeEl){
            const openModal = ev.target.closest('.exact-modal');
            if(openModal) {
                openModal.classList.remove('open');
                openModal.setAttribute('aria-hidden', 'true');
                lockScroll(false);
            }
        }
        if(ev.target.matches('.exact-modal__overlay')){
            const openModal = ev.target.closest('.exact-modal');
             if(openModal) {
                openModal.classList.remove('open');
                openModal.setAttribute('aria-hidden', 'true');
                lockScroll(false);
            }
        }
    });

    document.addEventListener('keydown', (e) => {
        if(e.key === 'Escape'){
            const openModal = document.querySelector('.exact-modal.open');
            if(openModal) {
                openModal.classList.remove('open');
                openModal.setAttribute('aria-hidden','true');
                lockScroll(false);
            }
        }
    });
});
</script>
@endpush