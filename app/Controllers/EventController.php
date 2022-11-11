<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use Dompdf\Dompdf;



class EventController extends BaseController
{
    public function index()
    {
        // $db      = \Config\Database::connect();
        $builder = $this->db->table('event');
        $query   = $builder->get()->getResult();
        $data['event'] = $query;
        return view('data-event/index', $data);
    }

    public function create()
    {
        return view('data-event/add');
    }

    public function store()
    {
        $data = $this->request->getPost();
        $this->db->table('event')->insert($data);
        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('event'))->with('success', 'Data berhasil disimpan');
        }
    }

    public function edit($id = null)
    {
        if ($id != null) {
            $query = $this->db->table('event')->getWhere(['id_Event' => $id]);
            // print_r($query);
            if ($query->resultID->num_rows > 0) {
                $data['event'] = $query->getRow();
                return view('data-event/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        unset($data['_method']);
        $this->db->table('event')->where(['id_event' => $id])->update($data);
        return redirect()->to(site_url('event'))->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        // $data = $this->request->getPost();
        // unset($data['_method']);
        $this->db->table('event')->where(['id_event' => $id])->delete();
        return redirect()->to(site_url('event'))->with('success', 'Data berhasil dihapus');
    }

    public function export()
    {
        $event = $this->db->table('event');
        $query   = $event->get()->getResult();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Judul');
        $sheet->setCellValue('C1', 'Deskripsi');
        $sheet->setCellValue('D1', 'Penyelenggara');

        $column = 2;
        foreach ($query as $key => $value) {
            $sheet->setCellValue('A' . $column, ($column - 1));
            $sheet->setCellValue('B' . $column, $value->judul);
            $sheet->setCellValue('C' . $column, $value->deskripsi);
            $sheet->setCellValue('D' . $column, $value->penyelenggara);
            $column++;
        }
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=event.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function import()
    {
        $file = $this->request->getFile('file_excel');
        $extenstion = $file->getClientExtension();
        print_r($extenstion);
        if ($extenstion == 'xlsx' || $extenstion == 'xls') {
            if ($extenstion == 'xls') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $reader->load($file);
            $event = $spreadsheet->getActiveSheet()->toArray();
            // print_r($event);
            foreach ($event as $key => $value) {
                if ($key == 0) {
                    continue;
                }
                $data = [
                    'judul' => $value[1],
                    'deskripsi' => $value[2],
                    'penyelenggara' => $value[3],
                ];
                $this->db->table('event')->insert($data);
            }
            return redirect()->back()->with('success', 'Data berhasil diimport');
        } else {
            return redirect()->back()->with('error', 'Format file tidak sesuai');
        }
    }

    public function exportPDF()
    {
        $builder = $this->db->table('event');
        $query   = $builder->get()->getResult();
        $data['event'] = $query;
        $view = view('data-event/pdf',$data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("data event", array("Attachment"=>false));
    }
}
