@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-xl">
            <div class="card">
                <h5 class="card-header">Bölümler</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table" id="departmentTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Bölüm Adı</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($departments as $department)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $department->id }}</strong>
                                    </td>
                                    <td>{{ $department->name }}</td>
                                    <td><a type="button" class="btn btn-sm btn-warning"
                                            href="{{ route('department.edit', $department->id) }}">Edit</a></td>
                                    <td><a type="button" class="btn btn-sm btn-danger text-white" id="{{ $department->id }}"
                                            onclick="deleteDepartment(this.id)">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            console.log("ready!");
        });

        function deleteDepartment(id) {
            $.ajax({
                    url: "department/delete/" + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    contentType: false,
                    processData: false,
                })
                .done(function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Başarılı',
                        text: 'Bölüm başarılı bir şekilde silinmiştir...',
                    }).then(function() {
                        location.reload();
                    })
                })
                .fail(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Hata!',
                        text: 'Bölüm silinirken bir hata oluştu!',
                    })
                });
        }
    </script>
@endsection
