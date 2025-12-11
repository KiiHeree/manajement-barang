@extends('main.index')
@section('content')
    <div class="col-sm-12">
        <div class="page-header">
            <div class="page-title">
                <h4 class="fw-bold py-3">Laporan</h4>
            </div>
        </div>
    </div>
    <div class="col-sm-12 mb-4">
        <form action="{{ route('laporan') }}" method="GET" class="row">
            <div class="col-md-6 col-lg-4 col-xl-4 mb-4">
                <label class="form-label" for="basic-default-name">Tanggal Awal</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="basic-default-name" name="tanggal_awal" />
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4 mb-4">
                <label class="form-label" for="basic-default-name">Tanggal Akhir</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="basic-default-name" name="tanggal_akhir" />
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4 mb-4">
                <label class="form-label" for="basic-default-name">Tipe</label>
                <div class="col-sm-10">
                    <select name="tipe" id="" class="form-control">
                        <option value="">---+---</option>
                        <option value="PENERIMAAN">Penerimaan</option>
                        <option value="PENGIRIMAN">Pengiriman</option>
                    </select>
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-primary justify-content-end">Submit</button>
            </div>
        </form>
    </div>
    <div class="card">
        <h5 class="card-header">Data Transaksi</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Type</th>
                        <th>Kode</th>
                        <th>Nama User</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporan as $lp)
                        <tr @if ($lp->tipe == 'PENERIMAAN') @foreach ($lp->penerimaan as $lTerima)
                                    onclick="window.location='{{ route('penerimaanDetail', $lTerima->id_terima) }}'"
                                @endforeach
                            @else 
                                @foreach ($lp->pengiriman as $lKirim)
                                    onclick="window.location='{{ route('pengirimanDetail', $lKirim->id_kirim) }}'"
                                @endforeach @endif
                            style="cursor:pointer;">
                            <td>{{ $loop->iteration }}</td>
                            @if ($lp->tipe == 'PENERIMAAN')
                                <td>{{ $lp->tipe }}</td>
                                @foreach ($lp->penerimaan as $lTerima)
                                    <td>{{ $lTerima->kode_terima }}</td>
                                    <td>{{ $lTerima->user->nama }}</td>
                                    <td>{{ $lTerima->asal }}</td>
                                    <td><span class="btn btn-primary">{{ $lTerima->status }}</span></td>
                                @endforeach
                            @else
                                <td>{{ $lp->tipe }}</td>
                                @foreach ($lp->pengiriman as $lKirim)
                                    <td>{{ $lKirim->kode_kirim }}</td>
                                    <td>{{ $lKirim->user->nama }}</td>
                                    <td>{{ $lKirim->tujuan }}</td>
                                    <td><span class="btn btn-primary">{{ $lKirim->status }}</span></td>
                                @endforeach
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
