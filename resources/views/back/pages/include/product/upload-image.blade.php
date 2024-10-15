@php
    $title ??= 'Image des Chaussure';
    $describ ??= 'Ajouter des images de Chaussures';
@endphp


@push('stylesheets')
     <!-- App favicon -->
     <link rel="shortcut icon" href="/backassets/images/favicon.ico">

     <!-- Plugins css -->
     <link href="/back/assets/libs/dropzone/dropzone.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="/back/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/back/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/back/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


@endpush


                <div class="page-content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">{{$title}}</h4>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-title-desc">{{$describ}}
                                        </p>
                                        <div>
                                            <form action="#" class="dropzone">
                                                <div class="fallback">
                                                    <input name="file" type="file" multiple="multiple">
                                                </div>
                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="display-4 text-muted bx bx-cloud-upload"></i>
                                                    </div>
    
                                                    <h5>Click sur le cadre pour inséré une image.</h5>
                                                </div>
                                            </form>
                                        </div>
    
                                        <div class="text-center mt-4">
                                            <button type="button" class="btn btn-primary waves-effect waves-light">Send
                                                Image</button>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->


@push('scripts')

 <!-- JAVASCRIPT -->
 <script src="/back/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="/back/assets/libs/metismenujs/metismenujs.min.js"></script>
 <script src="/back/assets/libs/simplebar/simplebar.min.js"></script>
 <script src="/back/assets/libs/eva-icons/eva.min.js"></script>
 
 <!-- Plugins js -->
 <script src="/back/assets/libs/dropzone/dropzone.js"></script>

 <script src="/back/assets/js/app.js"></script>
    
@endpush
