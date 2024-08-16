<div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @if (session()->has('message'))
                    <div class="pt-3">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                <a class="btn btn-success btn-sm mb-3" data-bs-toggle="modal"
                        data-bs-target="#tambahModal">Tambah</a>
                <div class="card">
                    <div class="card-body">
                        

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>
                                        Kode
                                    </th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataBarang as $key => $data)
                                <tr>
                                    <td>{{ $dataBarang->firstItem() + $key }}</td>
                                    <td>{{ $data->kode_barang }}</td>
                                    <td>{{ $data->nama_barang }}</td>
                                    <td>{{ $data->harga_barang }}</td>
                                    <td>{{ $data->jumlah_barang }}</td>
                                    <td>37%</td>
                                    <td>
                                        
                                        <a class="btn btn-warning btn-sm">Edit</a>
                                        <a class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">Del</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

                {{-- Modal Tambah --}}
                <div wire:ignore.self class="modal fade" id="tambahModal" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Barang</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3 row">
                                        <label for="kode_barang" class="col-sm-2 col-form-label">Kode Barang</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" wire:model='kode_barang' required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" wire:model='nama_barang' required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="harga_barang" class="col-sm-2 col-form-label">Harga Barang</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" wire:model='harga_barang' required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="jumlah_barang" class="col-sm-2 col-form-label">Jumlah Barang</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" wire:model='jumlah_barang' required>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="foto_barang" class="col-sm-2 col-form-label">Foto Barang</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" wire:model='foto_barang'>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" wire:click='store()' data-bs-dismiss="modal">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Akhir Modal Tambah --}}
            </div>
        </div>
        <script>
            window.addEventListener('close-modal', event => {
                $('#tambahModal').modal('hide');
            });
        </script>
        
    </section>
</div>
