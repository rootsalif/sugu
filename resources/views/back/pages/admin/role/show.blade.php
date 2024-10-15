@extends('back.layout.admin-layout.pages-layout')
@section('titlePage', isset($titlePage) ? $titlePage: 'role')

@section('content')


    <div class="row">
        @include('back.pages.include.alert-success')
        <div>

                <h4>Description de {{$user->name_user}} en fonction de role</h4>
                <div class="justify-content-center">
                    <table id="example" class="table table-striped" style="width:100%">

                        <thead class="gridjs-thead">
                            <tr class="gridjs-tr">
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody class="gridjs-tbody">                       
                            <tr class="gridjs-tr">
                                <td class="gridjs-td"><h6>{{$user->name_user}}</h6></td>
                                <td class="gridjs-td"><h6>{{$user->email}}</h6></td>
                                <td class="gridjs-td">
                                    @foreach ($roles as $role)
                                        <ul>
                                            <li style="color: #3de037">
                                                {{$role->label_role}} 
                                            </li>
                                        </ul>
                                                                       
                                    @endforeach
                                </td>
     
                            </tr>
                           
    
                        </tbody>
                    </table>

                </div>


        </div>
        <h4 class="my-4">Modifier le role de {{$user->name_user}}</h4>
        @include('back.pages.include.card.card-role', ['datas'=>$roles])
    </div>



@endsection
