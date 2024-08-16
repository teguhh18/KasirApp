<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Barang as ModelsBarang;

class Barang extends Component
{
    use WithFileUploads;

    public $kode_barang;
    public $nama_barang;
    public $harga_barang;
    public $jumlah_barang;
    public $foto_barang;

    public function store()
    {
        $rules = [
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'jumlah_barang' => 'required',
            'foto_barang' => 'nullable|image',
            
        ];

        // $pesan = [
        //     'nama.required' => 'Nama Wajib Diisi!!',
        //     'email.required' => 'Email Wajib Diisi!!',
        //     'alamat.required' => 'Alamat Wajib Diisi!!',
        // ];

        $validated = $this->validate($rules);
        // Proses upload foto jika ada
        if ($this->foto_barang) {
            $fotoPath = $this->foto_barang->store('foto-barang');
            $validated['foto_barang'] = $fotoPath;
        }
        ModelsBarang::create($validated);
        session()->flash('message', 'Data Berhasil Disimpan');

        // Reset form setelah data disimpan
        $this->reset(['kode_barang', 'nama_barang', 'harga_barang', 'jumlah_barang', 'foto_barang']);

        // Tutup modal (jika diinginkan)
        // $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $data = ModelsBarang::orderBy('created_at','desc')->paginate(10);
        return view('livewire.barang', ['dataBarang' => $data]);
    }
}
