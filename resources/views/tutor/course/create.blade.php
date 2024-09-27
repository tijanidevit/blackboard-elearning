@extends('tutor.layout.app')

@section('title')
    Add Course
@endsection

@section('body')
    <div class="col-md-9">
        <div class="card">

            <div class="widget-set">
                <div class="widget-setcount">
                    <h3>Add a new course</h3>
                </div>
                <div class="widget-content">
                    <div class="add-course-info">
                        <div class="py-3 px-4">
                            <form action="{{ route('tutor.course.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="input-block">
                                    <label class="add-course-label">Title</label>
                                    <input required name="title" value="{{ old('title') }}" type="text"
                                        class="form-control" placeholder="Course Title">

                                    <x-error-message record="title" />
                                </div>

                                <div class="input-block">
                                    <label class="add-course-label">Tagline</label>
                                    <input required name="tagline" value="{{ old('tagline') }}" type="text"
                                        class="form-control" placeholder="Course Tagline">

                                    <x-error-message record="tagline" />
                                </div>

                                <div class="input-block">
                                    <label class="add-course-label">Preview Video Link (Optional)</label>
                                    <input name="preview_video_url" value="{{ old('preview_video_url') }}" type="url"
                                        class="form-control" placeholder="https://youtube.com/watch?=999990990909">

                                    <x-error-message record="preview_video_url" />
                                </div>

                                <div class="input-block">
                                    <label class="add-course-label">Image</label>
                                    <input required name="image" accept="image/*" type="file" class="form-control">

                                    <x-error-message record="image" />
                                </div>

                                <div class="input-block">
                                    <label class="add-course-label">Cover Image</label>
                                    <input required name="cover_image" accept="image/*" type="file" class="form-control">

                                    <x-error-message record="cover_image" />
                                </div>

                                <div class="input-block">
                                    <label class="add-course-label">Category</label>
                                    <select name="category" class="form-control select" required>
                                        <option selected disabled>Select a category</option>

                                        @forelse ($categories as $category)
                                            <option @selected(old('category') == $category) value="{{ $category }}">
                                                {{ $category }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                    <x-error-message record="category" />
                                </div>

                                <div class="input-block mb-0">
                                    <label class="add-course-label">Description</label>
                                    <input id="description" type="hidden" name="description">

                                    <div id="editor">{!! old('description') !!}</div>

                                    <x-error-message record="description" />
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
