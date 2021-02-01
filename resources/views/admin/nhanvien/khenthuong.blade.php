<form>
    <h2>Khen thưởng</h2>
    @if(count($nv->dsKhenThuong) > 0)
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Lý do</th>
                <th>Người ký</th>
                <th>Ngày ký</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nv->dsKhenThuong as $kt)
            <tr>
                <td>{{$kt->kt_lyDo}}</td>
                <td>{{$kt->nguoiKy->nv_hoTen}}</td>
                <td>{{$kt->kt_ngayKy->format('d/m/Y')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    Không có khen thưởng
    @endif
    <h2>Kỷ luật</h2>
    @if(count($nv->dsKyLuat) > 0)
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Lý do</th>
                <th>Người ký</th>
                <th>Ngày ký</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nv->dsKyLuat as $kl)
            <tr>
                <td>{{$kl->kl_lyDo}}</td>
                <td>{{$kl->nguoiKy->nv_hoTen}}</td>
                <td>{{$kl->kl_ngayKy->format('d/m/Y')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    Không có kỷ luật
    @endif
</form>