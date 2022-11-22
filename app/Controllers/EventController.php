<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use Dompdf\Dompdf;

class EventController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data Event',
            'daftar_event' => $this->EventModel->orderBy('id_event', 'DESC')->findAll()
        ];
        // print_r("<pre>");print_r($data['daftar_event']);die();
        return view('data-event/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Event',
            'kategori' => $this->KategoriModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('data-event/add', $data);
    }

    public function store()
    {
        $rules = $this->validate([
            'judul' => 'required',
            'slug_kategori' => 'required',
            'penyelenggara' => 'required',
            'deskripsi' => 'required',
            'start_event' => 'required',
            'img_event' => 'uploaded[img_event]|is_image[img_event]|max_size[img_event,2048]|mime_in[img_event,image/jpg,image/jpeg,image/png]|ext_in[img_event,jpg,jpeg,png]',
        ]);
        if (!$rules) {
            session()->setFlashdata('failed', 'Data event gagal di tambahkan');
            return redirect()->back()->withInput();
        }
        $slug_event = url_title($this->request->getPost('judul'), '-', TRUE);

        $img_event = $this->request->getFile('img_event');
        $name_img = $img_event->getRandomName();

        $img_event->move(WRITEPATH . '../public/template/assets/img/img-event/', $name_img);

        $this->EventModel->insert([
            'slug_event' => $slug_event,
            'slug_kategori' => $this->request->getPost('slug_kategori'),
            'judul' => $this->request->getPost('judul'),
            'penyelenggara' => $this->request->getPost('penyelenggara'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'img_event' => $name_img,
            'start_event' => $this->request->getPost('start_event'),
            'end_event' => $this->request->getPost('end_event'),
        ]);
        return redirect()->to(site_url('event'))->with('success', 'Data berhasil disimpan');
    }

    public function edit($id = null)
    {
        $data = [
            'title' => 'Edit Data Event',
            'event' => $this->EventModel->find($id),
            'kategori' => $this->KategoriModel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('data-event/edit', $data);
    }

    public function update($id)
    {
        $rules = $this->validate([
            'judul' => 'required',
            'slug_kategori' => 'required',
            'penyelenggara' => 'required',
            'deskripsi' => 'required',
            'start_event' => 'required',
            'img_event' => 'is_image[img_event]|max_size[img_event,2048]|mime_in[img_event,image/jpg,image/jpeg,image/png]|ext_in[img_event,jpg,jpeg,png]',
        ]);
        if (!$rules) {
            session()->setFlashdata('failed', 'Data event gagal di ubah');
            return redirect()->back()->withInput();
        }
        $slug_event = url_title($this->request->getPost('judul'), '-', TRUE);

        $img_event = $this->request->getFile('img_event');
        if ($img_event->getError() == 4) {
            $name_img = $this->request->getPost('gambarLama');
        } else {
            $name_img = $img_event->getRandomName();
            $img_event->move(WRITEPATH . '../public/template/assets/img/img-event/', $name_img);

            unlink(WRITEPATH . '../public/template/assets/img/img-event/' . $this->request->getPost('gambarLama'));
        }


        $this->EventModel->update($id, [
            'slug_event' => $slug_event,
            'slug_kategori' => $this->request->getPost('slug_kategori'),
            'judul' => $this->request->getPost('judul'),
            'penyelenggara' => $this->request->getPost('penyelenggara'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'img_event' => $name_img,
            'start_event' => $this->request->getPost('start_event'),
            'end_event' => $this->request->getPost('end_event'),
        ]);
        return redirect()->to(site_url('event'))->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $event = $this->EventModel->find($id);
        unlink(WRITEPATH . '../public/template/assets/img/img-event/' . $event->img_event);
        $this->EventModel->delete($id);
        return redirect()->back()->with('success', 'Data berhasil dihapus');
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
        $view = view('data-event/pdf', $data);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("data event", array("Attachment" => false));
    }
}
