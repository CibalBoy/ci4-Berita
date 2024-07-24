<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;

class Berita extends BaseController
{
    public function index()
    {
       $berita = new BeritaModel();  
       $getdata = $berita->findAll();
       $data['list'] = $getdata;

       return view('home', $data);
    }

    public function preview($id){
        //mengambil data dahulu
        $berita = new BeritaModel();
        $data['news'] = $berita->where(['id' => $id,])->first();

        //cek apakah data kosong ?
        if(!$data['news']){
            throw PageNotFoundException::forPageNotFound();
    }
        
        return view('detail_berita', $data);
    }

    public function create(){
        $validation = \config\Services::validation();
        $validation->setRules(['judul' => 'required']);
        $isDatavalid = $validation->withRequest($this->request)->run();

        if($isDatavalid){
            $berita = new BeritaModel();
            $berita->insert([
                "judul" => $this->request->getpost('judul'),
                "isi" => $this->request->getpost('isi'),
                "gambar" => $this->request->getpost('gambar'),
            ]);
            return redirect('/');
        }
        return view('create_berita');    
    }

    public function edit($id){
        //ambil data yang akan diubah
        $berita = new BeritaModel();
        $data['news'] = $berita->where(['id' => $id])->first();

        $validation = \config\Services::validation();
        $validation->setRules(['judul' => 'required']);
        $isDatavalid = $validation->withRequest($this->request)->run();

        //validasi form data
        if($isDatavalid){
            $berita = new BeritaModel();
            $berita->update($id,[
                "judul" => $this->request->getpost('judul'),
                "isi" => $this->request->getpost('isi'),
                "gambar" => $this->request->getpost('gambar')
            ]);

            return redirect()->to('/');
        }
       
        return view('edit_berita', $data);
    }

    public function delete($id){
        $berita = new BeritaModel();
        $berita->delete($id);
        return redirect('/');
    }
}
