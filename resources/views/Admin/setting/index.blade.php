@extends('layouts.admin')



@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Danh sách cấu hình</h4>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-fixed table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Tên cấu hình</th>
                        <th>Mô tả</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($settings as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->key }}</td>
                            <td>{{ $item->value }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('setting.edit', $item->id) }}">Sửa</a>
                                @include('layouts.inc.delete', [
                                    'route' => 'setting.destroy',
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
        {{ $settings->links() }}
    </div>
@endsection

@section('scripts')
@endsection
