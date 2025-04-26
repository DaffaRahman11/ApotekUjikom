<x-layout-admin>
  <div
  class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24"
  >
  <h6 class="fw-semibold mb-0">Edit Data Supplier Yang Bernama {{ $suplier->namaSuplier }} </h6>
  <ul class="d-flex align-items-center gap-2">
    <li class="fw-medium">
      <a
        href="index.html"
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
    <li class="fw-medium">Edit Supplier</li>
  </ul>
</div>

<div class="card h-100 p-0 radius-12">
  <div class="card-body p-24">
    <div class="row justify-content-center">
      <div class="col-xxl-6 col-xl-8 col-lg-10">
        <div class="card border">
          <div class="card-body">
            <form action="/dashboard/suplier/{{ $suplier->kdSuplier }}" method="POST" data-toggle="validator">
              @method('put')
              @csrf
              <div class="mb-20">
                <label
                  for="namaSuplier"
                  class="form-label fw-semibold text-primary-light text-sm mb-8"
                  >Nama Supplier
                  <span class="text-danger-600">*</span></label
                >
                <input
                  type="text"
                  class="form-control radius-8  @error('namaSuplier') is-invalid @enderror"
                  id="namaSuplier"
                  name="namaSuplier"
                  placeholder="Masukkan Nama Supplier"
                  autocomplete="off"
                  autofocus
                  value="{{ old('namaSuplier',  $suplier->namaSuplier )}}"
                />
                @error('namaSuplier')
                  <div class="invalid-feedback">{{$message}}
                  </div>
                @enderror
              </div>
              <div class="mb-20">
                <label
                  for="alamat"
                  class="form-label fw-semibold text-primary-light text-sm mb-8"
                  >Alamat Pelanggan <span class="text-danger-600">*</span></label
                >
                <input
                  type="text"
                  class="form-control radius-8  @error('alamat') is-invalid @enderror"
                  id="alamat"
                  name="alamat"
                  placeholder="Masukkan Alamat Supplier"
                  autocomplete="off"
                  value="{{ old('alamat',  $suplier->alamat )}}"
                />
                @error('alamat')
                  <div class="invalid-feedback">{{$message}}
                  </div>
                @enderror
              </div>
              <div class="mb-20">
                <label
                  for="kota"
                  class="form-label fw-semibold text-primary-light text-sm mb-8"
                  >Asal Kota <span class="text-danger-600">*</span></label
                >
                <input
                  type="text"
                  class="form-control radius-8 @error('kota') is-invalid @enderror"
                  id="kota"
                  name="kota"
                  placeholder="Masukkan Nama Kota"
                  autocomplete="off"
                  value="{{ old('kota',  $suplier->kota )}}"
                />
                @error('kota')
                  <div class="invalid-feedback">{{$message}}
                  </div>
                @enderror
              </div>
              <div class="mb-20">
                <label
                  for="telpon"
                  class="form-label fw-semibold text-primary-light text-sm mb-8"
                  >Nomor Telepon (WA) <span class="text-danger-600">*</span></label
                >
                <input
                  type="text"
                  class="form-control radius-8 @error('telpon') is-invalid @enderror"
                  id="telpon"
                  name="telpon"
                  placeholder="Masukkan Nomer Telepon"
                  autocomplete="off"
                  value="{{ old('telpon',  $suplier->telpon )}}"
                />
                @error('telpon')
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
                  Simpan Perubahan
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