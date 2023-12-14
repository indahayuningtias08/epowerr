<?php

namespace App\Http\Controllers;

use App\Models\MPA2020;
use App\Models\Client;
use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PDF;



class MPA2020Controller extends Controller
{
    public function index()
    {
        return view('mpa2020');
    }

    public function getMPA2020(Request $request)
    {
        if ($request->ajax()) {
            $data = MPA2020::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function($row){
                    $actionBtn = '<div class="btn-group">
                        <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" >
                            Action
                        </button>
                        <div class="dropdown-menu">
                        <button class="btn btn-info" data-toggle="modal" data-target="#detailModal" data-id="{{ $row->id }}">Lihat Detail</button>
                        <br>
                        <a href="/mpa2020/edit/' . $row->id . '" class="btn btn-sm" style="background-color: #000; color: #fff;"><i class="fa fa-edit"></i> Edit</a>
                        <br>
                        <a href="/mpa2020/print/' . $row->id . '" class="btn btn-sm" style="background-color: #800080; color: #fff;"><i class="fa fa-print"></i> Print</a>
                        <br>
                        <a href="/mpa2020/printttd/' . $row->id . '" class="btn btn-sm" style="background-color: #FFD700; color: #fff;"><i class="fa fa-print"></i> Print TTD</a>
                        <br>
                        <a href="/mpa2020/hapus/'.$row->id.'" onclick="return confirmDelete();" 
                    class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                        </div>
                    </div>';
                    return $actionBtn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
    }

    public function hapusmpa2020($id)
    {
       $request = MPA2020::select('*')
                 ->where('id', $id)
                 ->delete();
    
       return view('mpa2020')->with('success', 'Data Berhasil DI HAPUS!');
    }

    public function tambahinvoicempa2020()
{
    // Mendapatkan kode terbaru
    $latestMPA2020 = MPA2020::latest()->first();

    // Membuat kode baru
    if ($latestMPA2020) {
        $lastCode = intval(substr($latestMPA2020->kd_inv, 3));
        $newCode = 'MPA' . str_pad($lastCode + 1, 4, '0', STR_PAD_LEFT);
    } else {
        $newCode = 'MPA0001';
    }

    // Mendapatkan data client
    $clients = Client::all();
    
    // Mendapatkan data bank
    $banks = Bank::all();

    return view('tambahinvoicempa2020', [
        'newCode' => $newCode,
        'clients' => $clients,
        'banks' => $banks,
    ]);
}


    public function simpaninvoicempa2020(Request $request)
    {
        $request = MPA2020::create([
            'tgl' => $request->tgl,
            'kd_inv' => $request->kd_inv,
            'nama_client' => $request->nama_client,
            'alamat_client' => $request->alamat_client,
            'item'=> $request->item,
            'total_invoice' => $request->total_invoice,
            'fp' => $request->fp,
            'status' => $request->status,
            'tgl_paid' => $request->tgl_paid,
            'up' => $request->up,
            'no_bast' => $request->no_bast,
            'jenis' => $request->jenis,
            'nomor' => $request->nomor,
            'due_date' => $request->due_date,
            'jumlah_total' => $request->jumlah_total,
            'ppn' => $request->ppn,
            'nama_bank' => $request->nama_bank,
            'an' => $request->an,
            'ac' => $request->ac,
            'no_fp' => $request->no_fp,
            'deskripsi' => $request->deskripsi,
            'qty' => $request->qty,
            'satuan' => $request->satuan,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'deskripsi_lainnya' => $request->deskripsi_lainnya,
            'qty_lainnya' => $request->qty_lainnya,
            'satuan_lainnya' => $request->satuan_lainnya,
            'harga_lainnya' => $request->harga_lainnya,
            'jumlah_lainnya' => $request->jumlah_lainnya,
        ]);

        return redirect('mpa2020')->with('success', 'Data Invoice MPA Berhasil Ditambahkan!');
        
    }

    public function export()
    {
        $spreadsheet = IOFactory::load(public_path('assets/template4.xlsx'));
        $spreadsheet->setActiveSheetIndex(0);
        $sheet = $spreadsheet->getActiveSheet();

        $mpa2020 = MPA2020::latest()->get();
        
        $no=1;
        $unit_no = 4;

        foreach ($mpa2020 as $s) {

        $namaBankTrimmed = explode(';', $s->nama_bank)[0];

            $sheet->setCellValue("A$unit_no", $no);
            $sheet->setCellValue("B$unit_no", $s->kd_inv);
            $sheet->setCellValue("C$unit_no", $s->tgl);
            $sheet->setCellValue("D$unit_no", $s->nama_client);
            $sheet->setCellValue("E$unit_no", $s->alamat_client);
            $sheet->setCellValue("F$unit_no", $s->up);
            $sheet->setCellValue("G$unit_no", $s->no_bast);
            $sheet->setCellValue("H$unit_no", $s->jenis);
            $sheet->setCellValue("I$unit_no", $s->due_date);
            // Menggabungkan deskripsi dan deskripsi_lainnya dengan pemisah baris baru
            $combinedDescription = $s->deskripsi . "\n" . $s->deskripsi_lainnya;
            
            $sheet->setCellValue("J$unit_no", $combinedDescription); // Deskripsi dan deskripsi_lainnya dalam satu baris
            
            // Mengatur wrap text untuk kolom J pada baris yang sama
            $sheet->getStyle("J$unit_no")->getAlignment()->setWrapText(true);
            $sheet->setCellValue("K$unit_no", $s->jumlah_total);
            $sheet->setCellValue("L$unit_no", $s->ppn);
            $sheet->setCellValue("M$unit_no", $s->total_invoice);
            $sheet->setCellValue("N$unit_no", $namaBankTrimmed); // Gunakan $namaBankTrimmed di sini
            $sheet->setCellValue("O$unit_no", $s->an);
            $sheet->setCellValue("P$unit_no", $s->ac);
            $sheet->setCellValue("Q$unit_no", $s->no_fp);
            $sheet->setCellValue("R$unit_no", $s->status);
            $sheet->setCellValue("S$unit_no", $s->tgl_paid);
    
            $no++;
            $unit_no++;
        }

        $sheet->getProtection()->setSheet(false);
        $sheet->getProtection()->setInsertRows(false);

        $spreadsheet->setActiveSheetIndex(0);
        $writer = new Xlsx($spreadsheet);
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Disposition: attachment; filename="Invoice MPA.xlsx"');
        $writer->save("php://output");
        die;

    }

    public function processSelect(Request $request)
    {
        $selectedOption = $request->input('selectField');

        // Perform your processing here

        return view('result', ['selectedOption' => $selectedOption]);
    }

    public function getDetail($id)
    {
        $data = MPA2020::find($id); // Sesuaikan dengan model dan logika aplikasi Anda
        return response()->json($data);
    }

    public function editmpa2020($id)
    {
        
        $clients = Client::all();
        $banks = Bank::all();
       $request = MPA2020::select('*')
                 ->where('id', $id)
                 ->get();
    
       return view('editmpa2020', ['mpa2020' => $request, 'clients' => $clients, 'banks' => $banks]);
    }
    
    public function updatempa2020(Request $request)
{
   
    $mpa2020 = MPA2020::find($request->id);
    $namaBank = $request->input('nama_bank');
    // Check if any changes are made
    if ($mpa2020 &&
        $mpa2020->nama_client == $request->nama_client &&
        $mpa2020->alamat_client == $request->alamat_client &&
        $mpa2020->deskripsi == $request->deskripsi &&
        $mpa2020->deskripsi_lainnya == $request->deskripsi_lainnya &&
        $mpa2020->item == $request->item &&
        $mpa2020->total_invoice == $request->total_invoice &&
        $mpa2020->fp == $request->fp &&
        $mpa2020->status == $request->status &&
        $mpa2020->tgl_paid == $request->tgl_paid &&
        $mpa2020->harga == $request->harga &&
        $mpa2020->harga_lainnya == $request->harga_lainnya &&
        $mpa2020->satuan == $request->satuan &&
        $mpa2020->satuan_lainnya == $request->satuan_lainnya &&
        $mpa2020->qty == $request->qty &&
        $mpa2020->qty_lainnya == $request->qty_lainnya &&
        $mpa2020->up == $request->up &&
        $mpa2020->no_bast == $request->no_bast &&
        $mpa2020->jenis == $request->jenis &&
        $mpa2020->nomor == $request->nomor &&
        $mpa2020->due_date == $request->due_date &&
        $mpa2020->jumlah == $request->jumlah &&
        $mpa2020->jumlah_lainnya == $request->jumlah_lainnya &&
        $mpa2020->ppn == $request->ppn &&
        $mpa2020->nama_bank == $namaBank &&
        $mpa2020->an == $request->an &&
        $mpa2020->ac == $request->ac &&
        $mpa2020->no_fp == $request->no_fp
    ) {
        // No changes made, redirect back to mpa2020
        return redirect('mpa2020')->with('info', 'TIDAK Ada Perubahan Yang Dilakukan.');
    }

    // Update the MPA2020 only if changes are detected
    if ($mpa2020) {
        $mpa2020->update([
            'nama_client' => $request->nama_client,
            'alamat_client' => $request->alamat_client,
            'deskripsi' => $request->deskripsi,
            'deskripsi_lainnya' => $request->deskripsi_lainnya,
            'item' => $request->item,
            'total_invoice' => $request->total_invoice,
            'fp' => $request->fp,
            'status' => $request->status,
            'tgl_paid' => $request->tgl_paid,
            'harga' => $request->harga,
            'harga_lainnya' => $request->harga_lainnya,
            'satuan' => $request->satuan,
            'satuan_lainnya' => $request->satuan_lainnya,
            'qty' => $request->qty,
            'qty_lainnya' => $request->qty_lainnya,
            'up' => $request->up,
            'no_bast' => $request->no_bast,
            'jenis' => $request->jenis,
            'nomor' => $request->nomor,
            'due_date' => $request->due_date,
            'jumlah' => $request->jumlah,
            'jumlah_lainnya' => $request->jumlah_lainnya,
            'ppn' => $request->ppn,
            'nama_bank' => $namaBank,
            'an' => $request->an,
            'ac' => $request->ac,
            'no_fp' => $request->no_fp,
        ]);

        return redirect('mpa2020')->with('success', 'Data MPA2020 Berhasil Di Update!');
    }
}
    

        public function printInvoice($id)
    {
        $invoice = MPA2020::find($id);
        $pdf = PDF::loadView('printinvoice', compact('invoice'));

        return $pdf->stream('invoice.pdf');
    }

    public function printInvoicettd($id)
    {
        $invoice = MPA2020::find($id);
        $pdf = PDF::loadView('printinvoicecopy', compact('invoice'));

        return $pdf->stream('invoice.pdf');
    }

    public function showForm()
{
    $clients = Client::all();
    return view('tambahinvoicempa2020', compact('clients'));
}    

}