<div class="shadow-sm p-3 mb-5 bg-white rounded">
    <div class="d-flex justify-content-between mb-2">
        <h2>Inspiring Change, Empowering Innovation</h2>
        <div>
            <span wire:loading wire:target="save"><i class="fa fa-spinner fa-spin"></i>Saving...</span>
            <button type="button" class="btn btn-dark btn-sm" wire:click="save" wire:loading.attr="disabled"> Save </button>
        </div>
    </div>

    <div wire:ignore>
        <textarea name="inspiring_input" id="description_inspiring"  id="" cols="30" rows="10" wire:model="inspiring_input"></textarea>
    </div>

</div>

@push('page-js')


    <script>
        $(document).ready(function () {
            $('#description_inspiring').summernote({
                height: 200,
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('inspiring_input', contents);
                    }
                }
            });
        });

    </script>

@endpush
