
@if (count($microposts) > 0)
    <ul class="list-unstyled">
        @foreach ($microposts as $micropost)
            <li class="media mb-3">
                {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="mr-2 rounded" src="{{ Gravatar::get($micropost->user->email, ['size' => 50]) }}" alt="">
                <div class="media-body">
                    <div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $micropost->user->name, ['user' => $micropost->user->id]) !!}
                        <span class="text-muted">posted at {{ $micropost->created_at }}</span>
                    </div>
                    <div>
                        {{-- 投稿内容 --}}
                        <p class="mb-0">{!! nl2br(e($micropost->content)) !!}</p>
                    </div>
                    <div>
                        <div class="btn-group">
                        @if (Auth::id() == $micropost->user_id)
                            {{-- 投稿削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm mt-2']) !!}
                            {!! Form::close() !!}
                            
                             @if (Auth::user()->is_favorites($micropost->id))
                             {{-- アンお気に入りボタンのフォーム --}}
                             {!! Form::open(['route' => ['user.unfavorite', $micropost->id], 'method' => 'delete']) !!}
                                 {!! Form::submit('Unfavorite', ['class' => "btn btn-danger btn-sm mt-2 ml-2"]) !!}
                             {!! Form::close() !!}
                            @else
                             {{-- お気に入りボタンのフォーム --}}
                             {!! Form::open(['route' => ['user.favorite', $micropost->id]]) !!}
                                 {!! Form::submit('Favorite', ['class' => "btn btn-success btn-sm mt-2 ml-2"]) !!}
                             {!! Form::close() !!}
                             @endif
                        @endif
                    </div>
                    <div>
                    {{-- お気に入り／解除ボタン --}}
                   @include('user_follow.favorite_button')
                    </div>
                    <div>
                        
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $microposts->links() }}
@endif