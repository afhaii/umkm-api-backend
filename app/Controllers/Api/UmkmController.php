<?php

namespace App\Controllers\Api;

use App\Models\UmkmModel;
use CodeIgniter\RESTful\ResourceController;

class UmkmController extends ResourceController
{
    protected $format = 'json';

    // GET: Mengambil seluruh data UMKM
    public function index()
    {
        $model = new UmkmModel();

        $data = $model->orderBy('id', 'ASC')->findAll();

        return $this->respond([
            'success' => true,
            'message' => 'Data UMKM berhasil diambil',
            'data' => $data
        ], 200);
    }

    // GET: Mengambil satu data UMKM berdasarkan ID
    public function show($id = null)
    {
        $model = new UmkmModel();

        $umkm = $model->find($id);

        if (!$umkm) {
            return $this->respond([
                'success' => false,
                'message' => 'Data UMKM tidak ditemukan'
            ], 404);
        }

        return $this->respond([
            'success' => true,
            'message' => 'Data UMKM berhasil diambil',
            'data' => $umkm
        ], 200);
    }

    // POST: Menambahkan data UMKM
    public function create()
    {
        $model = new UmkmModel();
        $data = $this->getRequestData();

        if (empty($data['nama_umkm'])) {
            return $this->respond([
                'success' => false,
                'message' => 'Nama UMKM wajib diisi'
            ], 400);
        }

        $id = $model->insert($data);

        if (!$id) {
            return $this->respond([
                'success' => false,
                'message' => 'Gagal menambahkan data UMKM',
                'errors' => $model->errors()
            ], 500);
        }

        return $this->respond([
            'success' => true,
            'message' => 'Data UMKM berhasil ditambahkan',
            'data' => $model->find($id)
        ], 201);
    }

    // PUT: Memperbarui data UMKM
    public function update($id = null)
    {
        $model = new UmkmModel();

        $umkm = $model->find($id);

        if (!$umkm) {
            return $this->respond([
                'success' => false,
                'message' => 'Data UMKM tidak ditemukan'
            ], 404);
        }

        $data = $this->getRequestData();

        if (empty($data['nama_umkm'])) {
            return $this->respond([
                'success' => false,
                'message' => 'Nama UMKM wajib diisi'
            ], 400);
        }

        $updated = $model->update($id, $data);

        if (!$updated) {
            return $this->respond([
                'success' => false,
                'message' => 'Gagal memperbarui data UMKM',
                'errors' => $model->errors()
            ], 500);
        }

        return $this->respond([
            'success' => true,
            'message' => 'Data UMKM berhasil diperbarui',
            'data' => $model->find($id)
        ], 200);
    }

    // DELETE: Menghapus data UMKM
    public function delete($id = null)
    {
        $model = new UmkmModel();

        $umkm = $model->find($id);

        if (!$umkm) {
            return $this->respond([
                'success' => false,
                'message' => 'Data UMKM tidak ditemukan'
            ], 404);
        }

        $model->delete($id);

        return $this->respond([
            'success' => true,
            'message' => 'Data UMKM berhasil dihapus',
            'data' => [
                'id' => $umkm['id'],
                'nama_umkm' => $umkm['nama_umkm']
            ]
        ], 200);
    }

    // Membaca input JSON atau form-urlencoded
    private function getRequestData(): array
    {
        $json = $this->request->getJSON(true);

        if (is_array($json)) {
            return $json;
        }

        $post = $this->request->getPost();

        if (!empty($post)) {
            return $post;
        }

        $raw = $this->request->getRawInput();

        return is_array($raw) ? $raw : [];
    }
}
