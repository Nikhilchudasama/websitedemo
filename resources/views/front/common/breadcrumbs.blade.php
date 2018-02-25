<section class="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="breadcrumb-link">
                    <a href="{{ route('front_home') }}" class="white">
                        Home
                        <i class="fas fa-chevron-right ml-2 mr-2"></i>
                    </a>

                    @foreach ($pages as $title => $url)
                        @if ($url)
                            <a href="{{ route($url) }}" class="white">
                                {{ $title }}
                                <i class="fas fa-chevron-right ml-2 mr-2"></i>
                            </a>
                        @else
                            <span>
                                {{ $title }}
                            </span>
                        @endif
                    @endforeach
                </nav>
            </div>
        </div>
    </div>
</section>
