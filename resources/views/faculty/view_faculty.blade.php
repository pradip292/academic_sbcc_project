@extends('layout.base')

@section('content')
    <div class="card">
        <div class="card-body">
            <br>
            <h5 class="card-title">Faculties Details</h5>

            <div class="form-group">
                <input type="text" class="form-control" id="search" placeholder="Search Faculty">
            </div>

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

    <script>
        // Function to handle the search input
        document.getElementById('search').addEventListener('input', function () {
            var searchValue = this.value.toLowerCase();
            var rows = document.querySelectorAll('tbody tr');

            rows.forEach(function (row) {
                var name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                var department = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                var email = row.querySelector('td:nth-child(4)').textContent.toLowerCase();

                // Check if the search value is found in any of the columns
                if (name.includes(searchValue) || department.includes(searchValue) || email.includes(searchValue)) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
@endsection
