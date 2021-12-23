
<div>


<div id="kt_content_container" class="container-xxl">



    @if (session()->has('message'))

    <div class="alert alert-primary">
        {{ session('message') }}
    </div>
    @endif


    @if ($showDiv)

<div class="card mb-4">
    <div class="card-header">
       Blog Ekle
    </div>
    <div class="card-body">

            <div class="form-group">
              <label for="exampleInputEmail1">Blog Başlığı</label>
              <input type="text" class="form-control" wire:model="title" placeholder="Blog Başlığı">
              <small id="emailHelp" class="form-text text-muted">Blog başlığı buraya yazılır.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Kategori Seçiniz</label>
              <select class="custom-select form-control" wire:model="category_id">

                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>

                @endforeach



              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Blog İçeriği</label>
              <textarea wire:model="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            @if($postId)
            <button type="submit" wire:click="updatePost()" class="btn btn-primary">Güncelle</button>
            @else
            <button type="submit" wire:click="submit" class="btn btn-primary">Kaydet</button>
            @endif



            <button type="submit" class="btn btn-danger" wire:click="openDiv">Vazgeç</button>

    </div>
</div>


@endif




    <div class="card card-flush">
        <!--begin::Card header-->
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-ecommerce-category-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search Category" />
                </div>
                <!--end::Search-->
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Add customer-->
                <a wire:click="openDiv"  class="btn btn-primary">Blok Ekle</a>
                <!--end::Add customer-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_category_table">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_category_table .form-check-input" value="1" />
                            </div>
                        </th>
                        <th class="min-w-250px">Kategori</th>
                        <th class="min-w-150px">Blog Adı</th>
                        <th class="text-end min-w-70px">İşlemler</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fw-bold text-gray-600">
                    <!--begin::Table row-->

                    @foreach ($blogs as  $blog)

                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1">
                            </div>
                        </td>
                        <!--begin::Checkbox-->
                        <td>
                            {{ $blog->kategoriGetir->title }}
                        </td>
                        <!--end::Checkbox-->
                        <!--begin::Category=-->
                        <td>
                            <div class="d-flex">
                                <!--begin::Thumbnail-->

                                <!--end::Thumbnail-->
                                <div class="ms-5">
                                    <!--begin::Title-->
                                    <span href="edit-category.html" class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1" data-kt-ecommerce-category-filter="category_name">{{ $blog->title }}</span>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="text-muted fs-7 fw-bolder">{{ Str::limit($blog->description, 80, '...') }}</div>
                                    <!--end::Description-->
                                </div>
                            </div>
                        </td>
                        <!--end::Category=-->
                        <!--begin::Type=-->

                        <!--end::Type=-->
                        <!--begin::Action=-->
                        <td class="text-end">

                            <button wire:click="showEditPost({{ $blog->id }})" class="btn btn-success btn-circle">
                                <i class="fas fa-check"></i>
                            </button>
                            <button  wire:click="deletePost({{ $blog->id }})" class="btn btn-danger btn-circle">
                                <i class="fas fa-trash" title="Sil"></i>
                            </a>

                        </td>
                        <!--end::Action=-->
                    </tr>
                    <!--end::Table row-->
                    <!--begin::Table row-->
                    @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>





    </div>
<!--end::Category-->








</div>
