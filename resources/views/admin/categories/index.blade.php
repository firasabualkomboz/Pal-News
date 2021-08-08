<x-admin-layout title="All Category" category="Categories">

<div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
<div class="alert-icon">
<span class="svg-icon svg-icon-primary svg-icon-xl">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect x="0" y="0" width="24" height="24" />
<path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
<path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
</g>
</svg>
<!--end::Svg Icon-->
</span>
</div>

@if (session()->has('success'))
<div class="alert-text">{{session()->get('success')}} </div>
@endif

</div>
<!--end::Notice-->
<!--begin::Card-->
<div class="card card-custom">
<div class="card-header flex-wrap border-0 pt-6 pb-0">
<div class="card-title">
<h3 class="card-label">List Categories
<span class="text-muted pt-2 font-size-sm d-block">Javascript </span></h3>
</div>
<div class="card-toolbar">
<!--begin::Dropdown-->

<!--end::Dropdown-->
<!--begin::Button-->
<a href="{{route('admin.categories.create')}}" class="btn btn-primary font-weight-bolder">New Category</a>
<!--end::Button-->
</div>
</div>
<div class="card-body">
<!--begin: Search Form-->
<!--begin::Search Form-->
<div class="mb-7">
<div class="row align-items-center">
<div class="col-lg-9 col-xl-8">
<div class="row align-items-center">
<div class="col-md-4 my-2 my-md-0">
<div class="input-icon">
<input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
<span>
<i class="flaticon2-search-1 text-muted"></i>
</span>
</div>
</div>
<div class="col-md-4 my-2 my-md-0">
<div class="d-flex align-items-center">
<label class="mr-3 mb-0 d-none d-md-block">Status:</label>
<select class="form-control" id="kt_datatable_search_status">
<option value="">All</option>
<option value="2">Delivered</option>
</select>
</div>
</div>
<div class="col-md-4 my-2 my-md-0">
<div class="d-flex align-items-center">
<label class="mr-3 mb-0 d-none d-md-block">Type:</label>
<select class="form-control" id="kt_datatable_search_type">
<option value="1">Online</option>
</select>
</div>
</div>
</div>
</div>
<div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
<a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
</div>


</div>
</div>

<table class="table">
<thead>
<tr>
<th scope="col">#</th>
<th>CATEGORY</th>
<th>ACTIONS</th>
</tr>
</thead>
<tbody>

@foreach($categories as $category)
<tr>
<td>{{$loop->index}}</td>
<td>{{$category->name}}</td>
<td>
<a href="{{route('admin.categories.edit',[$category->id])}}" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
<span class="svg-icon svg-icon-md">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect x="0" y="0" width="24" height="24"/>
<path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
<rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
</g>
</svg>
</span>
</a>

<form action="{{route('admin.categories.destroy',[$category->id])}}" method="post">
@csrf
@method('delete')
<button type="submit" class="btn btn-sm btn-clean btn-icon">
<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">
<span class="svg-icon svg-icon-md">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect x="0" y="0" width="24" height="24"/>
<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>
<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
</g>
</svg>
</span>
</a>
</button>
</form>

</td>
</tr>
@endforeach
</tbody>
</table>
{{$categories->links()}}
</div>
</div>
<!--end::Card-->
</x-admin-layout>
