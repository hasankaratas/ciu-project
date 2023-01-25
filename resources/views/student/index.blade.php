@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-xl">
            <div class="card">
                <h5 class="card-header">Öğrenciler</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table" id="studentTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ÖĞRENCİ NUMARASI</th>
                                <th>İSİM</th>
                                <th>SOYİSİM</th>
                                <th>BÖLÜM</th>
                                <th>ÜLKE</th>
                                <th>TELEFON NUMARASI</th>
                                <th>PASAPORT NUMARASI</th>
                                <th>EMAİL</th>
                                <th>GÜNCELLEME</th>
                                <th>SİLME</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($students as $student)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $student->id }}</strong>
                                    </td>
                                    <td>{{ $student->student_no }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->surname }}</td> 
                                    <td>@if(!empty($student->department->name))
                                        {{ $student->department->name  }}
                                    @else
                                        Bölüm Silindi
                                    @endif
                                    <td>{{ $student->country }}</td>
                                    <td>{{ $student->phone_number }}</td>
                                    <td>{{ $student->passport_no }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td><a type="button" class="btn btn-sm btn-warning"
                                            href="{{ route('student.edit', $student->id) }}">Güncelle</a></td>
                                    <td><a type="button" class="btn btn-sm btn-danger text-white" id="{{ $student->id }}"
                                            onclick="deleteStudent(this.id)">Sil</a></td>
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

        function deleteStudent(id) {
            $.ajax({
                    url: "student/delete/" + id,
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
                        text: 'Öğrenci başarılı bir şekilde silinmiştir...',
                    }).then(function() {
                        location.reload();
                    })
                })
                .fail(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Hata!',
                        text: 'Öprenci silinirken bir hata oluştu!',
                    })
                });
        }
    </script>
@endsection
