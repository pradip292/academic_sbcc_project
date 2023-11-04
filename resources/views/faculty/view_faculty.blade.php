@extends('layout.base')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

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
                        <th scope="col">Actions</th> <!-- Add a new column for actions -->
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
                            <td>
                                        <!-- Add a delete button that triggers a JavaScript function -->
                                <button class="btn btn-danger" onclick="deleteFaculty({{ $item->id }})">Delete</button>
                            </td>
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

<script>
    function deleteFaculty(id) {
        if (confirm('Are you sure you want to delete this faculty record?')) {
            // Send an AJAX request to delete the faculty record
            axios.delete(`/faculty/${id}`)
                .then(function (response) {
                    // Reload the page or update the view as needed
                    location.reload(); // This will refresh the page
                })
                .catch(function (error) {
                    console.error('Error deleting faculty record:', error);
                });
        }
    }
</script>
