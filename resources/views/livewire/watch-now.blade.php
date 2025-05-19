@push('page-css')
<!-- Form Uploads -->
<link href="{{ asset('assets/backend/plugins/fileuploads/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />

@endpush

<div class="shadow-sm p-3 mb-5 bg-white rounded">

    <div class="d-flex justify-content-between mb-2 mt-2">
        <h2>Watch Now</h2>
        <div>
            <span wire:loading wire:target="save">
                <i class="fa fa-spinner fa-spin"></i> Saving...
            </span>
            <button type="button" class="btn btn-dark btn-sm" wire:click="save" wire:loading.attr="disabled">Save </button>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-8">
            <fieldset>
                <label for="title">Title <span class="text-danger"><b>*</b></span></label>
                <input type="text" name="title" id="title" class="form-control" wire:model="title" placeholder="Write title here">
            </fieldset>
            @error('title')
                <div class="text-danger">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror

            <fieldset>
                <label for="video">Video Embedded<span class="text-danger"><b>*</b></span></label>
                <textarea class="form-control"  rows="5" name="video" wire:model="video" placeholder="Give video Embedded code "></textarea>
            </fieldset>
            @error('video')
                <div class="text-danger">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>
        <div class="col-md-4">
            <div class="">
                {{-- images --}}
                <fieldset>
                    <label for="image">Upload Product Image <span class="text-danger"><b>*</b></span> <span class="text-muted">Max-Size 1MB</span></label>

                    <input type="file" name="image"  id="image" class="dropify" data-default-file="{{ isset($data['image']) ? asset('storage/'. $data['image']) : '' }}" data-max-file-size="1M" />
                </fieldset>
                @error('image')
                    <div class="text-danger">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                @if ($image && $image instanceof \Livewire\TemporaryUploadedFile)
                    <div class="mt-2">
                        Photo Preview:
                        <img src="{{ $image->temporaryUrl() }}" class="img-fluid rounded shadow-sm" alt="preview" style="max-height:150px; width:auto;">
                    </div>
                @endif
            </div>
        </div>

    </div>

    <div wire:ignore>
        <label for="title">Description <span class="text-danger"><b>*</b></span></label>
        <textarea name="description" id="description"  id="" cols="30" rows="10" wire:model="description"></textarea>
    </div>

</div>

@push('page-js')
    <script>
        $(document).ready(function () {
            $('#description').summernote({
                height: 200,
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('description', contents);
                    }
                }
            });
        });

    </script>

{{-- image upload  --}}
    <!-- Switchery -->
    <script src="{{ asset('assets/backend/plugins/switchery/switchery.min.js') }}"></script>
    <!-- file uploads js -->
    <script src="{{ asset('assets/backend/plugins/fileuploads/js/dropify.min.js') }}"></script>
    <script>

            $('#image').on('change', function(e) {
                let file = e.target.files[0];
                @this.upload('image', file, (uploadedFilename) => {
                    // Success callback.
                    console.log(file);
                }, () => {
                    // Error callback.
                }, (event) => {
                    // Progress callback.
                });
            });


        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong appended.'
            },
            error: {
                'fileSize': 'The file size is too big (1M max).'
            }
        });

    </script>

@endpush
