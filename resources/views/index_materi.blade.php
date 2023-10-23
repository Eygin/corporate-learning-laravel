@include('header',['page'=>'Materi' ])
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Materi</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        <br>
                        <br>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        <br>
                        <br>
                    @endif
                    @role('super admin')
                        <a href="{{ URL('/materi/add') }}" class="btn btn-success btn-sm float-right">Tambah Materi</a><br><br>
                    @endrole
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-category">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Judul</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($materi as $key => $pdf)                                            
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $pdf->category->name }}</td>
                                                <td>{{ $pdf->title }}</td>
                                                <td>{{ date('d M Y', strtotime($pdf->created_at)) }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ URL('materi/'.$pdf->materi_id.'/show') }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                                        @role('super admin')
                                                            <a href="{{ URL('materi/'.$pdf->materi_id.'/edit') }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                                            <a href="{{ URL('materi/'.$pdf->materi_id.'/delete') }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                        @endrole
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <!-- /.col-lg-8 -->
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@include('footer')

<script>
    $(document).ready(function () {
        $('#dataTables-category').DataTable({
            responsive: true
        });
    });
</script>