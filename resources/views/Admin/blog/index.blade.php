@extends('layouts.admin')



@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Bài viết</h4>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-fixed table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Tiêu đề bài viết</th>
                        <th>Hình ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td class="col-md-3 ">
                                <img src="{{ $item->image }}" class="w-50 " style="height: 100px !important"
                                    alt="Image Not Found">
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('blog.edit', $item->id) }}">Sửa</a>
                                @include('layouts.inc.delete', [
                                    'route' => 'blog.destroy',
                                    'id' => $item->id,
                                ])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-center mt-4 text-dark">
        {{ $blogs->links() }}
    </div>
@endsection

@section('scripts')
@endsection
