        <h2>
            <a href="#">{{$post->title}}</a>
        </h2>
        <p class="lead">
            by <a href="index.php">
            {{$post->user->name}}
            </a>
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
                @if(Auth::user()->name == $post->user->name)
                
                <a class="btn btn-primary pull-left" href="/post/{{$post->id}}/edit">Edit <span class="glyphicon glyphicon-pencil"></span></a>
                {{-- <a class="btn btn-primary" href="#">Delete <span class="glyphicon glyphicon-remove"></span></a> --}}
                    <form action="{{ url('post/'.$post->id) }}" method="POST" class="pull-left" style="padding-left:5px">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit" id="delete-task-{{ $post->id }}" class="btn btn-primary">
                            <i class="fa fa-btn fa-trash"></i>Delete <span class="glyphicon glyphicon-remove"></span>
                        </button>
                    </form>
                @endif
            @endif
                    @if(count($post->comments))
                        <div class="row">
                            <div class="col-lg-12">
                                <h3>Comments . . .</h3>
                            </div>
                        </div>
                    @endif
            </div>   
        </div>

            @foreach($post->comments as $comment)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$comment->user->name}}
                        <small>{{$comment->created_at->format('F j,Y')}} at {{$comment->created_at->format('g:i A')}}</small>
                    </h4>
                    {{ $comment->body }}
                    <br />

                        @if($comment->user_id == Auth::id())
                            <a href="/post/{{ $post->id }}/comment/{{$comment->id}}" class="pull-left">Edit</a>&nbsp;&nbsp;
                            <form action="/post/{{ $post->id }}/comment/{{$comment->id}}" method="POST" class="pull-left">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" id="delete-task-{{ $post->id }}" class="btn btn-link" style="padding-top:0px;">Delete
                                </button>
                            </form>

                        @endif
                </div>
            </div>
            @endforeach
                @if(!Auth::guest())
                    <div class="well">
                        <h4>Leave a Comment:</h4>
                            <form role="form" method="POST" action="/post/{{$post->id}}/comment/create" >
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <textarea class="form-control" rows="2" name="body"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Comment</button>
                            </form>
                    </div>
                @endif
        <hr>