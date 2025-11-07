@extends('layouts.admin')

@section('title', 'Barangay Officials')

@section('content')
<div class="page-head">
    <div class="page-title">BARANGAY OFFICIALS</div>
</div>

<div class="flex justify-end items-center mb-6">
    <button type="button" id="addOfficialBtn" class="primary-btn">
        <span>ADD OFFICIAL</span><i class="fa-solid fa-circle-plus"></i>
    </button>
</div>

<div class="card table-wrap">
    <table>
        <thead>
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>M.I.</th>
                <th>Position</th>
                <th>Display Order</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($officials as $official)
            <tr>
                <td>{{ $official->last_name }}</td>
                <td>{{ $official->first_name }}</td>
                <td>{{ $official->middle_initial }}</td>
                <td>{{ $official->position }}</td>
                <td>{{ $official->display_order }}</td>
                <td>
                    <div class="col-actions">
                        <button type="button" class="icon-btn icon-view" title="View" data-official='@json($official)'>
                            <i class="fa-regular fa-eye"></i>
                        </button>
                        <button type="button" class="icon-btn icon-edit edit-btn" title="Edit" data-official='@json($official)'>
                            <i class="fa-regular fa-pen-to-square"></i>
                        </button>
                        <form action="{{ route('admin.officials.destroy', $official->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this official?');" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="icon-btn icon-del" title="Delete"><i class="fa-regular fa-trash-can"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-4">No officials found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- add/edit modal -->
<div id="officialModal" class="exact-modal" aria-hidden="true" role="dialog">
    <div class="exact-modal__overlay" data-close></div>
    <div class="exact-modal__panel" role="document">
        <div class="exact-modal__header">
            <div class="flex items-center gap-3"><img src="{{ asset('img/barangaylogo.jpg') }}" alt="Logo" class="w-8 h-8 rounded-full object-cover">
                <h3 id="modalTitle" class="exact-modal__title">Add Official</h3>
            </div>
            <button type="button" class="exact-modal__close" aria-label="Close" data-close><i class="fa-solid fa-xmark"></i></button>
        </div>
        <form id="officialForm" method="POST" action="" enctype="multipart/form-data">
            @csrf
            <div id="method-field"></div>
            <div class="exact-modal__body grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
                <div class="md:col-span-1">
                    <div class="photo-uploader">
                        <img src="" id="photo-preview" class="photo-uploader__img hidden" alt="Photo Preview">
                        <div id="photo-placeholder" class="photo-uploader__placeholder"><i class="fa-solid fa-camera"></i></div>
                    </div>
                    <label for="photo_path" class="photo-uploader__btn">Upload Photo</label>
                    <input type="file" name="photo_path" id="photo_path" class="hidden" accept="image/*">
                </div>
                <div class="md:col-span-2 space-y-3">
                    <div class="block"><label for="last_name" class="lbl">Last Name:</label><input type="text" name="last_name" id="last_name" class="input exact-input" required></div>
                    <div class="block"><label for="first_name" class="lbl">First Name:</label><input type="text" name="first_name" id="first_name" class="input exact-input" required></div>
                    <div class="block"><label for="middle_initial" class="lbl">Middle Initial:</label><input type="text" name="middle_initial" id="middle_initial" class="input exact-input"></div>
                    <div class="block"><label for="position" class="lbl">Position:</label><input type="text" name="position" id="position" class="input exact-input" required></div>
                    <div class="block"><label for="display_order" class="lbl">Display Order:</label><input type="number" name="display_order" id="display_order" class="input exact-input" required value="0"></div>
                </div>
            </div>
            <div class="exact-modal__footer">
                <button type="button" class="exact-btn exact-btn--cancel" data-close>CANCEL</button>
                <button type="submit" id="modalSubmitButton" class="exact-btn exact-btn--add">ADD</button>
            </div>
        </form>
    </div>
</div>

