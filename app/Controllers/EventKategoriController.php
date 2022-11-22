<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class EventKategoriController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "Daftar Kategori Event",
            'daftar_kategori' => $this->KategoriModel->orderBy('id_kategori', 'DESC')->findAll()
        ];

        return view('kategori-event/index', $data);
    }

    public function store()
    {
        $slug = url_title($this->request->getPost('nama_kategori'), '-', TRUE);

        $data = [
            'nama_kategori' => esc($this->request->getPost('nama_kategori')),
            'slug_kategori' => $slug
        ];
        $this->KategoriModel->insert($data);
        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    public function update($id_kategori)
    {
        $slug = url_title($this->request->getPost('nama_kategori'), '-', TRUE);

        $data = [
            'nama_kategori' => esc($this->request->getPost('nama_kategori')),
            'slug_kategori' => $slug
        ];
        $this->KategoriModel->update($id_kategori, $data);
        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id_kategori)
    {
        $this->KategoriModel->where('id_kategori', $id_kategori)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
