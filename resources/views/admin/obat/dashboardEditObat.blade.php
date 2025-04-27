<x-layout-admin>
  <div
  class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24"
  >
  <h6 class="fw-semibold mb-0">Edit Data Obat {{ $obat->namaObat }}</h6>
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
    <li class="fw-medium">Edit Obat</li>
  </ul>
</div>

<div class="card h-100 p-0 radius-12">
  <div class="card-body p-24">
    <div class="row justify-content-center">
      <div class="col-xxl-6 col-xl-8 col-lg-10">
        <div class="card border">
          <div class="card-body">
            <form action="/dashboard/obat/{{ $obat->kdObat }}" method="POST" data-toggle="validator">
              @method('put')
              @csrf
              <div class="mb-20">
                <label
                  for="namaObat"
                  class="form-label fw-semibold text-primary-light text-sm mb-8"
                  >Nama Obat
                  <span class="text-danger-600">*</span></label
                >
                <input
                  type="text"
                  class="form-control radius-8  @error('namaObat') is-invalid @enderror"
                  id="namaObat"
                  name="namaObat"
                  placeholder="Masukkan Nama Obat"
                  autocomplete="off"
                  autofocus
                  value="{{ old('namaObat',  $obat->namaObat )}}"
                />
                @error('namaObat')
                  <div class="invalid-feedback">{{$message}}
                  </div>
                @enderror
              </div>
              <div class="mb-20">
                <label
                  for="jenis"
                  class="form-label fw-semibold text-primary-light text-sm mb-8"
                  >Jenis Obat <span class="text-danger-600">*</span></label
                >
                <input
                  type="text"
                  class="form-control radius-8  @error('jenis') is-invalid @enderror"
                  id="jenis"
                  name="jenis"
                  placeholder="Masukkan Jenis Obat"
                  autocomplete="off"
                  value="{{ old('jenis',  $obat->jenis )}}"
                />
                @error('jenis')
                  <div class="invalid-feedback">{{$message}}
                  </div>
                @enderror
              </div>
              <div class="mb-20">
                <label
                  for="satuan"
                  class="form-label fw-semibold text-primary-light text-sm mb-8"
                  >Satuan Obat <span class="text-danger-600">*</span></label
                >
                <input
                  type="text"
                  class="form-control radius-8 @error('satuan') is-invalid @enderror"
                  id="satuan"
                  name="satuan"
                  placeholder="Masukkan Satuan Obat"
                  autocomplete="off"
                  value="{{ old('satuan',  $obat->satuan )}}"
                />
                @error('satuan')
                  <div class="invalid-feedback">{{$message}}
                  </div>
                @enderror
              </div>
              <div class="mb-20">
                <label
                  for="hargaBeli"
                  class="form-label fw-semibold text-primary-light text-sm mb-8"
                  >Harga Beli <span class="text-danger-600">*</span></label
                >
                <input
                  type="text"
                  class="form-control radius-8 @error('hargaBeli') is-invalid @enderror"
                  id="hargaBeli"
                  name="hargaBeli"
                  placeholder="Masukkan Harga Beli"
                  autocomplete="off"
                  value="{{ old('hargaBeli',  $obat->hargaBeli )}}"
                />
                @error('hargaBeli')
                  <div class="invalid-feedback">{{$message}}
                  </div>
                @enderror
              </div>
              <div class="mb-20">
                <label
                  for="hargaJual"
                  class="form-label fw-semibold text-primary-light text-sm mb-8"
                  >Harga Jual <span class="text-danger-600">*</span></label
                >
                <input
                  type="text"
                  class="form-control radius-8 @error('hargaJual') is-invalid @enderror"
                  id="hargaJual"
                  name="hargaJual"
                  placeholder="Masukkan Harga Jual"
                  autocomplete="off"
                  value="{{ old('hargaJual',  $obat->hargaJual )}}"
                />
                @error('hargaJual')
                  <div class="invalid-feedback">{{$message}}
                  </div>
                @enderror
              </div>
              <div class="mb-20">
                <label
                  for="stok"
                  class="form-label fw-semibold text-primary-light text-sm mb-8"
                  >Stok Obat <span class="text-danger-600">*</span></label
                >
                <input
                  type="text"
                  class="form-control radius-8 @error('stok') is-invalid @enderror"
                  id="stok"
                  name="stok"
                  placeholder="Masukkan Stok Obat"
                  autocomplete="off"
                  value="{{ old('stok',  $obat->stok )}}"
                />
                @error('stok')
                  <div class="invalid-feedback">{{$message}}
                  </div>
                @enderror
              </div>
              <div class="mb-20">
                <label
                  for="kdSuplier"
                  class="form-label fw-semibold text-primary-light text-sm mb-8"
                  >Nama Supplier  <span class="text-danger-600">*</span></label
                >
                <select  class="selectpicker form-control" data-style="py-0" id="kdSuplier" name="kdSuplier">
                  <option value="" selected disabled>Pilih Supplier</option>
                  @foreach ( $supliers as $suplier )
                  <option value="{{ $suplier->kdSuplier }}" {{ old('kdSuplier', $obat->kdSuplier) == $suplier->kdSuplier ? 'selected' : '' }}>{{ $suplier->namaSuplier }}</option> 
                  @endforeach
                </select>
                @error('stok')
                  <div class="invalid-feedback">{{$message}}
                  </div>
                @enderror
              </div>
              <div
                class="d-flex align-items-center justify-content-center gap-3"
              >
                <button
                  type="reset"
                  class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-56 py-11 radius-8"
                >
                  Reset
                </button>
                <button
                  type="submit"
                  class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8"
                >
                  Simpan
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</x-layout-admin>