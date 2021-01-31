<form>
    <div class="form-group row">
        <div class="col-md-6">
            <div class="row">
                <label class="col-md-4 col-form-label">Ngạch công chức (viên chức) : </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" value="{{$nv->luong[0]->ngach_luong->ng_ten}}" disabled>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <label class="col-md-2 col-form-label">Mã ngạch : </label>
                <div class="col-md-10">
                    <input type="text" class="form-control" value="{{$nv->luong[0]->ngach_luong->ng_ma}}" disabled>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-4">
            <div class="row">
                <label for="" class="col-md-3 col-form-label">Bậc lương : </label>
                <div class="col-md-9"><input type="text" class="form-control" value="{{$nv->luong[0]->bac_luong->b_ten}}" disabled></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <label for="" class="col-md-3 col-form-label">Hệ số : </label>
                <div class="col-md-9"><input type="text" class="form-control" value="{{$nv->luong[0]->ngach_luong->ngach_nb->where('b_ma', $nv->luong[0]->bac_luong->b_ma)->first()->nb_heSoLuong}}" disabled></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <label for="" class="col-md-3 col-form-label">Ngày hưởng : </label>
                <div class="col-md-9"><input type="text" class="form-control" value="" disabled></div>
            </div>
        </div>
    </div>
</form>