@extends ('layout')
@section ('content')


@if ($blog->premium == 1 AND !Auth()->user() OR $blog->premium == 1 AND Auth()->user()->roles === "ROLE_MEMBER")

You do not have permission to view this page

@else
<b>{{ $blog->title}}</b></br>
    {{ $blog->blog}}</br></br>
    
    <b>Extra Comment van de Scrijver:</b></br>
    {{ $blog->comment}}</br>
    @if( $blog->photoname)
    <img src="/{{ asset($blog->photoname) }}">
    {{ $blog->foto_comment }}
    @endif
    </br><b>User Comments:</b></br>
    </br>

   @foreach($blog->comments as $comment)
   <b>{{$comment->user->name}}</b><br/>     
   {{$comment->commentbody}}<br/></br>
   @endforeach
   
   
    <button id="voegcommenttoe" 
    onclick="comment.style.visibility='visible', 
    send.style.visibility='visible',
    voegcommenttoe.style.visibility='hidden'">
    Voeg een comment toe</button>
    <form method='POST' action='/blog' > 
    @csrf
    <textarea type="text" name="commentbody" minlength="3"  value="{{old('comment')}}" id='comment' style="visibility:hidden;" ></textarea>
    <input name ='blog_id' value="{{ $blog->id }}" style="visibility:hidden;"> 
    <input name='user_id' value="{{ Auth::id() }}" style="visibility:hidden;">
    </br>
    <input type='submit' id='send' style='visibility:hidden'>
    </form>
    
@endif
@endsection