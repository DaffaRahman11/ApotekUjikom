<x-layout-admin>
  <div
  class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24"
>
  <h6 class="fw-semibold mb-0">Transaksi Penjualan Baru</h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a
        href="/dashboard"
        class="d-flex align-items-center gap-1 hover-text-primary"
      >
        <iconify-icon
          icon="solar:home-smile-angle-outline"
          class="icon text-lg"
        ></iconify-icon>
        Dashboard
      </a>
    </li>
    <li>-</li>
    <li class="fw-medium">Tambah Pejualan</li>
  </ul>
</div>

<div class="card">
  <div class="card-header">
    <div
      class="d-flex flex-wrap align-items-center justify-content-end gap-2"
    >
    </div>
  </div>
  <div class="card-body py-40">
    <div class="row justify-content-center" id="invoice">
      <div class="col-lg-8">
        <div class="shadow-4 border radius-8">
          

          <div class="py-28 px-20">
            <form action="/dashboard/penjualan" method="POST">
              @csrf
            <div
              class="d-flex flex-wrap justify-content-between align-items-end gap-3"
            >
              
              <div>
                <h6 class="text-md">Transaksi Penjualan Obat</h6>
                <div class="mb-20">
                  <label
                    for="namaPelanggan"
                    class="form-label fw-semibold text-primary-light text-sm mb-8"
                    >Nama Pelanggan<span class="text-danger-600">*</span></label
                  >
                  <input
                    type="text"
                    class="form-control radius-8 @error('namaPelanggan') is-invalid @enderror"
                    id="namaPelanggan"
                    name="namaPelanggan"
                    placeholder="Masukkan Nama Pelanggan"
                    autocomplete="off"
                    autofocus
                  />
                  @error('namaPelanggan')
                    <div class="invalid-feedback">{{$message}}
                    </div>
                  @enderror
                </div>
              </div>
              <div>
                <table class="text-sm text-secondary-light">
                  <tbody>
                    <tr>
                      <td>Tanggal Transaksi</td>
                      <td class="ps-8">{{ \Carbon\Carbon::now()->format('d F Y') }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="mt-24">
              <div class="table-responsive scroll-sm">
                <table
                  class="table bordered-table text-sm"
                  id="invoice-table"
                  >
                  <thead>
                    <tr>
                      <th scope="col" class="text-sm">Pilih</th>
                      <th scope="col" class="text-sm">Nama Obat</th>
                      <th scope="col" class="text-sm">Stok</th>
                      <th scope="col" class="text-sm">Harga Jual</th>
                      <th scope="col" class="text-sm">Jumlah Dibeli</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($obats as $i => $obat)
                      
                    <tr>
                      <td><input type="checkbox" name="obat[{{ $i }}][checked]" value="1" style="width: 16px; height: 16px; display: inline-block; visibility: visible; opacity: 1; border: 2px solid red; appearance: checkbox; -webkit-appearance: checkbox;">
                        <input type="hidden" name="obat[{{ $i }}][kdObat]" value="{{ $obat->kdObat }}">
                      </td>
                      <td>{{ $obat->namaObat }}</td>
                      <td>{{ $obat->stok }}</td>
                      <td>{{ $obat->hargaJual }}</td>
                      <td>
                        <input type="number" name="obat[{{ $i }}][jumlah]" min="1" class="form-control" style="width: 80px;">
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>

              <div>
                <button
                  type="submit"
                  id="addRow"
                  class="btn btn-sm btn-primary-600 radius-8 d-inline-flex align-items-center gap-1"
                >
                  <iconify-icon
                    icon="simple-line-icons:plus"
                    class="text-xl"
                  ></iconify-icon>
                  Tambah Transaksi
                </button>
              </div>

              <div
                class="d-flex flex-wrap justify-content-between gap-3 mt-24"
              >
                <div>
                  <p class="text-sm mb-0">
                    <span class="text-primary-light fw-semibold"
                      >Sales By:</span
                    >
                    Jammal
                  </p>
                </div>
                <div>
                 
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</x-layout-admin>