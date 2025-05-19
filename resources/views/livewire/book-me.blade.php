<div class="shadow-sm p-3 mb-5 bg-white rounded">

    <div class="d-flex justify-content-between mb-2 mt-2">
        <h2>Why Book Me</h2>
        <div>
            <span wire:loading wire:target="save">
                <i class="fa fa-spinner fa-spin"></i> Saving...
            </span>
            <button type="button" class="btn btn-dark btn-sm" wire:click="save" wire:loading.attr="disabled">Save </button>
        </div>
    </div>

    <div wire:ignore>
        <textarea name="why_book_me" id="why_book_me"  id="" cols="30" rows="10" wire:model="why_book_me"></textarea>
    </div>

</div>

@push('page-js')


    <script>
        $(document).ready(function () {
            $('#why_book_me').summernote({
                height: 200,
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('why_book_me', contents);
                    }
                }
            });
        });

    </script>

@endpush
