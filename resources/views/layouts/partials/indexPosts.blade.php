@foreach($posts as $post)
    <h2>
    @if(!Auth::guest())
        <a href="/post/{{ $post->id }}">{{$post->title}}</a>
    @else
        <a href="/post/{{ $post->id }}/asguest">{{$post->title}}</a>
    @endif
    </h2>

    <p class="lead">
        by  
        @if(!Auth::guest())<a href="/user/{{$post->user_id}}/profile">
        {{$post->user->name}}
            </a>
        @else
            <a href="/user/{{$post->user_id}}/profile/asguest">
            {{$post->user->name}}
            </a>
        @endif
    </p>
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->format('F j,Y')}} at {{$post->created_at->format('g:i A')}}</p>

    @if($post->created_at != $post->updated_at)
        <p><span class="glyphicon glyphicon-time"></span> updated at {{$post->updated_at->format('F j,Y')}} at {{$post->updated_at->format('g:i A')}}</p>
    @endif


    <hr>
    <img class="img-responsive" src="/img/900x300.png" alt="">
    <hr>
    <p>{{$post->body}}</p>
    <div class="row">
        <div class="col-lg-12">
            @if(!Auth::guest())
            <a class="btn btn-primary pull-right" href="/post/{{ $post->id }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            @else
                <a class="btn btn-primary pull-right" href="/post/{{ $post->id }}/asguest">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            @endif
            @if(!Auth::guest())
                @if(Auth::user()->name == $post->user->name)
                
                <a class="btn btn-primary pull-left" href="/post/{{$post->id}}/edit">Edit <span class="glyphicon glyphicon-pencil"></span></a>
                    <form action="{{ url('post/'.$post->id) }}" method="POST" class="pull-left" style="padding-left:5px">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit" id="delete-task-{{ $post->id }}" class="btn btn-primary">
                            <i class="fa fa-btn fa-trash"></i>Delete <span class="glyphicon glyphicon-remove"></span>
                        </button>
                    </form>
                @endif
            @endif
        </div>   
    </div>
    <hr>

@endforeach