 @if (Auth::id() != $micropost->user_id)
     @if (Auth::user()->is_favorites($micropost->id))
         {{-- アンお気に入りボタンのフォーム --}}
         {!! Form::open(['route' => ['user.unfavorite', $micropost->id], 'method' => 'delete']) !!}
             {!! Form::submit('Unfavorite', ['class' => "btn btn-danger btn-sm mt-2"]) !!}
         {!! Form::close() !!}
     @else
         {{-- お気に入りボタンのフォーム --}}
         {!! Form::open(['route' => ['user.favorite', $micropost->id]]) !!}
             {!! Form::submit('Favorite', ['class' => "btn btn-primary btn-sm mt-2"]) !!}
         {!! Form::close() !!}
     @endif
 @endif