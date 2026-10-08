<?php
if (isset($_GET['fix_landing'])) {
    echo "<div style='background:#0f2952;color:white;padding:30px;font-family:sans-serif;'>";
    echo "<h2>✅ Found Your Real Server Folder!</h2>";
    echo "<p>Your real files are located at: <b style='color:#3cd2eb;font-size:18px;'>" . __DIR__ . "\\index.php</b></p>";
    echo "</div>";
    exit;
}
session_start();

if (isset($_GET['end_session'])) {
    unset($_SESSION['student_logged_in']);
    header("Location: student_dashboard.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['start_student_session'])) {
    $_SESSION['student_logged_in'] = true;
    $_SESSION['s_name']    = $_POST['s_name'];
    $_SESSION['s_roll']    = $_POST['s_roll'];
    $_SESSION['s_zprn']    = $_POST['s_zprn'];
    $_SESSION['s_pc']      = $_POST['s_pc'];
    $_SESSION['s_faculty'] = $_POST['s_faculty'];
    header("Location: student_dashboard.php");
    exit;
}

$logged_in = $_SESSION['student_logged_in'] ?? false;
$s_name    = $_SESSION['s_name'] ?? 'Rutuja Kadam';
$s_roll    = $_SESSION['s_roll'] ?? 'EC2203';
$s_zprn    = $_SESSION['s_zprn'] ?? '125UEC1152';
$s_pc      = $_SESSION['s_pc']   ?? 'PC-03';
$s_faculty = $_SESSION['s_faculty'] ?? 'Prof. Sana A. Metkari (Python / PBL)';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZCOER | Student Lab Workstation Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .bouncy-btn {
            transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .bouncy-btn:hover {
            transform: translateY(-6px) scale(1.03);
        }
        .glow-allowed:hover {
            box-shadow: 0 0 25px rgba(16, 185, 129, 0.5);
            border-color: rgba(52, 211, 153, 0.9);
        }
        .glow-blocked:hover {
            box-shadow: 0 0 25px rgba(244, 63, 94, 0.55);
            border-color: rgba(251, 113, 133, 0.9);
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen font-sans flex flex-col justify-between relative overflow-x-hidden">

    <!-- Ambient Glowing Orbs -->
    <div class="fixed top-[-120px] left-[-120px] w-96 h-96 bg-emerald-600/20 rounded-full blur-[130px] pointer-events-none"></div>
    <div class="fixed bottom-[-120px] right-[-120px] w-96 h-96 bg-blue-600/20 rounded-full blur-[130px] pointer-events-none"></div>

    <header class="bg-slate-900/80 border-b border-emerald-500/30 px-6 py-3.5 backdrop-blur-xl sticky top-0 z-50 shadow-[0_4px_25px_rgba(16,185,129,0.15)]">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-4">
            <div class="flex items-center space-x-3.5">
                <!-- Official Zeal Logo -->
                <div class="h-11 w-11 rounded-full bg-white p-1 shadow-[0_0_20px_rgba(16,185,129,0.7)] flex items-center justify-center border-2 border-emerald-400 overflow-hidden shrink-0">
                    <img src="zeal.jfif" alt="ZCOER Logo" class="h-full w-full object-contain rounded-full"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div style="display:none;" class="h-full w-full rounded-full border border-emerald-900 bg-white flex-col items-center justify-center text-center leading-none">
                        <span class="text-[6px] font-bold text-emerald-900">ZEAL</span>
                    </div>
                </div>
                <div>
                    <h1 class="text-base font-extrabold text-white">ZEAL COLLEGE OF ENGINEERING & RESEARCH, PUNE-41</h1>
                    <p class="text-xs text-emerald-400">Smart Digital Lab • Student Workstation Dashboard</p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <a href="index.php" class="text-xs bg-slate-800 hover:bg-slate-700 border border-emerald-500/40 text-emerald-300 px-3.5 py-1.5 rounded-xl font-bold transition hover:scale-105">
                    <i class="fa-solid fa-house mr-1"></i> Home
                </a>
                <?php if ($logged_in): ?>
                    <a href="student_dashboard.php?end_session=1" class="bg-rose-600/20 hover:bg-rose-600/40 border border-rose-500/50 text-rose-300 text-xs font-bold px-3.5 py-1.5 rounded-xl shadow-[0_0_15px_rgba(244,63,94,0.3)] transition hover:scale-105">
                        <i class="fa-solid fa-power-off mr-1"></i> Leave Lab PC
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <?php if (!$logged_in): ?>
    <!-- STUDENT LOGIN / CHECK-IN SCREEN -->
    <main class="max-w-md w-full mx-auto px-6 py-8 flex-grow flex items-center relative z-10">
        <div class="w-full bg-slate-900/85 backdrop-blur-xl border-2 border-emerald-500/50 rounded-3xl p-8 shadow-[0_0_50px_rgba(16,185,129,0.3)]">
            <div class="flex items-center space-x-3 mb-5">
                <div class="h-12 w-12 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-white text-xl shadow-[0_0_20px_rgba(16,185,129,0.8)]">
                    <i class="fa-solid fa-user-graduate"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-extrabold text-white">Lab Check-In</h2>
                    <p class="text-xs text-emerald-400">Register your PC for live lab supervision</p>
                </div>
            </div>

            <form method="POST" class="space-y-4">
                <input type="hidden" name="start_student_session" value="1">
                
                <div>
                    <label class="block text-xs font-bold uppercase text-amber-300 mb-1">Select Faculty & Subject</label>
                    <select name="s_faculty" class="w-full bg-slate-950 border border-amber-500/50 rounded-xl px-3 py-2.5 text-sm text-white font-semibold outline-none focus:border-amber-400">
                        <option value="Prof. Kalyani Barje (EW Lab)">Prof. Kalyani Barje (EW Lab)</option>
                        <option value="Prof. Sana A. Metkari (Python / PBL)">Prof. Sana A. Metkari (Python / PBL)</option>
                        <option value="Dr. Mahesh S. Navale (Admin)">Dr. Mahesh S. Navale (Admin)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-emerald-300 mb-1">Quick Select Team Member</label>
                    <select onchange="fillStudent(this.value)" class="w-full bg-slate-950 border border-emerald-500/40 rounded-xl px-3 py-2.5 text-xs text-emerald-300 font-semibold outline-none focus:border-emerald-400">
                        <option value="Rutuja Kadam|EC2203|125UEC1152|PC-03">Rutuja Kadam (EC2203 - PC-03)</option>
                        <option value="Aryan Thombre|EC2204|125UEC1125|PC-01">Aryan Thombre (EC2204 - PC-01)</option>
                        <option value="Gayatri Adgaonkar|EC2205|125UEC1110|PC-02">Gayatri Adgaonkar (EC2205 - PC-02)</option>
                        <option value="Yash Kotkar|EC2223|125UEC1001|PC-04">Yash Kotkar (EC2223 - PC-04)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase text-slate-300 mb-1">Student Full Name</label>
                    <input type="text" id="s_name" name="s_name" value="Rutuja Kadam" required class="w-full bg-slate-950 border border-emerald-500/40 rounded-xl px-3.5 py-2 text-sm text-white outline-none">
                </div>
                
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-300 mb-1">Roll Number</label>
                        <input type="text" id="s_roll" name="s_roll" value="EC2203" required class="w-full bg-slate-950 border border-emerald-500/40 rounded-xl px-3.5 py-2 text-sm text-white outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-300 mb-1">PC Number</label>
                        <input type="text" id="s_pc" name="s_pc" value="PC-03" required class="w-full bg-slate-950 border border-emerald-500/40 rounded-xl px-3.5 py-2 text-sm text-white outline-none">
                    </div>
                </div>
                
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-300 mb-1">ZPRN Number</label>
                    <input type="text" id="s_zprn" name="s_zprn" value="125UEC1152" required class="w-full bg-slate-950 border border-emerald-500/40 rounded-xl px-3.5 py-2 text-sm text-white outline-none">
                </div>
                
                <button type="submit" class="bouncy-btn w-full bg-gradient-to-r from-emerald-600 via-teal-500 to-emerald-500 text-white font-extrabold py-3.5 rounded-2xl mt-2 shadow-[0_0_25px_rgba(16,185,129,0.6)]">
                    Start Monitored Lab Session <i class="fa-solid fa-play ml-1"></i>
                </button>
            </form>
        </div>
    </main>
    <script>
        function fillStudent(val) {
            const [name, roll, zprn, pc] = val.split('|');
            document.getElementById('s_name').value = name;
            document.getElementById('s_roll').value = roll;
            document.getElementById('s_zprn').value = zprn;
            document.getElementById('s_pc').value   = pc;
        }
    </script>

    <?php else: ?>
    <!-- STUDENT DASHBOARD (LOGGED IN) -->
    <main class="max-w-7xl mx-auto w-full px-6 py-6 space-y-6 flex-grow relative z-10">
        
        <!-- Top Status Bar -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 bg-slate-900/85 backdrop-blur-xl border border-emerald-500/40 p-5 rounded-3xl items-center shadow-[0_0_30px_rgba(16,185,129,0.2)]">
            <div class="lg:col-span-5 flex items-center space-x-4">
                <div class="bg-gradient-to-br from-emerald-500 to-teal-600 text-white font-black px-4 py-3 rounded-2xl text-base shadow-[0_0_20px_rgba(16,185,129,0.6)]">
                    <i class="fa-solid fa-desktop mr-1"></i><?= htmlspecialchars($s_pc) ?>
                </div>
                <div>
                    <h2 class="text-lg font-extrabold text-white"><?= htmlspecialchars($s_name) ?></h2>
                    <p class="text-xs text-slate-300">Roll No: <strong class="text-emerald-300"><?= htmlspecialchars($s_roll) ?></strong> | Faculty: <strong class="text-amber-300"><?= htmlspecialchars($s_faculty) ?></strong></p>
                </div>
            </div>

            <div class="lg:col-span-4 bg-slate-950/90 border border-slate-800 p-3.5 rounded-2xl text-xs space-y-1">
                <div class="flex justify-between">
                    <span class="text-slate-400">Current Window:</span>
                    <span id="currentWin" class="text-cyan-400 font-bold">Google Classroom</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-slate-400">Security Alert:</span>
                    <span id="currentAlert" class="text-emerald-400 font-bold">None</span>
                </div>
            </div>

            <div class="lg:col-span-3 flex justify-end">
                <div id="statusBadge" class="inline-flex items-center gap-2 bg-emerald-500/20 border border-emerald-400/60 text-emerald-300 px-4 py-2.5 rounded-2xl font-extrabold text-sm shadow-[0_0_20px_rgba(16,185,129,0.4)]">
                    <span id="statusDot" class="h-2.5 w-2.5 rounded-full bg-emerald-400 animate-ping"></span>
                    <span id="statusText">ACTIVE (Working)</span>
                </div>
            </div>
        </div>

        <!-- Violation Banner (Hidden by default) -->
        <div id="violationBanner" class="hidden bg-rose-950/90 border-2 border-rose-500 text-rose-200 p-5 rounded-3xl flex items-center justify-between shadow-[0_0_40px_rgba(244,63,94,0.6)] animate-bounce">
            <div class="flex items-center space-x-3">
                <i class="fa-solid fa-triangle-exclamation text-rose-400 text-3xl"></i>
                <div>
                    <h4 class="font-extrabold text-base text-white">SECURITY POLICY VIOLATION BLOCKED!</h4>
                    <p id="violationText" class="text-xs text-rose-200">Unauthorized app blocked and reported to Faculty Dashboard.</p>
                </div>
            </div>
            <button onclick="clearAlert()" class="bg-slate-900 hover:bg-slate-800 text-xs font-bold px-4 py-2 rounded-xl border border-rose-400 text-white">
                Return to Academic Work
            </button>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
            
            <!-- Whitelisted Academic Sites (ALLOWED) -->
            <div class="bg-slate-900/80 backdrop-blur-xl border border-emerald-500/40 rounded-3xl p-6 space-y-4 shadow-[0_0_25px_rgba(16,185,129,0.15)]">
                <div class="flex items-center justify-between">
                    <h3 class="text-base font-extrabold text-white"><i class="fa-solid fa-circle-check text-emerald-400 mr-2"></i>Whitelisted Tools & Apps</h3>
                    <span class="text-[11px] bg-emerald-500/20 border border-emerald-400/40 text-emerald-300 px-3 py-1 rounded-full font-bold">Allowed</span>
                </div>
                <p class="text-xs text-slate-300 mb-2">Click to set your active window. These are approved for lab sessions:</p>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                    <button onclick="setWorkspace('MATLAB Workspace')" class="bouncy-btn glow-allowed bg-slate-950 border border-emerald-500/30 p-3.5 rounded-2xl text-left">
                        <div class="text-sm font-extrabold text-emerald-400"><i class="fa-solid fa-calculator mr-1.5"></i>MATLAB Online</div>
                        <div class="text-[11px] text-slate-400 mt-0.5">MathWorks Cloud IDE</div>
                    </button>
                    <button onclick="setWorkspace('VS Code Editor')" class="bouncy-btn glow-allowed bg-slate-950 border border-blue-500/30 p-3.5 rounded-2xl text-left">
                        <div class="text-sm font-extrabold text-cyan-400"><i class="fa-solid fa-code mr-1.5"></i>VS Code</div>
                        <div class="text-[11px] text-slate-400 mt-0.5">Local Development IDE</div>
                    </button>
                    <button onclick="setWorkspace('Python Compiler')" class="bouncy-btn glow-allowed bg-slate-950 border border-yellow-500/30 p-3.5 rounded-2xl text-left">
                        <div class="text-sm font-extrabold text-yellow-400"><i class="fa-brands fa-python mr-1.5"></i>Python Compiler</div>
                        <div class="text-[11px] text-slate-400 mt-0.5">Online Python Execution</div>
                    </button>
                    <button onclick="setWorkspace('Google Classroom')" class="bouncy-btn glow-allowed bg-slate-950 border border-amber-500/30 p-3.5 rounded-2xl text-left">
                        <div class="text-sm font-extrabold text-amber-400"><i class="fa-solid fa-chalkboard mr-1.5"></i>Google Classroom</div>
                        <div class="text-[11px] text-slate-400 mt-0.5">Course Materials & Uploads</div>
                    </button>
                    <button onclick="setWorkspace('College Email / Gmail')" class="bouncy-btn glow-allowed bg-slate-950 border border-purple-500/30 p-3.5 rounded-2xl text-left sm:col-span-2">
                        <div class="text-sm font-extrabold text-purple-400"><i class="fa-solid fa-envelope mr-1.5"></i>Email Services</div>
                        <div class="text-[11px] text-slate-400 mt-0.5">Gmail / Outlook / Academic Mail</div>
                    </button>
                </div>
            </div>

            <!-- Restricted Sites (BLOCKED) -->
            <div class="bg-slate-900/80 backdrop-blur-xl border border-rose-500/40 rounded-3xl p-6 space-y-4 shadow-[0_0_25px_rgba(244,63,94,0.15)]">
                <div class="flex items-center justify-between">
                    <h3 class="text-base font-extrabold text-white"><i class="fa-solid fa-ban text-rose-400 mr-2"></i>Restricted Auto-Blocker List</h3>
                    <span class="text-[11px] bg-rose-500/20 border border-rose-400/40 text-rose-300 px-3 py-1 rounded-full font-bold">Auto-Blocked</span>
                </div>
                <p class="text-xs text-slate-300 mb-2">Click to test the blocker. Alerts are instantly sent to the faculty.</p>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                    <button onclick="triggerBlock('WhatsApp Web')" class="bouncy-btn glow-blocked bg-slate-950 border border-green-500/30 p-3.5 rounded-2xl text-left">
                        <div class="text-sm font-extrabold text-green-400"><i class="fa-brands fa-whatsapp mr-1.5"></i>WhatsApp</div>
                        <div class="text-[11px] text-slate-400 mt-0.5">Messaging App (Blocked)</div>
                    </button>
                    <button onclick="triggerBlock('Instagram')" class="bouncy-btn glow-blocked bg-slate-950 border border-pink-500/30 p-3.5 rounded-2xl text-left">
                        <div class="text-sm font-extrabold text-pink-400"><i class="fa-brands fa-instagram mr-1.5"></i>Instagram</div>
                        <div class="text-[11px] text-slate-400 mt-0.5">Social Media (Blocked)</div>
                    </button>
                    <button onclick="triggerBlock('YouTube')" class="bouncy-btn glow-blocked bg-slate-950 border border-red-500/30 p-3.5 rounded-2xl text-left">
                        <div class="text-sm font-extrabold text-red-400"><i class="fa-brands fa-youtube mr-1.5"></i>YouTube</div>
                        <div class="text-[11px] text-slate-400 mt-0.5">Video Streaming (Blocked)</div>
                    </button>
                    <button onclick="triggerBlock('Gaming Apps')" class="bouncy-btn glow-blocked bg-slate-950 border border-amber-500/30 p-3.5 rounded-2xl text-left">
                        <div class="text-sm font-extrabold text-amber-500"><i class="fa-solid fa-gamepad mr-1.5"></i>PC Gaming</div>
                        <div class="text-[11px] text-slate-400 mt-0.5">All Game Portals (Blocked)</div>
                    </button>
                    <button onclick="triggerBlock('Facebook & All Social Media')" class="bouncy-btn glow-blocked bg-slate-950 border border-blue-500/30 p-3.5 rounded-2xl text-left sm:col-span-2">
                        <div class="text-sm font-extrabold text-blue-400"><i class="fa-brands fa-facebook mr-1.5"></i>All Other Social Apps</div>
                        <div class="text-[11px] text-slate-400 mt-0.5">Facebook, X, Snapchat (Blocked)</div>
                    </button>
                </div>
            </div>
        </div>
    </main>

    <script>
        let lastInput = Date.now();
        let activeWindow = "Google Classroom";
        let alertMsg = "None";
        const facultyName = "<?= addslashes($s_faculty) ?>";

        function recordActivity() { lastInput = Date.now(); }
        window.addEventListener('mousemove', recordActivity);
        window.addEventListener('keydown', recordActivity);
        window.addEventListener('click', recordActivity);

        function setWorkspace(title) {
            recordActivity();
            activeWindow = title;
            document.getElementById('currentWin').innerText = title;
            sendHeartbeat();
        }

        function triggerBlock(site) {
            recordActivity();
            activeWindow = "BLOCKED: " + site;
            alertMsg = "Unauthorized Tab: " + site;
            document.getElementById('currentWin').innerText = activeWindow;
            
            const alertEl = document.getElementById('currentAlert');
            alertEl.innerText = alertMsg;
            alertEl.className = "text-amber-400 font-extrabold animate-pulse";
            
            document.getElementById('violationBanner').classList.remove('hidden');
            document.getElementById('violationText').innerText = site + " was auto-closed and reported to " + facultyName + "'s dashboard!";
            sendHeartbeat();
        }

        function clearAlert() {
            alertMsg = "None";
            activeWindow = "Google Classroom";
            document.getElementById('currentWin').innerText = activeWindow;
            
            const alertEl = document.getElementById('currentAlert');
            alertEl.innerText = "None";
            alertEl.className = "text-emerald-400 font-bold";
            
            document.getElementById('violationBanner').classList.add('hidden');
            sendHeartbeat();
        }

        async function sendHeartbeat() {
            const idleSeconds = (Date.now() - lastInput) / 1000;
            const status = idleSeconds > 15 ? "Inactive" : "Active";

            const badge = document.getElementById('statusBadge');
            const dot   = document.getElementById('statusDot');
            const text  = document.getElementById('statusText');

            if (status === "Active") {
                badge.className = "inline-flex items-center gap-2 bg-emerald-500/20 border border-emerald-400/60 text-emerald-300 px-4 py-2.5 rounded-2xl font-extrabold text-sm shadow-[0_0_20px_rgba(16,185,129,0.4)]";
                dot.className   = "h-2.5 w-2.5 rounded-full bg-emerald-400 animate-ping";
                text.innerText  = "ACTIVE (Working)";
            } else {
                badge.className = "inline-flex items-center gap-2 bg-rose-500/20 border border-rose-400/60 text-rose-300 px-4 py-2.5 rounded-2xl font-extrabold text-sm shadow-[0_0_20px_rgba(244,63,94,0.5)]";
                dot.className   = "h-2.5 w-2.5 rounded-full bg-rose-500 animate-ping";
                text.innerText  = "INACTIVE (Idle > 15s)";
            }

            try {
                await fetch('api_update.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        roll_no: "<?= addslashes($s_roll) ?>",
                        zprn: "<?= addslashes($s_zprn) ?>",
                        name: "<?= addslashes($s_name) ?>",
                        pc_no: "<?= addslashes($s_pc) ?>",
                        status: status,
                        active_window: activeWindow,
                        alert_msg: alertMsg
                    })
                });
            } catch (e) {
                console.error("Sync error:", e);
            }
        }

        sendHeartbeat();
        setInterval(sendHeartbeat, 3000);
    </script>
    <?php endif; ?>

    <footer class="bg-slate-900/90 border-t border-emerald-500/20 px-6 py-3 text-xs text-slate-400 text-center relative z-10">
        ZCOER Smart Digital Lab Monitoring System • Student Workstation Client
    </footer>
</body>
</html>