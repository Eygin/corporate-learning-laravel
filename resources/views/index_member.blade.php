@include('header',['page'=>'Member' ])
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Member</h1>
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
                        <a href="{{ URL('/member/add') }}" class="btn btn-success btn-sm float-right">Tambah Member</a><br><br>
                    @endrole
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-member">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Kategori Materi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($member as $key => $user)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ date('d M Y', strtotime($user->created_at)) }}</td>
                                                <td>{{ !empty($user->category) ? $user->category->name : '-' }}</td>
                                                <td>
                                                    @role('super admin')
                                                        <div class="btn-group">
                                                            <a href="" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                                            <a href="{{ URL('member/'.$user->id.'/edit') }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                                            <a href="{{ URL('member/'.$user->id.'/delete') }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    @elserole('member')
                                                        Tidak ada aksi
                                                    @endrole
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
        $('#dataTables-member').DataTable({
            responsive: true
        });
    });
</script>