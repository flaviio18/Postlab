<x-layout>

    <div class="container-fluid bg-secondary-grey text-center" style="max-width: 1100px; margin: 0 auto;">
        <div class="row justify-content-center align-items-center mt-5 pt-3 backgraund-custom-sfondo">
            <h1 class="display-2 text-white">
                Tutti gli articoli per: {{$query}}
            </h1>
        </div>
    </div>
    <div class="container bg-sfondo" style="max-width: 1100px; margin: 0 auto; min-height: 100vh; padding: 20px;">
        <div class="row justify-content-center align-items-center" style="max-width: 1100px;">
        @foreach($articles as $article)
            <div class="col-12 col-md-4 my-2 mx-auto">
                <div class="card custom-card">
                    <img src="{{Storage::url($article->image)}}" class="card-img-top image-card-custom" alt=".">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text text-truncate">{{$article->subtitle}}</p>
                        <span class="text-muted small fst-italic">- tempo di lettura: {{ $article->readDuration() }} min</span>
                        <a href="{{route('article.byCategory', ['category' => $article->category->id])}}" class="small text-muted fst-italic text-capitalize">{{$article->category->name}}</a>
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                        <span class="text-muted">
                            Redatto il {{$article->created_at->format('d/m/Y')}} da 
                            <a class="text-secondary" href="{{ route('article.byUser', ['user' => $article->user->id]) }}">
                                {{$article->user->name}}
                            </a>
                        </span>
                        <a href="{{route('article.show', compact('article'))}}" class="btn btn-color">Leggi</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</x-layout>
