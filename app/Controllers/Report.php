<?php

namespace App\Controllers;

//memanggil model
use App\Models\ReportcostModel;
use App\Models\ParkingfreqModel;

//memanggil package excel
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//memanggil package pdf
use Dompdf\Dompdf;

class Report extends BaseController
{

    public function __construct()
    {
        //load model untuk digunakan
        $this->ReportcostModel = new ReportcostModel();
        $this->ParkingfreqModel = new ParkingfreqModel();
    }

    public function dashboard()
    {
        $filterId = session()->get('profile_id');
        $laporan_cost =  $this->ReportcostModel->where('userid', $filterId)->findAll();
        $laporan_freq =  $this->ParkingfreqModel->where('userid', $filterId)->findAll();
        
        $output = [
            'laporan' => $laporan_cost,
            'frekuensi' => $laporan_freq
        ];

        return view('report_user', $output);
    }

    function ExportXLS()
    {
        //select data
        $filterId = session()->get('profile_id');
        $list = $this->ReportcostModel->where('userid', $filterId)->findAll();

        //filename
        $fileName = 'laporan.xlsx';

        //start package excel
        $spreadsheet = new Spreadsheet();

        //header
        $sheet = $spreadsheet->getActiveSheet();
        //(A1 : lokasi line & column excel, No : display data)
        $sheet->setCellValue('A1', 'No')->getColumnDimension('A')->setAutoSize(true);
        $sheet->setCellValue('B1', 'Tanggal')->getColumnDimension('B')->setAutoSize(true);
        $sheet->setCellValue('C1', 'Total Pengeluaran')->getColumnDimension('C')->setAutoSize(true);

        //body
        $line = 2;
        foreach ($list as $row) {
            $sheet->setCellValue('A'.$line, $line-1);
            $sheet->setCellValue('B'.$line, $row['tanggal']);
            $sheet->setCellValue('C'.$line, $row['biaya']);
            $line++;
        }

        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment; filename="' . urlencode($fileName) . '"');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    function ExportPDF()
    {
        //select data from table buku
        $filterId = session()->get('profile_id');
        $list = $this->ReportcostModel->where('userid', $filterId)->findAll();
        
        //filename
        $fileName = 'report';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $output = [
            'list' => $list,
        ];
        $dompdf->loadHtml(view('report_pdf', $output));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($fileName);
    }
}
