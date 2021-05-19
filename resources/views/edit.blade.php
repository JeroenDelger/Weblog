@extends('layout')
@section('content')
@auth
@if (Auth()->user()->roles === "ROLE_WRITER")

<table>
    <thead id='create_blog'>
        <th>Titel</th>
        <th>Categorie</th>
        <th>Premium</th>
    </thead>

    <tbody>
        <form method='POST' action='/test' enctype="multipart/form-data">
            @csrf
            <tr>
                <td><input id='newtitle' type="text" name="title" minlength="3" required value="{{$blog->title}}"></input></td>
                <ul>
                    <td>
                        <div class='checkbox-group' required>
                            @foreach ($categories as $category)
                            <li>
                                <input type="checkbox" name="categories[]" id="{{ $category->id }}" value="{{ $category->id }}">
                                <label for="{{ $category->title }}">{{ $category->title }}</label>
                            </li>
                            </li>
                            @endforeach
                        </div>
                    </td>
                </ul>
                <td>
                    <input type="hidden" name="premium" value="0" id='premium'>
                    <input type="checkbox" name="premium" value="1" id='premium'>
                    <label for='premium'>Premium Artikel</label>
                </td>
            </tr>
            <tr>
                <td>
                    <textarea type="text" name="blog" minlength="3" required value="{{old('blog')}}" id='newblog'>{{ $blog->blog }}</textarea>
                </td>
            <tr>
                <td>Extra opmerkingen</br>
                    <textarea type="text" name="comment" minlength="3" value="{{old('comment')}}" id='extracomment'>{{ $blog->comment }}</textarea>

                    <h2>Upload Foto</h2>
                    {{-- <label for="photoname">File Name</label>--}}
                    <input type="text" class="form-control" id="photoname" placeholder="Enter file Name" name="photoname">

                    <div class="form-group">
                        <label for="image">Kies een afbeelding</label>
                        <input id="image" type="file" name="image">
                        </br></br><b>Foto comment</b></br>
                        <textarea type="text" name="foto_comment" value="{{old('foto_comment')}}" id='foto_comment'></textarea>
                </td>
            </tr>
            <input required value="{{$blog->id}}" name="id" style="visibility:hidden;">

            <tr>
                <td><input type="submit"></td>
            </tr>
            </tr>
        </form>
    </tbody>
</table>
@else
You do not have permission to view this page

@endif

@endauth
@if(!Auth()->user())
You do not have permission to view this page
@endif
@endsection