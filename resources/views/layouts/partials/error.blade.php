@if ($errors->any())
<div aria-live="polite" aria-atomic="true" class="flex-column justify-content-center align-items-center" style="position: fixed; top:0; right:0; z-index: 100000;">
    @foreach ($errors->all() as $error)
    <div class="toast bg-danger m-2" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="{{asset('storage/images/shin.gif')}}" class="rounded mr-2 bg-light" height="30px" alt="...">
            <strong class="mr-auto">Lỗi</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close" style="outline: none;">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            {{ $error }}
        </div>
    </div>
    @endforeach
</div>
@endif