@extends('../layouts.admin')

@section('content')

<section class="container">
    <div>
        <a href="/admin/blogs/create">Add Blogs</a>
    </div>
    <div>
        {{$data}}
    </div>
</section>
@endsection
