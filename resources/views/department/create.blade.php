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
            @if (isset($department->id))
                <div class="alert alert-success mb-3">
                    <ul>
                        <li>Bölüm başarılı şekilde eklenmiştir.</li>
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Bölüm Kaydet</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('department.store') }}" method="POST" enctype="multipart/form">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">BÖLÜM İSMİ</label>
                            <input type="text" class="form-control" id="basic-default-fullname" name="name"
                                placeholder="Bilgisayar Mühendisliği">
                        </div>
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
