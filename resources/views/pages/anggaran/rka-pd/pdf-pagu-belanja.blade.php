<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        @page {
            margin: 1.25cm 1.55cm;
            font-family: 'Arial';
            font-size: 8pt;
            font-weight: normal;
        }

        body {
            border: 1px solid black;
        }

        .table {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-collapse: collapse;
            width: 100%;
        }

        .table thead,
        .table tfoot {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
        }

        .table td {
            border-left: 1px solid #000;
            padding: 1px 5px;
            vertical-align: top;
        }

        .table th {
            border-left: 1px solid #000;
            padding: 5px 5px;
        }

        .table td:first-child,
        .table th:first-child {
            border-left: none;
        }
    </style>
</head>

<body>
    <table style="width: 100%; border-collapse: collapse; border: 0;">
        <tr>
            <td style="width: 1.8cm">
                <img src="{{ asset('img/logo-kaltim.png') }}" style="width: 1.5cm; margin: 10px;">
            </td>
            <td>
                <div style="text-align: center;">
                    <h3 style="margin: 0;">PEMERINTAH PROVINSI KALIMANTAN TIMUR</h3>
                </div>
                <div style="text-align: center;">
                    <h2 style="margin: 0;">RINCIAN ANGGARAN PENDAPATAN DAN BELANJA (BLUD)</h2>
                </div>
                <div style="text-align: center;">
                    Tahun Anggaran 2023
                </div>
            </td>
        </tr>
    </table>
    <table style="width: 100%; border-collapse: collapse; border: 0; margin-bottom: 0.5cm;">
        <tr>
            <td style="width: 4cm;">Urusan Pemerintahan</td>
            <td style="width: 0.5cm;">:</td>
            <td>{{ $rka_pd->sub_unit_kerja->unit_kerja->bidang->kode_lengkap }}
                {{ $rka_pd->sub_unit_kerja->unit_kerja->bidang->nama }}
            </td>
        </tr>
        <tr>
            <td>Unit Organisasi</td>
            <td>:</td>
            <td>{{ $rka_pd->sub_unit_kerja->unit_kerja->kode_lengkap }} {{ $rka_pd->sub_unit_kerja->unit_kerja->nama }}
            </td>
        </tr>
        <tr>
            <td>Sub Unit Organisasi</td>
            <td>:</td>
            <td>{{ $rka_pd->sub_unit_kerja->kode_lengkap }} {{ $rka_pd->sub_unit_kerja->nama }}</td>
        </tr>
    </table>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 3cm;">KODE REKENING</th>
                <th>URAIAN</th>
                <th style="width: 3cm;">ANGGARAN {{ Str::upper($rka_pd->status->value) }}</th>
            </tr>
        </thead>
        <tbody>
            @php
                $defisit_surplus = 0;
            @endphp
            @foreach ($rek_akun as $_rek_akun)
                @php
                    $jumlah_nilai_per_akun = $belanja_rka_pd->whereIn('rek_sub_rincian_objek_id', $rek_sub_rincian_objek->whereIn('rek_rincian_objek_id', $rek_rincian_objek->whereIn('rek_objek_id', $rek_objek->whereIn('rek_jenis_id', $rek_jenis->whereIn('rek_kelompok_id', $rek_kelompok->where('rek_akun_id', $_rek_akun->id)->pluck('id'))->pluck('id'))->pluck('id'))->pluck('id'))->pluck('id'))->sum('nilai');

                @endphp
                <tr style="font-weight: bold;">
                    <td>{{ $_rek_akun->kode_lengkap }}</td>
                    <td>{{ $_rek_akun->nama }}</td>
                    <td style="text-align: right;">{{ number_format($jumlah_nilai_per_akun, 2, ',', '.') }}
                    </td>
                </tr>
                @foreach ($rek_kelompok->where('rek_akun_id', $_rek_akun->id)->all() as $_rek_kelompok)
                    @php
                        $jumlah_nilai_per_kelompok = $belanja_rka_pd->whereIn('rek_sub_rincian_objek_id', $rek_sub_rincian_objek->whereIn('rek_rincian_objek_id', $rek_rincian_objek->whereIn('rek_objek_id', $rek_objek->whereIn('rek_jenis_id', $rek_jenis->where('rek_kelompok_id', $_rek_kelompok->id)->pluck('id'))->pluck('id'))->pluck('id'))->pluck('id'))->sum('nilai');

                    @endphp
                    <tr style="font-weight: bold;">
                        <td>{{ $_rek_kelompok->kode_lengkap }}</td>
                        <td style="padding-left: 0.25cm;">{{ $_rek_kelompok->nama }}</td>
                        <td style="text-align: right;">{{ number_format($jumlah_nilai_per_kelompok, 2, ',', '.') }}
                        </td>
                    </tr>
                    @foreach ($rek_jenis->where('rek_kelompok_id', $_rek_kelompok->id)->all() as $_rek_jenis)
                        @php
                            $jumlah_nilai_per_jenis = $belanja_rka_pd->whereIn('rek_sub_rincian_objek_id', $rek_sub_rincian_objek->whereIn('rek_rincian_objek_id', $rek_rincian_objek->whereIn('rek_objek_id', $rek_objek->where('rek_jenis_id', $_rek_jenis->id)->pluck('id'))->pluck('id'))->pluck('id'))->sum('nilai');

                        @endphp
                        <tr style="font-weight: bold;">
                            <td>{{ $_rek_jenis->kode_lengkap }}</td>
                            <td style="padding-left: 0.5cm;">{{ $_rek_jenis->nama }}</td>
                            <td style="text-align: right;">{{ number_format($jumlah_nilai_per_jenis, 2, ',', '.') }}
                            </td>
                        </tr>
                        @foreach ($rek_objek->where('rek_jenis_id', $_rek_jenis->id)->all() as $_rek_objek)
                            @php
                                $jumlah_nilai_per_objek = $belanja_rka_pd->whereIn('rek_sub_rincian_objek_id', $rek_sub_rincian_objek->whereIn('rek_rincian_objek_id', $rek_rincian_objek->where('rek_objek_id', $_rek_objek->id)->pluck('id'))->pluck('id'))->sum('nilai');

                            @endphp
                            <tr style="font-weight: bold;">
                                <td>{{ $_rek_objek->kode_lengkap }}</td>
                                <td style="padding-left: 0.75cm;">{{ $_rek_objek->nama }}</td>
                                <td style="text-align: right;">
                                    {{ number_format($jumlah_nilai_per_objek, 2, ',', '.') }}
                                </td>
                            </tr>
                            @foreach ($rek_rincian_objek->where('rek_objek_id', $_rek_objek->id)->all() as $_rek_rincian_objek)
                                @php
                                    $jumlah_nilai_per_rincian_objek = $belanja_rka_pd->whereIn('rek_sub_rincian_objek_id', $rek_sub_rincian_objek->whereIn('rek_rincian_objek_id', $_rek_rincian_objek->id)->pluck('id'))->sum('nilai');

                                @endphp
                                <tr>
                                    <td>{{ $_rek_rincian_objek->kode_lengkap }}</td>
                                    <td style="padding-left: 1cm;">{{ $_rek_rincian_objek->nama }}</td>
                                    <td style="text-align: right;">
                                        {{ number_format($jumlah_nilai_per_rincian_objek, 2, ',', '.') }}
                                    </td>
                                </tr>
                                @foreach ($rek_sub_rincian_objek->where('rek_rincian_objek_id', $_rek_rincian_objek->id)->all() as $_rek_sub_rincian_objek)
                                    <tr>
                                        <td>{{ $_rek_sub_rincian_objek->kode_lengkap }}</td>
                                        <td style="padding-left: 1.25cm;">{{ $_rek_sub_rincian_objek->nama }}</td>
                                        <td style="text-align: right;">
                                            @php
                                                $total_per_sub_rincian = $belanja_rka_pd->where('rek_sub_rincian_objek_id', $_rek_sub_rincian_objek->id)->sum('nilai');
                                            @endphp
                                            {{ number_format($total_per_sub_rincian, 2, ',', '.') }}
                                        </td>
                                        @php
                                            if ($_rek_akun->jenis == \App\Enums\Setup\JenisRekAkunEnum::Belanja):
                                                $defisit_surplus = $defisit_surplus - $total_per_sub_rincian;
                                            endif;
                                        @endphp
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
            @endforeach
            <tr style="border-top: 1px black solid;">
                <td colspan="2" style="width: 15%; font-weight: bold; text-align: right;">SURPLUS / DEFISIT
                </td>
                <td style="width: 20%; font-weight: bold; text-align: right;">
                    {{ number_format($defisit_surplus, 2, ',', '.') }}</td>
            </tr>
            <tr style="border-top: 1px black solid;">
                <td colspan="2" style="width: 15%; font-weight: bold; text-align: center;">SISA LEBIH /
                    KURANG
                    PEMBIAYAAN TAHUN YANG BERKENAAN</td>
                <td style="width: 20%; font-weight: bold; text-align: right;">
                    {{ number_format($defisit_surplus, 2, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
