{{-- filepath: resources/views/staff/dashboard.blade.php --}}
@extends('layouts.staff')

@section('title', 'Beranda Staff')

@section('content')
@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
@endphp

<div class="p-4">

    {{-- Notifikasi Lengkapi Data --}}
    @if(!$user->departemen_id || !$user->jabatan_id || !$user->alamat)
        <div style="background: #fff; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border-radius: 12px; padding: 16px; margin-bottom: 24px; display: flex; align-items: center; justify-content: space-between;">
            <div style="display: flex; align-items: center; gap: 12px;">
                <i class="fas fa-exclamation-triangle" style="color: red; font-size: 24px;"></i>
                <p style="font-size: 16px; font-weight: 600; margin: 0;">
                    Data karyawan Anda belum lengkap! Silakan lengkapi data terlebih dahulu untuk dapat mengajukan Cuti, Claim, maupun Medical!
                </p>
            </div>
            <a href="{{ route('staff.ajukan_cuti') }}" 
               style="background: #d9d9d9; border: none; border-radius: 8px; padding: 8px 16px; font-weight: 600; cursor: pointer; text-decoration: none; color: #000;">
                Lengkapi Sekarang
            </a>
        </div>
    @endif

    {{-- Profil & Kartu Budget --}}
    <div class="row g-3 mb-4">
        {{-- Profil --}}
        <div class="col-md-4">
            <div style="background: #fff; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border-radius: 12px; padding: 16px; text-align: center;">
                <img src="https://placehold.co/144x144" style="border-radius: 50%; display: block; margin: 0 auto;" alt="Foto Profil" />
                <h2 style="font-weight: 700; margin-top: 12px;">{{ $user->nama_lengkap }}</h2>
                <p style="color: #555; margin: 4px 0;">
                    {{ $user->nik }} | 
                    {{ $user->departemen->nama_departemen ?? 'Belum diatur' }} | 
                    {{ $user->jabatan->nama_jabatan ?? 'Belum diatur' }}
                </p>
                <p style="color: #555; margin: 0;">
                    {{ \Carbon\Carbon::parse($user->tanggal_masuk)->format('d-m-Y') }}
                </p>
            </div>
        </div>

        {{-- Cards --}}
        <div class="col-md-8">
            <div class="row g-3">
                {{-- Medical --}}
                <div class="col-md-4">
                    <div style="background: #fff; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border-radius: 12px; padding: 16px;">
                        <h3 style="font-weight: 600;">Medical</h3>
                        <p>{{ $user->nama_lengkap }} - {{ $user->nik }}</p>
                        <p>Budget: Rp.3.000.000</p>
                    </div>
                </div>
                {{-- Kacamata --}}
                <div class="col-md-4">
                    <div style="background: #fff; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border-radius: 12px; padding: 16px;">
                        <h3 style="font-weight: 600;">Kacamata</h3>
                        <p>{{ $user->nama_lengkap }} - {{ $user->nik }}</p>
                        <p>Budget: Rp.1.500.000</p>
                    </div>
                </div>
                {{-- Cuti --}}
                <div class="col-md-4">
                    <div style="background: #fff; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border-radius: 12px; padding: 16px;">
                        <h3 style="font-weight: 600;">Cuti</h3>
                        <p>{{ $user->nama_lengkap }} - {{ $user->nik }}</p>
                        <p>Sisa Cuti: {{ $user->sisa_cuti ?? 12 }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Riwayat Claim / Cuti --}}
    <div style="background: #fff; box-shadow: 0 4px 20px rgba(0,0,0,0.05); border-radius: 12px; padding: 16px;">
        <h3 style="margin-bottom: 16px; font-weight: 600;">Riwayat Pengajuan Cuti</h3>
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #f9f9f9;">
                    <th style="padding: 12px; text-align: left;">Jenis Cuti</th>
                    <th style="padding: 12px; text-align: left;">Tanggal Mulai</th>
                    <th style="padding: 12px; text-align: left;">Tanggal Selesai</th>
                    <th style="padding: 12px; text-align: left;">Jumlah Hari</th>
                    <th style="padding: 12px; text-align: left;">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cuti ?? [] as $c)
                    <tr style="border-top: 1px solid #eee;">
                        <td style="padding: 12px;">{{ $c->jenis_cuti }}</td>
                        <td style="padding: 12px;">{{ \Carbon\Carbon::parse($c->tanggal_mulai)->format('d-m-Y') }}</td>
                        <td style="padding: 12px;">{{ \Carbon\Carbon::parse($c->tanggal_selesai)->format('d-m-Y') }}</td>
                        <td style="padding: 12px;">{{ $c->jumlah_hari }}</td>
                        <td style="padding: 12px;">
                            @php
                                $statusColor = [
                                    'menunggu' => '#fff3cd; color:#856404;',
                                    'disetujui' => '#d4edda; color:#155724;',
                                    'ditolak' => '#f8d7da; color:#721c24;'
                                ][$c->status] ?? '#e2e3e5; color:#383d41;';
                            @endphp
                            <span style="background: {{ explode(';', $statusColor)[0] }}; {{ explode(';', $statusColor)[1] }} padding: 4px 8px; border-radius: 8px; font-size: 12px;">
                                {{ ucfirst($c->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding: 12px; text-align:center; color:#777;">Belum ada pengajuan cuti.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
