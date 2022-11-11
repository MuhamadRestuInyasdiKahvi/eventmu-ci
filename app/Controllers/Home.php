<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // SELECT *, COUNT(id_event) AS events FROM event GROUP BY(penyelenggara) ORDER BY penyelenggara ASC";
        // return view('home');
        $result = $this->db->table('event')
            ->select("COUNT(id_event) datas, penyelenggara")
            ->groupBy('penyelenggara')
            ->orderBy('penyelenggara', 'ASC')
            ->get()->getResultArray();
        $data['event'] = $result;
        // print_r("<pre>");print_r($result);die();
        return view('home', $data);
    }
}
