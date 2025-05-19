<div>
    <h2>Testimonials</h2>
    <div class="row mt-4">
        <div class="col-12">
            <div class="shadow p-3 mb-5 bg-white rounded">

                <div class="card-box table-responsive">

                    <div class="d-flex justify-content-between">
                        <h4 class="m-t-0 header-title pb-3">Testimonials <Strong>( @isset($fetch_data)
                           {{  count($fetch_data) }}
                        @endisset )</Strong></h4>
                        <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropTestimonial">
                            Create Testimonial
                        </button>
                    </div>
                    <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#Sl</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Author</th>
                            <th>Created Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>2
                        <tbody>
                            @isset($fetch_data)
                                @foreach($fetch_data as $key=>$item)
                                <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->title ?? '' }}</td>
                                <td class="description-cell">{{ $item->description ?? '' }}</td>
                                <td>{{ $item->author ?? '' }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                                <td>

                                    <button type="button" class="btn btn-danger btn-sm"  wire:click="deleteItem({{ $item->id }})">
                                    <i class="zmdi zmdi-delete"></i>
                                    </button>

                                </td>
                                </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>


                <!--Testimonial Modal -->
                <div wire:ignore.self class="modal fade" id="staticBackdropTestimonial" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Create a New Testimonial</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>



                            <div class="modal-body">
                                <form wire:submit.prevent="save" class="modal-body">
                                    <div class="form-container">
                                        <!-- Display success message -->
                                        @if (session()->has('message'))
                                            <div class="alert alert-success ">
                                                {{ session('message') }}
                                            </div>
                                        @endif
                                        <!-- Title Field -->
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" wire:model="title" class="form-control" id="title" placeholder="Enter title" required>
                                            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <!-- Description Field -->
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea wire:model="description" class="form-control"  rows="4" placeholder="Enter description" required></textarea>
                                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>



                                        <!-- Author Field -->
                                        <div class="mb-3">
                                            <label for="author" class="form-label">Author</label>
                                            <input type="text" wire:model="author" class="form-control" id="author" placeholder="Enter author name" required>
                                            @error('author') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="modal-footer justify-content-between gap-2 ">
                                        <button type="submit" class="btn btn-primary col-7 p-2 m-0">Save</button>
                                        <button type="button" class="btn btn-secondary col-4 p-2 m-0" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>

                                {{-- <div>
                                    <h3>Previous Data:</h3>
                                    <pre>{{ json_encode($previousData, JSON_PRETTY_PRINT) }}</pre>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>


                <!-- modal end  -->

            </div>
        </div>

    </div>



</div>
