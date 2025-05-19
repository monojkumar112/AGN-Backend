<div class="shadow-sm p-3 mb-5 bg-white rounded">

    <div class="d-flex justify-content-between mb-2 mt-2">
        <h2>Let’s Inspire Together</h2>
        <div>
            <span wire:loading wire:target="save">
                <i class="fa fa-spinner fa-spin"></i> Saving...
            </span>
            <button type="button" class="btn btn-dark btn-sm" wire:click="save" wire:loading.attr="disabled">Save </button>
        </div>
    </div>

    <div wire:ignore>
        <textarea name="lets_inspire_together" id="lets_inspire_together"  id="" cols="30" rows="10" wire:model="lets_inspire_together"></textarea>
    </div>

</div>

@push('page-js')


    <script>
        $(document).ready(function () {
            $('#lets_inspire_together').summernote({
                height: 200,
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('lets_inspire_together', contents);
                    }
                }
            });
        });

    </script>

@endpush

