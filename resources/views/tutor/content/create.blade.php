@extends('tutor.layout.app')

@section('title')
Add content to {{$module->title}}
@endsection

@section('body')
    <div class="col-md-9">
        <div class="card">

            <div class="widget-set">
                <div class="widget-setcount">
                    <h3>Add content to {{$module->title}} - {{$module->course->title}}</h3>
                </div>
                <div class="widget-content">
                    <div class="add-course-info">
                        <div class="py-3 px-4">

                            <x-success-alert />

                            <form action="{{ route('tutor.module.content.store', $module->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="input-block">
                                    <label class="add-course-label">Title</label>
                                    <input required name="title" value="{{ old('title') }}" type="text"
                                        class="form-control" placeholder="Title">

                                    <x-error-message record="title" />
                                </div>

                                <div class="input-block">
                                    <label class="add-course-label">Complete timeframe (minutes)</label>
                                    <input required name="complete_timeframe" value="{{ old('complete_timeframe') }}" type="text"
                                        class="form-control" placeholder="01:20">

                                    <x-error-message record="complete_timeframe" />
                                </div>

                                <div class="input-block">
                                    <label class="add-course-label">Video (Optional)</label>
                                    <input name="video" accept="video/mp4, video/3gp" type="file" class="form-control">

                                    <x-error-message record="video" />
                                </div>

                                <div class="input-block">
                                    <label class="add-course-label">Pdf File (Optional)</label>
                                    <input name="file" accept="application/pdf" type="file" class="form-control">

                                    <x-error-message record="file" />
                                </div>

                                <div class="input-block">
                                    <label class="add-course-label">Link (Optional)</label>
                                    <input name="link" value="{{ old('link') }}" type="url"
                                        class="form-control" placeholder="https://youtube.com/watch?=999990990909">

                                    <x-error-message record="link" />
                                </div>

                                <div class="input-block mb-0">
                                    <label class="add-course-label">Transcript</label>
                                    <input id="description" type="hidden" name="transcript">

                                    <div id="editor">{!! old('transcript') !!}</div>

                                    <x-error-message record="transcript" />
                                </div>


                                <div class="mt-4">
                                    <button class="btn btn-danger">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection


@section('extra-scripts')
    <script>
        CKEDITOR.replace('editor');

        // Get the hidden input where CKEditor content will be stored
        const descriptionInput = document.getElementById('description');

        // Listen for any changes in CKEditor content
        CKEDITOR.instances.editor.on('change', function() {
            // Get the data from CKEditor and set it to the hidden input
            descriptionInput.value = CKEDITOR.instances.editor.getData();
            console.log('CKEditor content :>> ', CKEDITOR.instances.editor.getData());
        });
    </script>
@endsection
