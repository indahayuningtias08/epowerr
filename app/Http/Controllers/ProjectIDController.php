<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProjectID;
use Yajra\DataTables\Facades\DataTables;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectIDController extends Controller
{
    public function index()
    {
        return view('projectid');
    }

    public function getProjectID(Request $request)
    {
        if ($request->ajax()) {
            $data = ProjectID::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function($row){
                    $actionBtn = '<a href="/projectid/edit/'.$row->id.'" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i>Edit</a>';
                    return $actionBtn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
    }

    public function tambahprojectid()
    {
        return view('tambahprojectid');
    }

    public function simpanprojectid(Request $request)
    {
        $request = ProjectID::create([
            'project_id' => $request->project_id,
            'nama_project' => $request->nama_project,
            'hpp' => $request->hpp,
            'rab'=> $request->rab,
            'nama_client'=> $request->nama_client,
            'alamat_client' => $request->alamat_client,
        ]);

        return redirect('projectid')->with('success', 'Data Project ID Berhasil Ditambahkan!');
    }
    
    public function editprojectid($id)
    {
       $request = ProjectID::select('*')
                 ->where('id', $id)
                 ->get();
    
       return view('editprojectid', ['projectid' => $request]);
    }
    
    public function updateprojectid(Request $request)
{
    $project = ProjectID::find($request->id);

    // Check if any changes are made
    if ($project->nama_project == $request->nama_project &&
        $project->hpp == $request->hpp &&
        $project->rab == $request->rab &&
        $project->nama_client == $request->nama_client &&
        $project->alamat_client == $request->alamat_client) {
        // No changes made, redirect back to editprojectid
        return redirect('projectid')->with('info', 'TIDAK Ada Perubahan Yang Dilakukan.');
    }

    // Update the project
    ProjectID::where('id', $request->id)
        ->update([
            'nama_project' => $request->nama_project,
            'hpp' => $request->hpp,
            'rab' => $request->rab,
            'nama_client' => $request->nama_client,
            'alamat_client' => $request->alamat_client,
        ]);

    return redirect('projectid')->with('success', 'Data Project ID Berhasil Di Update');
}


    public function export()
    {
        $spreadsheet = IOFactory::load(public_path('assets/template.xlsx'));
        $spreadsheet->setActiveSheetIndex(0);
        $sheet = $spreadsheet->getActiveSheet();

        $projectid = ProjectID::latest()->get();
        
        $no=1;
        $unit_no = 4;

        foreach ($projectid as $s) {

            $sheet->setCellValue("A$unit_no", $no);
            $sheet->setCellValue("B$unit_no", $s->project_id);
            $sheet->setCellValue("C$unit_no", $s->nama_project);
            $sheet->setCellValue("D$unit_no", $s->hpp);
            $sheet->setCellValue("E$unit_no", $s->rab);
            $sheet->setCellValue("F$unit_no", $s->nama_client);
            $sheet->setCellValue("G$unit_no", $s->alamat_client);
           
            $no++;
            $unit_no++;
        }

        $sheet->getProtection()->setSheet(false);
        $sheet->getProtection()->setInsertRows(false);

        $spreadsheet->setActiveSheetIndex(0);
        $writer = new Xlsx($spreadsheet);
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Disposition: attachment; filename="Data Project ID.xlsx"');
        $writer->save("php://output");
        die;

    }

}
