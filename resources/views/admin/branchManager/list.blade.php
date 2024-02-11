@extends('admin.layouts.master')
@section('content')
<div class="content p-4">
    <h2 class="mb-4" style="text-transform: uppercase;">Liste des Gestionnaires
        <a href="{{ route('branchmanager.create') }}" class="btn btn-primary btn-md float-right">
            <i class="fa fa-list"></i>   Ajouter un gestionnaire
        </a>
    </h2>
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12  mb-2">
                    <form method="GET" action="{{ route('branchmanager.index') }}" class="form-inline float-right">
                        @csrf
                        <div class="form-group">
                            &nbsp;<input type="text" class="form-control" name="search" placeholder="Rechercher" value="{{request()->search}}">
                        </div>&nbsp;
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Rechercher</button>
                    </form>
                </div>
            </div>
            <table id="table" class="table table-hover table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom & Prénom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Entrepôt</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($branchManagerList as $key=>$branchManager)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $branchManager->name. " ". $branchManager->firstname }}</td>
                        <td>{{ $branchManager->email ?? ''}}</td>
                        <td>{{ $branchManager->phone ?? ''}}</td>
                        <td>{{ $branchManager->branch->name ?? ''}}</td>
                        <td>
                            @if($branchManager->status  == 'Active')
                            <span class="badge badge-success">Actif</span>
                            @else
                            <span class="badge badge-danger">Inactif</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('branchmanager.edit',$branchManager->id) }}"><button class="btn btn-info btn-sm"> <i class="fa fa-edit"></i> Modifier</button></a>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#changePassword{{ $branchManager->id }}">
                                <i class="fa fa-edit"></i>  Modifier le mot de passe
                            </button>
                            <div class="modal fade" id="changePassword{{ $branchManager->id }}" role="dialog" aria-labelledby="#changePassword" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form method="POST" action="{{ route('branchmanager.changepassword') }}">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="changePassword{{ $branchManager->id }}"><i class="fa fa-edit"></i>&nbsp;Modifier le mot de passe du gestionnaire</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-md-12  container-fluid">
                                                    <div class="form-group">
                                                        <label for="newword" class="text-uppercase"><strong>Nouveau mot de passe</strong></label>
                                                        <input type="password" class="form-control form-control-lg mb-3" id="newword" name="newword" placeholder="Nouveau mot de passe">
                                                        <input type="hidden" name="id" value="{{ $branchManager->id }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12  container-fluid">
                                                    <div class="form-group">
                                                        <label for="newword_confirmation" class="text-uppercase"><strong>Confirmer le mot de passe</strong></label>
                                                        <input type="password" class="form-control form-control-lg mb-3"  id="newword_confirmation" name="newword_confirmation" placeholder="Confirmez le mot de passe">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-info">Modifier le mot de passe</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('admin.branch.staff', $branchManager->branch_id) }}"><button class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> Personnel</button></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Aucune Information</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $branchManagerList->appends(['search'=>request()->search])->links() }}
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#branchManager").addClass("show");
    $("#branchManager li:nth-child(2)").addClass("active");
</script>
@endsection
