<div class="pret-feature-card">
    <div class="pret-feature-icon"><i data-lucide="{{ $icon }}"></i></div>
    <h5 class="pret-feature-title">{{ $title }}</h5>
    <p class="pret-feature-desc">{{ $desc }}</p>
</div>

<style>
.pret-feature-card { background:#fff; border:1px solid rgba(0,0,0,.07); border-radius:14px; padding:28px 24px; height:100%; transition:box-shadow .3s,transform .3s; }
.dark .pret-feature-card { background:rgba(255,255,255,.04); border-color:rgba(255,255,255,.08); }
.pret-feature-card:hover { box-shadow:0 8px 30px rgba(0,0,0,.1); transform:translateY(-4px); }
.pret-feature-icon { width:46px; height:46px; background:rgba(79,70,229,.1); border-radius:12px; display:flex; align-items:center; justify-content:center; margin-bottom:14px; color:var(--clr-theme-1,#4f46e5); }
.pret-feature-icon svg { width:22px; height:22px; }
.pret-feature-title { font-size:16px; font-weight:700; margin-bottom:8px; }
.pret-feature-desc { font-size:13px; color:#6b7280; line-height:1.7; margin:0; }
</style>
