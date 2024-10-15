




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
                $pivot ??='';
               

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
                    @if ($key===('roles'|| $pivot))             
                            @php
                                $pivot ??='roles'
                            @endphp
                        <td class="gridjs-td">
                            {{$value->$pivot()->count()}}
                        </td>                    
                    @else
                        <td class="gridjs-td">{{ $value->$key }}</td>
                    @endif
                @endforeach

                    <td class="gridjs-td">
                        <div class="row">
                        <a href="{{ $url.'/'.$value->id }}/show" class="col-xl-6 col-lg-6 col-sm-8 mx-auto rounded bg-danger">
                            <div class="align-items-center">
                                <i>Détail</i>
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
