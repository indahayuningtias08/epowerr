<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Yajra\DataTables\Facades\DataTables;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        return view('bank');
    }

    public function getBank(Request $request)
    {
        if ($request->ajax()) {
            $data = Bank::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function($row){
                    $actionBtn = '<a href="/bank/edit/'.$row->id.'" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                    return $actionBtn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
    }

    public function editbank($id)
    {
       $request = Bank::select('*')
                 ->where('id', $id)
                 ->get();
    
       return view('editbank', ['bank' => $request]);
    }
    
    public function updatebank(Request $request)
{
    // Ambil data bank berdasarkan ID
    $bank = Bank::find($request->id);

    // Check if any changes are made
    if ($bank && $bank->nama_bank == $request->nama_bank &&
        $bank->an == $request->an &&
        $bank->ac == $request->ac) {
        // No changes made, redirect back to the bank page
        return redirect('bank')->with('info', 'TIDAK Ada Perubahan Yang Dilakukan.');
    }

    // Update the bank only if changes are detected
    if ($bank) {
        $bank->nama_bank = $request->nama_bank;
        $bank->an = $request->an;
        $bank->ac = $request->ac;

        $bank->save();

        return redirect('bank')->with('success', 'Data Berhasil Diperbarui!');
    } else {
        // Bank not found
        return redirect('bank')->with('error', 'Bank not found.');
    }
}
    

    public function tambahbank()
    {
        return view('tambahbank');
    }

    public function simpanbank(Request $request)
    {
        $request = Bank::create([
            'nama_bank' => $request->nama_bank,
            'an' => $request->an,
            'ac'=> $request->ac,
        ]);

        return redirect('bank')->with('success', 'Data Bank Berhasil Ditambahkan!');
    }

    public function export()
    {
        $spreadsheet = IOFactory::load(public_path('assets/template3.xlsx'));
        $spreadsheet->setActiveSheetIndex(0);
        $sheet = $spreadsheet->getActiveSheet();

        $bank = Bank::latest()->get();
        
        $no=1;
        $unit_no = 4;

        foreach ($bank as $s) {

            $sheet->setCellValue("A$unit_no", $no);
            $sheet->setCellValue("B$unit_no", $s->nama_bank);
            $sheet->setCellValue("C$unit_no", $s->an);
            $sheet->setCellValue("D$unit_no", $s->ac);
           
            $no++;
            $unit_no++;
        }

        $sheet->getProtection()->setSheet(false);
        $sheet->getProtection()->setInsertRows(false);

        $spreadsheet->setActiveSheetIndex(0);
        $writer = new Xlsx($spreadsheet);
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Disposition: attachment; filename="Data Bank.xlsx"');
        $writer->save("php://output");
        die;

    }

}
