<x-admin-layout title="All Article" category="Articles">


@if (session()->has('success'))
<div class="alert-text">{{session()->get('success')}} </div>
@endif


<div class="card card-custom">
<div class="card-header flex-wrap border-0 pt-6 pb-0">
<div class="card-title">
<h3 class="card-label">List articles</h3>
</div>
<div class="card-toolbar">

<a href="{{route('admin.articles.create')}}" class="btn btn-primary font-weight-bolder">New Article</a>
</div>
</div>
<div class="card-body">

<table class="table">
<thead>
<tr>
<th scope="col">#</th>
<th>Title</th>
<th>Content</th>
<th>Tags</th>
<th>Photo</th>
<th>ACTIONS</th>
</tr>
</thead>
<tbody>

@foreach($articles as $article)
<tr>
<td>{{$loop->index}}</td>
<td>{{$article->title}}</td>
<td>{{$article->content}}</td>
<td>@foreach($article->tags as $tag) <span class="btn btn-sm btn-outline-primary"> {{$tag->tag}} </span> @endforeach </td>
<td><img height="60" src="{{$article->PhotoUrl}}" alt=""></td>
<td>
<a href="{{route('admin.articles.edit',[$article->id])}}" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
<button class="btn btn-sm btn-warning">Edit</button>
</a>

<form action="{{route('admin.articles.destroy',[$article->id])}}" method="post" style="display: inline-block">
@csrf
@method('delete')
<button type="submit" class="btn btn-sm btn-danger">
Delete
</button>
</form>

</td>
</tr>
@endforeach
</tbody>
</table>
{{$articles->links()}}
</div>
</div>
</x-admin-layout>
