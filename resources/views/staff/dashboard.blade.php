{{-- filepath: resources/views/staff/dashboard.blade.php --}}
@extends('layouts.staff')

@section('title', 'Beranda Staff')

@section('content')
<div class="p-4">

    <!-- Notifikasi Lengkapi Data -->
    <div style="background: #fff; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border-radius: 12px; padding: 16px; margin-bottom: 24px; display: flex; align-items: center; justify-content: space-between;">
        <div style="display: flex; align-items: center; gap: 12px;">
            <i class="fas fa-exclamation-triangle" style="color: red; font-size: 24px;"></i>
            <p style="font-size: 16px; font-weight: 600; margin: 0;">
                Data karyawan Anda belum lengkap! Silakan lengkapi data karyawan terlebih dahulu untuk dapat mengajukan Cuti, Claim, maupun Medical!
            </p>
        </div>
        <button style="background: #d9d9d9; border: none; border-radius: 8px; padding: 8px 16px; font-weight: 600; cursor: pointer;">
            Lengkapi Sekarang
        </button>
    </div>

    <!-- Profil & Kartu Budget -->
    <div class="row g-3 mb-4">
        <!-- Profil -->
        <div class="col-md-4">
            <div style="background: #fff; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border-radius: 12px; padding: 16px; text-align: center;">
                <img src="https://placehold.co/144x144" style="border-radius: 50%; display: block; margin: 0 auto;" />
                <h2 style="font-weight: 700; margin-top: 12px;">Angga dan Celin</h2>
                <p style="color: #555; margin: 4px 0;">8139013 | Teknik | Teknisi</p>
                <p style="color: #555; margin: 0;">17-8-2018</p>
            </div>
        </div>

        <!-- Cards -->
        <div class="col-md-8">
            <div class="row g-3">
                <div class="col-md-4">
                    <div style="background: #fff; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border-radius: 12px; padding: 16px;">
                        <h3 style="font-weight: 600;">Medical</h3>
                        <p>Ahmad - NIK - Departemen - Jabatan</p>
                        <p>Budget: Rp.3.000.000</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div style="background: #fff; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border-radius: 12px; padding: 16px;">
                        <h3 style="font-weight: 600;">Kacamata</h3>
                        <p>Ahmad - NIK - Departemen - Jabatan</p>
                        <p>Budget: Rp.3.000.000</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div style="background: #fff; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border-radius: 12px; padding: 16px;">
                        <h3 style="font-weight: 600;">Cuti</h3>
                        <p>Ahmad - NIK - Departemen - Jabatan</p>
                        <p>Sisa Cuti: 12</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Riwayat Claim / Cuti -->
    <div style="background: #fff; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border-radius: 12px; padding: 16px;">
        <h3 style="margin-bottom: 16px; font-weight: 600;">Riwayat Pengajuan</h3>
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #f9f9f9;">
                    <th style="padding: 12px; text-align: left;">Nama</th>
                    <th style="padding: 12px; text-align: left;">Jenis Claim</th>
                    <th style="padding: 12px; text-align: left;">Departemen</th>
                    <th style="padding: 12px; text-align: left;">Kategori</th>
                    <th style="padding: 12px; text-align: left;">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-top: 1px solid #eee;">
                    <td style="padding: 12px;">Ahmad auladin</td>
                    <td style="padding: 12px;">Claim Kacamata</td>
                    <td style="padding: 12px;">Teknik</td>
                    <td style="padding: 12px;">Kacamata</td>
                    <td style="padding: 12px;"><span style="background: #fff3cd; color: #856404; padding: 4px 8px; border-radius: 8px; font-size: 12px;">Pending</span></td>
                </tr>
                <tr style="border-top: 1px solid #eee;">
                    <td style="padding: 12px;">Ahmad auladin</td>
                    <td style="padding: 12px;">Claim Kacamata</td>
                    <td style="padding: 12px;">Teknik</td>
                    <td style="padding: 12px;">Kacamata</td>
                    <td style="padding: 12px;"><span style="background: #d4edda; color: #155724; padding: 4px 8px; border-radius: 8px; font-size: 12px;">Disetujui</span></td>
                </tr>
                <tr style="border-top: 1px solid #eee;">
                    <td style="padding: 12px;">Ahmad auladin</td>
                    <td style="padding: 12px;">Claim Kacamata</td>
                    <td style="padding: 12px;">Teknik</td>
                    <td style="padding: 12px;">Kacamata</td>
                    <td style="padding: 12px;"><span style="background: #f8d7da; color: #721c24; padding: 4px 8px; border-radius: 8px; font-size: 12px;">Ditolak</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
