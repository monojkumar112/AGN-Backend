<div class="shadow-sm p-3 mb-5 bg-white rounded">

    <div class="d-flex justify-content-between mb-2 mt-2">
        <h2>Topics I Speak On</h2>
        <div>
            <span wire:loading wire:target="save">
                <i class="fa fa-spinner fa-spin"></i> Saving...
            </span>
            <button type="button" class="btn btn-dark btn-sm" wire:click="save" wire:loading.attr="disabled">Save </button>
        </div>
    </div>

    <div wire:ignore>
        <textarea name="topics_i_speak_on" id="topics_i_speak_on"  id="" cols="30" rows="10" wire:model="topics_i_speak_on"></textarea>
    </div>

</div>

@push('page-js')


    <script>
        $(document).ready(function () {
            $('#topics_i_speak_on').summernote({
                height: 200,
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('topics_i_speak_on', contents);
                    }
                }
            });
        });

    </script>

@endpush
