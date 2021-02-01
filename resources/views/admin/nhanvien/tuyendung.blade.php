<form>
    <div class="form-group row">
        <label class="col-md-3 col-form-label">Cơ quan, đơn vị có thẩm quyền quản lý CBC : </label>
        <div class="col-md-9">
            <input type="text" class="form-control" value="{{$nv->tuyenDung->donVi->donViQuanLy->dvql_ten}}" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 col-form-label">Cơ quan, đơn vị sử dụng CBCC : </label>
        <div class="col-md-9">
            <input type="text" class="form-control" value="{{$nv->tuyenDung->donVi->dv_ten}}" disabled>
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label class="col-md-3 col-form-label">Nghề nghiệp trước khi được tuyển dụng : </label>
        <div class="col-md-9">
            <input type="text" class="form-control" value="{{$nv->tuyenDung->td_ngheTruocDay}}" disabled>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6">
            <div class="row">
                <label class="col-md-3 col-form-label">Ngày tuyển dụng : </label>
                <div class="col-md-9">
                    <input type="text" class="form-control" value="{{$nv->tuyenDung->td_ngay->format('d/m/Y')}}" disabled>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <label class="col-md-3 col-form-label">Cơ quan tuyển dụng : </label>
                <div class="col-md-9">
                    <input type="text" class="form-control" value="{{$nv->tuyenDung->td_coQuanTuyen}}" disabled>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Chức vụ hiện tại : </label>
        <div class="col-md-10">
            <input type="text" class="form-control" value="{{$nv->chucVu->cvu_ten}}" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Chức vụ khi tuyển : </label>
        <div class="col-md-10">
            <input type="text" class="form-control" value="{{$nv->tuyenDung->chucVu->cvu_ten}}" disabled>
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Công việc chính được giao : </label>
        <div class="col-md-10">
            <input type="text" class="form-control" value="{{$nv->tuyenDung->congViec->cv_ten}}" disabled>
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <label class="col-md-2 col-form-label">Sở trường công tác : </label>
        <div class="col-md-10">
            <input type="text" class="form-control" value="{{$nv->tuyenDung->td_soTruong}}" disabled>
        </div>
    </div>
</form>