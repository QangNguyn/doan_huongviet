@extends('layouts.admin')



@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Liên hệ</h4>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-fixed table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Tên</th>
                        <th>Địa chỉ email</th>
                        <th>Lời nhắn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($complain as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->message }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $complain->links() }}
    </div>
@endsection
