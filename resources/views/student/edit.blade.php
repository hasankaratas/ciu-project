@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-xl">
            @if ($errors->any())
                <div class="alert alert-danger mb-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (\Session::has('success'))
                <div class="alert alert-success mb-3">
                    <ul>
                        <li>Öğrenci bilgileri başarılı şekilde güncellenmiştir.</li>
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Öğrenci Güncelleme</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('updateStudent', $student->id) }}" method="POST" enctype="multipart/form">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">ÖĞRENCİ NUMARASI</label>
                            <input type="number" class="form-control" id="basic-default-fullname" name="student_no"
                                placeholder="20000000" value="{{ $student->student_no }}">
                            <div class="form-text">Zorunlu Alandır. 8 rakam girilmelidir.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">BÖLÜM</label>
                            <select class="form-select" id="exampleFormControlSelect1" name="department_id"
                                aria-label="Default select example">

                                @foreach ($departments as $department)
                                    @if ($department->id == $student->department_id)
                                        <option selected="" value="{{ $department->id }}">{{ $department->name }}
                                        </option>
                                    @else
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <div class="form-text">Zorunlu Alandır.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">İSİM</label>
                            <input type="text" class="form-control" id="basic-default-fullname" name="name"
                                placeholder="John" value="{{ $student->name }}">
                            <div class="form-text">Zorunlu Alandır. Sadece karakter girilmelidir.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">SOYİSİM</label>
                            <input type="text" class="form-control" id="basic-default-company" name="surname"
                                placeholder="Doe" value="{{ $student->surname }}">
                            <div class="form-text">Zorunlu Alandır. Sadece karakter girilmelidir.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-email">EMAİL</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="basic-default-email" class="form-control"
                                    placeholder="john.doe@gmail.com" aria-label="john.doe"
                                    aria-describedby="basic-default-email2" name="email" value="{{ $student->email }}">
                            </div>
                            <div class="form-text">Zorunlu Alandır. Geçerli email formatında girilmelidir.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">TELEFON NO</label>
                            <input type="number" id="basic-default-phone" name="phone_number"
                                class="form-control phone-mask" placeholder="542 888 8888"
                                value="{{ $student->phone_number }}">
                            <div class="form-text">Zorunlu Alandır. 10 rakam girilmelidir.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">ÜLKE</label>
                            <input type="text" class="form-control" id="basic-default-fullname" name="country"
                                placeholder="Turkey" value="{{ $student->country }}">
                            <div class="form-text">Zorunlu Alandır. Sadece karakter girilmelidir.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">PASAPORT NUMARASI</label>
                            <input type="number" class="form-control" id="basic-default-fullname" name="passport_no"
                                placeholder="2000000000" value="{{ $student->passport_no }}">
                            <div class="form-text">Zorunlu Alandır. 10 rakam girilmelidir.</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
