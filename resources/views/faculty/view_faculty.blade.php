@extends('layout.base')
@section('content')
    <div class="card">
        <div class="card-body">
            <br>
            <h5 class="card-title">Faculties Details</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">SrNo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Department</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @php $serialNumber = 1 @endphp
                    @foreach ($faculty as $item)
                        <tr>
                            <td>{{ $serialNumber }}</td>
                            <td>{{ $item->fname }}</td>
                            <td>{{ $item->fdepart }}</td>
                            <td>{{ $item->fmail }}</td>    
                        </tr>
                        @php $serialNumber++ @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
