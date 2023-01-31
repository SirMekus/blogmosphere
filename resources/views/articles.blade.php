<x-layout.general>

    <x-nav></x-nav>

    <section>
        <div class='card d-flex justify-content-center'>
            <div class='card-body'>
    
                @if($articles->total() > 0)
                @php
                $i = 0;
                $offset = ($articles->currentPage() - 1) * $articles->perPage();
                @endphp
    
                <div class="list-group list-group-flush">
                    @foreach ($articles as $article)
                    @php
                    $i +=1;
                    $sn = $offset + $i;
                    $link = "<a class='fst-italic' href='".route('article', ['id'=>$article->id])."'>...read more</a>";
                    @endphp
    
                    <div class="list-group-item m-1" aria-current="true">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <img class="img-thumbnail" width="100" height="100"
                                    data-src="{{asset('storage/for_site/'.$article->cover)}}" />
                            </div>
                            <div class="flex-grow-1 ms-1">
                                <div class="mb-1">
                                <span class="mb-1 fw-bolder fs-3">
                                        {{$article->title}}:
                                </span><br/>
                            </span class="fst-italic fw-bold"> {{$article->author}}</span><br/>
                            </span class="fst-italic fw-bold"> {{$article->created_at->diffForHumans()}}</span>
                        </div><hr/>
                                
                        <p class="mb-1">{!!Str::limit($article->article, 100, $link)!!}</p>
    
                                <hr class="dropdown-divider">
    
                            </div>
                        </div>
                    </div>
                    @endforeach
    
                    {{ $articles->links() }}
                </div>
    
    
                @else
                <div class="rounded-0">
                    <div class="d-flex justify-content-center">
                        <a class="text-decoration-none text-dark" href="#">
                            <i class="fas fa-edit fa-6x text-cente ml-3"></i><br />
                            <span class="ms-3">No article yet</span>
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>


</x-layout.general>