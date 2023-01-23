@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Öğrenci Kaydet</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">BÖLÜM</label>
                            <select class="form-select" id="exampleFormControlSelect1" name ="department" aria-label="Default select example">
                                <option selected="">Bir bölüm seçiniz..</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">İSİM</label>
                            <input type="text" class="form-control" id="basic-default-fullname" name ="name" placeholder="John">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">SOYİSİM</label>
                            <input type="text" class="form-control" id="basic-default-company" name="surname" placeholder="Doe">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-email">EMAİL</label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="basic-default-email" class="form-control"
                                    placeholder="john.doe@gmail.com" aria-label="john.doe"
                                    aria-describedby="basic-default-email2" name="email">
                            </div>
                            <div class="form-text">You can use letters, numbers &amp; periods</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">TELEFON NO</label>
                            <input type="text" id="basic-default-phone" name="phone_number" class="form-control phone-mask"
                                placeholder="542 888 8888">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">ÜLKE</label>
                            <input type="text" class="form-control" id="basic-default-fullname" name="country" placeholder="Turkey">
                        </div>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
