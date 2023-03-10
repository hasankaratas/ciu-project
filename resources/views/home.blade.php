@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-xl">
            <div class="row">
                <div class="col-8">
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
                                        </td>
                                                <td>{{ $student->country }}</td>
                                            <td>{{ $student->phone_number }}</td>
                                            <td>{{ $student->passport_no }}</td>
                                            <td>{{ $student->email }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <h5 class="card-header">Bölümler</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table" id="departmentTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>BÖLÜM ADI</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($departments as $department)
                                        <tr>
                                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                <strong>{{ $department->id }}</strong>
                                            </td>
                                            <td>{{ $department->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
