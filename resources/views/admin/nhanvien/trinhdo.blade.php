<form>
    <div class="form-group row">
        <div class="col-md-6">
            <div class="row">
                <label class="col-lg-4 col-md-6 col-form-label">Lý luận chính trị : </label>
                <div class="col-lg-8 col-md-6">
                    <?php
                    $tenvbcc = '';
                    $trinhdovbcc = '';
                    foreach ($nv->dsVBCC as $vbcc) {
                        if ($vbcc->lvbcc_ma == 4) {
                            $tenvbcc = $vbcc->vbcc_ten;
                            $trinhdovbcc = $vbcc->vbcc_trinhDo;
                        }
                    }
                    $result = ($tenvbcc != '') ? (($trinhdovbcc != '') ? $tenvbcc . ' (' . $trinhdovbcc . ')' : $tenvbcc) : '';
                    ?>
                    <input type="text" class="form-control" value="{{$result}}" disabled>
                </div>
            </div>
        </div>
        <!-- End lý luận chính trị -->
        <div class="col-md-6">
            <div class="row">
                <label class="col-lg-4 col-md-6 col-form-label">Quản lý nhà nước : </label>
                <div class="col-lg-8 col-md-6">
                    <?php
                    $tenvbcc = '';
                    $trinhdovbcc = '';
                    foreach ($nv->dsVBCC as $vbcc) {
                        if ($vbcc->lvbcc_ma == 5) {
                            $tenvbcc = $vbcc->vbcc_ten;
                            $trinhdovbcc = $vbcc->vbcc_trinhDo;
                        }
                    }
                    $result = ($tenvbcc != '') ? (($trinhdovbcc != '') ? $tenvbcc . ' (' . $trinhdovbcc . ')' : $tenvbcc) : '';
                    ?>
                    <input type="text" class="form-control" value="{{$result}}" disabled>
                </div>
            </div>
        </div>
        <!-- End quản lý nhà nước -->
    </div>
    <!--End lý luận chính trị và quản lý nhà nước-->
    <div class="form-group row">
        <div class="col-md-6">
            <div class="row">
                <label class="col-lg-4 col-md-6 col-form-label">Ngoại ngữ : </label>
                <div class="col-lg-8 col-md-6">
                    <?php
                    $tenvbcc = '';
                    $trinhdovbcc = '';
                    foreach ($nv->dsVBCC as $vbcc) {
                        if ($vbcc->lvbcc_ma == 3) {
                            $tenvbcc = $vbcc->vbcc_ten;
                            $trinhdovbcc = $vbcc->vbcc_trinhDo;
                        }
                    }
                    $result = ($tenvbcc != '') ? (($trinhdovbcc != '') ? $tenvbcc . ' (' . $trinhdovbcc . ')' : $tenvbcc) : '';
                    ?>
                    <input type="text" class="form-control" value="{{$result}}" disabled>
                </div>
            </div>
        </div>
        <!-- End ngoại ngữ -->
        <div class="col-md-6">
            <div class="row">
                <label class="col-lg-4 col-md-6 col-form-label">Tin học : </label>
                <div class="col-lg-8 col-md-6">
                    <?php
                    $tenvbcc = '';
                    $trinhdovbcc = '';
                    foreach ($nv->dsVBCC as $vbcc) {
                        if ($vbcc->lvbcc_ma == 2) {
                            $tenvbcc = $vbcc->vbcc_ten;
                            $trinhdovbcc = $vbcc->vbcc_trinhDo;
                        }
                    }
                    $result = ($tenvbcc != '') ? (($trinhdovbcc != '') ? $tenvbcc . ' (' . $trinhdovbcc . ')' : $tenvbcc) : '';
                    ?>
                    <input type="text" class="form-control" value="{{$result}}" disabled>
                </div>
            </div>
        </div>
        <!-- End tin học -->
    </div>
    <!--End ngoại ngữ và tin học-->
</form>
<hr>
<table class="table table-bordered">
    <caption class="text-center">Bảng đào tạo, bồi dưỡng về chuyên môn, nghiệp vụ, lý luận chính trị, ngoại ngữ, tin học</caption>
    <thead class="thead-light">
        <tr>
            <th>Tên trường</th>
            <th>Chuyên ngành đào tạo, bồi dưỡng</th>
            <th class="text-center">Từ tháng, năm đến tháng, năm</th>
            <th class="text-center">Hình thức đào tạo</th>
            <th class="text-center">Văn bằng, chứng chỉ, trình độ gì</th>
        </tr>
    </thead>
    <tbody>
        @foreach($nv->dsVBCC as $vbcc)
        <tr>
            <td>{{$vbcc->vbcc_tenTruong}}</td>
            <td>{{$vbcc->vbcc_ten}}</td>
            <td class="text-center">{{$vbcc->vbcc_tuNgay}} - {{$vbcc->vbcc_denNgay}}</td>
            <td class="text-center">{{$vbcc->vbcc_hinhThuc}}</td>
            <td class="text-center">{{$vbcc->vbcc_trinhDo}}</td>
        </tr>
        @endforeach
    </tbody>
</table>