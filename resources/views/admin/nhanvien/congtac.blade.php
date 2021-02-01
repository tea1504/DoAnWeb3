<table class="table">
    <theah class="thead-light">
        <tr>
            <th>Từ tháng năm đến tháng năm</th>
            <th>Chức danh, chức vụ, đơn vị công tác (đảng, chính quyền, đoàn thể, tổ chức xã hội), kể cả thời gian được đào tạo, bồi dưỡng về chuyên môn, nghiệp vụ,…</th>
        </tr>
    </theah>
    <tbody>
        @foreach($nv->dsQuaTrinhCongTac as $ct)
            <tr>{{$ct}}
                <td>{{$ct->qtct_tuNgay}} - {{$ct->qtct_denNgay}}</td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>