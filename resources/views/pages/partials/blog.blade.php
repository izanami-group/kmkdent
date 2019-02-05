<div id="blog" class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h4>{{ __('home.blog-title') }}</h4>
                    <div class="line-dec"></div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($articles as $a)
                <div class="col-md-6">
                    <div class="blog-item">
                        <div class="thumb {{ $loop->first === true ? 'thumb--article-main' : 'thumb--article' }}">
                            <img src="{{
                                $a->image !== NULL
                                    ? Storage::disk('public')->url($a->image)
                                    : Storage::disk('public')->url('noimage.jpg')
                            }}" alt="{{ $a->title }}">

                            <div class="text-content">
                                <h4>{{ $a->title }}</h4>
                                <span>
                                    {{ __('home.blog-written-on') }}:
                                    <em>{{ $a->created_at->diffForHumans() }}</em>
                                </span>
                            </div>
                        </div>
                        <div class="article-content">{!! $a->content !!}</div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="pop">
                  <span>✖</span>
                  <div class="popup-content" data-pop-up-content>
                      {{-- Content will be added here dynamically through JS. --}}
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
