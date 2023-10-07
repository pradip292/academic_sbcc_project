@extends('layout.base')
@section('content')
    <div class="card">
        <div class="card-body">
            <br>
            <a class="btn btn-primary" href="{{ route('view-practical-question') }}" >Switch To Practical Question </a>
            <h5 class="card-title">Theory Question</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">SrNo</th>
                        <th scope="col">Question</th>
                        <th scope="col">Option 1</th>
                        <th scope="col">Option 2</th>
                        <th scope="col">Option 3</th>
                        <th scope="col">Option 4 </th>

                    </tr>
                </thead>
                <tbody>
                    @php $serialNumber = 1 @endphp
                    @foreach ($question as $item)
                        <tr>
                            <td>{{ $serialNumber }}</td>
                            <td>{{ $item->qname }}</td>
                            <td>{{ $item->qoption1 }}</td>
                            <td>{{ $item->qoption2 }}</td>
                            <td>{{ $item->qoption3 }}</td>
                            <td>{{ $item->qoption4 }}</td>     
                        </tr>
                        @php $serialNumber++ @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
