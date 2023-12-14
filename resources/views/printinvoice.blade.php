<!DOCTYPE html>
<html>
<head>
    <title>Invoice MPA</title>
    <style type="text/css">
        .st_total {
            font-size: 9pt;
            font-weight: bold;
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }

        .cetak {
            margin-top: 40px;
            text-align: center;
        }

        @media print {
            .no-print {
                display: none !important;
            }
        }

        .style6 {
            color: #000000;
            font-size: 10pt;
            font-weight: bold;
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }

        .style9 {
            color: #000000;
            font-size: 9pt;
            font-weight: normal;
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }

        .style9c {
            color: #000000;
            font-size: 9pt;
            font-weight: bold;
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }

        .style9up {
            color: #000000;
            font-size: 9pt;
            font-weight: normal;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            text-valign: top;
        }

        .style9b {
            color: #000000;
            font-size: 10pt;
            font-weight: bold;
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }

        .style19b {
            color: #000000;
            font-size: 18pt;
            font-weight: bold;
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }

        .style10b {
            color: #000000;
            font-size: 12pt;
            font-weight: bold;
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }

        .par {
            color: #000000;
            font-size: 9pt;
            font-weight: normal;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            margin-top: 3;
        }

        .left {
            text-align: left;
        }

        .small {
            font-size: small;
            text-valign: top;
        }

        .post-img {
            border: 0px;
            margin: 5px
        }

        .style9up1 {
            color: #000000;
            font-size: 9pt;
            font-weight: normal;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            text-valign: top;
        }

        .style9up2 {
            color: #000000;
            font-size: 9pt;
            font-weight: normal;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            text-valign: top;
        }

        .style9up21 {
            color: #000000;
            font-size: 9pt;
            font-weight: normal;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            text-valign: top;
        }

        .style9up11 {
            color: #000000;
            font-size: 9pt;
            font-weight: normal;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            text-valign: top;
        }

        .style9up211 {
            color: #000000;
            font-size: 9pt;
            font-weight: normal;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            text-valign: top;
        }

        .style9up212 {
            color: #000000;
            font-size: 9pt;
            font-weight: normal;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            text-valign: top;
        }

        .style9up111 {
            color: #000000;
            font-size: 9pt;
            font-weight: normal;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            text-valign: top;
        }

        .style9up112 {
            color: #000000;
            font-size: 9pt;
            font-weight: normal;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            text-valign: top;
        }

        .style9up2121 {
            color: #000000;
            font-size: 9pt;
            font-weight: normal;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            text-valign: top;
        }

        .style9up1121 {
            color: #000000;
            font-size: 9pt;
            font-weight: normal;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            text-valign: top;
        }

        .style9up3 {
            color: #000000;
            font-size: 9pt;
            font-weight: normal;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            text-valign: top;
        }

        .style9up31 {
            color: #000000;
            font-size: 9pt;
            font-weight: normal;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            text-valign: top;
        }

        .style9up311 {
            color: #000000;
            font-size: 9pt;
            font-weight: normal;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            text-valign: top;
        }

        .small1 {
            font-size: small;
            text-valign: top;
        }

        .style9up4 {
            color: #000000;
            font-size: 9pt;
            font-weight: normal;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            text-valign: top;
        }

        .style9up5 {
            color: #000000;
            font-size: 9pt;
            font-weight: normal;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            text-valign: top;
        }

        .style9up51 {
            color: #000000;
            font-size: 9pt;
            font-weight: normal;
            font-family: Verdana, Arial, Helvetica, sans-serif;
            text-valign: top;
        }

        .small11 {
            font-size: small;
            text-valign: top;
        }

        
    </style>
    <script type="text/javascript">
        function MM_swapImgRestore() { //v3.0
            var i, x, a = document.MM_sr;
            for (i = 0; a && i < a.length && (x = a[i]) && x.oSrc; i++) x.src = x.oSrc;
        }

        function MM_preloadImages() { //v3.0
            var d = document;
            if (d.images) {
                if (!d.MM_p) d.MM_p = new Array();
                var i, j = d.MM_p.length,
                    a = MM_preloadImages.arguments;
                for (i = 0; i < a.length; i++)
                    if (a[i].indexOf("#") != 0) {
                        d.MM_p[j] = new Image;
                        d.MM_p[j++].src = a[i];
                    }
            }
        }

        function MM_findObj(n, d) { //v4.01
            var p, i, x;
            if (!d) d = document;
            if ((p = n.indexOf("?")) > 0 && parent.frames.length) {
                d = parent.frames[n.substring(p + 1)].document;
                n = n.substring(0, p);
            }
            if (!(x = d[n]) && d.all) x = d.all[n];
            for (i = 0; !x && i < d.forms.length; i++) x = d.forms[i][n];
            for (i = 0; !x && d.layers && i < d.layers.length; i++) x = MM_findObj(n, d.layers[i].document);
            if (!x && d.getElementById) x = d.getElementById(n);
            return x;
        }

        function MM_swapImage() { //v3.0
            var i, j = 0,
                x, a = MM_swapImage.arguments;
            document.MM_sr = new Array;
            for (i = 0; i < (a.length - 2); i += 3)
                if ((x = MM_findObj(a[i])) != null) {
                    document.MM_sr[j++] = x;
                    if (!x.oSrc) x.oSrc = x.src;
                    x.src = a[i + 2];
                }
        }
    </script>
