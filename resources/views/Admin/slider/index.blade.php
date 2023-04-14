@extends('layouts.admin')



@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Danh mục</h4>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-fixed table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Tiêu đề</th>
                        <th>Hình ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sliders as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td class="col-md-3 ">
                                <img src="{{ $item->image }}" class="w-50 h-25" alt="Image Not Found">
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('slider.edit', $item->id) }}">Sửa</a>
                                @include('layouts.inc.delete', [
                                    'route' => 'slider.destroy',
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
        {{ $sliders->links() }}
    </div>
@endsection

@section('scripts')
@endsection
