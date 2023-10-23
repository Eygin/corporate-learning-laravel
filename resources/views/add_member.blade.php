@include('header',['page'=> $created ? 'Tambah Member' : 'Edit Member'])
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ $created ? 'Tambah Member' : 'Edit Member' }}</h1>
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
                                    <form role="form" method="POST" id="formCreateMember" data-url="{{ $created ? URL("member/store") : URL('member/'.$user->id.'') }}">
                                        @csrf
                                        @if (!$created)
                                            @method('put')
                                        @endif
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" type="text" value="{{ $created ? '' : $user->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" type="email" value="{{ $created ? '' : $user->email }}">
                                        </div>
                                        <br>
                                        @if ($created)
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                            </div>
                                            <div class="form-group">
                                                <label>Konfirmasi Password</label>
                                                <input class="form-control" placeholder="Konfirmasi Password" name="confirm_password" type="password" value="">
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label>Kategori Materi</label>
                                            <select class="form-control" name="category_id">
                                                <option value="">--- Pilih Kategori Materi ---</option>
                                                @foreach ($category as $kategori)
                                                    <option value="{{ $kategori->category_id }}" {{ !$created ? ($kategori->category_id == $user->category_id ? 'selected' : '' ): '' }}>{{ $kategori->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>
                                        <br>
                                        <button type="submit" class="btn btn-default">Submit</button>
                                        <a class="btn btn-default" href="{{ URL('/member') }}">Kembali</a>
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
    $("form#formCreateMember").submit(function(event) {
        event.preventDefault();

        let form = $('#formCreateMember')
        let formData = new FormData(form[0])
        $.ajax({
            type: "POST",
            url: $(this).data('url'),
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function(val) {
                window.location.href = "{{ URL('/member') }}"
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