@extends('layouts.front')
@section('content')
    <style>
        .profile_tbl {
            width: 80%;
            margin: 50px auto;
            max-width: 500px;
            border-collapse: collapse;
        }
        .profile_tbl th,
        .profile_tbl td {
            border: 2px solid #666;
        }
    </style>
    <div class="container">
        <table class="profile_tbl">
            <thead>
                <tr>
                    <th>名前</th>
                    <th>性別</th>
                    <th>趣味</th>
                    <th>自己紹介</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->gender }}</td>
                        <td>{{ $post->hobby }}</td>
                        <td>{{ $post->introduction }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection