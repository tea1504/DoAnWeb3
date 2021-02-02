@if(count($nv->dsQuaTrinhCongTac) > 0)
<table class="table table-bordered">
    <theah class="thead-light">
        <tr>
            <th>Từ tháng năm đến tháng năm</th>
            <th>Chức danh, chức vụ, đơn vị công tác (đảng, chính quyền, đoàn thể, tổ chức xã hội), kể cả thời gian được đào tạo, bồi dưỡng về chuyên môn, nghiệp vụ,…</th>
        </tr>
    </theah>
    <tbody>
        @foreach($nv->dsQuaTrinhCongTac as $ct)
            <tr>    
                <td>{{$ct->qtct_tuNgay}} - {{$ct->qtct_denNgay}}</td>
                <td>chức vụ : {{$ct->chucvu_qtct->cvu_ten}}, đơn vị công tác: {{$ct->donvi_qtct->dv_ten}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@else
Chưa có dữ liệu
@endif
