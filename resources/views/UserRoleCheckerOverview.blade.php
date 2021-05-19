<!-- Kijkt of je bent ingelogd en laat de content zien voor premium members/writers -->
@foreach ($weblogblog as $blog)
@Auth
@if (Auth()->user()->roles === "ROLE_PREMIUM" OR Auth()->user()->roles === "ROLE_WRITER")
@include('blogpost')

<!-- Kijkt of je bent ingelogd en geen betaalde member bent en laat niet betaalde blogs zien -->
@elseif ($blog->premium == 0 AND Auth()->user()->roles === "ROLE_MEMBER")
@include('blogpost')
@endif
@endAuth

<!-- Laat de gratis blogs zien voor niet ingelogde mensen -->
@if($blog->premium == 0 AND !Auth()->user())
@include('blogpost')
@endif
@endforeach