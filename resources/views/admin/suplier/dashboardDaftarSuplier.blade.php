<x-layout-admin>
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
      <h6 class="fw-semibold mb-0">Daftar Supplier</h6>
      <ul class="d-flex align-items-center gap-2">
        <li class="fw-medium">
          <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
            <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
            Dashboard
          </a>
        </li>
        <li>-</li>
        <li class="fw-medium">Daftar Supplier</li>
      </ul>
    </div>
    
            <div class="card h-100 p-0 radius-12">
                <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                    <a href="/dashboard/suplier/create" class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2"> 
                        <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                        Tambah Supplier
                    </a>
                </div>
                <div class="card-body p-24">
                    <div class="table-responsive scroll-sm">
                        <table class="table bordered-table sm-table mb-0">
                          <thead>
                            <tr>
                              <th scope="col">No.</th>
                              <th scope="col">Nama Supplier</th>
                              <th scope="col">Alamat</th>
                              <th scope="col">Kota</th>
                              <th scope="col">Telpon</th>
                              <th scope="col" class="text-center">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>
                                <div class="d-flex align-items-center">>
                                  <div class="flex-grow-1">
                                    <span class="text-md mb-0 fw-normal text-secondary-light">Kathryn Murphy</span>
                                  </div>
                                </div>
                              </td>
                              <td><span class="text-md mb-0 fw-normal text-secondary-light">osgoodwy@gmail.com</span></td>
                              <td>HR</td>
                              <td>Manager</td>
                              <td class="text-center"> 
                                <div class="d-flex align-items-center gap-10 justify-content-center">
                                    <button type="button" class="bg-success-focus text-success-600 bg-hover-success-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"> 
                                        <iconify-icon icon="lucide:edit" class="menu-icon"></iconify-icon>
                                    </button>
                                    <button type="button" class="remove-item-btn bg-danger-focus bg-hover-danger-200 text-danger-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"> 
                                        <iconify-icon icon="fluent:delete-24-regular" class="menu-icon"></iconify-icon>
                                    </button>
                                </div>
                              </td>
                            </tr>   
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
</x-layout-admin>