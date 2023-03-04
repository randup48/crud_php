<?php

namespace App\Controllers;

use App\Models\ModelPegawai;

class Home extends BaseController
{
    protected $modelPegawai;
    protected $helpers = ['form'];
    function __construct()
    {
        $this->modelPegawai = new ModelPegawai();
    }

    public function index()
    {
        $pegawai = $this->modelPegawai->findAll();

        $data = [
            'listPegawai' => $pegawai
        ];

        return view('pages/list_table', $data);
    }

    public function add()
    {
        session();
        $data = [
            'pegawai' => ''
        ];
        return view('pages/add_pegawai', $data);
    }

    public function edit($id)
    {
        session();
        $data = [
            'pegawai' => $this->modelPegawai->find($id),
        ];
        return view('pages/add_pegawai', $data);
    }

    public function save($id = null)
    {
        if (!$this->validate([
            'name' => [
                'label' => 'Nama',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 5 karakter'
                ],
            ],
            'email' => [
                'label' => 'E-mail',
                'rules' => 'required|min_length[5]|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 5 karakter',
                    'valid_email' => 'Email yang kamu masukkan tidak valid'
                ]
            ],
            'picture' => [
                'label' => 'Picture',
                'rules' => 'uploaded[picture]|max_size[picture,7000]|is_image[picture]|mime_in[picture,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih foto terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        // ambil photo
        $filePhoto = $this->request->getFile('picture');
        // generate random name photo
        $namaPhoto = $filePhoto->getRandomName();
        // pindahkan ke public/img
        $filePhoto->move('img', $namaPhoto);

        if ($id === null) {
            $this->modelPegawai->save([
                'photo' => $namaPhoto,
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'jabatan' => $this->request->getVar('jabatan'),
                'gender' => $this->request->getVar('gender'),
            ]);

            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        } else {
            $this->modelPegawai->save([
                'id' => $id,
                'photo' => $namaPhoto,
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'jabatan' => $this->request->getVar('jabatan'),
                'gender' => $this->request->getVar('gender'),
            ]);

            session()->setFlashdata('pesan', 'Data berhasil update.');
        }
        return  redirect()->to('');
    }

    public function delete($id)
    {
        $pegawai =  $this->modelPegawai->find($id);
        unlink('img/' . $pegawai['photo']);
        $this->modelPegawai->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return  redirect()->back();
    }
}
