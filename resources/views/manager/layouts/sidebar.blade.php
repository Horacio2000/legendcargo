<div class="sidebar sidebar-dark bg-dark">
    <ul class="list-unstyled">
        <li class="active"><a href="{{ route('manager.dashboard') }}"><i class="fa fa-fw fa-tachometer-alt"></i> Tableau de bord</a></li>
        <li id="allbranch"><a href="{{ route('manager.branchlist') }}"><i class="fa fa-fw fa-plus"></i> Tous les entrepôts</a></li>
        <li>
            <a href="#branchStaff" data-toggle="collapse">
                <i class="fa fa-fw fa-user"></i> Info sur le personnel de l'entrepôt
            </a>
            <ul id="branchStaff" class="list-unstyled collapse">
                <li><a href="{{ route('branchstaff.create') }}"><i class="far fa-circle"></i> Ajouter un nouveau personnel</a></li>
                <li><a href="{{ route('branchstaff.index') }}"><i class="far fa-circle"></i> Gérer le personnel</a></li>
            </ul>
        </li>
        <li>
            <a href="#courierInfo" data-toggle="collapse">
                <i class="fa fa-fw fas fa-list"></i> Informations sur le Colis
            </a>
            <ul id="courierInfo" class="list-unstyled collapse">
                <li><a href="{{ route('departure.manager') }}"><i class="far fa-circle"></i> Colis traités</a></li>
                <li><a href="{{ route('upcoming.manager') }}"><i class="far fa-circle"></i> Colis à venir</a></li>
            </ul>
        </li>
        <li id="branchIncome"><a href="{{ route('manager.branch.income') }}"><i class="fa fa-fw fa-money-bill-alt"></i> Revenu de l'entrepôt</a></li>
    </ul>
</div>
