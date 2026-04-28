<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* ============================================================
           COFFEE THEME SYSTEM — CSS VARIABLES
           All theme tokens live here. Tailwind classes handle spacing/layout.
           ============================================================ */

        /* ---------- Flat White (Light) ---------- */
        body.theme-flat_white {
            --bg-main:       #f6f1ea;
            --bg-surface:    #ffffff;
            --bg-sidebar:    #ede8e0;
            --bg-topbar:     #ffffff;
            --bg-card:       #faf7f3;
            --bg-hover:      #f3ede4;
            --bg-thead:      #ede8e0;
            --bg-input:      #ffffff;
            --bg-tag:        #e8ddd1;
            --bg-modal:      #ffffff;
            --bg-nav-active: #e0d7cb;
            --bg-ghost:      #e8ddd1;

            --text-main:     #3b3027;
            --text-muted:    #7a6a5a;
            --text-tag:      #5c3f25;
            --text-ghost:    #5c3f25;

            --border-main:   #d9cfc2;
            --border-input:  #c8b9a8;
            --border-sidebar:#d9cfc2;

            --primary:       #785736;
            --primary-hover: #5c3f25;
            --primary-text:  #ffffff;
        }

        /* ---------- Spanish Latte (Default / Mid) ---------- */
        body.theme-latte,
        body.theme-spanish_latte {
            --bg-main:       #e8ded6;
            --bg-surface:    #f6f3ee;
            --bg-sidebar:    #ddd5c8;
            --bg-topbar:     #f6f3ee;
            --bg-card:       #f0ece5;
            --bg-hover:      #ede6dc;
            --bg-thead:      #d8d0c5;
            --bg-input:      #faf8f5;
            --bg-tag:        #d8cfc3;
            --bg-modal:      #f6f3ee;
            --bg-nav-active: #d0c8ba;
            --bg-ghost:      #d8cfc3;

            --text-main:     #3b3027;
            --text-muted:    #6a5a4a;
            --text-tag:      #4a3828;
            --text-ghost:    #4a3828;

            --border-main:   #c8bead;
            --border-input:  #b8a898;
            --border-sidebar:#c8bead;

            --primary:       #785736;
            --primary-hover: #5c3f25;
            --primary-text:  #ffffff;
        }

        /* ---------- Cold Brew (Dark) ---------- */
        body.theme-cold_brew {
            --bg-main:       #1f1a17;
            --bg-surface:    #2a221d;
            --bg-sidebar:    #241e19;
            --bg-topbar:     #2a221d;
            --bg-card:       #332820;
            --bg-hover:      #3a2f28;
            --bg-thead:      #3a2f28;
            --bg-input:      #1f1a17;
            --bg-tag:        #3a2f28;
            --bg-modal:      #2a221d;
            --bg-nav-active: #3a2f28;
            --bg-ghost:      #3a2f28;

            --text-main:     #e8ded6;
            --text-muted:    #9a8a7a;
            --text-tag:      #c49a6c;
            --text-ghost:    #c49a6c;

            --border-main:   #3a2f28;
            --border-input:  #4a3f38;
            --border-sidebar:#3a2f28;

            --primary:       #c49a6c;
            --primary-hover: #a07848;
            --primary-text:  #1f1a17;
        }

        /* ============================================================
           BASE STYLES — Applied via CSS variables
           ============================================================ */
        body {
            background-color: var(--bg-main);
            color: var(--text-main);
            font-family: 'Georgia', 'Times New Roman', serif;
        }

        /* Sidebar */
        .sidebar {
            background-color: var(--bg-sidebar);
            border-right: 1px solid var(--border-sidebar);
            transition: background-color 0.3s, border-color 0.3s;
        }

        /* Topbar / Navbar */
        .navbar {
            background-color: var(--bg-topbar);
            border-bottom: 1px solid var(--border-main);
            transition: background-color 0.3s, border-color 0.3s;
        }

        /* Cards / Surfaces */
        .card, .surface {
            background-color: var(--bg-surface);
            border: 1px solid var(--border-main);
            border-radius: 10px;
        }

        /* Nav links */
        .nav-link {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 9px 12px;
            border-radius: 8px;
            font-size: 0.875rem;
            color: var(--text-main);
            transition: background-color 0.2s, color 0.2s;
            text-decoration: none;
        }
        .nav-link:hover {
            background-color: var(--bg-nav-active);
        }
        .nav-link.active {
            background-color: var(--bg-nav-active);
            font-weight: 700;
        }

        /* Primary button */
        .btn-primary {
            background-color: var(--primary);
            color: var(--primary-text);
            border: none;
            border-radius: 6px;
            padding: 8px 16px;
            font-family: 'Georgia', serif;
            font-weight: 700;
            font-size: 0.8rem;
            cursor: pointer;
            transition: background-color 0.2s;
            letter-spacing: 0.3px;
        }
        .btn-primary:hover { background-color: var(--primary-hover); }

        /* Ghost / secondary button */
        .btn-ghost {
            background-color: var(--bg-ghost);
            color: var(--text-ghost);
            border: 1px solid var(--border-main);
            border-radius: 6px;
            padding: 8px 16px;
            font-family: 'Georgia', serif;
            font-weight: 700;
            font-size: 0.8rem;
            cursor: pointer;
            transition: background-color 0.2s, opacity 0.2s;
        }
        .btn-ghost:hover { opacity: 0.75; }

        /* Tables */
        .table-container {
            background-color: var(--bg-surface);
            border: 1px solid var(--border-main);
            border-radius: 10px;
            overflow: hidden;
        }
        .table-header-row {
            background-color: var(--bg-thead);
            color: var(--text-muted);
        }
        .table-body-row {
            border-top: 1px solid var(--border-main);
            transition: background-color 0.15s;
        }
        .table-body-row:hover { background-color: var(--bg-hover); }

        /* Form inputs */
        .form-input {
            background-color: var(--bg-input);
            border: 1px solid var(--border-input);
            color: var(--text-main);
            border-radius: 6px;
            padding: 9px 12px;
            font-family: 'Georgia', serif;
            font-size: inherit;
            width: 100%;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .form-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(120, 87, 54, 0.12);
        }
        .form-input option {
            background-color: var(--bg-input);
            color: var(--text-main);
        }

        /* Form label */
        .form-label {
            display: block;
            font-size: 0.68rem;
            letter-spacing: 0.7px;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 6px;
        }

        /* Tags / badges */
        .tag {
            display: inline-block;
            padding: 3px 9px;
            border-radius: 4px;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            background-color: var(--bg-tag);
            color: var(--text-tag);
        }
        .tag-admin  { background-color: var(--primary); color: var(--primary-text); }
        .tag-editor { background-color: var(--bg-tag);  color: var(--text-tag); }
        .tag-viewer { background-color: transparent; border: 1px solid var(--border-main); color: var(--text-muted); }

        /* Sidebar footer border */
        .sidebar-footer {
            border-top: 1px solid var(--border-sidebar);
        }

        /* Settings button in sidebar */
        .sidebar-settings-btn {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 9px 12px;
            background-color: var(--bg-ghost);
            color: var(--text-ghost);
            border: 1px solid var(--border-main);
            border-radius: 8px;
            cursor: pointer;
            font-family: 'Georgia', serif;
            font-size: 0.8rem;
            font-weight: 700;
            transition: background-color 0.2s, color 0.2s, border-color 0.2s;
            letter-spacing: 0.3px;
            text-align: left;
        }
        .sidebar-settings-btn:hover {
            background-color: var(--primary);
            color: var(--primary-text);
            border-color: var(--primary);
        }

        /* Modal overlay */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 200;
            backdrop-filter: blur(2px);
        }
        .modal-overlay.open { display: flex; }

        /* Modal box */
        .modal-box {
            background-color: var(--bg-modal);
            border: 1px solid var(--border-main);
            border-radius: 14px;
            padding: 28px 30px;
            width: 440px;
            max-width: calc(100vw - 40px);
            max-height: calc(100vh - 80px);
            overflow-y: auto;
            animation: modalIn 0.22s ease;
            transition: background-color 0.3s, border-color 0.3s;
        }

        @keyframes modalIn {
            from { opacity: 0; transform: scale(0.96) translateY(8px); }
            to   { opacity: 1; transform: scale(1)    translateY(0);   }
        }

        .modal-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--text-main);
        }

        .modal-footer {
            display: flex;
            gap: 8px;
            justify-content: flex-end;
            margin-top: 22px;
            padding-top: 16px;
            border-top: 1px solid var(--border-main);
        }

        /* Settings theme cards */
        .theme-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-bottom: 4px;
        }

        .theme-card {
            border: 2px solid var(--border-main);
            border-radius: 10px;
            padding: 10px 8px;
            text-align: center;
            cursor: pointer;
            transition: border-color 0.2s, transform 0.15s;
            font-family: 'Georgia', serif;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--text-main);
            background: transparent;
        }
        .theme-card:hover { transform: translateY(-1px); }
        .theme-card.selected { border-color: var(--primary); }

        .theme-preview {
            width: 100%;
            height: 32px;
            border-radius: 6px;
            margin-bottom: 7px;
            display: block;
        }

        /* Settings font options */
        .font-option-btn {
            flex: 1;
            padding: 9px;
            border: 1px solid var(--border-main);
            border-radius: 6px;
            background: transparent;
            color: var(--text-main);
            cursor: pointer;
            font-family: 'Georgia', serif;
            text-align: center;
            transition: background-color 0.2s, color 0.2s, border-color 0.2s;
        }
        .font-option-btn:hover { background-color: var(--bg-hover); }
        .font-option-btn.selected {
            border-color: var(--primary);
            background-color: var(--primary);
            color: var(--primary-text);
            font-weight: 700;
        }

        /* Settings section label */
        .settings-section-label {
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.7px;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 10px;
            display: block;
        }

        /* Toast notification */
        .toast {
            position: fixed;
            bottom: 28px;
            right: 28px;
            background-color: var(--primary);
            color: var(--primary-text);
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 700;
            font-family: 'Georgia', serif;
            z-index: 999;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease;
            pointer-events: none;
        }
        .toast.show { opacity: 1; transform: translateY(0); }

        /* Stat card */
        .stat-card {
            background-color: var(--bg-card);
            border: 1px solid var(--border-main);
            border-radius: 10px;
            padding: 18px 20px;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .stat-label {
            font-size: 0.65rem;
            letter-spacing: 0.9px;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 6px;
        }
        .stat-value { font-size: 1.75rem; font-weight: 700; }
        .stat-sub   { font-size: 0.7rem; color: var(--text-muted); margin-top: 4px; }

        /* Muted text utility */
        .text-muted { color: var(--text-muted); }

        /* Divider */
        .section-divider {
            border: none;
            border-top: 1px solid var(--border-main);
            margin: 16px 0;
        }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-thumb { background: var(--border-main); border-radius: 4px; }
    </style>
</head>

@php
    $theme    = auth()->check() ? (auth()->user()->setting->theme    ?? 'latte')  : 'latte';
    $fontSize = auth()->check() ? (auth()->user()->setting->font_size ?? 'medium') : 'medium';

    $fontClass = match($fontSize) {
        'small' => 'text-sm',
        'large' => 'text-lg',
        default => 'text-base',
    };

    $currentRoute = request()->route()?->getName() ?? '';
@endphp

<body class="theme-{{ $theme }} transition-all duration-300 min-h-screen flex {{ $fontClass }}"
      data-theme="{{ $theme }}"
      data-font="{{ $fontSize }}">

<div class="flex w-full min-h-screen">

    {{-- ===================== SIDEBAR ===================== --}}
    <aside class="sidebar w-64 flex flex-col flex-shrink-0">

        {{-- Logo --}}
        <div class="p-5 flex items-center gap-3" style="border-bottom: 1px solid var(--border-sidebar);">
            <div class="w-8 h-8 rounded-lg flex items-center justify-center text-base flex-shrink-0"
                 style="background-color: var(--primary); color: var(--primary-text);">
                ☕
            </div>
            <span class="font-bold text-sm tracking-wide" style="color: var(--primary);">
                BrewAdmin
            </span>
        </div>

        {{-- Navigation --}}
        <nav class="p-4 space-y-1 flex-1">
            <p class="settings-section-label px-1 mb-3">Navigation</p>

            <a href="{{ route('dashboard') }}"
               class="nav-link {{ str_starts_with($currentRoute, 'dashboard') ? 'active' : '' }}">
                {{-- Dashboard icon --}}
                <svg width="15" height="15" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.6">
                    <rect x="1" y="1" width="6" height="6" rx="1"/>
                    <rect x="9" y="1" width="6" height="6" rx="1"/>
                    <rect x="1" y="9" width="6" height="6" rx="1"/>
                    <rect x="9" y="9" width="6" height="6" rx="1"/>
                </svg>
                Dashboard
            </a>

            @php $authUser = auth()->user(); @endphp

            @if($authUser && ($authUser->is_admin || $authUser->email === 'jimenezchristianaugustus@gmail.com'))
                <a href="{{ route('users.index') }}"
                   class="nav-link {{ str_starts_with($currentRoute, 'users') ? 'active' : '' }}">
                    {{-- Users icon --}}
                    <svg width="15" height="15" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.6">
                        <circle cx="6" cy="5" r="2.5"/>
                        <path d="M1 14c0-2.8 2.2-5 5-5s5 2.2 5 5"/>
                        <path d="M11 7c1.1 0 2 .9 2 2s-.9 2-2 2"/>
                        <path d="M13 14c0-1.7-.7-3.2-1.8-4.2"/>
                    </svg>
                    Registered Users
                </a>
            @endif
        </nav>

        {{-- Footer: User info + Settings button --}}
        <div class="sidebar-footer p-4 space-y-3">

            {{-- Logged-in user --}}
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0"
                     style="background-color: var(--primary); color: var(--primary-text);">
                    {{ strtoupper(substr(auth()->user()->firstname ?? 'G', 0, 1)) }}
                </div>
                <div>
                    <div class="text-xs font-bold">{{ auth()->user()->firstname ?? 'Guest' }} {{ auth()->user()->lastname ?? '' }}</div>
                    <div class="text-xs text-muted">
                        @if(auth()->user()?->is_admin) Administrator @else User @endif
                    </div>
                </div>
            </div>

            {{-- ⚙ Settings button --}}
            <button class="sidebar-settings-btn" onclick="openSettingsModal()">
                <svg width="13" height="13" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.6">
                    <circle cx="8" cy="8" r="2.5"/>
                    <path d="M8 1v2M8 13v2M1 8h2M13 8h2M3.05 3.05l1.41 1.41M11.54 11.54l1.41 1.41M3.05 12.95l1.41-1.41M11.54 4.46l1.41-1.41"/>
                </svg>
                System Settings
            </button>

            {{-- Logout --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn-ghost w-full text-left" style="width:100%; text-align:center;">
                    Sign Out
                </button>
            </form>

        </div>
    </aside>

    {{-- ===================== MAIN ===================== --}}
    <main class="flex-1 min-w-0 flex flex-col">

        {{-- TOPBAR --}}
        <header class="navbar h-16 px-6 flex items-center justify-between flex-shrink-0">
            <div>
                <div class="font-bold text-sm">@yield('page-title', 'Dashboard')</div>
                <div class="text-xs text-muted">@yield('page-subtitle', '')</div>
            </div>
            <div class="flex items-center gap-2">
                @yield('topbar-actions')

           
            </div>
        </header>

        {{-- PAGE CONTENT --}}
        <section class="p-6 flex-1 overflow-y-auto">
            @if(session('success'))
                <div class="mb-4 px-4 py-3 rounded-lg text-sm font-bold"
                     style="background-color: var(--bg-card); border: 1px solid var(--border-main); color: var(--primary);">
                    ✓ {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-4 px-4 py-3 rounded-lg text-sm"
                     style="background-color: #fef2f2; border: 1px solid #fca5a5; color: #b91c1c;">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </section>

    </main>
</div>

{{-- ===================== SETTINGS MODAL ===================== --}}
<div class="modal-overlay" id="settingsModal">
    <div class="modal-box">
        <div class="modal-title">⚙ System Settings</div>

        <form id="settingsForm" method="POST" action="{{ route('settings.update') }}">
            @csrf

            {{-- THEME --}}
            <div class="mb-6">
                <span class="settings-section-label">Theme</span>
                <div class="theme-grid">

                    <button type="button"
                            class="theme-card {{ $theme === 'flat_white' ? 'selected' : '' }}"
                            onclick="selectTheme('flat_white')"
                            id="tc-flat_white">
                        <span class="theme-preview"
                              style="background: linear-gradient(135deg,#f6f1ea 60%,#ede8e0); border: 1px solid #d9cfc2;"></span>
                        ☀ Flat White
                    </button>

                    <button type="button"
                            class="theme-card {{ in_array($theme, ['latte','spanish_latte']) ? 'selected' : '' }}"
                            onclick="selectTheme('latte')"
                            id="tc-latte">
                        <span class="theme-preview"
                              style="background: linear-gradient(135deg,#e8ded6 60%,#ddd5c8); border: 1px solid #c8bead;"></span>
                        ☕ Spanish Latte
                    </button>

                    <button type="button"
                            class="theme-card {{ $theme === 'cold_brew' ? 'selected' : '' }}"
                            onclick="selectTheme('cold_brew')"
                            id="tc-cold_brew">
                        <span class="theme-preview"
                              style="background: linear-gradient(135deg,#1f1a17 60%,#241e19); border: 1px solid #3a2f28;"></span>
                        🌙 Cold Brew
                    </button>

                </div>
                <input type="hidden" name="theme" id="themeInput" value="{{ $theme }}" />
            </div>

            {{-- FONT SIZE --}}
            <div class="mb-2">
                <span class="settings-section-label">Font Size</span>
                <div class="flex gap-2">
                    <button type="button"
                            class="font-option-btn {{ $fontSize === 'small'  ? 'selected' : '' }}"
                            id="fc-small"  onclick="selectFont('small')"
                            style="font-size: 12px;">Small</button>

                    <button type="button"
                            class="font-option-btn {{ $fontSize === 'medium' ? 'selected' : '' }}"
                            id="fc-medium" onclick="selectFont('medium')"
                            style="font-size: 14px;">Medium</button>

                    <button type="button"
                            class="font-option-btn {{ $fontSize === 'large'  ? 'selected' : '' }}"
                            id="fc-large"  onclick="selectFont('large')"
                            style="font-size: 16px;">Large</button>
                </div>
                <input type="hidden" name="font_size" id="fontInput" value="{{ $fontSize }}" />
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-ghost" onclick="closeSettingsModal()">Cancel</button>
                <button type="submit" class="btn-primary">Save &amp; Apply</button>
            </div>
        </form>
    </div>
</div>

{{-- TOAST --}}
<div class="toast" id="toast"></div>

{{-- Close modal on overlay click --}}
<script>
    document.getElementById('settingsModal').addEventListener('click', function(e) {
        if (e.target === this) closeSettingsModal();
    });
</script>

@stack('modals')

<script>
    /* ============================================================
       SETTINGS MODAL
       ============================================================ */
    var pendingTheme = document.getElementById('themeInput').value;
    var pendingFont  = document.getElementById('fontInput').value;

    function openSettingsModal() {
        document.getElementById('settingsModal').classList.add('open');
    }

    function closeSettingsModal() {
        document.getElementById('settingsModal').classList.remove('open');
    }

    function selectTheme(t) {
        pendingTheme = t;
        document.querySelectorAll('.theme-card').forEach(function(el) {
            el.classList.remove('selected');
        });
        var card = document.getElementById('tc-' + t);
        if (card) card.classList.add('selected');
        document.getElementById('themeInput').value = t;

        /* Live preview on body (will be overwritten on page reload after save) */
        document.body.dataset.theme = t;
        var themeClass = Array.from(document.body.classList).find(function(c) {
            return c.startsWith('theme-');
        });
        if (themeClass) document.body.classList.remove(themeClass);
        document.body.classList.add('theme-' + t);
    }

    function selectFont(f) {
        pendingFont = f;
        document.querySelectorAll('.font-option-btn').forEach(function(el) {
            el.classList.remove('selected');
        });
        var btn = document.getElementById('fc-' + f);
        if (btn) btn.classList.add('selected');
        document.getElementById('fontInput').value = f;

        /* Live preview */
        document.body.classList.remove('text-sm', 'text-base', 'text-lg');
        var map = { small: 'text-sm', medium: 'text-base', large: 'text-lg' };
        document.body.classList.add(map[f] || 'text-base');
    }

    /* ============================================================
       TOAST HELPER
       ============================================================ */
    function showToast(msg) {
        var t = document.getElementById('toast');
        t.textContent = msg;
        t.classList.add('show');
        setTimeout(function() { t.classList.remove('show'); }, 2800);
    }

    /* Show toast if session flash is set */
    @if(session('settings_saved'))
        showToast('Settings applied successfully!');
    @endif

    @if(session('success'))
        showToast('{{ session('success') }}');
    @endif

    /* ============================================================
       KEYBOARD: ESC closes modal
       ============================================================ */
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeSettingsModal();
    });
</script>

@stack('scripts')

</body>
</html>