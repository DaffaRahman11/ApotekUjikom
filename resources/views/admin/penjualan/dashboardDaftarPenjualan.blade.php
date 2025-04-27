<x-layout-admin>
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
      <h6 class="fw-semibold mb-0">Daftar Transaksi Penjualan</h6>
      <ul class="d-flex align-items-center gap-2">
        <li class="fw-medium">
          <a href="/dashboard" class="d-flex align-items-center gap-1 hover-text-primary">
            <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
            Dashboard
          </a>
        </li>
        <li>-</li>
        <li class="fw-medium">Daftar Penjualan</li>
      </ul>
    </div>
    
            <div class="card h-100 p-0 radius-12">
                <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-end">
                    <a href="/dashboard/penjualan/create" class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2"> 
                        <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                        Tambah Penjualan
                    </a>
                </div>
                @if (session()->has('success'))
                        <div class="alert alert-success mx-3 mt-3" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger mx-3 mt-3" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                <div class="card-body p-24">
                    <div class="table-responsive scroll-sm">
                        <table class="table bordered-table sm-table mb-0">
                          <thead>
                            <tr>
                              <th scope="col">Kode Transaksi</th>
                              <th scope="col">Tanggal Transaksi</th>
                              <th scope="col">Nama Pelanggan</th>
                              <th scope="col">Total</th>
                              <th scope="col" class="text-center">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ( $penjualans as $penjualan )
                            <tr>
                              <td>
                                <div class="d-flex align-items-center">
                                  <div class="flex-grow-1">
                                    <span class="text-md mb-0 fw-normal text-secondary-light">{{ $penjualan->kdPenjualan }}</span>
                                  </div>
                                </div>
                              </td>
                              <td><span class="text-md mb-0 fw-normal text-secondary-light">{{ $penjualan->tanggalPenjualan }}</span></td>
                              <td>{{ $penjualan->penjualanPelanggan->namaPelanggan }}</td>
                              <td>{{ $penjualan->total }}</td>
                              <td class="text-center"> 
                                <div class="d-flex align-items-center gap-10 justify-content-center">
                                  <a href="/dashboard/penjualan/{{ $penjualan->kdPenjualan }}/edit" class="bg-success-focus text-success-600 bg-hover-success-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                    <iconify-icon icon="lucide:edit" class="menu-icon"></iconify-icon>
                                  </a>
                                  <form action="/dashboard/penjualan/{{ $penjualan->kdPenjualan }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="remove-item-btn bg-danger-focus bg-hover-danger-200 text-danger-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"> 
                                      <iconify-icon icon="fluent:delete-24-regular" class="menu-icon"></iconify-icon>
                                    </button>
                                  </form>
                                </div>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
</x-layout-admin>