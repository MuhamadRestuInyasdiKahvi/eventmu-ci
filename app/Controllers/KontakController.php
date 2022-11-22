<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class KontakController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "Konten Kontak",
            'cara_kontak' => $this->CaraKerjasamaModel->orderBy('id_cara_kerjasama', 'DESC')->findAll()
        ];
        return view('manajemen-konten/data_kontak', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Kontak',
            'validation' => \Config\Services::validation()
        ];
        return view('manajemen-konten/data_kontak_add', $data);
    }

    public function store()
    {
        $rules = $this->validate([
            'title' => 'required',
            'keterangan' => 'required',
            'icon_cara_kerjasama' => 'uploaded[icon_cara_kerjasama]|is_image[icon_cara_kerjasama]|max_size[icon_cara_kerjasama,2048]|mime_in[icon_cara_kerjasama,image/jpg,image/jpeg,image/png]|ext_in[icon_cara_kerjasama,jpg,jpeg,png]',
        ]);
        if (!$rules) {
            session()->setFlashdata('failed', 'Data gagal di tambahkan');
            return redirect()->back()->withInput();
        }
        $img_samping = $this->request->getFile('icon_cara_kerjasama');
        $name_img = $img_samping->getRandomName();

        $img_samping->move(WRITEPATH . '../public/template/assets/img/manajemen-konten/', $name_img);
        $this->CaraKerjasamaModel->insert([
            'title' => $this->request->getPost('title'),
            'keterangan' => $this->request->getPost('keterangan'),
            'icon_cara_kerjasama' => $name_img,
        ]);
        return redirect()->to(site_url('kontak'))->with('success', 'Data berhasil disimpan');
    }

    public function edit($id = null)
    {
        $data = [
            'title' => 'Edit Data Kontak',
            'data_kontak' => $this->CaraKerjasamaModel->find($id),
            'validation' => \Config\Services::validation()
        ];
        return view('manajemen-konten/data_kontak_edit', $data);
    }

    public function update($id)
    {
        $rules = $this->validate([
            'title' => 'required',
            'keterangan' => 'required',
            'icon_cara_kerjasama' => 'is_image[icon_cara_kerjasama]|max_size[icon_cara_kerjasama,2048]|mime_in[icon_cara_kerjasama,image/jpg,image/jpeg,image/png]|ext_in[icon_cara_kerjasama,jpg,jpeg,png]',
        ]);
        if (!$rules) {
            session()->setFlashdata('failed', 'Data gagal di tambahkan');
            return redirect()->back()->withInput();
        }
        $img_samping = $this->request->getFile('icon_cara_kerjasama');
        if ($img_samping->getError() == 4) {
            $name_img = $this->request->getPost('gambarLama');
        } else {
            $name_img = $img_samping->getRandomName();
            $img_samping->move(WRITEPATH . '../public/template/assets/img/manajemen-konten/', $name_img);

            unlink(WRITEPATH . '../public/template/assets/img/manajemen-konten/' . $this->request->getPost('gambarLama'));
        }

        $this->CaraKerjasamaModel->update($id, [
            'title' => $this->request->getPost('title'),
            'keterangan' => $this->request->getPost('keterangan'),
            'icon_cara_kerjasama' => $name_img,
        ]);
        return redirect()->to(site_url('kontak'))->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $data = $this->CaraKerjasamaModel->find($id);
        unlink(WRITEPATH . '../public/template/assets/img/manajemen-konten/' . $data->icon_cara_kerjasama);
        $this->CaraKerjasamaModel->delete($id);
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
