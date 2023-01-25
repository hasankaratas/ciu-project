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
            @if (isset($student->id))
                <div class="alert alert-success mb-3">
                    <ul>
                        <li>Öğrenci başarılı şekilde eklenmiştir.</li>
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Öğrenci Kaydet</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">ÖĞRENCİ NUMARASI</label>
                            <input type="number" class="form-control" id="basic-default-fullname" name="student_no"
                                placeholder="20000000" value="{{ old('student_no') }}">
                            <div class="form-text">Zorunlu Alandır. 8 rakam girilmelidir.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">BÖLÜM</label>
                            <select class="form-select" id="exampleFormControlSelect1" name="department"
                                aria-label="Default select example">
                                <option selected="" value="">Bir bölüm seçiniz..</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">İSİM</label>
                            <input type="text" class="form-control" id="basic-default-fullname" name="name"
                                placeholder="John" value="{{ old('name') }}">
                            <div class="form-text">Zorunlu Alandır. Sadece karakter girilmelidir.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">SOYİSİM</label>
                            <input type="text" class="form-control" id="basic-default-company" name="surname"
                                placeholder="Doe" value="{{ old('surname') }}">
                            <div class="form-text">Zorunlu Alandır. Sadece karakter girilmelidir.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-email">EMAİL</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="basic-default-email" class="form-control"
                                    placeholder="john.doe@gmail.com" aria-label="john.doe"
                                    aria-describedby="basic-default-email2" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="form-text">Zorunlu Alandır. Email formatında bir değer girilmelidir.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">TELEFON NO</label>
                            <input type="number" id="basic-default-phone" name="phone_number"
                                class="form-control phone-mask" placeholder="542 888 8888"
                                value="{{ old('phone_number') }}">
                            <div class="form-text">Zorunlu Alandır. 10 rakam girilmelidir.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">ÜLKE</label>
                            <input type="text" class="form-control" id="basic-default-fullname" name="country"
                                placeholder="Turkey" value="{{ old('country') }}">
                            <div class="form-text">Zorunlu Alandır. Sadece karakter girilmelidir.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">PASAPORT NUMARASI</label>
                            <input type="number" class="form-control" id="basic-default-fullname" name="passport_no"
                                placeholder="2000000000" value="{{ old('passport_no') }}">
                            <div class="form-text">Zorunlu Alandır. 10 rakam girilmelidir.</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
