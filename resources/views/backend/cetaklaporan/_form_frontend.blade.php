<form method="get" action="{{ route('keuangan.search') }}">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="form-group">
                <label>Dari Tanggal</label>
                <input type="date" name="dari" class="form-control" value="{{ $dari }}">
                @if($errors->has('dari'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('dari') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">

                <label>Sampai Tanggal</label>
                <input type="date" name="sampai" class="form-control" value="{{ $sampai }}">

                @if($errors->has('sampai'))
                    <span class="text-danger">
                <strong>{{ $errors->first('sampai') }}</strong>
            </span>
                @endif

            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">

                <label>Kategori</label>
                <select class="form-control" name="kategori">
                    <option value="semua">- Semua Kategori</option>
                    @foreach($kategori as $k)
                        <option <?php if($k->id == $kat){echo "selected='selected'";} ?> value="{{ $k->id }}">{{ $k->kategori }}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <div class="col-md-2">
                <div class="form-group">
                    <label style="color:#ECF0F5">.</label>
                    <input type="submit" class="form-control btn btn-primary mt-4" value="Tampilkan">
                </div>
        </div>

    </div>
</form>

<hr>