@extends('layouts.profile')

{{-- profile.blade.php@yield('title')に'プロフィールの新規作成'を埋め込む --}}
@section('title','プロフィールの新規作成')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 ms-auto">
                <h2>プロフィールの新規作成</h2>
                <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
                    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <lavel class="col-md-2">名前</lavel>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <level class="col-md-2">性別</level>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="gender" value="{{ old('gender') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <level class="col-md-2">趣味</level>
                        <div class="col-md-10">
                            <testarea class="form-control" name="hobby" rows="20">{{ old('hobby') }}</testarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <level class="col-md-2">自己紹介</level>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ old('introduction') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="入力">
                </form>
            </div>
        </div>
    </div>
@endsection