<!-- view modal -->
<div id="viewOfficialModal" class="exact-modal" aria-hidden="true" role="dialog">
    <div class="exact-modal__overlay" data-close></div>
    <div class="exact-modal__panel" role="document">
        <div class="exact-modal__header">
            <div class="flex items-center gap-3"><img src="{{ asset('img/barangaylogo.jpg') }}" alt="Logo" class="w-8 h-8 rounded-full object-cover">
                <h3 class="exact-modal__title">View Official</h3>
            </div>
            <button type="button" class="exact-modal__close" aria-label="Close" data-close><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="exact-modal__body grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
            <div class="md:col-span-1">
                <div class="photo-uploader"><img id="view_photo" class="photo-uploader__img" alt="Official Photo"></div>
            </div>
            <div class="md:col-span-2 space-y-3">
                <div class="block"><label class="lbl">Last Name:</label><input type="text" id="view_last_name" class="input exact-input" readonly></div>
                <div class="block"><label class="lbl">First Name:</label><input type="text" id="view_first_name" class="input exact-input" readonly></div>
                <div class="block"><label class="lbl">Middle Initial:</label><input type="text" id="view_middle_initial" class="input exact-input" readonly></div>
                <div class="block"><label class="lbl">Position:</label><input type="text" id="view_position" class="input exact-input" readonly></div>
            </div>
        </div>
        <div class="exact-modal__footer">
            <button type="button" class="exact-btn exact-btn--cancel" data-close>CLOSE</button>
        </div>
    </div>
</div>

<style>
    .exact-modal {
        position: fixed;
        inset: 0;
        display: none;
        z-index: 9999;
        align-items: center;
        justify-content: center;
    }

    .exact-modal.open {
        display: flex;
    }

    .exact-modal__overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, .45);
    }

    .exact-modal__panel {
        position: relative;
        width: min(600px, 92%);
        background: #f3ede5;
        border-radius: 18px;
        box-shadow: 0 24px 60px rgba(0, 0, 0, .35);
        border: 2px solid #101010;
        overflow: hidden;
    }

    .exact-modal__header {
        background: #2e658d;
        color: #fff;
        padding: 12px 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        border-bottom: 1px solid rgba(0, 0, 0, .12);
    }

    .exact-modal__title {
        font-weight: 700;
        font-size: 16px;
    }

    .exact-modal__close {
        background: transparent;
        border: 0;
        cursor: pointer;
        color: #fff;
        font-size: 18px;
        line-height: 1;
    }

    .exact-modal__body {
        padding: 24px;
    }

    .exact-modal__body .block {
        margin-bottom: 0;
    }

    .exact-modal__body .lbl {
        display: block;
        font-weight: 600;
        margin-bottom: 6px;
    }

    .exact-modal__body .input {
        width: 100%;
        background: #ffffff;
        border: 1px solid #d1d5db;
        border-radius: 10px;
        padding: 10px 12px;
        box-shadow: 0 1px 0 rgba(0, 0, 0, .05) inset, 0 1px 2px rgba(0, 0, 0, .06);
        outline: none;
    }

    .exact-modal__footer {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding: 14px 18px;
        background: transparent;
        border-top: 1px solid rgba(0, 0, 0, .08);
    }

    .exact-btn {
        border: 0;
        border-radius: 999px;
        padding: 10px 18px;
        font-weight: 700;
        box-shadow: 0 1px 2px rgba(0, 0, 0, .08);
        cursor: pointer;
    }

    .exact-btn--cancel {
        background: #b9c9d6;
        color: #203544;
    }

    .exact-btn--add {
        background: #2e9b58;
        color: #fff;
    }

    .exact-btn:active {
        transform: translateY(1px);
    }

    .photo-uploader {
        width: 160px;
        height: 160px;
        margin: 0 auto;
        background: #e9eef2;
        border-radius: 16px;
        border: 2px solid #a9c2d7;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        position: relative;
    }

    .photo-uploader__img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .photo-uploader__placeholder {
        font-size: 48px;
        color: #a9c2d7;
    }

    .photo-uploader__btn {
        display: block;
        width: 160px;
        margin: 12px auto 0;
        text-align: center;
        padding: 8px 12px;
        background: #a9c2d7;
        color: #203544;
        font-weight: 700;
        border-radius: 999px;
        cursor: pointer;
    }
