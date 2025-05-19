<div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="shadow p-3 mb-5 bg-white rounded">

                <div class="table-responsive">

                    <div class="d-flex justify-content-between">
                        <h2>Recognition / Accolades</h2>
                        <div>
                            <button type="button" class="btn btn-dark btn-sm"  data-bs-toggle="modal" data-bs-target="#recognitionAccolades" >Create Watch </button>
                        </div>
                    </div>
                    <table id="responsive-watch-logo" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#Sl</th>
                            <th>Image</th>
                            <th>Created Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @isset($data)
                                @foreach($data as $key=>$item)
                                <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $item->image ?? '') }}" alt="" style="width: 50px; height: 50px;">
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm"  wire:click="deleteRecord({{ $item->id }})">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>

                                </td>
                                </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>


                <!--create Modal -->
                <div wire:ignore.self class="modal fade" id="recognitionAccolades" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered  modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Create a New Watch</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form  wire:submit.prevent="save" enctype="multipart/form-data">
                                    <div class="">
                                        {{-- images --}}
                                        <fieldset>
                                            <label for="image">Upload Product Image <span class="text-danger"><b>*</b></span> <span class="text-muted">Max-Size 1MB</span></label>

                                            <input wire:model="image" type="file" name="image"  id="image" class="dropify" data-default-file="{{ isset($data['image']) ? asset('storage/'. $data['image']) : '' }}" data-max-file-size="1M" />
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

                                    <div class="d-flex justify-content-end gap-2">
                                        <button class="btn btn-dark btn-sm mt-2 ">Save</button>
                                        <button type="button" class="btn btn-dark btn-sm mt-2" data-bs-dismiss="modal" aria-label="Close">Close</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal end  -->

            </div>
        </div>

    </div>



</div>

@push('page-js')

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
