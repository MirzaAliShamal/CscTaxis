@extends('layouts.front')
@section('content')
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <ol class="breadcrumb">
                    <li><a href="{{ route('faq') }}">Frequently Asked Questions</a></li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="section-padding our-service-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">Frequently Asked Questions</h2>
                <div class="about-us-text">
                    <div id="accordion">
                        @foreach (faq() as $item)
                            <div class="card card-help mb-3 mt-3">
                                <div class="card-header bg-site-dark" id="heading{{ $item->id }}">
                                    <h5 class="mb-0 text-white" data-toggle="collapse" data-target="#collapse-{{ $item->id }}" aria-expanded="true" aria-controls="collapseOne">
                                        {{ $item->question }}
                                    </h5>
                                </div>

                                <div id="collapse-{{ $item->id }}" class="collapse" aria-labelledby="heading{{ $item->id }}" data-parent="#accordion">
                                    <div class="card-body">
                                        {!! $item->answer !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
