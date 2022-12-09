<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class BerandaController extends BaseController
{
    public function index()
    {
        $data = [
            'komen' => $this->TestimoniModel->orderBy('created_at','DESC')->limit(3)->find(),
            'event' => $this->EventModel->orderBy('start_event', 'DESC')->limit(5)->find(),
            'tentang_website' => $this->TentangWebsiteModel->orderBy('id_tentang', 'DESC')->limit(1)->find(),
            'kontak' => $this->CaraKerjasamaModel->orderBy('id_cara_kerjasama', 'DESC')->limit(3)->find(),
        ];
        return view('users/index', $data);
    }

    public function allEvent()
    {
        $data = [
            'event' => $this->EventModel->orderBy('start_event', 'DESC')->findAll(),
        ];
        return view('users/all-event', $data);
    }

    public function DetailEvent($id)
    {
        $data = [
            'event' => $this->EventModel->find($id)
        ];
        return view('users/detail-event', $data);
    }

    public function komen()
    {
        if (session('id_user')) {
            $this->db->table('testimoni')->insert([
                'username' => $this->request->getPost('username'),
                'alamat' => $this->request->getPost('alamat'),
                'pesan' => $this->request->getPost('pesan'),
                'foto_profil' => $this->request->getPost('foto_profil'),
            ]);
            return redirect()->back()->with('success', 'Telah mengirimkan komentar');
        } else {
            return redirect()->to(site_url('/login-user'));
        }
    }

    public function komendata()
    {
        $data = [
            'title' => "Data Komentar",
            'data_komen' => $this->TestimoniModel->orderBy('created_at', 'DESC')->findAll(),
            // 'cara_kontak' => $this->CaraKerjasamaModel->orderBy('id_cara_kerjasama', 'DESC')->findAll()
        ];
        return view('manajemen-konten/data_komentar', $data);
    }

    public function destroyKomen($id)
    {
        $this->TestimoniModel->delete($id);
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
