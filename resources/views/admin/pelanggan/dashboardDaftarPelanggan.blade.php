<x-layout-admin>
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
      <h6 class="fw-semibold mb-0">Daftar Pelanggan</h6>
      <ul class="d-flex align-items-center gap-2">
        <li class="fw-medium">
          <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
            <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
            Dashboard
          </a>
        </li>
        <li>-</li>
        <li class="fw-medium">Daftar Pelanggan</li>
      </ul>
    </div>
    
            <div class="card h-100 p-0 radius-12">
                <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-end">
                    <a href="/dashboard/pelanggan/create" class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2"> 
                        <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                        Tambah Pelanggan
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
                              <th scope="col">No.</th>
                              <th scope="col">Nama Pelanggan</th>
                              <th scope="col">Alamat</th>
                              <th scope="col">Kota</th>
                              <th scope="col">Telpon</th>
                              <th scope="col" class="text-center">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ( $pelanggans as $pelanggan )
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>
                                <div class="d-flex align-items-center">
                                  <div class="flex-grow-1">
                                    <span class="text-md mb-0 fw-normal text-secondary-light">{{ $pelanggan->namaPelanggan }}</span>
                                  </div>
                                </div>
                              </td>
                              <td><span class="text-md mb-0 fw-normal text-secondary-light">{{ $pelanggan->alamat }}</span></td>
                              <td>{{ $pelanggan->kota }}</td>
                              <td>{{ $pelanggan->telpon }}</td>
                              <td class="text-center"> 
                                <div class="d-flex align-items-center gap-10 justify-content-center">
                                  <a href="/dashboard/pelanggan/{{ $pelanggan->kdPelanggan }}/edit" class="bg-success-focus text-success-600 bg-hover-success-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                    <iconify-icon icon="lucide:edit" class="menu-icon"></iconify-icon>
                                  </a>
                                  <form action="/dashboard/pelanggan/{{ $pelanggan->kdPelanggan }}" method="post" class="d-inline">
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