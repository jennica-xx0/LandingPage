@props([
'id' => 'appModal',
'title' => 'Modal Title',
'action' => '#',
'submitLabel' => 'SAVE',
])

<div id="{{ $id }}" class="app-modal" aria-hidden="true" role="dialog">
    <div class="app-modal__overlay" data-modal-close></div>

    <div class="app-modal__panel" role="document" aria-labelledby="{{ $id }}-title">
        <div class="app-modal__header">
            <div class="flex items-center gap-3">
                <img src="{{ asset('img/barangaylogo.jpg') }}" alt="Logo" class="w-8 h-8 rounded-full object-cover">
                <h3 id="{{ $id }}-title" class="app-modal__title">{{ $title }}</h3>
            </div>
            <button type="button" class="app-modal__close" aria-label="Close" data-modal-close>
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form id="{{ $id }}-form" method="POST" action="{{ $action }}" enctype="multipart/form-data">
            @csrf
            <div id="{{ $id }}-method-field"></div>

            <div class="app-modal__body">
                {{ $slot }}
            </div>

            <div class="app-modal__footer">
                <button type="button" class="app-btn app-btn--cancel" data-modal-close>CANCEL</button>
                <button type="submit" id="{{ $id }}-submit-btn" class="app-btn app-btn--primary">{{ $submitLabel }}</button>
            </div>
        </form>
    </div>
</div>

@once
<style>
    :root {
        --modal-header: #2e658d;
        --modal-body: #f3ede5;
        --modal-border: #101010;
        --btn-cancel: #b9c9d6;
        --btn-cancel-text: #203544;
        --btn-primary: #2e9b58;
        --btn-primary-text: #0d1e11;
        --field-bg: #ffffff;
        --field-border: #e5e7eb;
        --field-shadow: 0 1px 0 rgba(0, 0, 0, .05) inset, 0 1px 2px rgba(0, 0, 0, .06);
    }

    .app-modal {
        position: fixed;
        inset: 0;
        display: none;
        z-index: 9999;
    }

    .app-modal.open {
        display: block;
    }

    .app-modal__overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, .45);
    }

    .app-modal__panel {
        position: relative;
        margin: 4vh auto;
        width: min(520px, 92%);
        background: var(--modal-body);
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 24px 60px rgba(0, 0, 0, .35);
        border: 2px solid var(--modal-border);
    }

    .app-modal__header {
        background: var(--modal-header);
        color: #fff;
        padding: 12px 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        border-bottom: 1px solid rgba(0, 0, 0, .12);
    }

    .app-modal__title {
        font-weight: 700;
        font-size: 16px;
    }

    .app-modal__close {
        background: transparent;
        border: 0;
        cursor: pointer;
        color: #fff;
        font-size: 18px;
        line-height: 1;
    }

    .app-modal__body {
        padding: 16px 18px 8px;
    }

    .app-modal__body .block {
        margin-bottom: 1rem;
    }

    .app-modal__footer {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding: 14px 18px;
        border-top: 1px solid rgba(0, 0, 0, .08);
        background: transparent;
    }

    .lbl {
        display: block;
        font-weight: 600;
        margin-bottom: 6px;
    }

    .app-input,
    .app-textarea {
        width: 100%;
        background: var(--field-bg);
        border: 1px solid var(--field-border);
        border-radius: 10px;
        padding: 10px 12px;
        box-shadow: var(--field-shadow);
        outline: none;
    }

    .app-textarea {
        min-height: 110px;
        resize: vertical;
    }

    .app-btn {
        border: 0;
        border-radius: 999px;
        padding: 10px 18px;
        font-weight: 700;
        box-shadow: 0 1px 2px rgba(0, 0, 0, .08);
        cursor: pointer;
    }

    .app-btn--cancel {
        background: var(--btn-cancel);
        color: var(--btn-cancel-text);
    }

    .app-btn--primary {
        background: var(--btn-primary);
        color: var(--btn-primary-text);
    }

    .app-btn:active {
        transform: translateY(1px);
    }

    .app-date__wrap {
        position: relative;
    }

    .app-date__icon {
        position: absolute;
        right: 6px;
        top: 50%;
        transform: translateY(-50%);
        background: #eef0f2;
        border: 1px solid #cfd6dc;
        border-radius: 6px;
        width: 34px;
        height: 28px;
        display: grid;
        place-items: center;
        color: #5b6670;
    }
</style>

@push('scripts')
<script>
    (function() {
        function lockBody(lock) {
            if (lock) {
                document.body.dataset.prevOverflow = document.body.style.overflow || '';
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = document.body.dataset.prevOverflow || '';
                delete document.body.dataset.prevOverflow;
            }
        }
        document.addEventListener('click', function(e) {
            const openBtn = e.target.closest('[data-modal-open]');
            if (openBtn) {
                const sel = openBtn.getAttribute('data-modal-open');
                const modal = document.querySelector(sel);
                if (modal) {
                    modal.classList.add('open');
                    modal.setAttribute('aria-hidden', 'false');
                    lockBody(true);
                    const first = modal.querySelector('input, textarea, select, button');
                    first && first.focus();
                }
            }
            const closeBtn = e.target.closest('[data-modal-close]');
            if (closeBtn) {
                const modal = closeBtn.closest('.app-modal');
                if (modal) {
                    const form = modal.querySelector('form');
                    form && form.reset();
                    modal.classList.remove('open');
                    modal.setAttribute('aria-hidden', 'true');
                    lockBody(false);
                }
            }
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const open = document.querySelector('.app-modal.open');
                if (open) {
                    const form = open.querySelector('form');
                    form && form.reset();
                    open.classList.remove('open');
                    open.setAttribute('aria-hidden', 'true');
                    lockBody(false);
                }
            }
        });
    })();
</script>
@endpush
@endonce