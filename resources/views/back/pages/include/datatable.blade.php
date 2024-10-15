




<table id="example" class="table table-striped" style="width:100%">

    <thead class="gridjs-thead">
        <tr class="gridjs-tr">
            @php
                // Obtenez les clés d'attribut du premier élément de la collection (si disponible)
                // $firstAdmin = $tables->first();
                // $attributes = $firstAdmin ? array_keys($data) : [];
                $add ??=null;
                $attributes=$data;
                $keys=array_keys($data);
                $url='/'.request()->path();
                $val ??='';


            @endphp

            @foreach ($attributes as $attribute)
                <th>
                    <div class="gridjs-th-content">{{ ucfirst($attribute) }}</div>
                    <button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending"
                        class="gridjs-sort gridjs-sort-neutral"></button>
                </th>
            @endforeach
                
            {{-- @if ($add==! null)
                <th>
                    <div class="gridjs-th-content">{{$add}}</div>
                    <button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending"
                        class="gridjs-sort gridjs-sort-neutral"></button>
                </th>                
            @endif --}}

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
                    @if (($add ==! null)&& ($key==='add'))               

                        <td class="gridjs-td">
                            <a href="{{ $url.'/'.$value->id  }}/add" class="col-xl-3 col-lg-4 col-sm-6 mx-auto rounded bg-primary">

                                <div class="col-xl-3 col-lg-4 col-sm-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="eva eva-plus-outline icon nav-icon"><g data-name="Layer 2"><g data-name="plus"><rect width="24" height="24" transform="rotate(180 12 12)" opacity="0"></rect><path d="M19 11h-6V5a1 1 0 0 0-2 0v6H5a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2z"></path></g></g></svg>
                                    
                                </div>
                            </a>
                            {{ $value->$key }}
                        </td>                    
                    @else
                        @if (($val==!'')&& ($key===$val))
                            <td class="gridjs-td">{{ $value->findMode($value->$key) }}</td> 
                            @else
                            <td class="gridjs-td">{{ $value->$key }}</td>

                        @endif
                    @endif
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
