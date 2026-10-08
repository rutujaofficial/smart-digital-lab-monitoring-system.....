<?php
session_start();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $faculty_name = $_POST['faculty_name'] ?? 'Prof. Kalyani Barje';
    $subject      = $_POST['subject'] ?? 'Electronic Workshop (EW)';
    $password     = $_POST['password'] ?? '';

    if ($password === 'zcoer123' || $password === 'admin123') {
        $_SESSION['faculty_logged_in'] = true;
        $_SESSION['faculty_name'] = $faculty_name;
        $_SESSION['faculty_subject'] = $subject;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid Faculty Access Key! Use: zcoer123";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZCOER | Faculty Portal Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gradient-to-br from-[#081c3e] via-[#0f2952] to-[#163a70] min-h-screen flex items-center justify-center p-4">

    <div class="bg-white rounded-3xl shadow-2xl max-w-md w-full overflow-hidden border border-white/20">
        <div class="bg-[#0f2952] p-6 text-center text-white border-b border-blue-800">
            <div class="w-16 h-16 rounded-full bg-white text-[#0f2952] mx-auto flex items-center justify-center font-black text-lg border-4 border-cyan-400 shadow-md mb-3">
                ZES
            </div>
            <span class="px-3 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-widest bg-cyan-400/20 text-cyan-300 border border-cyan-400/30">
                Faculty Supervision Console
            </span>
            <h1 class="text-xl font-black mt-2">ZCOER Faculty Login</h1>
            <p class="text-xs text-slate-300 mt-0.5">Department of Electronics &amp; Computer Engineering</p>
        </div>

        <form method="POST" class="p-6 space-y-4">
            <?php if ($error): ?>
                <div class="bg-rose-50 border border-rose-200 text-rose-700 text-xs font-bold p-3 rounded-xl flex items-center gap-2">
                    <i class="fa-solid fa-circle-exclamation"></i> <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Select Faculty Member *</label>
                <select name="faculty_name" id="facultySelect" onchange="autoMatchSubject()" class="w-full border border-slate-300 rounded-xl px-3.5 py-2.5 text-sm font-bold text-slate-900 focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    <option value="Prof. Kalyani Barje">Prof. Kalyani Barje (Electronic Workshop)</option>
                    <option value="Prof. Sana A. Metkari">Prof. Sana A. Metkari (Python / PBL Lab)</option>
                    <option value="Dr. Mahesh S. Navale">Dr. Mahesh S. Navale (HOD — E&amp;CE)</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Select Lab Session / Subject *</label>
                <select name="subject" id="subjectSelect" class="w-full border border-slate-300 rounded-xl px-3.5 py-2.5 text-sm font-semibold text-slate-800 focus:ring-2 focus:ring-blue-600 focus:outline-none">
                    <option value="Electronic Workshop (EW)">Electronic Workshop (EW)</option>
                    <option value="Python / PBL Lab">Python / PBL Lab</option>
                    <option value="All Labs (Master Supervision)">All Labs (Master Supervision)</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Faculty Access Passkey *</label>
                <input type="password" name="password" value="zcoer123" required placeholder="Enter Passkey (zcoer123)" class="w-full border border-slate-300 rounded-xl px-3.5 py-2.5 text-sm font-bold text-slate-900 focus:ring-2 focus:ring-blue-600 focus:outline-none">
                <p class="text-[11px] text-slate-400 mt-1">Default Demo Passkey: <strong>zcoer123</strong></p>
            </div>

            <button type="submit" class="w-full bg-[#133b7c] hover:bg-[#0d2a59] text-white font-extrabold py-3 rounded-xl shadow-lg transition flex items-center justify-center gap-2 text-sm">
                <i class="fa-solid fa-shield-halved"></i> Launch Live Lab Dashboard
            </button>

            <div class="pt-2 text-center">
                <a href="index.php" class="text-xs font-bold text-slate-500 hover:text-[#0f2952]">
                    <i class="fa-solid fa-arrow-left mr-1"></i> Back to ZCOER Home
                </a>
            </div>
        </form>
    </div>

    <script>
        function autoMatchSubject() {
            const fac = document.getElementById('facultySelect').value;
            const sub = document.getElementById('subjectSelect');
            if (fac === 'Prof. Kalyani Barje') {
                sub.value = 'Electronic Workshop (EW)';
            } else if (fac === 'Prof. Sana A. Metkari') {
                sub.value = 'Python / PBL Lab';
            } else {
                sub.value = 'All Labs (Master Supervision)';
            }
        }
    </script>
</body>
</html>