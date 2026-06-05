<?php

namespace App\Controllers;

use App\Models\BukuModel;

class BukuController extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    public function index()
    {
        $data['buku'] = $this->bukuModel->findAll();
        return view('buku/index', $data);
    }

    public function create()
    {
        return view('buku/create');
    }

    public function store()
    {
        $rules = [
            'judul'        => 'required|string',
            'penulis'      => 'required|string',
            'penerbit'     => 'required|string',
            'tahun_terbit' => 'required|numeric|greater_than[1800]|less_than[2024]'
        ];

        $errors = [
            'judul' => [
                'required' => 'Judul wajib diisi.',
                'string'   => 'Judul harus berupa teks.'
            ],
            'penulis' => [
                'required' => 'Penulis wajib diisi.',
                'string'   => 'Penulis harus berupa teks.'
            ],
            'penerbit' => [
                'required' => 'Penerbit wajib diisi.',
                'string'   => 'Penerbit harus berupa teks.'
            ],
            'tahun_terbit' => [
                'required'     => 'Tahun terbit wajib diisi.',
                'numeric'      => 'Tahun terbit harus berupa angka.',
                'greater_than' => 'Tahun terbit harus lebih besar dari tahun 1800.',
                'less_than'    => 'Tahun terbit harus lebih kecil dari tahun 2024.'
            ]
        ];

        if (!$this->validate($rules, $errors)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $this->bukuModel->save([
            'judul'        => $this->request->getPost('judul'),
            'penulis'      => $this->request->getPost('penulis'),
            'penerbit'     => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit')
        ]);

        return redirect()->to('/buku')->with('success', 'Data buku berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data['buku'] = $this->bukuModel->find($id);
        if (empty($data['buku'])) {
            return redirect()->to('/buku')->with('error', 'Data buku tidak ditemukan.');
        }
        return view('buku/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'judul'        => 'required|string',
            'penulis'      => 'required|string',
            'penerbit'     => 'required|string',
            'tahun_terbit' => 'required|numeric|greater_than[1800]|less_than[2024]'
        ];

        $errors = [
            'judul' => [
                'required' => 'Judul wajib diisi.',
                'string'   => 'Judul harus berupa teks.'
            ],
            'penulis' => [
                'required' => 'Penulis wajib diisi.',
                'string'   => 'Penulis harus berupa teks.'
            ],
            'penerbit' => [
                'required' => 'Penerbit wajib diisi.',
                'string'   => 'Penerbit harus berupa teks.'
            ],
            'tahun_terbit' => [
                'required'     => 'Tahun terbit wajib diisi.',
                'numeric'      => 'Tahun terbit harus berupa angka.',
                'greater_than' => 'Tahun terbit harus lebih besar dari tahun 1800.',
                'less_than'    => 'Tahun terbit harus lebih kecil dari tahun 2024.'
            ]
        ];

        if (!$this->validate($rules, $errors)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $this->bukuModel->update($id, [
            'judul'        => $this->request->getPost('judul'),
            'penulis'      => $this->request->getPost('penulis'),
            'penerbit'     => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit')
        ]);

        return redirect()->to('/buku')->with('success', 'Data buku berhasil diperbarui!');
    }

    public function delete($id)
    {
        $this->bukuModel->delete($id);
        return redirect()->to('/buku')->with('success', 'Data buku berhasil dihapus!');
    }
}   