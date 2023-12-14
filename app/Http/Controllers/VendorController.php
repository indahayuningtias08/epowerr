<?php

namespace App\Http\Controllers;
use App\Models\Vendor;
use Yajra\DataTables\Facades\DataTables;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        return view('vdor');
    }

    public function getVdor(Request $request)
    {
        if ($request->ajax()) {
            $data = Vendor::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function($row){
                    $actionBtn = '<a href="/vdor/edit/'.$row->id.'" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>';
                    return $actionBtn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
    }

    public function editvdor($id)
    {
       $request = Vendor::select('*')
                 ->where('id', $id)
                 ->get();
    
       return view('editvdor', ['vdor' => $request]);
    }
    
    public function updatevdor(Request $request)
{
    // Ambil data vendor berdasarkan ID
    $vendor = Vendor::find($request->id);

    // Check if any changes are made
    if ($vendor && $vendor->nama_vendor == $request->nama_vendor &&
        $vendor->alamat == $request->alamat &&
        $vendor->kota == $request->kota &&
        $vendor->up == $request->up &&
        $vendor->telepon == $request->telepon &&
        $vendor->email == $request->email) {
        // No changes made, redirect back to vdor
        return redirect('vdor')->with('info', 'TIDAK Ada Perubahan Yang Dilakukan.');
    }

    // Update the vendor only if changes are detected
    if ($vendor) {
        $vendor->nama_vendor = $request->nama_vendor;
        $vendor->alamat = $request->alamat;
        $vendor->kota = $request->kota;
        $vendor->up = $request->up;
        $vendor->telepon = $request->telepon;
        $vendor->email = $request->email;

        $vendor->save();

        return redirect('vdor')->with('success', 'Data Berhasil Diperbarui');
    } else {
        // Vendor not found
        return redirect('vdor')->with('error', 'Vendor not found.');
    }
}
    

    public function tambahvdor()
    {
        return view('tambahvdor');
    }

    public function simpanvdor(Request $request)
    {
        $request = Vendor::create([
            'nama_vendor' => $request->nama_vendor,
            'alamat' => $request->alamat,
            'kota'=> $request->kota,
            'up'=> $request->up,
            'telepon'=> $request->telepon,
            'email'=> $request->email,
        ]);

        return redirect('vdor')->with('success', 'Data Vendor Berhasil Ditambahkan!');
    }


    public function export()
    {
        $spreadsheet = IOFactory::load(public_path('assets/template2.xlsx'));
        $spreadsheet->setActiveSheetIndex(0);
        $sheet = $spreadsheet->getActiveSheet();

        $vendor = Vendor::latest()->get();
        
        $no=1;
        $unit_no = 4;

        foreach ($vendor as $s) {

            $sheet->setCellValue("A$unit_no", $no);
            $sheet->setCellValue("B$unit_no", $s->nama_vendor);
            $sheet->setCellValue("C$unit_no", $s->alamat);
            $sheet->setCellValue("D$unit_no", $s->kota);
            $sheet->setCellValue("E$unit_no", $s->up);
            $sheet->setCellValue("F$unit_no", $s->telepon);
            $sheet->setCellValue("G$unit_no", $s->email);
           
            $no++;
            $unit_no++;
        }

        $sheet->getProtection()->setSheet(false);
        $sheet->getProtection()->setInsertRows(false);

        $spreadsheet->setActiveSheetIndex(0);
        $writer = new Xlsx($spreadsheet);
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Disposition: attachment; filename="Data Vendor.xlsx"');
        $writer->save("php://output");
        die;

    }

}