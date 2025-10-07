@extends('layouts.app')

@section('content')
<style>
    .dashboard-container {
        padding: 20px;
        background: #f5f8fa;
        min-height: 100vh;
    }

    /* ==== SCROLLABLE DEPARTMENT ==== */
    .department-wrapper {
        position: relative;
        margin-bottom: 25px;
    }

    .department-container {
        display: flex;
        overflow-x: auto;
        gap: 18px;
        padding: 15px;
        scroll-behavior: smooth;
    }

    .department-container::-webkit-scrollbar {
        display: none;
    }

    .department-card {
        flex: 0 0 auto;
        min-width: 250px;
        height: 150px;
        border-radius: 18px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        padding: 20px;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .department-card::before {
        content: '';
        position: absolute;
        width: 200%;
        height: 200%;
        top: -50%;
        left: -50%;
        background: rgba(255,255,255,0.1);
        transform: rotate(30deg);
        transition: 0.4s;
        z-index: 0;
    }

    .department-card:hover::before {
        left: 0;
        top: 0;
        transform: rotate(0deg);
        background: rgba(255,255,255,0.2);
    }

    .department-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    }

    .dept-info {
        z-index: 1;
        text-align: left;
    }

    .dept-title {
        font-weight: 700;
        font-size: 18px;
        margin-bottom: 6px;
        color: #fff;
    }

    .dept-total {
        font-size: 14px;
        opacity: 0.95;
        margin-bottom: 5px;
        color: rgba(255,255,255,0.95);
    }

    .dept-detail {
        font-size: 13px;
        opacity: 0.9;
        color: rgba(255,255,255,0.9);
    }

    .dept-icon {
        font-size: 45px;
        opacity: 0.95;
        z-index: 1;
    }

    .dept-view {
        position: absolute;
        bottom: 15px;
        right: 15px;
        background: rgba(255,255,255,0.12);
        padding: 6px 10px;
        border-radius: 6px;
        font-size: 12px;
        text-decoration: none;
        color: #fff;
        transition: 0.3s;
        z-index: 1;
    }

    .dept-view:hover {
        background: rgba(255,255,255,0.25);
    }

    .dept-hr { background: linear-gradient(135deg, #3b82f6, #2563eb); }
    .dept-finance { background: linear-gradient(135deg, #10b981, #047857); }
    .dept-it { background: linear-gradient(135deg, #6366f1, #4338ca); }
    .dept-marketing { background: linear-gradient(135deg, #f59e0b, #d97706); }
    .dept-sales { background: linear-gradient(135deg, #ef4444, #b91c1c); }
    .dept-logistics { background: linear-gradient(135deg, #8b5cf6, #6d28d9); }
    .dept-cs { background: linear-gradient(135deg, #06b6d4, #0e7490); }

    .scroll-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: #ffffff;
        border: none;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        border-radius: 50%;
        width: 40px;
        height: 40px;
        cursor: pointer;
        z-index: 10;
        transition: 0.25s;
        font-size: 18px;
        color: #007bff;
    }

    .scroll-btn:hover {
        background: #007bff;
        color: #fff;
    }

    .scroll-left { left: -10px; }
    .scroll-right { right: -10px; }

    /* ==== SUMMARY CARDS - enhanced ==== */
    .summary-section {
        display: flex;
        gap: 20px;
        margin-bottom: 30px;
        flex-wrap: wrap;
    }

    .summary-card {
        flex: 1;
        min-width: 280px;
        border-radius: 20px;
        background: rgba(255,255,255,0.75);
        backdrop-filter: blur(10px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        padding: 30px;
        text-align: left;
        position: relative;
        overflow: hidden;
        transition: all 0.4s ease;
    }

    .summary-card::after {
        content: "";
        position: absolute;
        width: 140%;
        height: 140%;
        top: -20%;
        left: -20%;
        background: linear-gradient(135deg, rgba(0,123,255,0.15), rgba(0,168,232,0.05));
        transform: rotate(25deg);
        z-index: 0;
    }

    .summary-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.15);
    }

    .summary-icon {
        font-size: 45px;
        margin-bottom: 10px;
        color: #007bff;
        opacity: 0.85;
        z-index: 1;
        position: relative;
    }

    .summary-card h4 {
        font-size: 17px;
        color: #444;
        margin-bottom: 8px;
        font-weight: 700;
        z-index: 1;
        position: relative;
    }

    .summary-card .count {
        font-size: 40px;
        font-weight: 800;
        color: #007bff;
        z-index: 1;
        position: relative;
    }

    .summary-detail {
        font-size: 13px;
        color: #666;
        margin-top: 8px;
        z-index: 1;
        position: relative;
    }

    .summary-progress {
        height: 6px;
        width: 100%;
        background: #e0e7ff;
        border-radius: 5px;
        margin-top: 12px;
        overflow: hidden;
        z-index: 1;
        position: relative;
    }

    .summary-progress span {
        display: block;
        height: 100%;
        background: linear-gradient(135deg, #007bff, #00a8e8);
        width: 0%;
        border-radius: 5px;
        transition: width 1s ease;
    }

    /* Claim, chart, table tetap */
    .claim-section { display: flex; gap: 15px; margin-bottom: 30px; }
    .claim-card {
        flex: 1;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        padding: 20px;
    }

    .chart-section, .table-section {
        background: #ffffff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        margin-bottom: 20px;
    }
</style>

<div class="dashboard-container">

    <!-- DEPARTMENT -->
    <div class="department-wrapper">
        <button class="scroll-btn scroll-left" onclick="scrollDepartment(-200)">‹</button>
        <div class="department-container" id="departmentContainer">
            <div class="department-card dept-hr">
                <div class="dept-info">
                    <div class="dept-title">HR Department</div>
                    <div class="dept-total">25 Karyawan</div>
                    <div class="dept-detail">Rekrutmen & Absensi</div>
                </div>
                <div class="dept-icon"><i class="fas fa-user-tie"></i></div>
                <a href="#" class="dept-view">Detail</a>
            </div>
            <div class="department-card dept-finance">
                <div class="dept-info">
                    <div class="dept-title">Finance</div>
                    <div class="dept-total">18 Karyawan</div>
                    <div class="dept-detail">Laporan & Anggaran</div>
                </div>
                <div class="dept-icon"><i class="fas fa-coins"></i></div>
                <a href="#" class="dept-view">Detail</a>
            </div>
            <div class="department-card dept-it">
                <div class="dept-info">
                    <div class="dept-title">IT</div>
                    <div class="dept-total">12 Karyawan</div>
                    <div class="dept-detail">Sistem & Support</div>
                </div>
                <div class="dept-icon"><i class="fas fa-laptop-code"></i></div>
                <a href="#" class="dept-view">Detail</a>
            </div>
            <div class="department-card dept-marketing">
                <div class="dept-info">
                    <div class="dept-title">Marketing</div>
                    <div class="dept-total">14 Karyawan</div>
                    <div class="dept-detail">Promosi & Branding</div>
                </div>
                <div class="dept-icon"><i class="fas fa-bullhorn"></i></div>
                <a href="#" class="dept-view">Detail</a>
            </div>
        </div>
        <button class="scroll-btn scroll-right" onclick="scrollDepartment(200)">›</button>
    </div>

    <!-- Enhanced Summary -->
   <div class="summary-section">
    <div class="summary-card" id="cardKaryawan">
        <div class="summary-icon"><i class="fas fa-users"></i></div>
        <h4>Total Karyawan</h4>
        <h4 class="card-title">{{ $totalKaryawan }}</h4>
        <div class="summary-detail">Jumlah keseluruhan karyawan aktif</div>
        <div class="summary-progress"><span style="width:85%"></span></div>
    </div>



        <div class="summary-card" id="cardCuti">
            <div class="summary-icon"><i class="fas fa-calendar-check"></i></div>
            <h4>Total Cuti Karyawan</h4>
            <div class="count">23</div>
            <div class="summary-detail">Karyawan sedang cuti saat ini</div>
            <div class="summary-progress"><span style="width:35%"></span></div>
        </div>
    </div>

    <!-- Claim / Chart / Table tetap -->
    <div class="chart-section">
        <h3>Grafik Klaim Karyawan</h3>
        <canvas id="claimChart" width="400" height="150"></canvas>
    </div>
</div>

<script src="https://kit.fontawesome.com/a2e0e9d6e5.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function scrollDepartment(amount) {
        document.getElementById('departmentContainer')
            .scrollBy({ left: amount, behavior: 'smooth' });
    }

    // Progress animation
    window.addEventListener('load', () => {
        document.querySelectorAll('.summary-progress span').forEach(bar => {
            const width = bar.style.width;
            bar.style.width = '0%';
            setTimeout(() => bar.style.width = width, 400);
        });
    });

    new Chart(document.getElementById('claimChart'), {
        type: 'bar',
        data: {
            labels: ['Cuti', 'Medical', 'Kacamata'],
            datasets: [{
                label: 'Jumlah Klaim',
                data: [10, 7, 3],
                backgroundColor: ['#007bff', '#28a745', '#ffc107']
            }]
        }
    });
</script>
@endsection