@extends('back.layout.super-layout.pages-layout')

@section('titlePage', isset($titlePage) ? $titlePage: 'Compte')


@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Abonnement des admins</h5>
                </div>
                <div class="card-body">

                    <form action="{{ route('super.subStore') }}" method="POST" class="row gy-2 gx-3 align-items-center">
                        @csrf


                        {{-- <div class="col-sm-auto">
                            <label class="visually-hidden" for="autoSizingInput">Code Abonnez</label>
                            <input type="text" class="form-control" id="autoSizingInput" placeholder="Code Abonnez">
                        </div> --}}

                        <div class="col-sm-auto">
                            <label class="visually-hidden" for="autoSizingInput">Date Debut</label>
                            <input type="date" name="date_debut" value="03-19-2024" class="form-control" id="autoSizingInput" placeholder="Date Debut">
                        </div>

                        <div class="col-sm-auto">
                            <label class="visually-hidden" for="autoSizingInput">Date Fin</label>
                            <input type="date" name="date_fin" value="03-19-2024" class="form-control" id="autoSizingInput" placeholder="Date Fin">
                        </div>

                        <div class="col-sm-auto">
                            <label class="visually-hidden" for="autoSizingSelect">Admin</label>
                            <select name="admin_id" class="form-select" id="autoSizingSelect">
                                <option selected="">Admin</option>
                                @forelse ( $admins as $admin)

                                    <option value="{{ $admin->id }}">{{$admin->id .' - '. $admin->name_admin }}</option>

                                @empty

                                @endforelse

                            </select>
                        </div>

                        <div class="col-sm-auto">
                            <button type="submit" class="btn btn-primary w-md">Ajouter</button>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>

    {{-- Data table --}}


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List des Abonnements</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div id="table-gridjs">
                            <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                                <div class="gridjs-head">
                                    <div class="gridjs-search">
                                        <input type="search" placeholder="Type a keyword..." aria-label="Type a keyword..." class="gridjs-input gridjs-search-input">
                                    </div>
                                </div>
                                <div class="gridjs-wrapper" style="height: auto;">
                                <table role="grid" class="gridjs-table" style="height: auto;">
                                    <thead class="gridjs-thead">
                                        <tr class="gridjs-tr">
                                            <th data-column-id="name" class="gridjs-th gridjs-th-sort" tabindex="0" style="min-width: 88px; width: 135px;">
                                                <div class="gridjs-th-content">Code Abonné</div>
                                                <button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                            </th>
                                            <th data-column-id="email" class="gridjs-th gridjs-th-sort" tabindex="0" style="min-width: 188px; width: 288px;">
                                                <div class="gridjs-th-content">Date debut</div>
                                                <button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                            </th>
                                            <th data-column-id="position" class="gridjs-th gridjs-th-sort" tabindex="0" style="min-width: 248px; width: 380px;">
                                                <div class="gridjs-th-content">Date fin</div>
                                                <button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"> </button>
                                            </th>
                                            <th data-column-id="company" class="gridjs-th gridjs-th-sort" tabindex="0" style="min-width: 130px; width: 199px;">
                                                <div class="gridjs-th-content">Modification</div>
                                                <button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending" class="gridjs-sort gridjs-sort-neutral"></button>
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody class="gridjs-tbody">
                                        @forelse ($subscribes as $subscribe)
                                            <tr class="gridjs-tr">
                                                <td data-column-id="name" class="gridjs-td">{{ $subscribe->code_abonner }}</td>
                                                <td data-column-id="email" class="gridjs-td">{{ $subscribe->date_debut }}</td>
                                                <td data-column-id="position" class="gridjs-td">{{ $subscribe->date_fin }}</td>
                                                <td data-column-id="company" class="gridjs-td">{{ $subscribe->admin_id }}</td>
                                                <td data-column-id="country" class="gridjs-td">{{ $subscribe->updated_at }}</td>
                                            </tr>
                                        @empty

                                        @endforelse


                                    </tbody>
                                </table>
                            </div>
                            <div class="gridjs-footer">
                                <div class="gridjs-pagination">
                                    <div role="status" aria-live="polite" class="gridjs-summary" title="Page 1 of 2">Showing <b>1</b> to <b>5</b> of <b>10</b> results</div>
                                    <div class="gridjs-pages">
                                        <button tabindex="0" role="button" disabled="" title="Previous" aria-label="Previous" class="">Previous</button>
                                        <button tabindex="0" role="button" class="gridjs-currentPage" title="Page 1" aria-label="Page 1">1</button>
                                        <button tabindex="0" role="button" class="" title="Page 2" aria-label="Page 2">2</button><button tabindex="0" role="button" title="Next" aria-label="Next" class="">Next</button>
                                    </div>
                                </div>
                            </div>
                            <div id="gridjs-temp" class="gridjs-temp"></div>
                        </div>
                    </div>
                </div>
                    <!-- end card body -->
            </div>
                <!-- end card -->

@endsection
