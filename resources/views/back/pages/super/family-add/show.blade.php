@extends('back.layout.admin-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'famille')

@section('content')


    <div class="row">
        @include('back.pages.include.alert-success')
        <div>

                <h4>Description de {{$admin->name_admin}} en fonction de article</h4>
                <div class="justify-content-center">
                    <table id="example" class="table table-striped" style="width:100%">

                        <thead class="gridjs-thead">
                            <tr class="gridjs-tr">
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Article</th>
                            </tr>
                        </thead>
                        <tbody class="gridjs-tbody">                       
                            <tr class="gridjs-tr">
                                <td class="gridjs-td"><h6>{{$admin->name_admin}}</h6></td>
                                <td class="gridjs-td"><h6>{{$admin->email}}</h6></td>
                                <td class="gridjs-td">
                                    @foreach ($families as $familie)
                                        <ul>
                                            <li style="color: #3de037">
                                                {{$familie->label_family}} 
                                            </li>
                                        </ul>
                                                                       
                                    @endforeach
                                </td>
     
                            </tr>
                           
    
                        </tbody>
                    </table>

                </div>


        </div>
        <h4 class="my-4">Modifier l'article de {{$admin->name_admin}}</h4>
        @include('back.pages.include.card.card-role', ['datas'=>$families])
    </div>



@endsection
