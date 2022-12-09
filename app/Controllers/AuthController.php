<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        if (session('id_user')) {
            return redirect()->to(site_url('/'));
        } else {
            return view('auth/login', $data);
        }
    }
    public function loginUser()
    {
        $rules = $this->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (!$rules) {
            session()->setFlashdata('failed', 'Gagal Login');
            return redirect()->back()->withInput();
        }
        $post = $this->request->getPost();
        $query = $this->db->table('user')->getWhere(['username' => $post['username']]);
        $user = $query->getRow();
        if ($user) {
            if (password_verify($post['password'], $user->password)) {
                $params = [
                    'id_user' => $user->id_user, 
                    'username' => $user->username, 
                    'alamat' => $user->alamat,
                    'foto_profil' => $user->foto_profil,
                ];
                session()->set($params);
                return redirect()->to(site_url('/'));
            } else {
                return redirect()->back()->with('failed', 'Password salah!');
            }
        } else {
            return redirect()->back()->with('failed', 'Username salah!');
        }
    }

    public function register()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('auth/register', $data);
    }

    public function registerStores()
    {
        $rules = $this->validate([
            'username' => 'required|is_unique[user.username]',
            'alamat' => 'required',
            'email' => 'required|is_unique[user.email]',
            'password' => 'required',
            'foto-profil' => 'uploaded[foto-profil]|is_image[foto-profil]|max_size[foto-profil,2048]|mime_in[foto-profil,image/jpg,image/jpeg,image/png]|ext_in[foto-profil,jpg,jpeg,png]'
        ]);
        if (!$rules) {
            session()->setFlashdata('failed', 'Gagal Register');
            return redirect()->back()->withInput();
        }
        $foto_profil = $this->request->getFile('foto-profil');
        $name_img = $foto_profil->getRandomName();
        $foto_profil->move(WRITEPATH . '../public/template/assets/img/users/', $name_img);
        $pass = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
        $this->db->table('user')->insert([
            'username' => $this->request->getPost('username'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'password' => $pass,
            'foto_profil' => $name_img,
        ]);
        return redirect()->to(site_url('/login-user'));
    }

    public function logoutUser()
    {
        session()->remove('id_user');
        return redirect()->to(site_url('/'));
    }

    // Admin
    public function loginAdmin()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        if (session('id_admin')) {
            return redirect()->to(site_url('/admin/dashboard'));
        } else {
            return view('auth/login-admin', $data);
        }
    }
    public function loginAdminStore()
    {
        $rules = $this->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (!$rules) {
            session()->setFlashdata('failed', 'Gagal Login');
            return redirect()->back()->withInput();
        }
        $post = $this->request->getPost();
        $query = $this->db->table('admins')->getWhere(['username' => $post['username']]);
        $admin = $query->getRow();
        if ($admin) {
            if (password_verify($post['password'], $admin->password)) {
                $params = ['id_admin' => $admin->id_admin];
                session()->set($params);
                return redirect()->to(site_url('/admin/dashboard'));
            } else {
                return redirect()->back()->with('failed', 'Password salah!');
            }
        } else {
            return redirect()->back()->with('failed', 'Username salah!');
        }
    }
    public function logoutAdmin()
    {
        session()->remove('id_admin');
        return redirect()->to(site_url('/login-admin'));
    }
}
