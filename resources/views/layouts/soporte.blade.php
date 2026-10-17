<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Soporte técnico') | Los Magios</title>
    <style>
        :root{font-family:Inter,Segoe UI,Arial,sans-serif;color:#17263e;background:#f3f6fb}*{box-sizing:border-box}body{margin:0}header{background:#12243f;color:#fff;padding:20px max(24px,calc((100vw - 1120px)/2))}header strong{font-size:20px}header small{display:block;color:#b8c9e1;margin-top:4px}main{max-width:1120px;margin:32px auto;padding:0 20px}.toolbar{display:flex;align-items:center;justify-content:space-between;gap:16px;flex-wrap:wrap;margin-bottom:20px}h1{font-size:27px;margin:0 0 8px}p{color:#64748b;margin:0}.panel{background:#fff;border:1px solid #e2e8f0;border-radius:14px;padding:24px;box-shadow:0 8px 30px #1a32500a}.button,button{background:#2563eb;border:0;color:#fff;padding:11px 16px;border-radius:9px;font-weight:600;cursor:pointer;text-decoration:none;display:inline-block;font-size:14px}.button.secondary{background:#e9eff8;color:#263b58}.button:hover,button:hover{filter:brightness(.94)}label{display:block;font-size:14px;font-weight:600;margin:0 0 7px}.field{margin-bottom:20px}input,textarea,select{width:100%;border:1px solid #cbd5e1;border-radius:8px;padding:11px;font:inherit;background:white;color:#17263e}textarea{min-height:125px;resize:vertical}input:focus,textarea:focus,select:focus{outline:2px solid #93c5fd;border-color:#2563eb}.grid{display:grid;grid-template-columns:1fr 1fr;gap:20px}.actions{display:flex;gap:10px;align-items:center;flex-wrap:wrap}.alert{padding:14px 16px;border-radius:9px;margin-bottom:20px;background:#e8f8ef;color:#166534}.alert.error{background:#fff1f2;color:#9f1239}.table-wrap{overflow-x:auto}table{width:100%;border-collapse:collapse;min-width:880px}th{text-align:left;background:#f7f9fd;font-size:12px;text-transform:uppercase;letter-spacing:.04em;color:#64748b}th,td{padding:14px 12px;border-bottom:1px solid #e8edf5;vertical-align:top}td{font-size:14px}td.description{max-width:260px;overflow-wrap:anywhere}.status-form{display:flex;gap:8px;align-items:center}.status-form select{min-width:132px}.status-form button{white-space:nowrap}.pill{display:inline-block;border-radius:100px;background:#eaf0fa;padding:5px 9px;font-size:12px;font-weight:600}.muted{color:#64748b;font-size:13px}.errors{margin:0;padding-left:20px}.footer{margin-top:25px;color:#64748b;font-size:12px}@media(max-width:650px){.grid{grid-template-columns:1fr}main{margin:20px auto}.panel{padding:16px}h1{font-size:23px}}
    </style>
</head>
<body>
<header><strong>Los Magios · Soporte técnico</strong><small>Registro y control de solicitudes</small></header>
<main>
    @if(session('success'))
        <div class="alert" role="status">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert error" role="alert"><strong>Revisa los siguientes datos:</strong><ul class="errors">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
    @endif
    @yield('content')
    <div class="footer">Programación III · Hito 3 · Funcionalidad web</div>
</main>
</body>
</html>
