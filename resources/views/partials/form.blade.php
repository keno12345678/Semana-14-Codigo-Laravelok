@csrf
    <tr>
        <td colspan="2">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customfile" name="image">
                <label class="custom-file-label" for="customFile">Seleccione archivo</label>
            </div>
        </td>
    </tr>
    <tr>
        <th>Categoría</th>
        <td>
            <select name="category_id" id="category_id">
                <option value="">Seleccione</option>
                    @foreach ($categories as $id => $name)
                        <option value="{{ $id }}"
                        @if($id == old('category_id', $servicio->category_id)) selected @endif
                        >{{ $name }}</option>
                    @endforeach
            </select>
            @error('category_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </td>
    </tr>
    <tr>
        <th>Titulo</th>
        <td><input type="text" name="titulo" value="{{ old('titulo', $servicio->titulo) }}"></td>
    </tr>
    <tr>
        <th>Descripcion</th>
        <td><input type="text" name="descripcion" value="{{ old('titulo', $servicio->descripcion)}}"></td>
    </tr>
    <tr>
        <td colspan="2" align="center"><button>{{$btnText}}</button></td>
    </tr>
