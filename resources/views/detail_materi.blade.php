@include('header',['page'=> 'Detail Materi'])
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Detail Materi</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div id="alert-error">
    
                                    </div>
                                    <br>
                                    <form role="form" method="POST" id="formCreateMateri">
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input class="form-control" name="title" type="text" value="{{ $materi->title }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori Materi</label>
                                            <input class="form-control" name="title" type="text" value="{{ $materi->category->name }}" readonly>
                                        </div>
                                        <br>
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-member">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Path</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($materi->materiFile as $key => $file)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td onclick="openPdf('{{ $file->materi_file_id }}')"><a href="javascript:void(0)">{{ $file->path }}</a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <br>
                                        <a class="btn btn-default" href="{{ URL('/materi') }}">Kembali</a>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
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
    $("form#formCreateMateri").submit(function(event) {
        event.preventDefault();
        console.log($(this).data('url'))
        let form = $('#formCreateMateri')
        let formData = new FormData(form[0])

        $.ajax({
            type: "POST",
            url: $(this).data('url'),
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function(val) {
                window.location.href = "{{ URL('/materi') }}"
            },
            error: function(error) {
                console.log(error);
                if(error.status===422){
                    var message = "";
                    $.each(error.responseJSON.errors, function (key, val) {
                        message += "<span class='text-danger'>* " + val + "</span><br>";
                    });
                    $('#alert-error').html(`
                    <div class="alert alert-danger">
                        ${message}
                    </div>
                    `)
                }
            }
        })
    })

    function openPdf(materi_id_name) {
        let filename = materi_id_name
        window.location.href = `{{ URL('/materi/show-pdf/${filename}') }}`
    }
</script>