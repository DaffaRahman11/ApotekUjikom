<x-layout-admin>
  <div
  class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24"
  >
  <h6 class="fw-semibold mb-0">Edit Data Pelanggan Yang Bernama {{ $pelanggan->namaPelanggan }} </h6>
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
    <li class="fw-medium">Edit Pelanggan</li>
  </ul>
</div>

<div class="card h-100 p-0 radius-12">
  <div class="card-body p-24">
    <div class="row justify-content-center">
      <div class="col-xxl-6 col-xl-8 col-lg-10">
        <div class="card border">
          <div class="card-body">
            <form action="/dashboard/pelanggan/{{ $pelanggan->kdPelanggan }}" method="POST" data-toggle="validator">
              @method('put')
              @csrf
              <div class="mb-20">
                <label
                  for="namaPelanggan"
                  class="form-label fw-semibold text-primary-light text-sm mb-8"
                  >Nama Pelanggan
                  <span class="text-danger-600">*</span></label
                >
                <input
                  type="text"
                  class="form-control radius-8  @error('namaPelanggan') is-invalid @enderror"
                  id="namaPelanggan"
                  name="namaPelanggan"
                  placeholder="Masukkan Nama Pelanggan"
                  autocomplete="off"
                  autofocus
                  value="{{ old('namaPelanggan',  $pelanggan->namaPelanggan )}}"
                />
                @error('namaPelanggan')
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
                  placeholder="Masukkan Alamat Pelanggan"
                  autocomplete="off"
                  value="{{ old('alamat',  $pelanggan->alamat )}}"
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
                  value="{{ old('kota',  $pelanggan->kota )}}"
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
                  value="{{ old('telpon',  $pelanggan->telpon )}}"
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