</head>

<body onload="MM_preloadImages('../logo.png')">
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td colspan="7">
                    <div align="center">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td colspan="8" rowspan="2" valign="top" class="style19b"><a href="#"
                                            onmouseout="MM_swapImgRestore()"
                                            onmouseover="MM_swapImage('Image1','','../logo.png',1)"><img
                                                src="https://epower.multipowerabadi.co.id/logo.png" width="184"
                                                height="76" id="Image1"></a><br>
                                        <p class="par">&nbsp;</p>
                                    </td>
                                    <td valign="top" class="style19b">&nbsp;</td>
                                    <td width="15%" valign="top" class="style19b">&nbsp;</td>
                                    <td width="9%" valign="top" class="style19b">&nbsp;</td>
                                    <td width="1%">
                                        <div align="left" class="style9b">
                                            <div align="left" class="style19b"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="1%" valign="top" class="style19b">&nbsp;</td>
                                    <td colspan="2" valign="top" class="style19b"><strong><u>INVOICE </u></strong>
                                    </td>
                                    <td height="54" class="style9">
                                        <div align="center"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="8"><em><span class="par">Jl. Gunung Anyar Tambak IV No.
                                                50</span></em></td>
                                    <td>&nbsp;</td>
                                    <td colspan="2">&nbsp;</td>
                                    <td class="style9">
                                        <div align="center"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="8"><em><span class="style9">Kelurahan Gunung Anyar Kec. Gunung Anyar
                                                Kota Surabaya Jawa Timur 60249</span></em></td>
                                    <td>&nbsp;</td>
                                    <td colspan="2">&nbsp;</td>
                                    <td class="style9">
                                        <div align="center"></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="8"><em><span class="style9">Email :
                                                <strong>multipowerabadi@gmail.com</strong></span></em></td>
                                    <td>&nbsp;</td>
                                    <td colspan="2">&nbsp;</td>
                                    <td class="style9">
                                        <div align="center"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="8"><em><span class="style9">Telp. 031-59178774 &nbsp;&nbsp;&amp;
                                                &nbsp;&nbsp;Hp. 0811272825</span></em></td>
                                    <td>&nbsp;</td>
                                    <td colspan="2">&nbsp;</td>
                                    <td class="style9">
                                        <div align="center"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="8"><em><span class="style9">NPWP : 71.425.962.9-606.000</span></em>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td colspan="2">&nbsp;</td>
                                    <td class="style9">
                                        <div align="center"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="8" class="small"></td>
                                    <td class="small">&nbsp;</td>
                                    <td colspan="2" class="small">&nbsp;</td>
                                    <td class="style9">
                                        <div align="center"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="small"><span class="style9"><strong>Kepada</strong></span></td>
                                    <td class="small">:</td>
                                    <td colspan="3" class="small"><span
                                            class="style9">{{ $invoice->nama_client }}</span></td>
                                    <td width="1%" class="small">&nbsp;</td>
                                    <td colspan="2" class="small"><span class="style9"><strong>No.
                                                Invoice</strong></span></td>
                                    <td class="small">:</td>
                                    <td colspan="1" class="small">
                                        </style><span class="style9">{{ $invoice->kd_inv }}/Dir.01/INV/XII/{{ \Carbon\Carbon::parse($invoice->tgl)->format('Y') }}</span></td>
                                    <td class="style9">
                                        <div align="center"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="small"><span class="style9up"><strong>
                                                <div valign="top">Alamat</div>
                                            </strong></span></td>
                                    <td class="small">:</td>
                                    <td colspan="3" class="small"><span class="style9up">
                                            {{ $invoice->alamat_client }}
                                        </span></td>
                                    <td class="small">&nbsp;</td>
                                    <td colspan="2" class="style9"><strong>Tgl. Invoice</strong></td>
                                    <td class="small">:</td>
                                    <td colspan="2" class="small"><span class="style9">
                                            {{ \Carbon\Carbon::parse($invoice->tgl)->format('d F Y') }}</span></td>
                                    <td class="style9">
                                        <div align="center"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="small"><span class="style9up"><strong>
                                                <div valign="top"></div>
                                            </strong></span></td>
                                    <td class="small">&nbsp;</td>
                                    <td colspan="3" class="small"><span class="style9up5">
                                        </span></td>
                                    <td class="small"></td>
                                    <td colspan="2" class="style9"><strong>Due Date Inv.</strong></td>
                                    <td class="small"><span class="small11">:</span></td>
                                    <td colspan="2" class="small"><span class="style9">
                                            {{ \Carbon\Carbon::parse($invoice->due_date)->format('d F Y') }}</span></td>
                                    <td class="style9">
                                        <div align="center"></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="small"><span class="style9up"><strong>
                                                <div valign="top"></div>
                                            </strong></span></td>
                                    <td class="small">&nbsp;</td>
                                    <td colspan="3" class="small"><span class="style9up51">
                                        </span></td>
                                    <td class="small">&nbsp;</td>
                                    <td colspan="2" class="style9">&nbsp;</td>
                                    <td class="small">&nbsp;</td>
                                    <td colspan="2" class="small">&nbsp;</td>
                                    <td class="style9">
                                        <div align="center"></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="11" class="small"></td>
                                    <td rowspan="2" class="style9">
                                        <div align="center"></div>
                                    </td>
                                </tr>
                                <tr class="small">
                                    <td width="7%" colspan="1">&nbsp;</td>
                                    <td width="1%">&nbsp;</td>
                                    <td colspan="3"><span
                                            class="style9"><strong>Up. {{ $invoice->up }}</strong></span></td>
                                    <td>&nbsp;</td>
                                    <td colspan="2" class="style9">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td colspan="2">&nbsp;</td>
                                </tr>

                                <tr class="small">
                                    <td colspan="5"><em class="style9"><u><strong>Reference :</strong></u></em>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td colspan="2" class="style9">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td colspan="2">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td class="small">&nbsp;</td>
                                    <td class="small"></td>
                                    <td colspan="2" class="small"><span
                                            class="style9"><u><b>No.&nbsp;SPK</b></u></span></td>
                                    <td width="22%" class="small"><span class="style9"><u><b>No.
                                                    BAST</b></u></span></td>
                                    <td class="small">&nbsp;</td>
                                    <td colspan="2" class="small">&nbsp;</td>
                                    <td class="small">&nbsp;</td>
                                    <td colspan="2" class="small">&nbsp;</td>
                                    <td class="style9">
                                        <div align="center"></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="small"></td>
                                    <td class="small"></td>
                                    <td colspan="2" class="small"><span class="style9up2">-</span></td>
                                    <td class="small"><span class="style9up1">{{ $invoice->no_bast }}</span></td>
                                    <td class="small">&nbsp;</td>
                                    <td colspan="2" class="small">&nbsp;</td>
                                    <td class="small">&nbsp;</td>
                                    <td colspan="2" class="small">&nbsp;</td>
                                    <td class="style9">
                                        <div align="center"></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="small"></td>
                                    <td class="small"></td>
                                    <td colspan="2" class="small"><span class="style9up21"></span></td>
                                    <td class="small"><span class="style9up11"></span></td>
                                    <td class="small">&nbsp;</td>
                                    <td colspan="2" class="small">&nbsp;</td>
                                    <td class="small">&nbsp;</td>
                                    <td colspan="2" class="small">&nbsp;</td>
                                    <td class="style9">
                                        <div align="center"></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="small"></td>
                                    <td class="small"></td>
                                    <td colspan="2" class="small"><span class="style9up211"></span></td>
                                    <td class="small"><span class="style9up111"></span></td>
                                    <td class="small">&nbsp;</td>
                                    <td colspan="2" class="small">&nbsp;</td>
                                    <td class="small">&nbsp;</td>
                                    <td colspan="2" class="small">&nbsp;</td>
                                    <td class="style9">
                                        <div align="center"></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="small"></td>
                                    <td class="small"></td>
                                    <td colspan="2" class="small"><span class="style9up212"></span></td>
                                    <td class="small"><span class="style9up112"></span></td>
                                    <td class="small">&nbsp;</td>
                                    <td colspan="2" class="small">&nbsp;</td>
                                    <td class="small">&nbsp;</td>
                                    <td colspan="2" class="small">&nbsp;</td>
                                    <td class="style9">
                                        <div align="center"></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="small"></td>
                                    <td class="small"></td>
                                    <td colspan="2" class="small"><span class="style9up2121"></span></td>
                                    <td class="small"><span class="style9up1121"></span></td>
                                    <td class="small">&nbsp;</td>
                                    <td colspan="2" class="small">&nbsp;</td>
                                    <td class="small">&nbsp;</td>
                                    <td colspan="2" class="small">&nbsp;</td>
                                    <td class="style9">
                                        <div align="center"></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td colspan="6">
                    <hr>
                </td>
            </tr>
            <tr>
                <td width="40" class="style6">
                    <div align="center">No</div>
                </td>
                <td width="200" class="style6">
                    <div align="left">Deskripsi</div>
                    <div align="left"></div>
                </td>
                <td width="40" class="style6">
                    <div align="left">Qty</div>
                </td>
                <td width="45" class="style6">
                    <div align="left">Satuan</div>
                </td>
                <td width="60" class="style6">
                    <div align="left">Harga</div>
                </td>
                <td width="65" class="style6">
                    <div align="right">Jumlah</div>
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <hr>
                </td>
            </tr>
            @if (isset($invoice->deskripsi))
                <tr>
                    <td class="style9" align="center">1.</td>
                    <td class="style9">{{ $invoice->deskripsi }}</td>
                    <td class="style9" align="left">{{ $invoice->qty }}.00</td>
                    <td class="style9" align="left">{{ $invoice->satuan }}</td>
                    <td class="style9" align="left">{{ 'Rp ' . number_format($invoice->harga, 0, ',', '.') }}</td>
                    <td class="style9" align="right">{{ 'Rp ' . number_format($invoice->jumlah, 0, ',', '.') }}</td>
                </tr>
            @endif

            @if (isset($invoice->deskripsi_lainnya))
                <tr>
                    <td class="style9" align="center">2.</td>
                    <td class="style9">{{ $invoice->deskripsi_lainnya }}</td>
                    <td class="style9" align="left">{{ $invoice->qty_lainnya }}.00</td>
                    <td class="style9" align="left">{{ $invoice->satuan_lainnya }}</td>
                    <td class="style9" align="left">
                        {{ 'Rp ' . number_format($invoice->harga_lainnya, 0, ',', '.') }}</td>
                    <td class="style9" align="right">
                        {{ 'Rp ' . number_format($invoice->jumlah_lainnya, 0, ',', '.') }}</td>
                </tr>
            @endif
            <td colspan="6">
                <hr>
            </td>
            </tr>
        </tbody>
    </table>

    <table width="98%" align="center" cellpadding="0" cellspacing="0">

        <tbody>
            <tr>
                <td width="100" align="right" class="st_total">&nbsp;</td>
                <td width="100" colspan="2" align="center" class="st_total">&nbsp;</td>
                <td align="left" class="st_total">JUMLAH</td>
                <td width="100" align="right">
                    <div id="total" class="st_total" align="right">
                        {{ 'Rp ' . number_format($invoice->jumlah_total, 0, ',', '.') }}
                    </div>
                </td>
            </tr>

            <tr>
                <td width="100" align="right" class="st_total">&nbsp;</td>
                <td width="100" colspan="2" align="center" class="st_total">&nbsp;</td>
                <td align="left" class="st_total">PPN 11%</td>
                <td width="100" align="right">
                    <div id="total" class="st_total" align="right">
                        {{ 'Rp ' . number_format($invoice->ppn, 0, ',', '.') }}
                    </div>
                </td>
            </tr>

            <tr>
                <td width="100" align="right" class="st_total">&nbsp;</td>
                <td width="100" colspan="2" align="center" class="st_total">&nbsp;</td>
                <td align="left" class="st_total">TOTAL HARGA</td>
                <td width="100" align="right">
                    <div id="total" class="st_total" align="right">
                        {{ 'Rp ' . number_format($invoice->jumlah_total + $invoice->ppn, 0, ',', '.') }}
                    </div>
                </td>
            </tr>

            <?php
            // Check if the function Terbilang does not already exist before declaring it
            if (!function_exists('Terbilang')) {
                function Terbilang($nilai)
                {
                    // Remove decimals and convert to integer
                    $nilai = (int) $nilai;
            
                    $huruf = ['', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan', 'Sepuluh', 'Sebelas'];
            
                    if ($nilai < 12) {
                        return $huruf[$nilai];
                    } elseif ($nilai < 20) {
                        return Terbilang($nilai - 10) . ' Belas';
                    } elseif ($nilai < 100) {
                        return Terbilang($nilai / 10) . ' Puluh ' . Terbilang($nilai % 10);
                    } elseif ($nilai < 200) {
                        return 'Seratus ' . Terbilang($nilai - 100);
                    } elseif ($nilai < 1000) {
                        return Terbilang($nilai / 100) . ' Ratus ' . Terbilang($nilai % 100);
                    } elseif ($nilai < 2000) {
                        return 'Seribu ' . Terbilang($nilai - 1000);
                    } elseif ($nilai < 1000000) {
                        return Terbilang($nilai / 1000) . ' Ribu ' . Terbilang($nilai % 1000);
                    } elseif ($nilai < 1000000000) {
                        return Terbilang($nilai / 1000000) . ' Juta ' . Terbilang($nilai % 1000000);
                    } elseif ($nilai < 1000000000000) {
                        return Terbilang($nilai / 1000000000) . ' Milyar ' . Terbilang($nilai % 1000000000);
                    } elseif ($nilai < 1000000000000000) {
                        return Terbilang($nilai / 1000000000000) . ' Triliun ' . Terbilang($nilai % 1000000000000);
                    } elseif ($nilai < 1000000000000000000) {
                        return Terbilang($nilai / 1000000000000000) . ' Kuadriliun ' . Terbilang($nilai % 1000000000000000);
                    } else {
                        return 'Maaf, nilai terlalu besar untuk diproses';
                    }
                }
            }
            
            // Contoh penggunaan
            $angka = trim($invoice->jumlah_total + $invoice->ppn); // Trim whitespace
            // echo Terbilang($angka) ; // Output: "Delapan Puluh Tujuh Juta Tujuh Ratus Delapan Puluh Delapan Ribu Delapan Ratus"
            ?>

            <tr>
                <td colspan="5" align="right" class="style9"><br><i><b>Terbilang : </b><?php echo terbilang($angka) . ' Rupiah'; ?></i>
                    <div id="total" class="st_total" align="right"></div>
                </td>
            </tr>

        </tbody>
    </table>

    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">

        <tbody>
            <tr>
                <td colspan="4">&nbsp;</td>
                <td width="330" colspan="3">&nbsp;</td>
            </tr>

            <tr>
                <td colspan="4"><span class="style9"><i><b>Pembayaran dapat dilakukan berupa Transfer ke:
                            </b></i></span></td>
                <td width="330" colspan="3">&nbsp;</td>
            </tr>

            <tr>
                @php
                    $namaBank = $invoice->nama_bank;
                    $namaBankTrimmed = explode(';', $namaBank)[0];
                @endphp
                <td width="462"><span class="style9"><i><b>Bank &nbsp;: {{ $namaBankTrimmed }}</b></i></span></td>
                <td width="109"></td>
                <td colspan="2">&nbsp;</td>
                <td width="330" colspan="3">&nbsp;</td>
            </tr>

            <tr>
                <td width="462"><span class="style9"><i><b>A/n. &nbsp;&nbsp; : {{ $invoice->an }}</b></i></span>
                </td>
                <td colspan="2">&nbsp;</td>
                <td width="330" colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td width="462"><span class="style9"><i><b>A/c. &nbsp;&nbsp; : {{ $invoice->ac }}</b></i></span>
                </td>
                <td colspan="2">&nbsp;</td>
                <td width="330" colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td width="462">&nbsp;</td>
                <td colspan="2">&nbsp;</td>
                <td width="330" colspan="3">&nbsp;</td>
            </tr>

            <tr>
                <td colspan="4"><span class="style9"><i>Jika sudah di lakukan pembayaran mohon konfirmasi ke
                            <b>multipowerabadi@gmail.com</b></i></span></td>
                <td width="330" colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2"><span class="style9"><i>atau ke 0811272825 / 081224272825</i></span></td>
                <td colspan="2">&nbsp;</td>
                <td width="330" colspan="3">&nbsp;</td>
            </tr>

            <tr>
                <td colspan="2">&nbsp;</td>
                <td colspan="2">&nbsp;</td>
                <td width="330" colspan="3">&nbsp;</td>
            </tr>

            <tr>
                <td colspan="2">
                    <div align="right" class="style9" style="padding-right: 110px;"><b>Surabaya, <span
                                class="style9c"> {{ \Carbon\Carbon::parse($invoice->tgl)->format('d F Y') }}</span>
                </td></b>
                </div>
                </td>
            </tr>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <tr>
                <td colspan="2">
                    <div align="right" class="style9" style="padding-right: 135px;"><b>(<b><u> Mariyadi, ST. MM
                                </u></b>)</b></div>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <div align="right" class="style9" style="padding-right: 165px;"><b> Direktur</b></div>
                </td>
            </tr>

            <head>
                <script type="text/javascript">
                    function MM_swapImgRestore() { //v3.0
                        var i, x, a = document.MM_sr;
                        for (i = 0; a && i < a.length && (x = a[i]) && x.oSrc; i++) x.src = x.oSrc;
                    }

                    function MM_preloadImages() { //v3.0
                        var d = document;
                        if (d.images) {
                            if (!d.MM_p) d.MM_p = new Array();
                            var i, j = d.MM_p.length,
                                a = MM_preloadImages.arguments;
                            for (i = 0; i < a.length; i++)
                                if (a[i].indexOf("#") != 0) {
                                    d.MM_p[j] = new Image;
                                    d.MM_p[j++].src = a[i];
                                }
                        }
                    }

                    function MM_findObj(n, d) { //v4.01
                        var p, i, x;
                        if (!d) d = document;
                        if ((p = n.indexOf("?")) > 0 && parent.frames.length) {
                            d = parent.frames[n.substring(p + 1)].document;
                            n = n.substring(0, p);
                        }
                        if (!(x = d[n]) && d.all) x = d.all[n];
                        for (i = 0; !x && i < d.forms.length; i++) x = d.forms[i][n];
                        for (i = 0; !x && d.layers && i < d.layers.length; i++) x = MM_findObj(n, d.layers[i].document);
                        if (!x && d.getElementById) x = d.getElementById(n);
                        return x;
                    }

                    function MM_swapImage() { //v3.0
                        var i, j = 0,
                            x, a = MM_swapImage.arguments;
                        document.MM_sr = new Array;
                        for (i = 0; i < (a.length - 2); i += 3)
                            if ((x = MM_findObj(a[i])) != null) {
                                document.MM_sr[j++] = x;
                                if (!x.oSrc) x.oSrc = x.src;
                                x.src = a[i + 2];
                            }
                    }
                </script>
            </head>
            
            <table>
                <tr>
                    <td colspan="7">
                        <div align="center">
                            <table width="120%" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td colspan="3" rowspan="2" valign="top" class="style19b"><a
                                                href="#" onmouseout="MM_swapImgRestore()"
                                                onmouseover="MM_swapImage('Image1','','../logo.png',1)"><img
                                                    src="https://epower.multipowerabadi.co.id/logo.png" width="190"
                                                    height="68" id="Image1"></a><br>
                                            <p class="par"></p>
                                        </td>
                                        <td colspan="6" valign="top" class="style19b">&nbsp;</td>
                                        <td width="10%" valign="top" class="style19b">&nbsp;</td>
                                        <td width="13%" valign="top" class="style19b"><strong
                                                class="style19b"><u>KWITANSI </u></strong></td>
                                        <td colspan="2">
                                            <div align="left" class="style9b">
                                                <div align="left" class="style19b"></div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="5%" height="51"></td>
                                        <td width="16%"></td>
                                        <td width="1%"></td>
                                        <td width="3%">&nbsp;</td>
                                        <td colspan="2">&nbsp;</td>
                                        <td width="2%" class="style9">
                                            <div align="center"></div>
                                        </td>
                                        <td width="1%" class="style9">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="13"><i><b>&nbsp;<span class="style9">Jl. Gunung Anyar Tambak IV
                                                        No.50 Surabaya</span></b></i></td>
                                        <td width="1%" class="style9">
                                            <div align="center"></div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td colspan="14"></td>
                                        <td rowspan="2" class="style9">
                                            <div align="center"></div>
                                        </td>
                                    </tr>

                                    <tr>

                                        <td class="style9">&nbsp;</td>

                                        <td class="style9" align="right">&nbsp;</td>

                                    </tr>
                                    <tr>
                                        <td width="22%" colspan="1"><span class="st_total">&nbsp;No.
                                                Kwitansi</span></td>
                                        <td width="1%">:</td>
                                        <td colspan="12"><span class="style9">{{ $invoice->kd_inv }}/Dir.01/KWT/XII/{{ \Carbon\Carbon::parse($invoice->tgl)->format('Y') }}</span></td>
                                        <td width="1%" class="style9">
                                            <div align="center"></div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="22%" colspan="1"><span class="st_total">&nbsp;Sudah terima
                                                dari</span></td>
                                        <td width="1%">:</td>
                                        <td colspan="12"><span class="style9">{{ $invoice->nama_client }}</span>
                                        </td>
                                        <td width="1%" class="style9">
                                            <div align="center"></div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td width="22%" colspan="1"><span class="st_total">&nbsp;Untuk
                                                Pembayaran</span></td>
                                        <td width="1%">:</td>

                                    </tr>
                                    <tr>
                                        <td class="style9" align="left"><span class="st_total">&nbsp;</span></td>
                                        <td colspan="12"><span class="style9">
                                                &nbsp;&nbsp;&nbsp;&nbsp;- &nbsp;{{ $invoice->deskripsi }}
                                                @if ($invoice->deskripsi_lainnya)
                                                    <br>&nbsp;&nbsp;&nbsp;&nbsp;-
                                                    &nbsp;{{ $invoice->deskripsi_lainnya }}
                                                @endif
                                            </span></td>


                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td colspan="10">&nbsp;</td>
                                        <td class="style9">
                                            <div align="center"></div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><span class="st_total">&nbsp;Terbilang</span></td>
                                        <td>:</td>

                                        <td colspan="11"><span class="style9"><i><?php echo terbilang($angka) . ' Rupiah'; ?></i></span></td>
                                        <td class="style9">
                                            <div align="center"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td colspan="10">&nbsp;</td>
                                        <td class="style9">
                                            <div align="center"></div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><span class="st_total">&nbsp;Jumlah</span></td>
                                        <td>:</td>
                                        <td colspan="3" class="st_total">
                                            <b><u>{{ 'Rp ' . number_format($invoice->jumlah_total + $invoice->ppn, 0, ',', '.') }}</u></b>
                                    </tr>

                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td colspan="6">
                                            <div align="center"></div>
                                        </td>
                                    </tr
                                   
                                        </td>
                                        
                                </tbody>
                            </table>
                            
                            <div align="right" class="style9b">
                                <b>Surabaya, <span class="style9c">{{ \Carbon\Carbon::parse($invoice->tgl)->format('d F Y') }}</span></b>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>

                            <!-- Additional content outside the table -->
                            <div align="right" style="margin-right: 30px;">
                                <span class="style9" ><b>(<b><u> Mariyadi, ST. MM </u></b>)</b></span>
                            </div>


                            <div align="right" style="margin-right: 55px;">
                                <span class="st_total">
                                    Direktur
                                </span>
                            </div>
                        </div>
                    </td>
                </tr>
        </tbody>
    </table>
    </table>
</body>
</html>
</tbody>
</table>
</body>
</html>
