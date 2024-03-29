




<table id="example" class="table table-striped" style="width:100%">

    <thead class="gridjs-thead">
        <tr class="gridjs-tr">
            @php
                // Obtenez les clés d'attribut du premier élément de la collection (si disponible)
                // $firstAdmin = $tables->first();
                // $attributes = $firstAdmin ? array_keys($data) : [];
                $attributes=$data;
                $keys=array_keys($data);
                $url='/'.request()->path();


            @endphp

            @foreach ($attributes as $attribute)
                <th>
                    <div class="gridjs-th-content">{{ ucfirst($attribute) }}</div>
                    <button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending"
                        class="gridjs-sort gridjs-sort-neutral"></button>
                </th>
            @endforeach

            <th>
                <div class="gridjs-th-content">Action</div>
                <button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending"
                    class="gridjs-sort gridjs-sort-neutral"></button>
            </th>
        </tr>
    </thead>

    <tbody class="gridjs-tbody">
        @forelse ($tables as $value)
            <tr class="gridjs-tr">

                @foreach ($keys as $key)
                    <td class="gridjs-td">{{ $value->$key }}</td>
                @endforeach

                <td class="gridjs-td">
                    <div class="row">
                        <a href="{{ $url.'/'.$value->id  }}/edit" class="col-xl-3 col-lg-4 col-sm-6 mx-auto rounded bg-primary">
                            <div class="d-flex justify-content-between align-items-center">
                                    <i class="fas fa-user-edit"></i>
                            </div>
                        </a>
                        <a href="{{ $url.'/'.$value->id }}/delete" class="col-xl-3 col-lg-4 col-sm-6 mx-auto rounded bg-danger">
                            <div class="align-items-center">
                                <i class="fas fa-trash-alt"></i>
                            </div>
                        </a>
                    </div>
                </td>
            </tr>
        @empty
            <tr class="gridjs-tr">
                <td colspan="{{ count($attributes) + 1 }}">Aucune donnée trouvée</td>
            </tr>
        @endforelse
    </tbody>

</table>
