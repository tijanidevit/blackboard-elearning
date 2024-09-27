@extends('tutor.layout.app')

@section('title')
    {{ $content->title }}
@endsection

<style>
    .video-container {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 aspect ratio */
    height: 0;
    overflow: hidden;
    max-width: 100%;
}

.video-container video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

</style>

@section('body')
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <div class="card overview-sec">
                    <div class="card-body">
                        <div class="d-flex justify-content-between justify-items-center">
                            <div>
                                <h3>{{ $content->title }}</h3>
                                <p>{{ $content->complete_timeframe }}</p>
                            </div>
                            @if ($content->file || $content->link)
                                <div>
                                    @if ($content->file)
                                        <div>
                                            <a href="{{ $content->file }}" target="_blank">View File</a>
                                        </div>
                                    @endif

                                    @if ($content->file)
                                        <a href="{{ $content->link }}" target="_blank">Attached Link</a>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>



            @if ($content->video)
                <div class="col-md-12 mb-2">
                    <div class="video-container">
                        <video src="{{ $content->video }}" autoplay controls></video>
                    </div>
                </div>
            @endif


            <div class="col-md-12">
                @if ($content->transcript)
                    <div class="card overview-sec">
                        <div class="card-body">
                            <h5 class="subs-title">Transcript</h5>
                            {!! $content->transcript !!}
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>
@endsection
