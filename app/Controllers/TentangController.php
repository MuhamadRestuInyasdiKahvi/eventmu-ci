<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TentangController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "Konten Tentang Kami",
            'tentang_website' => $this->TentangWebsiteModel->orderBy('id_tentang', 'DESC')->findAll()
        ];
        return view('manajemen-konten/data_tentang', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Tentang Website',
            'validation' => \Config\Services::validation()
        ];
        return view('manajemen-konten/data_tentang_add', $data);
    }

    public function store()
    {
        $rules = $this->validate([
            'slogan' => 'required',
            'deskripsi' => 'required',
            'img_samping' => 'uploaded[img_samping]|is_image[img_samping]|max_size[img_samping,2048]|mime_in[img_samping,image/jpg,image/jpeg,image/png]|ext_in[img_samping,jpg,jpeg,png]',
        ]);
        if (!$rules) {
            session()->setFlashdata('failed', 'Data gagal di tambahkan');
            return redirect()->back()->withInput();
        }
        $img_samping = $this->request->getFile('img_samping');
        $name_img = $img_samping->getRandomName();

        $img_samping->move(WRITEPATH . '../public/template/assets/img/manajemen-konten/', $name_img);
        $this->TentangWebsiteModel->insert([
            'slogan' => $this->request->getPost('slogan'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'img_samping' => $name_img,
        ]);
        return redirect()->to(site_url('tentang-kami'))->with('success', 'Data berhasil disimpan');
    }

    public function edit($id = null)
    {
        $data = [
            'title' => 'Edit Data Tentang Website',
            'data_tentang' => $this->TentangWebsiteModel->find($id),
            'validation' => \Config\Services::validation()
        ];
        return view('manajemen-konten/data_tentang_edit', $data);
    }

    public function update($id)
    {
        $rules = $this->validate([
            'slogan' => 'required',
            'deskripsi' => 'required',
            'img_samping' => 'is_image[img_samping]|max_size[img_samping,2048]|mime_in[img_samping,image/jpg,image/jpeg,image/png]|ext_in[img_samping,jpg,jpeg,png]',
        ]);
        if (!$rules) {
            session()->setFlashdata('failed', 'Data gagal di tambahkan');
            return redirect()->back()->withInput();
        }
        $img_samping = $this->request->getFile('img_samping');
        if ($img_samping->getError() == 4) {
            $name_img = $this->request->getPost('gambarLama');
        } else {
            $name_img = $img_samping->getRandomName();
            $img_samping->move(WRITEPATH . '../public/template/assets/img/manajemen-konten/', $name_img);

            unlink(WRITEPATH . '../public/template/assets/img/manajemen-konten/' . $this->request->getPost('gambarLama'));
        }

        $this->TentangWebsiteModel->update($id, [
            'slogan' => $this->request->getPost('slogan'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'img_samping' => $name_img,
        ]);
        return redirect()->to(site_url('tentang-kami'))->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $data = $this->TentangWebsiteModel->find($id);
        unlink(WRITEPATH . '../public/template/assets/img/manajemen-konten/' . $data->img_samping);
        $this->TentangWebsiteModel->delete($id);
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
