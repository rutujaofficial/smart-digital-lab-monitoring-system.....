<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: faculty_login.php");
    exit;
}
$faculty =$_SESSION['faculty'] ?? 'Prof. Sana A. Metkari';
$subject =$_SESSION['subject'] ?? 'Python Programming & PBL Lab';
$lab     =$_SESSION['lab'] ?? 'EC-Lab-01 (Main Server)';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZCOER | Live Faculty Monitoring Console</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background-image: 
                linear-gradient(to right, rgba(59, 130, 246, 0.06) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(59, 130, 246, 0.06) 1px, transparent 1px);
            background-size: 36px 36px;
            pointer-events: none;
            z-index: 0;
        }
        .bouncy-card {
            transition: all 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .bouncy-card:hover {
            transform: translateY(-7px) scale(1.02);
        }
        .card-active {
            box-shadow: 0 0 25px rgba(16, 185, 129, 0.25);
        }
        .card-active:hover {
            box-shadow: 0 0 45px rgba(16, 185, 129, 0.6);
        }
        .card-inactive {
            box-shadow: 0 0 25px rgba(244, 63, 94, 0.3);
        }
        .card-inactive:hover {
            box-shadow: 0 0 45px rgba(244, 63, 94, 0.65);
        }
        .card-violation {
            box-shadow: 0 0 35px rgba(245, 158, 11, 0.55);
            border-color: rgba(251, 191, 36, 0.9) !important;
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen font-sans flex flex-col justify-between relative overflow-x-hidden">

    <!-- Neon Ambient Orbs -->
    <div class="fixed top-[-120px] left-[-120px] w-96 h-96 bg-blue-600/20 rounded-full blur-[130px] pointer-events-none"></div>
    <div class="fixed bottom-[-120px] right-[-120px] w-96 h-96 bg-emerald-600/20 rounded-full blur-[130px] pointer-events-none"></div>

    <!-- Top Header with Official Zeal Logo & Live Clock -->
    <header class="bg-slate-900/85 border-b border-blue-500/30 px-6 py-3.5 backdrop-blur-xl sticky top-0 z-50 shadow-[0_4px_30px_rgba(59,130,246,0.2)]">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-4">
            <div class="flex items-center space-x-3.5">
                <div class="h-12 w-12 rounded-full bg-white p-1 shadow-[0_0_20px_rgba(59,130,246,0.75)] flex items-center justify-center border-2 border-blue-400 overflow-hidden shrink-0">
                    <img src="zeal.jfif" alt="ZCOER Logo" class="h-full w-full object-contain rounded-full"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div style="display:none;" class="h-full w-full rounded-full border border-blue-900 bg-white flex-col items-center justify-center text-center leading-none">
                        <span class="text-[6px] font-bold text-blue-900">ZEAL</span>
                        <span class="text-xs font-black text-blue-900">ZES</span>
                    </div>
                </div>
                <div>
                    <h1 class="text-base font-extrabold text-white tracking-wide">ZEAL COLLEGE OF ENGINEERING & RESEARCH, PUNE-41</h1>
                    <p class="text-xs text-cyan-400 font-medium">Smart Digital Lab Monitoring System • Live Cybersecurity Console</p>
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-2.5">
                <!-- Live Digital Lab Clock -->
                <div class="bg-slate-950 border border-cyan-500/40 text-cyan-300 px-3.5 py-1.5 rounded-xl text-xs font-mono font-bold shadow-[0_0_15px_rgba(6,182,212,0.25)]">
                    <i class="fa-regular fa-clock mr-1 text-cyan-400"></i> <span id="liveClock">--:--:--</span>
                </div>

                <!-- Export CSV Attendance Button -->
                <button onclick="exportCSV()" class="bg-gradient-to-r from-blue-600 to-cyan-500 hover:from-blue-500 hover:to-cyan-400 text-white text-xs font-extrabold px-3.5 py-1.5 rounded-xl shadow-[0_0_20px_rgba(59,130,246,0.5)] transition hover:scale-105">
                    <i class="fa-solid fa-file-csv mr-1"></i> Export Report
                </button>

                <a href="index.php" class="text-xs bg-slate-800 hover:bg-slate-700 border border-slate-600 text-slate-200 px-3.5 py-1.5 rounded-xl font-bold transition hover:scale-105">
                    <i class="fa-solid fa-house mr-1"></i> Home
                </a>

                <a href="logout.php" class="bg-rose-600/20 hover:bg-rose-600/40 border border-rose-500/50 text-rose-300 text-xs font-bold px-3.5 py-1.5 rounded-xl shadow-[0_0_15px_rgba(244,63,94,0.3)] transition hover:scale-105">
                    <i class="fa-solid fa-power-off mr-1"></i> End
                </a>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto w-full px-6 py-6 space-y-6 flex-grow relative z-10">

        <!-- Faculty Info & Live Counter Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 bg-slate-900/85 backdrop-blur-xl border border-blue-500/40 p-5 rounded-3xl shadow-[0_0_30px_rgba(59,130,246,0.2)]">
            <div class="lg:col-span-4 flex items-center space-x-3">
                <div class="h-12 w-12 rounded-2xl bg-blue-500/20 border border-blue-400/50 flex items-center justify-center text-blue-400 text-lg shadow-[0_0_15px_rgba(59,130,246,0.4)]">
                    <i class="fa-solid fa-chalkboard-user"></i>
                </div>
                <div>
                    <span class="text-[11px] uppercase text-cyan-400 font-bold block">Logged-In Faculty</span>
                    <h2 class="text-base font-extrabold text-white"><?= htmlspecialchars($faculty) ?></h2>
                </div>
            </div>

            <div class="lg:col-span-4 flex items-center space-x-3">
                <div class="h-12 w-12 rounded-2xl bg-purple-500/20 border border-purple-400/50 flex items-center justify-center text-purple-400 text-lg shadow-[0_0_15px_rgba(168,85,247,0.4)]">
                    <i class="fa-solid fa-book-open-reader"></i>
                </div>
                <div>
                    <span class="text-[11px] uppercase text-purple-400 font-bold block">Subject & Lab</span>
                    <h2 class="text-base font-extrabold text-white"><?= htmlspecialchars($subject) ?></h2>
                    <span class="text-xs text-cyan-400"><?= htmlspecialchars($lab) ?></span>
                </div>
            </div>

            <div class="lg:col-span-4 grid grid-cols-3 gap-3">
                <div class="bouncy-card bg-slate-950 border border-blue-500/40 p-2.5 rounded-2xl text-center shadow-[0_0_15px_rgba(59,130,246,0.25)]">
                    <span class="text-xs text-blue-300 font-bold block">Total PCs</span>
                    <span id="totalCount" class="text-2xl font-black text-white">0</span>
                </div>
                <div class="bouncy-card bg-emerald-950/50 border border-emerald-400/50 p-2.5 rounded-2xl text-center shadow-[0_0_20px_rgba(16,185,129,0.3)]">
                    <span class="text-xs text-emerald-300 font-bold block">Active</span>
                    <span id="activeCount" class="text-2xl font-black text-emerald-400">0</span>
                </div>
                <div class="bouncy-card bg-rose-950/50 border border-rose-400/50 p-2.5 rounded-2xl text-center shadow-[0_0_20px_rgba(244,63,94,0.3)]">
                    <span class="text-xs text-rose-300 font-bold block">Inactive</span>
                    <span id="inactiveCount" class="text-2xl font-black text-rose-400">0</span>
                </div>
            </div>
        </div>

        <!-- Live Lab Engagement Progress Bar + Filter Bar -->
        <div class="bg-slate-900/80 backdrop-blur-xl border border-cyan-500/30 p-4 rounded-2xl space-y-3 shadow-[0_0_20px_rgba(6,182,212,0.15)]">
            <div class="flex flex-wrap justify-between items-center gap-3">
                <div class="flex items-center gap-2 text-xs font-bold">
                    <span class="text-cyan-400"><i class="fa-solid fa-chart-line mr-1"></i>Live Lab Engagement Rate:</span>
                    <span id="engagementPercent" class="text-emerald-400 font-extrabold text-sm">100%</span>
                </div>
                <div class="flex flex-wrap items-center gap-2 text-xs">
                    <button onclick="setFilter('ALL')" class="px-3 py-1 rounded-lg bg-blue-600/30 border border-blue-400/50 text-white font-bold hover:scale-105 transition">All PCs</button>
                    <button onclick="setFilter('Active')" class="px-3 py-1 rounded-lg bg-emerald-600/20 border border-emerald-400/40 text-emerald-300 font-bold hover:scale-105 transition">Active Only</button>
                    <button onclick="setFilter('Inactive')" class="px-3 py-1 rounded-lg bg-rose-600/20 border border-rose-400/40 text-rose-300 font-bold hover:scale-105 transition">Inactive Only</button>
                </div>
            </div>
            <div class="w-full h-3 bg-slate-950 rounded-full overflow-hidden border border-slate-800 p-0.5">
                <div id="engagementBar" class="h-full bg-gradient-to-r from-emerald-500 via-teal-400 to-cyan-400 rounded-full transition-all duration-500 shadow-[0_0_15px_rgba(16,185,129,0.8)]" style="width: 100%"></div>
            </div>
        </div>

        <!-- Dynamic Glowing Student Grid -->
        <div id="studentGrid" class="grid grid-cols-1 md:grid-cols-2 gap-6"></div>
    </main>

    <footer class="bg-slate-900/90 border-t border-blue-500/20 px-6 py-3 text-xs text-slate-400 flex justify-between relative z-10">
        <span>ZCOER PBL Project: Smart Digital Lab Monitoring System</span>
        <span>Guide: Prof. Sana A. Metkari | HOD: Dr. Mahesh S. Navale</span>
    </footer>

    <script>
        let latestStudents = [];
        let currentFilter = 'ALL';
        let lastAlertSnapshot = "";

        // 1. Live Digital Clock
        setInterval(() => {
            document.getElementById('liveClock').innerText = new Date().toLocaleTimeString();
        }, 1000);
        document.getElementById('liveClock').innerText = new Date().toLocaleTimeString();

        // 2. Web Audio API Beep for New Policy Violations
        function playViolationSound() {
            try {
                const ctx = new (window.AudioContext || window.webkitAudioContext)();
                const osc = ctx.createOscillator();
                const gain = ctx.createGain();
                osc.type = 'sawtooth';
                osc.frequency.setValueAtTime(660, ctx.currentTime);
                gain.gain.setValueAtTime(0.08, ctx.currentTime);
                osc.connect(gain);
                gain.connect(ctx.destination);
                osc.start();
                osc.stop(ctx.currentTime + 0.18);
            } catch (e) {}
        }

        function setFilter(filter) {
            currentFilter = filter;
            renderGrid();
        }

        // 3. 1-Click CSV Attendance & Activity Export
        function exportCSV() {
            let csv = "PC No,Roll No,ZPRN,Student Name,Status,Active Window,Violation Alert,Last Seen\n";
            latestStudents.forEach(s => {
                csv += `"${s.pc_no}","${s.roll_no}","${s.zprn}","${s.name}","${s.status}","${s.active_window}","${s.alert_msg}","${s.last_seen}"\n`;
            });
            const blob = new Blob([csv], { type: 'text/csv' });
            const a = document.createElement('a');
            a.href = URL.createObjectURL(blob);
            a.download = "ZCOER_Smart_Lab_Report.csv";
            a.click();
        }

        function renderGrid() {
            let active = 0, inactive = 0;
            const grid = document.getElementById('studentGrid');
            grid.innerHTML = '';

            let alertConcat = "";

            latestStudents.forEach(s => {
                const isActive = s.status === 'Active';
                if (isActive) active++; else inactive++;
                if (s.alert_msg !== 'None') alertConcat += s.roll_no + s.alert_msg;

                if (currentFilter !== 'ALL' && s.status !== currentFilter) return;

                const hasViolation = s.alert_msg !== 'None';
                const border = hasViolation
                    ? 'card-violation'
                    : (isActive ? 'border-emerald-400/60 card-active' : 'border-rose-500/70 card-inactive');

                const badge = isActive
                    ? 'bg-emerald-500/20 text-emerald-300 border-emerald-400/60 shadow-[0_0_15px_rgba(16,185,129,0.5)]'
                    : 'bg-rose-500/20 text-rose-300 border-rose-400/60 shadow-[0_0_15px_rgba(244,63,94,0.5)]';
                const dot = isActive ? 'bg-emerald-400 animate-pulse' : 'bg-rose-500 animate-ping';

                grid.innerHTML += `
                    <div class="bouncy-card bg-slate-900/85 backdrop-blur-xl border-2 ${border} rounded-3xl p-6 relative overflow-hidden">
                        <div class="flex justify-between items-start">
                            <div class="flex items-center space-x-3.5">
                                <div class="bg-gradient-to-br from-blue-600 to-cyan-500 text-white font-black px-3.5 py-2.5 rounded-2xl shadow-[0_0_15px_rgba(59,130,246,0.5)] text-sm">
                                    <i class="fa-solid fa-desktop mr-1"></i>${s.pc_no}
                                </div>
                                <div>
                                    <h3 class="text-lg font-extrabold text-white">${s.name}</h3>
                                    <p class="text-xs text-slate-300">Roll No: <strong class="text-cyan-300">${s.roll_no}</strong> • ZPRN: ${s.zprn}</p>
                                </div>
                            </div>
                            <span class="inline-flex items-center gap-2 border ${badge} text-xs font-extrabold px-3.5 py-1.5 rounded-full">
                                <span class="h-2.5 w-2.5 rounded-full ${dot}"></span> ${s.status.toUpperCase()}
                            </span>
                        </div>

                        <div class="mt-5 bg-slate-950/90 border border-slate-800 rounded-2xl p-4 space-y-2.5 text-xs">
                            <div class="flex justify-between">
                                <span class="text-slate-400 font-semibold"><i class="fa-regular fa-window-maximize mr-1"></i>Active Window:</span>
                                <span class="text-cyan-400 font-bold">${s.active_window}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-400 font-semibold"><i class="fa-solid fa-shield-halved mr-1"></i>Security Status:</span>
                                <span class="${hasViolation ? 'text-amber-400 font-extrabold animate-bounce' : 'text-emerald-400 font-bold'}">
                                    ${hasViolation ? '⚠️ ' + s.alert_msg : '✓ Policy Compliant'}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-400 font-semibold"><i class="fa-solid fa-satellite-dish mr-1"></i>Last Heartbeat:</span>
                                <span class="text-slate-300 font-mono">${s.last_seen}</span>
                            </div>
                        </div>
                    </div>
                `;
            });

            if (alertConcat && alertConcat !== lastAlertSnapshot) {
                playViolationSound();
            }
            lastAlertSnapshot = alertConcat;

            const total = latestStudents.length;
            const pct = total > 0 ? Math.round((active / total) * 100) : 0;
            document.getElementById('totalCount').innerText        = total;
            document.getElementById('activeCount').innerText       = active;
            document.getElementById('inactiveCount').innerText     = inactive;
            document.getElementById('engagementPercent').innerText = pct + '%';
            document.getElementById('engagementBar').style.width   = pct + '%';
        }

        async function loadStudents() {
            try {
                const response = await fetch('api_update.php');
                latestStudents = await response.json();
                renderGrid();
            } catch (err) {
                console.error("Failed to fetch student data:", err);
            }
        }

        loadStudents();
        setInterval(loadStudents, 3000);
    </script> 
    <!-- 1. Cyberpunk Grid Overlay & Mouse Spotlight -->
<style>
    body::before {
        content: "";
        position: fixed;
        inset: 0;
        background-image: 
            linear-gradient(to right, rgba(59, 130, 246, 0.07) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(59, 130, 246, 0.07) 1px, transparent 1px);
        background-size: 40px 40px;
        pointer-events: none;
        z-index: 0;
    }
</style>

<!-- 2. 3D Holographic Card Tilt Effect -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js"></script>
<script>
    VanillaTilt.init(document.querySelectorAll(".bouncy-card"), {
        max: 10,
        speed: 400,
        glare: true,
        "max-glare": 0.25,
        scale: 1.04
    });
</script>
</body>
</html>