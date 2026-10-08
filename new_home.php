<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZCOER | Smart Digital Lab Monitoring System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-handwriting { font-family: 'Caveat', cursive; }
        .hero-overlay {
            background: linear-gradient(90deg, 
                rgba(8, 28, 62, 0.98) 0%, 
                rgba(10, 37, 80, 0.94) 38%, 
                rgba(12, 45, 96, 0.65) 56%, 
                rgba(12, 45, 96, 0.15) 78%, 
                rgba(12, 45, 96, 0.05) 100%);
        }
        .hover-lift { transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1); }
        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 35px -10px rgba(15, 41, 82, 0.15);
        }
    </style>
</head>
<body class="bg-white text-slate-800 min-h-screen flex flex-col justify-between overflow-x-hidden">

    <!-- TOP WHITE NAVIGATION BAR -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-8 py-3 flex flex-wrap items-center justify-between gap-4">
            <a href="index.php" class="flex items-center space-x-3.5">
                <div class="w-14 h-14 rounded-full bg-white flex items-center justify-center shrink-0 overflow-hidden border-2 border-[#163a70] p-0.5 shadow-sm">
                    <img src="zeal.jfif" alt="ZES Logo" class="w-full h-full object-contain rounded-full"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div style="display:none;" class="w-full h-full rounded-full border-2 border-double border-[#163a70] bg-white flex-col items-center justify-center text-center leading-none">
                        <span class="text-[6px] font-bold text-[#163a70] tracking-tighter">ZEAL PUNE</span>
                        <span class="text-xs font-black text-[#163a70]">ZES</span>
                        <span class="text-[5px] font-bold bg-[#163a70] text-white px-1 rounded">ZCOER</span>
                    </div>
                </div>
                <div>
                    <h1 class="text-sm sm:text-[17px] font-extrabold text-[#0f2952] tracking-tight leading-snug">
                        ZEAL COLLEGE OF ENGINEERING &amp; RESEARCH, PUNE-41
                    </h1>
                    <p class="text-[11px] sm:text-xs text-[#2b548e] font-medium">
                        Department of Electronics &amp; Computer Engineering &nbsp;|&nbsp; PBL Portal
                    </p>
                </div>
            </a>

            <nav class="hidden xl:flex items-center space-x-7 text-[13px] font-semibold text-slate-700">
                <a href="index.php" class="text-[#0f2952] font-bold border-b-2 border-[#0f2952] pb-1">Home</a>
                <a href="#portals" class="hover:text-[#0f2952] transition pb-1">Features</a>
                <a href="student_dashboard.php" class="hover:text-[#0f2952] transition pb-1">Student Portal</a>
                <a href="faculty_login.php" class="hover:text-[#0f2952] transition pb-1">Faculty Portal</a>
                <a href="#why-zes" class="hover:text-[#0f2952] transition pb-1">About</a>
                <a href="#footer" class="hover:text-[#0f2952] transition pb-1">Contact</a>
            </nav>

            <div class="flex items-center space-x-3">
                <a href="student_dashboard.php" class="bg-[#129468] hover:bg-[#0e7a55] text-white text-xs sm:text-[13px] font-bold px-4 py-2.5 rounded-xl flex items-center gap-2 shadow-sm transition transform hover:scale-105">
                    <span class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-xs"><i class="fa-solid fa-user"></i></span>
                    Student Login
                </a>
                <a href="faculty_login.php" class="bg-[#133b7c] hover:bg-[#0d2a59] text-white text-xs sm:text-[13px] font-bold px-4 py-2.5 rounded-xl flex items-center gap-2 shadow-sm transition transform hover:scale-105">
                    <span class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center text-xs"><i class="fa-solid fa-user-tie"></i></span>
                    Faculty Login
                </a>
            </div>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="relative w-full min-h-[470px] bg-[#092147] overflow-hidden flex items-center">
        <div class="absolute inset-0 z-0">
            <img src="campus.jpg" alt="ZCOER Campus" class="w-full h-full object-cover object-right"
                 onerror="this.src='https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=1800&q=85';">
            <div class="absolute inset-0 hero-overlay"></div>
        </div>

        <div class="hidden lg:block absolute bottom-8 right-[31%] z-10 bg-stone-800/90 backdrop-blur-sm border border-stone-500/60 px-5 py-2.5 rounded shadow-2xl text-center transform -rotate-1">
            <div class="text-white/95 font-bold text-xs tracking-widest uppercase">ZEAL EDUCATION SOCIETY</div>
            <div class="text-white font-black text-xl tracking-wider leading-tight">ZCOER</div>
        </div>

        <div class="relative z-10 max-w-[1400px] mx-auto w-full px-4 sm:px-8 py-12 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-8 text-white space-y-5">
                <div class="flex flex-wrap items-center gap-2.5">
                    <span class="px-3.5 py-1 rounded-full text-[11px] font-bold tracking-wider uppercase bg-[#0d2d5e]/90 border border-cyan-400/40 text-slate-100">
                        ESTD - 1996 &bull; NAAC A+
                    </span>
                    <span class="px-3.5 py-1 rounded-full text-[11px] font-bold tracking-wider uppercase bg-[#13478c]/90 border border-sky-400/50 text-sky-200">
                        ZEAL EDUCATION SOCIETY
                    </span>
                </div>

                <h2 class="text-4xl sm:text-[54px] font-black tracking-tight leading-[1.08]">
                    Smart Digital Lab<br>
                    <span class="text-[#3cd2eb]">Monitoring System</span>
                </h2>

                <p class="text-slate-200 text-sm sm:text-[15px] max-w-xl leading-relaxed font-normal">
                    Next-generation real-time computer <strong class="text-white font-semibold">laboratory supervision</strong> platform for <strong class="text-white font-semibold">ZCOER, Pune</strong>. Automatically detects student mouse/keyboard activity, <strong class="text-white font-semibold">enforces academic whitelisting</strong>, and blocks unauthorized websites in real time.
                </p>

                <div class="pt-2 grid grid-cols-2 sm:grid-cols-4 gap-4 max-w-2xl border-t border-white/10">
                    <div class="flex items-center space-x-2.5 pr-2 sm:border-r border-white/15">
                        <div class="w-9 h-9 rounded-full border border-cyan-400/50 bg-[#0d2d5e]/80 flex items-center justify-center text-cyan-300 shrink-0">
                            <i class="fa-solid fa-shield-halved text-sm"></i>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-white leading-tight">Smart Monitoring</div>
                            <div class="text-[10px] text-slate-300">Real-time Detection</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2.5 pr-2 sm:border-r border-white/15">
                        <div class="w-9 h-9 rounded-full border border-cyan-400/50 bg-[#0d2d5e]/80 flex items-center justify-center text-cyan-300 shrink-0">
                            <i class="fa-solid fa-lock text-sm"></i>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-white leading-tight">Secure Access</div>
                            <div class="text-[10px] text-slate-300">Academic Whitelisting</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2.5 pr-2 sm:border-r border-white/15">
                        <div class="w-9 h-9 rounded-full border border-cyan-400/50 bg-[#0d2d5e]/80 flex items-center justify-center text-cyan-300 shrink-0">
                            <i class="fa-solid fa-bolt text-sm"></i>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-white leading-tight">Auto-Blocking</div>
                            <div class="text-[10px] text-slate-300">Unauthorized Websites</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2.5">
                        <div class="w-9 h-9 rounded-full border border-cyan-400/50 bg-[#0d2d5e]/80 flex items-center justify-center text-cyan-300 shrink-0">
                            <i class="fa-solid fa-users text-sm"></i>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-white leading-tight">Better Learning</div>
                            <div class="text-[10px] text-slate-300">Productive Classrooms</div>
                        </div>
                    </div>
                </div>

                <div class="pt-2">
                    <a href="#portals" class="inline-flex items-center gap-3 bg-white hover:bg-slate-100 text-[#0f2952] font-bold text-xs sm:text-sm px-6 py-3 rounded-full shadow-lg transition transform hover:scale-105">
                        Explore Portal <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-4 flex justify-center lg:justify-end">
                <div class="bg-white/95 backdrop-blur-md rounded-2xl p-6 w-full max-w-[310px] shadow-[0_20px_50px_rgba(0,0,0,0.35)] border border-white">
                    <h3 class="text-base font-extrabold text-[#0f2952] mb-4">Quick Access</h3>
                    <div class="space-y-3">
                        <a href="student_dashboard.php" class="w-full bg-[#129468] hover:bg-[#0e7a55] text-white font-bold text-sm py-3 px-4 rounded-xl flex items-center justify-between shadow-md transition transform hover:scale-[1.02]">
                            <span class="flex items-center gap-2.5"><i class="fa-solid fa-graduation-cap text-base"></i> Student Login</span>
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                        <a href="faculty_login.php" class="w-full bg-[#133b7c] hover:bg-[#0d2a59] text-white font-bold text-sm py-3 px-4 rounded-xl flex items-center justify-between shadow-md transition transform hover:scale-[1.02]">
                            <span class="flex items-center gap-2.5"><i class="fa-solid fa-user-tie text-base"></i> Faculty Login</span>
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-100 text-center text-[11px] font-medium text-slate-500">
                        Secure &bull; Reliable &bull; 24/7 Access
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4-COLUMN STATS BAR -->
    <section class="bg-[#f4f8fc] border-b border-slate-200/80 py-6">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 divide-y sm:divide-y-0 sm:divide-x divide-slate-200">
                <div class="flex items-center justify-center space-x-3.5 pt-2 sm:pt-0">
                    <div class="w-12 h-12 rounded-full bg-[#e6effa] text-[#133b7c] flex items-center justify-center text-xl shrink-0"><i class="fa-solid fa-building-columns"></i></div>
                    <div>
                        <div class="text-2xl font-black text-[#0f2952] leading-tight">25+</div>
                        <div class="text-xs text-slate-600 font-medium">Labs Monitored</div>
                    </div>
                </div>
                <div class="flex items-center justify-center space-x-3.5 pt-2 sm:pt-0">
                    <div class="w-12 h-12 rounded-full bg-[#e6effa] text-[#133b7c] flex items-center justify-center text-xl shrink-0"><i class="fa-solid fa-users"></i></div>
                    <div>
                        <div class="text-2xl font-black text-[#0f2952] leading-tight">5000+</div>
                        <div class="text-xs text-slate-600 font-medium">Students</div>
                    </div>
                </div>
                <div class="flex items-center justify-center space-x-3.5 pt-2 sm:pt-0">
                    <div class="w-12 h-12 rounded-full bg-[#e6effa] text-[#133b7c] flex items-center justify-center text-xl shrink-0"><i class="fa-solid fa-shield-halved"></i></div>
                    <div>
                        <div class="text-2xl font-black text-[#0f2952] leading-tight">100%</div>
                        <div class="text-xs text-slate-600 font-medium">Academic Compliance</div>
                    </div>
                </div>
                <div class="flex items-center justify-center space-x-3.5 pt-2 sm:pt-0">
                    <div class="w-12 h-12 rounded-full bg-[#e6effa] text-[#133b7c] flex items-center justify-center text-xl shrink-0"><i class="fa-regular fa-clock"></i></div>
                    <div>
                        <div class="text-2xl font-black text-[#0f2952] leading-tight">24x7</div>
                        <div class="text-xs text-slate-600 font-medium">Real-time Monitoring</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN LOWER SECTION -->
    <section id="portals" class="py-12 bg-white flex-grow">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
                <div class="lg:col-span-5 flex flex-col justify-between space-y-5">
                    <div>
                        <div class="flex items-center space-x-2.5 mb-2">
                            <span class="w-7 h-[2px] bg-[#133b7c]"></span>
                            <span class="text-[11px] font-bold uppercase tracking-widest text-[#133b7c]">OUR PORTALS</span>
                        </div>
                        <h3 class="text-2xl sm:text-[28px] font-extrabold text-[#0f2952] leading-tight">
                            Streamlined Lab Management for Better Learning
                        </h3>
                        <p class="text-xs sm:text-[13px] text-slate-600 mt-2.5 leading-relaxed">
                            <strong class="text-[#0f2952]">ZCOER's Smart Digital Lab Monitoring System</strong> provides a secure, efficient and transparent lab environment for students <strong class="text-[#0f2952]">and faculty</strong>.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3.5 pt-1">
                        <div class="hover-lift bg-white border border-slate-200 rounded-2xl p-4 flex flex-col justify-between shadow-sm">
                            <div>
                                <div class="w-10 h-10 rounded-full bg-[#129468] text-white flex items-center justify-center text-base mb-3 shadow-sm"><i class="fa-solid fa-graduation-cap"></i></div>
                                <h4 class="text-sm font-extrabold text-[#0f2952]">Student Portal</h4>
                                <p class="text-[11px] text-slate-500 mt-1 leading-relaxed">Access lab resources, monitor activity, view reports and more.</p>
                            </div>
                            <a href="student_dashboard.php" class="mt-4 inline-flex items-center text-[11px] font-bold text-[#129468] hover:underline">
                                Go to Student Portal <i class="fa-solid fa-arrow-right ml-1 text-[10px]"></i>
                            </a>
                        </div>

                        <div class="hover-lift bg-white border border-slate-200 rounded-2xl p-4 flex flex-col justify-between shadow-sm">
                            <div>
                                <div class="w-10 h-10 rounded-full bg-[#2557a7] text-white flex items-center justify-center text-base mb-3 shadow-sm"><i class="fa-solid fa-user-tie"></i></div>
                                <h4 class="text-sm font-extrabold text-[#0f2952]">Faculty Portal</h4>
                                <p class="text-[11px] text-slate-500 mt-1 leading-relaxed">Monitor labs, manage sessions, view reports and alerts.</p>
                            </div>
                            <a href="faculty_login.php" class="mt-4 inline-flex items-center text-[11px] font-bold text-[#2557a7] hover:underline">
                                Go to Faculty Portal <i class="fa-solid fa-arrow-right ml-1 text-[10px]"></i>
                            </a>
                        </div>

                        <div class="hover-lift bg-white border border-slate-200 rounded-2xl p-4 flex flex-col justify-between shadow-sm">
                            <div>
                                <div class="w-10 h-10 rounded-full bg-[#0f2952] text-white flex items-center justify-center text-base mb-3 shadow-sm"><i class="fa-solid fa-flask"></i></div>
                                <h4 class="text-sm font-extrabold text-[#0f2952]">Lab Management</h4>
                                <p class="text-[11px] text-slate-500 mt-1 leading-relaxed">Real-time monitoring, policy control, alerts and analytics.</p>
                            </div>
                            <a href="dashboard.php" class="mt-4 inline-flex items-center text-[11px] font-bold text-[#0f2952] hover:underline">
                                Learn More <i class="fa-solid fa-arrow-right ml-1 text-[10px]"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-4 flex">
                    <div class="relative w-full min-h-[300px] rounded-2xl overflow-hidden shadow-lg border border-slate-200 group">
                        <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=1000&q=80" 
                             alt="ZCOER Smart Computer Lab" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#091e3a]/90 via-[#091e3a]/25 to-transparent"></div>
                        <div class="absolute top-6 right-6 w-24 h-28 rounded-xl bg-gradient-to-b from-blue-600 to-blue-900 border-2 border-blue-300/80 shadow-[0_0_25px_rgba(37,99,235,0.8)] flex flex-col items-center justify-center p-2 text-center">
                            <div class="w-14 h-14 rounded-full bg-white p-0.5 flex items-center justify-center overflow-hidden shadow">
                                <img src="zeal.jfif" alt="ZES" class="w-full h-full object-contain rounded-full"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div style="display:none;" class="w-full h-full rounded-full border border-blue-900 flex-col items-center justify-center text-[10px] font-black text-blue-900">ZES</div>
                            </div>
                            <span class="text-[8px] font-extrabold text-white tracking-wider mt-1">ZCOER LAB</span>
                        </div>
                        <div class="absolute bottom-3 right-4 text-right text-white">
                            <p class="font-handwriting text-2xl leading-none drop-shadow">Technology today<br>for a smarter tomorrow</p>
                            <div class="w-16 h-0.5 bg-white/80 ml-auto mt-1 rounded-full"></div>
                        </div>
                    </div>
                </div>

                <div id="why-zes" class="lg:col-span-3 flex">
                    <div class="bg-[#edf5fc] border border-blue-100 rounded-2xl p-6 w-full flex flex-col justify-between">
                        <h3 class="text-xl font-extrabold text-[#0f2952] mb-4">Why ZES?</h3>
                        <div class="space-y-4 my-auto">
                            <div class="flex items-start space-x-3">
                                <div class="w-9 h-9 rounded-full bg-white text-[#133b7c] flex items-center justify-center text-sm shadow-sm shrink-0"><i class="fa-solid fa-chalkboard-user"></i></div>
                                <div>
                                    <h4 class="text-xs font-extrabold text-[#0f2952]">Experienced Faculty</h4>
                                    <p class="text-[11px] text-slate-600">Expert guidance &amp; support</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-9 h-9 rounded-full bg-white text-[#133b7c] flex items-center justify-center text-sm shadow-sm shrink-0"><i class="fa-solid fa-building"></i></div>
                                <div>
                                    <h4 class="text-xs font-extrabold text-[#0f2952]">Modern Infrastructure</h4>
                                    <p class="text-[11px] text-slate-600">State-of-the-art labs &amp; facilities</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-9 h-9 rounded-full bg-white text-[#133b7c] flex items-center justify-center text-sm shadow-sm shrink-0"><i class="fa-solid fa-gears"></i></div>
                                <div>
                                    <h4 class="text-xs font-extrabold text-[#0f2952]">Industry-Focused Learning</h4>
                                    <p class="text-[11px] text-slate-600">Bridging academics &amp; industry</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="w-9 h-9 rounded-full bg-white text-[#133b7c] flex items-center justify-center text-sm shadow-sm shrink-0"><i class="fa-solid fa-chart-line"></i></div>
                                <div>
                                    <h4 class="text-xs font-extrabold text-[#0f2952]">Future Ready Graduates</h4>
                                    <p class="text-[11px] text-slate-600">Skills for a brighter tomorrow</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- DARK NAVY FOOTER -->
    <footer id="footer" class="bg-[#0b2244] text-slate-200 py-4 px-4 sm:px-8 border-t border-blue-900">
        <div class="max-w-[1400px] mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-full bg-white p-0.5 flex items-center justify-center shrink-0 overflow-hidden">
                    <img src="zeal.jfif" alt="ZES" class="w-full h-full object-contain rounded-full"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div style="display:none;" class="w-full h-full rounded-full border border-[#0b2244] flex items-center justify-center text-[9px] font-black text-[#0b2244]">ZES</div>
                </div>
                <div>
                    <div class="text-xs font-bold text-white">Zeal College of Engineering &amp; Research, Pune-41</div>
                    <div class="text-[11px] text-slate-300">Department of Electronics &amp; Computer Engineering &nbsp;|&nbsp; PBL Portal</div>
                </div>
            </div>
            <div class="flex flex-wrap items-center justify-center gap-3 text-[11px] text-slate-300">
                <a href="index.php" class="hover:text-white">Home</a><span class="text-slate-500">|</span>
                <a href="#portals" class="hover:text-white">Features</a><span class="text-slate-500">|</span>
                <a href="student_dashboard.php" class="hover:text-white">Student Portal</a><span class="text-slate-500">|</span>
                <a href="faculty_login.php" class="hover:text-white">Faculty Portal</a><span class="text-slate-500">|</span>
                <a href="#why-zes" class="hover:text-white">About</a><span class="text-slate-500">|</span>
                <a href="#footer" class="hover:text-white">Contact</a>
            </div>
            <div class="flex flex-col items-center md:items-end space-y-1">
                <div class="flex items-center space-x-3 text-sm text-white">
                    <a href="#" class="hover:text-cyan-300 transition"><i class="fa-brands fa-youtube"></i></a>
                    <a href="#" class="hover:text-cyan-300 transition"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="hover:text-cyan-300 transition"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="#" class="hover:text-cyan-300 transition"><i class="fa-solid fa-envelope"></i></a>
                </div>
                <div class="text-[10px] text-slate-400">&copy; 2026 ZCOER. All Rights Reserved.</div>
            </div>
        </div>
    </footer>

</body>
</html>