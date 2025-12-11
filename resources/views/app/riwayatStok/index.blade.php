@extends('main.index')
@section('content')
    <div class="col-sm-12 col-lg-12" style="text-align: center">
        <div class="page-header">
            <div class="page-title">
                <h4 class="fw-bold py-3" style="font-size: 30px">Riwayat Stok Barang</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <h5 class="card-header">Riwayat Stok</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Nama Barang</th>
                        <th>Type</th>
                        <th>Jumlah</th>
                        <th>Deskripsi</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataRiwayat as $dr)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dr->user->nama }}</td>
                            <td>{{ $dr->barang->nama_barang }}</td>
                            <td>{{ $dr->type }}</td>
                            <td>{{ $dr->jumlah }} {{ $dr->barang->satuan }}</td>
                            <td>
                                <div style="white-space: pre-wrap;">{{ $dr->deskripsi }}</div>
                            </td>
                            <td>{{ $dr->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
