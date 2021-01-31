<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th>Mối quan hệ</th>
            <th>Họ và tên</th>
            <th>Năm sinh</th>
            <th>Quê quán, nghề nghiệp, chức danh, chức vụ, đơn vị công tác, học tập, nơi ở (trong, ngoài nước);<br>thành viên các tổ chức chính trị - xã hội…?</th>
        </tr>
    </thead>
    <tbody>
        @foreach($nv->dsQuanHeGiaDinh as $qh)
        <tr>
            <td>{{$qh->qhgd_moiQuanHe}}</td>
            <td>{{$qh->qhgd_ten}}</td>
            <td>{{$qh->qhgd_namSinh}}</td>
            <td>
                Địa chỉ : {{$qh->qhgd_diaChi}}<br>
                Nghề nghiệp: {{$qh->qhgd_ngheNghiep}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>