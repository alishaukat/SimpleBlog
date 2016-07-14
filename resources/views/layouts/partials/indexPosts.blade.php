    @foreach($posts as $post)
        <h2>
            <a href="#">{{$post->title}}</a>
        </h2>
        <p class="lead">
            by <a href="index.php">
            {{$post->user->name}}
            </a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->format('F j,Y')}} at {{$post->updated_at->format('g:i A')}}</p>
        {{-- <hr> --}}
        {{-- <img class="img-responsive" src="http:/img/900x300.png" alt=""> --}}
        <hr>
        <p>{{$post->body}}</p>
        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                @if(Auth::user()->name == $post->user->name)
                
                <a class="btn btn-primary" href="/post/{{$post->id}}/edit">Edit <span class="glyphicon glyphicon-pencil"></span></a>
                {{-- <a class="btn btn-primary" href="#">Delete <span class="glyphicon glyphicon-remove"></span></a> --}}
                    <form action="{{ url('post/'.$post->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button type="submit" id="delete-task-{{ $post->id }}" class="btn btn-primary">
                            <i class="fa fa-btn fa-trash"></i>Delete
                        </button>
                    </form>
                @endif
            </div>   
        </div>

        <hr>

    @endforeach

    <!-- Pager -->
    <ul class="pager">
        <li class="previous">
            <a href="#">&larr; Older</a>
        </li>
        <li class="next">
            <a href="#">Newer &rarr;</a>
        </li>
    </ul>