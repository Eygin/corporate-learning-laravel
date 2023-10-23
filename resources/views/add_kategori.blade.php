@include('header',['page'=> $created ? 'Tambah Kategori' : 'Edit Kategori'])
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ $created ? 'Tambah' : 'Edit'}} Kategori</h1>
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
                                    <form role="form" method="POST" id="formCreateKategori" data-url="{{ $created ? URL("kategori/store") : URL('kategori/'.$category->category_id.'') }}">
                                        @csrf
                                        @if (!$created)
                                            @method('put')
                                            <input class="form-control" type="hidden" name="category_id" value="{{ $category->category_id }}">
                                        @endif
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" type="text" value="{{ $created ? '' : $category->name }}">
                                        </div>
                                        <br>
                                        <br>
                                        <button type="submit" class="btn btn-default">Submit</button>
                                        <a class="btn btn-default" href="{{ URL('/kategori') }}">Kembali</a>
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
    $("form#formCreateKategori").submit(function(event) {
        event.preventDefault();
        console.log($(this).data('url'))
        let form = $('#formCreateKategori')
        let formData = new FormData(form[0])

        $.ajax({
            type: "POST",
            url: $(this).data('url'),
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function(val) {
                window.location.href = "{{ URL('/kategori') }}"
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
</script>