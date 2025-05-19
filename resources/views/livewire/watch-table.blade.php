<div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="shadow p-3 mb-5 bg-white rounded">

                <div class="table-responsive">

                    <div class="d-flex justify-content-between">
                        <h2>Watch Now </h2>
                        <div>
                            <button type="button" class="btn btn-dark btn-sm"  data-bs-toggle="modal" data-bs-target="#staticBackdropWatch" >Create Watch </button>
                        </div>
                    </div>
                    <table id="responsive-watch-table" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>#Sl</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Video</th>
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
                                <td>{{ $item->title ?? '' }}</td>
                                <td class="description-cell">{!! $item->description ?? '' !!}</td>
                                <td>{{ $item->video ?? '' }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $item->image ?? '') }}" alt="" style="width: 50px; height: 50px;">
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</td>
                                <td>

                                    {{-- <button type="button" class="btn btn-danger btn-sm"   wire:click="editRecord({{ $item->id }})"  data-bs-toggle="modal" data-bs-target="#staticBackdropWatchEdit" >
                                        <i class="zmdi zmdi-edit"></i>
                                    </button> --}}
                                    <a href="{{ route('admin.speaking-watch.edit', $item->id) }}" class="btn btn-danger btn-sm">
                                        <i class="zmdi zmdi-edit"></i>
                                    </a>
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
                <div wire:ignore.self class="modal fade" id="staticBackdropWatch" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Create a New Watch</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                               @livewire('watch-now')

                            </div>
                        </div>
                    </div>
                </div>

                <!-- modal end  -->

            </div>
        </div>

    </div>



</div>