</style>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        function lockScroll(lock) {
            if (lock) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        }

        // ADD/EDIT MODAL 
        const modal = document.getElementById('officialModal');
        if (modal) {
            const form = document.getElementById('officialForm');
            const methodField = document.getElementById('method-field');
            const submitBtn = document.getElementById('modalSubmitButton');
            const modalTitle = document.getElementById('modalTitle');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const lastNameEl = document.getElementById('last_name');
            const firstNameEl = document.getElementById('first_name');
            const middleInitialEl = document.getElementById('middle_initial');
            const positionEl = document.getElementById('position');
            const displayOrderEl = document.getElementById('display_order');
            const photoInput = document.getElementById('photo_path');
            const photoPreview = document.getElementById('photo-preview');
            const photoPlaceholder = document.getElementById('photo-placeholder');

            const resetPhotoPreview = () => {
                photoPreview.src = '';
                photoPreview.classList.add('hidden');
                photoPlaceholder.classList.remove('hidden');
            };

            const openModal = () => {
                modal.classList.add('open');
                lockScroll(true);
                setTimeout(() => lastNameEl?.focus(), 10);
            };
            const closeModal = () => {
                modal.classList.remove('open');
                lockScroll(false);
                form?.reset();
                resetPhotoPreview();
            };

            window.openAddModal = () => {
                form.reset();
                form.action = "{{ route('admin.officials.store') }}";
                methodField.innerHTML = "";
                modalTitle.textContent = "Add Official";
                submitBtn.textContent = "ADD";
                resetPhotoPreview();
                openModal();
            };
            window.openEditModal = (btn) => {
                const o = JSON.parse(btn.dataset.official);
                form.reset();
                form.action = `/admin/officials/${o.id}`;
                methodField.innerHTML = `<input type="hidden" name="_method" value="PUT">`;
                modalTitle.textContent = "Edit Official";
                submitBtn.textContent = "SAVE";
                lastNameEl.value = o.last_name || '';
                firstNameEl.value = o.first_name || '';
                middleInitialEl.value = o.middle_initial || '';
                positionEl.value = o.position || '';
                displayOrderEl.value = o.display_order || 0;
                if (o.photo_path) {
                    photoPreview.src = `/storage/${o.photo_path}`;
                    photoPreview.classList.remove('hidden');
                    photoPlaceholder.classList.add('hidden');
                } else {
                    resetPhotoPreview();
                }
                openModal();
            };

            photoInput.addEventListener('change', () => {
                const file = photoInput.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = e => {
                        photoPreview.src = e.target.result;
                        photoPreview.classList.remove('hidden');
                        photoPlaceholder.classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    resetPhotoPreview();
                }
            });

            form.addEventListener('submit', async e => {
                e.preventDefault();
                const formData = new FormData(form);
                try {
                    const res = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: formData
                    });
                    if (res.ok) {
                        location.reload();
                    } else if (res.status === 422) {
                        const data = await res.json();
                        let msg = 'Please fix:\n';
                        for (const k in data.errors) {
                            msg += `- ${data.errors[k].join(', ')}\n`;
                        }
                        alert(msg);
                    } else {
                        throw new Error('Server error');
                    }
                } catch (err) {
                    console.error(err);
                    alert('An error occurred.');
                }
            });
        }

        // VIEW MODAL
        const viewModal = document.getElementById('viewOfficialModal');
        if (viewModal) {
            const viewLastName = document.getElementById('view_last_name');
            const viewFirstName = document.getElementById('view_first_name');
            const viewMiddleInitial = document.getElementById('view_middle_initial');
            const viewPosition = document.getElementById('view_position');
            const viewPhoto = document.getElementById('view_photo');
            window.openViewModal = (btn) => {
                const o = JSON.parse(btn.dataset.official);
                viewLastName.value = o.last_name || '';
                viewFirstName.value = o.first_name || '';
                viewMiddleInitial.value = o.middle_initial || '';
                viewPosition.value = o.position || '';
                viewPhoto.src = o.photo_path ? `/storage/${o.photo_path}` : '/img/kagawad-placeholder.jpg';
                viewModal.classList.add('open');
                lockScroll(true);
            };
        }

        // GLOBAL HANDLERS
        document.addEventListener('click', e => {
            const addBtn = e.target.closest('#addOfficialBtn');
            const editBtn = e.target.closest('.edit-btn');
            const viewBtn = e.target.closest('.icon-view');
            const closeBtn = e.target.closest('[data-close]');

            if (addBtn) {
                window.openAddModal();
            } else if (editBtn) {
                window.openEditModal(editBtn);
            } else if (viewBtn) {
                window.openViewModal(viewBtn);
            } else if (closeBtn) {
                const m = closeBtn.closest('.exact-modal');
                if (m) {
                    m.classList.remove('open');
                    lockScroll(false);
                    if (m.id === 'officialModal') {
                        m.querySelector('form')?.reset();
                        document.getElementById('photo-preview').src = '';
                        document.getElementById('photo-preview').classList.add('hidden');
                        document.getElementById('photo-placeholder').classList.remove('hidden');
                    }
                }
            }
        });
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') {
                const m = document.querySelector('.exact-modal.open');
                if (m) {
                    m.classList.remove('open');
                    lockScroll(false);
                    if (m.id === 'officialModal') {
                        m.querySelector('form')?.reset();
                        document.getElementById('photo-preview').src = '';
                        document.getElementById('photo-preview').classList.add('hidden');
                        document.getElementById('photo-placeholder').classList.remove('hidden');
                    }
                }
            }
        });
    });
</script>
@endpush