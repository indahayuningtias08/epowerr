<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Yajra\DataTables\Facades\DataTables;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('client');
    }

    public function getClient(Request $request)
    {
        if ($request->ajax()) {
            $data = Client::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function($row){
                    $actionBtn = '<a href="/client/edit/'.$row->id.'" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a> 
                    <a href="/client/hapus/'.$row->id.'" onclick="return confirmDelete();" 
                    class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i>Hapus</a>';
                    return $actionBtn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
    }

    public function editclient($id)
    {
       $request = Client::select('*')
                 ->where('id', $id)
                 ->get();
    
       return view('editclient', ['client' => $request]);
    }
    
    public function updateclient(Request $request)
{
    $client = Client::find($request->id);

    // Check if any changes are made
    if ($client->nama_client == $request->nama_client &&
        $client->alamat == $request->alamat &&
        $client->up_invoice == $request->up_invoice &&
        $client->up_sph == $request->up_sph) {
        // No changes made, redirect back to editclient
        return redirect('client')->with('info', 'TIDAK Ada Perubahan Yang Dilakukan.');
    }

    // Update the client
    Client::where('id', $request->id)
        ->update([
            'nama_client' => $request->nama_client,
            'alamat' => $request->alamat,
            'up_invoice' => $request->up_invoice,
            'up_sph' => $request->up_sph,
        ]);

    return redirect('client')->with('success', 'Data Client Berhasil Di Update!');
}


    public function tambahclient()
    {
        return view('tambahclient');
    }

    public function simpanclient(Request $request)
    {
        $request = Client::create([
            'nama_client' => $request->nama_client,
            'alamat' => $request->alamat,
            'up_invoice' => $request->up_invoice,
            'up_sph'=> $request->up_sph,
        ]);

        return redirect('client')->with('success', 'Data Client Berhasil Ditambahkan!');
    }

    public function hapusclient($id)
{
    // Tampilkan halaman konfirmasi hapus di sini jika Anda ingin memberikan konfirmasi lebih lanjut

    $request = Client::select('*')
        ->where('id', $id)
        ->delete();

    return redirect('client')->with('success', 'Data Berhasil DI HAPUS!');
}


    public function export()
    {
        $spreadsheet = IOFactory::load(public_path('assets/template1.xlsx'));
        $spreadsheet->setActiveSheetIndex(0);
        $sheet = $spreadsheet->getActiveSheet();

        $client = Client::latest()->get();
        
        $no=1;
        $unit_no = 4;

        foreach ($client as $s) {

            $sheet->setCellValue("A$unit_no", $no);
            $sheet->setCellValue("B$unit_no", $s->nama_client);
            $sheet->setCellValue("C$unit_no", $s->alamat);
            $sheet->setCellValue("D$unit_no", $s->up_invoice);
            $sheet->setCellValue("E$unit_no", $s->up_sph);
           
            $no++;
            $unit_no++;
        }

        $sheet->getProtection()->setSheet(false);
        $sheet->getProtection()->setInsertRows(false);

        $spreadsheet->setActiveSheetIndex(0);
        $writer = new Xlsx($spreadsheet);
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Disposition: attachment; filename="Data Client.xlsx"');
        $writer->save("php://output");
        die;

    }

}
