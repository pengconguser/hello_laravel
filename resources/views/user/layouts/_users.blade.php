    <li>
        <img alt="{{ $user->name }}" class="gravatar" src="{{ $user->gravatar($user->avatar) }}"/>
        <a class="username" href="{{ route('users.show', $user->id )}}">
            {{ $user->name }}
        </a>
        @if(Auth::user()->is_admin)
        {!! Form::open(['method' => 'delete', 'route' => ['users.destroy',$user->id] ,'class' => 'form-horizontal']) !!}
            <div class="btn-group pull-right">
                {!! Form::submit("delete", ['class' => 'btn btn-success']) !!}
            </div>
        {!! Form::close() !!}
        @endif
    </li>