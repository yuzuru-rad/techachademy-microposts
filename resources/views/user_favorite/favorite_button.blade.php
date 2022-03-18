@if (Auth::user()->is_favoriting($micropost->id))
        {{-- アンフォローボタンのフォーム --}}
        {!! Form::open(['route' => ['users.unfavorite', $micropost->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavorite', ['class' => "btn btn-danger btn-sm"]) !!}
        {!! Form::close() !!}
@else
        {{-- フォローボタンのフォーム --}}
        {!! Form::open(['route' => ['users.favorite', $micropost->id], 'method' => 'get']) !!}
            {!! Form::submit('Favorite', ['class' => "btn btn-primary btn-sm"]) !!}
        {!! Form::close() !!}
@endif
