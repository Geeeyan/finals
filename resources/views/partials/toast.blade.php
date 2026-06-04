@if(session('status') || session('status_error'))
  <div id="globalToast" style="position:fixed;top:20px;right:20px;z-index:9999;">
    @if(session('status'))
      <div style="background:#36d870;border:1px solid rgba(0,0,0,.08);color:#062;padding:14px 18px;border-radius:12px;min-width:240px;box-shadow:0 12px 36px rgba(0,0,0,.35);display:flex;gap:12px;align-items:flex-start">
        <div style="flex:1">
          <div style="font-weight:800;font-size:1rem;margin-bottom:6px;color:#042">Welcome</div>
          <div style="font-size:.92rem;color:#042">{{ session('status') }}</div>
          @if(session('status_meta'))
            <div style="font-size:.82rem;color:rgba(4,34,20,.8);margin-top:6px">{{ session('status_meta') }}</div>
          @endif
        </div>
        <button id="toastClose" style="background:transparent;border:none;color:rgba(4,34,20,.8);font-size:18px;cursor:pointer">✕</button>
      </div>
    @else
      <div style="background:#ff4d4f;border:1px solid rgba(0,0,0,.08);color:#fff;padding:14px 18px;border-radius:12px;min-width:240px;box-shadow:0 12px 36px rgba(0,0,0,.35);display:flex;gap:12px;align-items:flex-start">
        <div style="flex:1">
          <div style="font-weight:800;font-size:1rem;margin-bottom:6px;color:#fff">Error</div>
          <div style="font-size:.92rem;color:#fff">{{ session('status_error') }}</div>
        </div>
        <button id="toastClose" style="background:transparent;border:none;color:#fff;font-size:18px;cursor:pointer">✕</button>
      </div>
    @endif
  </div>

  <script>
    (function(){
      const t = document.getElementById('globalToast');
      const close = document.getElementById('toastClose');
      if(!t) return;
      const hide = ()=>{ if(t) t.style.display='none'; };
      let timer = setTimeout(hide, 4200);
      close.addEventListener('click', ()=>{ clearTimeout(timer); hide(); });
      t.addEventListener('mouseover', ()=> clearTimeout(timer));
      t.addEventListener('mouseout', ()=> timer = setTimeout(hide, 2000));
    })();
  </script>
@endif
