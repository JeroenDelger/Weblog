@extends('layout')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}" />
<script type='module' src="{{ asset('../zoekfunctie.js') }}" defer></script>
<table id="Lijst">
    <thead id="BlogListHead" class="lijstH">
        <th id="BlogOverviewTitle">Titel</th>
        <th id="BlogOverviewComment">Comment van de Scrijver</th>
        <th id="BlogOverviewCategorie">Categorie
            @foreach ($categories as $category)
            <li>
                <input type="checkbox" name="categories[]" id="{{ $category->id }}" value="{{ $category->id }}" checked onchange="filtercategorie()" class='cbCategorie'>
                <label for="{{ $category->title }}">{{ $category->title }}</label>
            </li>
            </li>
            @endforeach
        </th>
        <th id="UploadDatum">Gepubliceerd</th>
    </thead>
    <tbody id='BlogBody'>
        @include('UserRoleCheckerOverview')
    </tbody>
</table>
@endsection