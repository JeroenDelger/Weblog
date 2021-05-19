<tr>
    <td id="BlogOverviewTitle">
        <a href="/blog/{{ $blog->id }}">
            <strong>
                {{ $blog->title }}
            </strong>
        </a>
    </td>

    <td id="BlogOverviewComment">
        {{ $blog->comment }}
    </td>

    <td id="BlogOverviewCategorie">
        @foreach($blog->categoriesid as $categorie)
        {{ $categorie->title }}
        @endforeach
    </td>

    <td id="UploadDatum">
        {{ $blog->created_at }}
    </td>
</tr>