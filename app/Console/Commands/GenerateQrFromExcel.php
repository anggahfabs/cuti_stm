<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Carbon\Carbon;

class GenerateQrFromExcel extends Command
{
    protected $signature = 'qr:generate {excel_path=excel/data_karyawan.xlsx}';
    protected $description = 'Generate QR from Excel and save images to public/qr_code, then update user.qr_code';

    public function handle()
    {
        $excel = $this->argument('excel_path');

        $python = (PHP_OS_FAMILY === 'Windows') ? 'py' : 'python';
        $script = base_path('python_scripts/generate_qr.py');
        $outputDir = base_path('public/qr_code');

        $process = new Process([$python, $script, base_path($excel), $outputDir]);
        $process->setTimeout(300);
        $process->run();

        if (!$process->isSuccessful()) {
            $this->error("Python script failed:");
            $this->error($process->getErrorOutput());
            throw new ProcessFailedException($process);
        }

        $out = $process->getOutput();
       $out = $process->getOutput();
$rows = json_decode($out, true);

if (!$rows) {
    $this->error("No output from python script or invalid JSON.");
    return 1;
}

// Jika Python return object dengan key "data", ambil bagian itu aja
if (isset($rows['data']) && is_array($rows['data'])) {
    $rows = $rows['data'];
}

// Pastikan $rows tetap array setelah disesuaikan
if (!is_array($rows)) {
    $this->error("Invalid data format from Python script.");
    return 1;
}

foreach ($rows as $r) {
    $deptName = trim($r['nama_departemen']);
    $roleName = trim($r['nama_role']);
    $jabatanName = trim($r['nama_jabatan'] ?? '');
    $nik = trim($r['nik']);
    $tanggalMasukRaw = trim($r['tanggal_masuk'] ?? '');
    $email = trim($r['email'] ?? '');
    
    // ... lanjut proses seperti sebelumnya
}


        foreach ($rows as $r) {
            $deptName = trim($r['nama_departemen']);
            $roleName = trim($r['nama_role']);
            $jabatanName = trim($r['nama_jabatan'] ?? '');
            $nik      = trim($r['nik']);
            $tanggalMasukRaw = trim($r['tanggal_masuk'] ?? '');

            // 🔹 Departemen
            $departemen = DB::table('departemen')
                ->whereRaw('LOWER(TRIM(nama_departemen)) = ?', [strtolower($deptName)])
                ->first();

            if (!$departemen) {
                $deptId = DB::table('departemen')->insertGetId([
                    'nama_departemen' => $deptName
                ]);
                $this->info("Created departemen: {$deptName} (id={$deptId})");
            } else {
                $deptId = $departemen->departemen_id;
            }

            // 🔹 Role
            $role = DB::table('role')
                ->whereRaw('LOWER(TRIM(nama_role)) = ?', [strtolower($roleName)])
                ->first();

            if (!$role) {
                $roleId = DB::table('role')->insertGetId([
                    'nama_role' => $roleName
                ]);
                $this->info("Created role: {$roleName} (id={$roleId})");
            } else {
                $roleId = $role->role_id;
            }

            // 🔹 Jabatan
            $jabatanId = null;
            if (!empty($jabatanName)) {
                $jabatan = DB::table('jabatan')
                    ->whereRaw('LOWER(TRIM(nama_jabatan)) = ?', [strtolower($jabatanName)])
                    ->first();

                if (!$jabatan) {
                    $jabatanId = DB::table('jabatan')->insertGetId([
                        'nama_jabatan' => $jabatanName
                    ]);
                    $this->info("Created jabatan: {$jabatanName} (id={$jabatanId})");
                } else {
                    $jabatanId = $jabatan->jabatan_id;
                }
            }

            // 🔹 Konversi tanggal masuk
            $tanggalMasuk = null;
            if (!empty($tanggalMasukRaw)) {
                try {
                    // dukung format YYYY-MM-DD atau YYYY/MM/DD
                    $tanggalMasuk = Carbon::parse(str_replace('/', '-', $tanggalMasukRaw))->format('Y-m-d');
                } catch (\Exception $e) {
                    $this->warn("⚠️ Format tanggal tidak dikenali untuk NIK {$nik}: {$tanggalMasukRaw}");
                }
            }

            // 🔹 Data user
            $data = [
                'nama_lengkap'    => $r['nama_lengkap'],
                'departemen_id'   => $deptId,
                'role_id'         => $roleId,
                'jabatan_id'      => $jabatanId,
                'tanggal_masuk'   => $tanggalMasuk,
                'qr_code'         => $r['qr_file'],
                'status_karyawan' => 'aktif',
                'updated_at'      => now(),
            ];

            // 🔹 Cek user
            $existing = DB::table('user')->where('nik', $nik)->first();
            if (!$existing) {
                $data['nik']        = $nik;
                $data['password']   = bcrypt('serasitunggal');
                $data['created_at'] = now();
                $this->info("Created new user NIK={$nik} with default password 'serasitunggal'");
            }

            DB::table('user')->updateOrInsert(['nik' => $nik], $data);
            $this->info("Synced user NIK={$nik}");
        }

        $this->info("✅ All done. QR images saved in public/qr_code/");
        return 0;
    }
}
