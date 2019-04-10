<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="my-input">Provinsi</label>
            <select name="provinsi" class="form-control provinsi" id="provinsi">

            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="my-input">Kabupaten</label>
            <select name="kabupaten" class="form-control kabupaten" id="kabupaten">

            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="my-input">Kecamatan</label>
            <select name="kecamatan" class="form-control kecamatan" id="kecamatan">

            </select>
            <!-- <input name="no_hp" class="form-control" type="text" value="<?= $profil->no_hp ?>"> -->
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="my-input">Kode Pos</label>
            <input name="kode_pos" class="form-control" type="text" value="">
        </div>
    </div>
</div>

<script>
    api_provinsi();

    function api_provinsi() {
        var tag = '';
        // var id = [];
        $.ajax({
            type: "GET",
            url: "https://x.rajaapi.com/MeP7c5neWUMIwzSsHDFYOH1JS6IOeZ5jObZ6VAZ2UOPVhRDR2Pin9UfHuE/m/wilayah/provinsi",
            dataType: "JSON",
            success: function(data) {
                for (var index = 0; index < data['data'].length; index++) {
                    tag += '<option value="' + data['data'][index].id + '">' + data['data'][index].name + '</option>';
                    // id += [data['data'][index].id];

                }
                $('.provinsi').html(tag);
            }
        });
        $('.provinsi').click(function() {
            var tag = '';
            id = $('#provinsi').val();
            $.ajax({
                type: "GET",
                url: "https://x.rajaapi.com/MeP7c5neWUMIwzSsHDFYOH1JS6IOeZ5jObZ6VAZ2UOPVhRDR2Pin9UfHuE/m/wilayah/kabupaten?idpropinsi=" + id,
                dataType: "JSON",
                success: function(data) {
                    for (var index = 0; index < data['data'].length; index++) {
                        tag += '<option value="' + data['data'][index].id + '">' + data['data'][index].name + '</option>';
                        // id += [data['data'][index].id];

                    }
                    $('.kabupaten').html(tag);

                }
            });
        });
        $('.kabupaten').click(function() {
            var tag = '';
            id = $('#kabupaten').val();
            $.ajax({
                type: "GET",
                url: "https://x.rajaapi.com/MeP7c5neWUMIwzSsHDFYOH1JS6IOeZ5jObZ6VAZ2UOPVhRDR2Pin9UfHuE/m/wilayah/kecamatan?idkabupaten=" + id,
                dataType: "JSON",
                success: function(data) {
                    for (var index = 0; index < data['data'].length; index++) {
                        tag += '<option value="' + data['data'][index].id + '">' + data['data'][index].name + '</option>';
                        // id += [data['data'][index].id];

                    }
                    $('.kecamatan').html(tag);

                }
            });
        })
    }
</script>
