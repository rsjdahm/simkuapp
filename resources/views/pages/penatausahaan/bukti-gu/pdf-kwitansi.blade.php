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

        .table {
            width: 100%;
            border-collapse: collapse;
            border: 0;
        }

        .table td,
        .table th {
            border: 1px solid #000;
            padding: 3px 5px;
        }
    </style>
</head>

<body>
    <table style="border: 0; border-collapse: collapse; width: 100%;">
        <tr>
            <td style="width: 60%; vertical-align: top;">
                <u>UNTUK DINAS</u>
            </td>
            <td style="width: 40%; vertical-align: top;">
                <table style="border: 0; border-collapse: collapse; width: 100%;">
                    <tr>
                        <td>Tahun Anggaran</td>
                        <td style="width: 0.2cm;">:</td>
                        <td>2023</td>
                    </tr>
                    <tr>
                        <td>Nomor BKU</td>
                        <td>:</td>
                        <td>
                            {!! $bukti_gu->nomor ?? '.............................' !!}
                        </td>
                    </tr>
                    <tr>
                        <td>Kode Rekening</td>
                        <td>:</td>
                        <td>{{ $bukti_gu->belanja_rka_pd->rek_sub_rincian_objek->kode_lengkap }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-decoration: underline; text-align: center;">
                <h2>KWITANSI / BUKTI PEMBAYARAN</h2>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table style="border: 0; border-collapse: collapse; width: 100%;">
                    <tr>
                        <td style="padding: 3px; vertical-align: top; width: 15%;">Sudah terima dari</td>
                        <td style="padding: 3px; vertical-align: top; width: 0.2cm;">:</td>
                        <td style="padding: 3px; vertical-align: top;">Kuasa Pengguna Anggaran BLUD
                            {{ $bukti_gu->belanja_rka_pd->rka_pd->sub_unit_kerja->nama }}
                            Provinsi Kalimantan Timur</td>
                    </tr>
                    <tr>
                        <td style="padding: 3px; vertical-align: top;">Jumlah Uang</td>
                        <td style="padding: 3px; vertical-align: top;">:</td>
                        <td style="padding: 3px; vertical-align: top;">
                            <h3 style="margin: 0;">Rp. {{ number_format($bukti_gu->nilai, 2, ',', '.') }}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 3px; vertical-align: top;">Terbilang</td>
                        <td style="padding: 3px; vertical-align: top;">:</td>
                        <td
                            style="padding: 3px; vertical-align: top; background: #dedede; font-weight: bold; font-style: italic;">
                            {{ Str::title(Terbilang::make($bukti_gu->nilai)) }}
                            @if (fmod($bukti_gu->nilai, 1) != 0)
                                Koma {{ Str::title(Terbilang::make(fmod($bukti_gu->nilai, 1) * 100)) }}
                            @endif Rupiah
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 3px; vertical-align: top;">Untuk Pembayaran</td>
                        <td style="padding: 3px; vertical-align: top;">:</td>
                        <td style="padding: 3px; vertical-align: top;">
                            {{ $bukti_gu->uraian }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr style="border-bottom: 1px solid black;">
            <td></td>
            <td>
                <br />
                Samarinda, {!! $bukti_gu->tanggal
                    ? Carbon\Carbon::parse($bukti_gu->tanggal)->translatedFormat('d F Y')
                    : '.....................................' !!}
                <br />
                <br />
                <br />
                <br />
                <br />
                <strong><u>{{ $bukti_gu->nama }}</u></strong>
                <br />
                <br />
            </td>
        </tr>
        <tr style="border-bottom: 1px solid black;">
            <td>
                <strong>Disetujui dibayar:</strong>
                <br />
                Kuasa Pengguna Anggaran BLUD
                <br />
                (Wakil Direktur Umum dan Keuangan)
                <br />
                <br />
                <br />
                <br />
                <strong><u>Syahrani, S.Sos., M.Si.</u></strong>
                <br />
                NIP. 19680810 199003 1 017
                <br />
                <br />
            </td>
            <td>
                <strong>Setuju dan Lunas dibayar tgl:</strong>
                {!! $bukti_gu->tanggal_bayar
                    ? Carbon\Carbon::parse($bukti_gu->tanggal_bayar)->translatedFormat('d F Y')
                    : '.....................................' !!}
                <br />
                Bendahara Pengeluaran,
                <br />
                <br />
                <br />
                <br />
                <br />
                <strong><u>Hari Jumadi, A.Md.</u></strong>
                <br />
                NIP. 19800404 201101 1 001
                <br />
                <br />
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: left;">
                Barang/pekerjaan tersebut telah diterima/diselesaikan dengan lengkap dan baik.
                <br />
                Pejabat yang Bertanggungjawab,
                <br />
                <br />
                <br />
                <br />
                <br />
                <hr style="border: 0.5px solid black; width: 4cm; margin-left: 0;" />
            </td>
        </tr>
    </table>

    @include('vendor.dompdf.footer-a4-potrait')

</body>

</html>
