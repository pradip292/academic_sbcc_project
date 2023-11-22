@extends('layout.base')
@section('content')
    <div class="card">
        <div class="card-body">
            <br>
            <h5 class="card-title">Student Details</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">SrNo</th>
                        <th scope="col">Name</th>
                        <th scope="col">PRN Number</th>
                        <th scope="col">Depart</th>
                        <th scope="col">Class</th>
                        <th scope="col">Div </th>
                        <th scope="col">Email</th>
                        <th scope="col">DOB</th>

                    </tr>
                </thead>
                <tbody>
                    @php $serialNumber = 1 @endphp
                    @foreach ($students as $item)
                        <tr>
                            <td>{{ $serialNumber }}</td>
                            <td>{{ $item->sname }}</td>
                            <td>{{ $item->sprn }}</td>
                            <td>{{ $item->sdepart }}</td>
                            <td>{{ $item->sclass }}</td>
                            <td>{{ $item->sdiv}}</td>
                            <td>{{ $item->semail}}</td>     
                            <td>{{ $item->sdob}}</td> 
                        </tr>
                        @php $serialNumber++ @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
