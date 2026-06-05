<style>
  :root{
    --bg: #ffffff;
    --panel: #f5f5f5;
    --text: #0a0a0a;
    --muted: rgba(0,0,0,.6);
    --accent: #36d870;
    --card-bg: #ffffff;
    --card-border: rgba(0,0,0,.06);
  }

  @media (prefers-color-scheme: dark){
    :root{
      --bg: #0a0a0a;
      --panel: #181818;
      --text: #ffffff;
      --muted: rgba(255,255,255,.65);
      --accent: #36d870;
      --card-bg: #181818;
      --card-border: rgba(255,255,255,.06);
    }
  }

  html,body{background:var(--bg);color:var(--text)}
</style>
