<div class="shadow-sm p-3 mb-5 bg-white rounded">

    <div class="d-flex justify-content-between mb-2 mt-2">
        <h2>My Speaking Highlights</h2>
        <div>
            <span wire:loading wire:target="save">
                <i class="fa fa-spinner fa-spin"></i> Saving...
            </span>
            <button type="button" class="btn btn-dark btn-sm" wire:click="save" wire:loading.attr="disabled">Save </button>
        </div>
    </div>

    <div wire:ignore>
        <textarea name="speaking_highlights" id="speaking_highlights"  id="" cols="30" rows="10" wire:model="speaking_highlights"></textarea>
    </div>

</div>

@push('page-js')


    <script>
        $(document).ready(function () {
            $('#speaking_highlights').summernote({
                height: 200,
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('speaking_highlights', contents);
                    }
                }
            });
        });

    </script>

@endpush
