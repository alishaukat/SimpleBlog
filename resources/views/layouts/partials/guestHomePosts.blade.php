    @foreach($posts as $post)
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


        {{-- <hr> --}}
        {{-- <img class="img-responsive" src="http:/img/900x300.png" alt=""> --}}
        <hr>
        <p>{{$post->body}}</p>
        <a class="btn btn-primary" href="/post/{{ post->id }}/asguest">Show Description <span class="glyphicon glyphicon-chevron-right"></span></a>
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