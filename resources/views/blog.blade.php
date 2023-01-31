<x-layout.general>

    <x-nav></x-nav>

    <section>
        <div class='d-flex justify-content-end'>
            <a class="btn btn-sm bg-primary text-white run-get-request" data-bc="like" href="{{route('like', ['id'=>$article->id])}}"><i class="fs-4 fas fa-thumbs-up"></i><span id="likes">{{$article->likes_count}}</span></a>

            <a class="btn btn-sm bg-dark text-white ms-2" href="#"><i class="fs-4 fas fa-eye"></i><span id="views">{{$article->views}}</span></a>
        </div>

        <div class='card d-flex justify-content-center'>
            <div class='card-body'>
                <div class="d-flex justify-content-center">
                    <img class="img-thumbnail" src="{{asset('storage/for_site/'.$article->cover)}}" />
                </div>

                <div class="d-flex justify-content-center">
                    <span class="mb-1 fw-bolder fs-3 text-center">{{$article->title}}</span>
                </div>

                <hr />

                {{$article->article}}
                <hr />

                @foreach ($article->tags as $tag)

                <a class="badge bg-dark text-white text-decoration-none" href="{{$tag->url}}">{{$tag->label}}</a>
                @endforeach
                <hr />

                <div class='card-footer d-flex justify-content-center'>
                    <a class="btn btn-lg bg-primary text-white" href="#">Like</a>
                    <a class="btn btn-lg bg-dark text-white ms-2" href="#">Comment</a>
                </div>

            </div>
        </div>
    </section>

    <section>
    <div class='card d-flex justify-content-center mt-5'>
        <div class='card-body'>
            <div class="list-group list-group-flush">
            @foreach ($article->comments as $comment)
            <div class="list-group-item m-1" aria-current="true">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <img class="img-thumbnail" width="100" height="100"
                            data-src="{{asset('storage/for_site/avatar.png')}}" />
                    </div>
                    <div class="flex-grow-1 ms-1">
                        <div class="mb-1">
                        <span class="mb-1 fw-bolder fs-3">
                                {{$comment->subject}}:
                        </span><br/>
                    </span class="fst-italic fw-bold"> {{$comment->name}}</span><br/>
                    </span class="fst-italic fw-bold"> {{$comment->created_at->diffForHumans()}}</span>
                </div><hr/>
                        
                <p class="mb-1">{{$comment->body}}</p>
                        

                        <hr class="dropdown-divider">

    
                    </div>
                </div>
            </div>
            @endforeach
            </div>


            <form action="{{route('comment', ['id'=>$article->id])}}" method="post" id="form">
                <div class="col-12 mt-3">
                    <input name="name" type="text" class="form-control form-control-lg" placeholder="Your Name">
                </div>
                <div class="col-12 mt-3">
                    <input name="email" type="email" class="form-control form-control-lg" placeholder="Email Address">
                </div>
                <div class="col-12 mt-3">
                    <input name="subject" type="text" class="form-control form-control-lg" placeholder="Subject">
                </div>
                <div class="col-12 mt-3">
                    <textarea class="form-control form-control-lg" placeholder="Comment" name="body"></textarea>
                </div>

                <input name="article_id" type="hidden" value="{{$article->id}}">
                
                <div class="col-12 mt-2">

                    <input type="submit" class="btn home-color text-white form-control" value="Post Comment" />


                </div>
            </form>

        </div>
    </div>
    </section>

@push('scripts')
{{vite('resources/js/record_views.js')}}
@endpush

</x-layout.general>