@extends('layout')
@section('content')
@auth
@if (Auth()->user()->roles === "ROLE_WRITER" )
Hallo {{ Auth::user()->name }}!

<table id="Lijst">
    <thead id="BlogListHead" class="lijstH">
        <th id="BlogOverviewTitle">Titel</th>
        <th id="BlogOverviewCategorie">Categorie</th>
        <th id="UploadDatum">Gepubliceerd</th>
        <th id="BlogOverviewPhoto">Afbeelding</th>
        <th id="BlogOverviewDeleteEdit">Delete/Edit</th>
    </thead>
    @foreach ($weblogblog as $blog)
    @if ($blog->writer_id === Auth()->user()->id)
    <tbody id="BlogBody">
        <tr>
            <td id="BlogOverviewTitle">
                <a href="/blog/{{ $blog->id }}">
                    <strong>
                        {{ $blog->title }}
                    </strong>
                </a>
            </td>

            <td id="BlogOverviewCategorie">
                {{ $blog->categories }}
            </td>

            <td id="UploadDatum">
                {{ $blog->created_at }}
            </td>

            <td id="BlogOverviewPhoto">
                @if ($blog->photoname)
                ja
                @else
                nee
                @endif
            </td>

            <td id="BlogOverviewDeleteEdit">
                <form method='POST' action='/blog/{{$blog->id}}' id="BlogOverviewDeleteEdit">
                    @csrf
                    <button name='blog_del_id' value='{{ $blog->id }}' onclick="return confirm('Weet je dit heel zeker?')">Delete Blog</button>
                </form>
                <form method='POST' action='/blog/{{$blog->id}}/edit' id="BlogOverviewDeleteEdit">
                    @csrf
                    <a href="{{ url('/blog/' . $blog->id . '/edit') }}"><button name='blog_edit_id' value='{{ $blog->id }}'>Edit page</button></a>
                </form>
            </td>
        </tr>
    </tbody> @endif
    @endforeach
    <td><a href='/newblog'>Maak een nieuwe blog</a></td>

</table>
@endif
@if(Auth()->user()->roles != "ROLE_WRITER")
You do not have permission to view this page!
@endif

@endauth
@if(!Auth()->user())
You do not have permission to view this page

@endif

@endsection