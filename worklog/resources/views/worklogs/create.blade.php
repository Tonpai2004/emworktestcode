<form method="POST" action="{{ route('worklogs.store') }}">
    @csrf
    <!-- เพิ่มฟอร์มตามที่ต้องการ -->
    <button type="submit">บันทึก</button>
</form>
