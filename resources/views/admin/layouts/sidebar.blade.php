<div class="sidebar sidebar-dark bg-dark">
    <ul class="list-unstyled">
        <li class="active"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-fw fa-tachometer-alt"></i> Tableau de bord</a></li>
        <li>
            <a href="#settings" data-toggle="collapse">
                <i class="fa fa-fw fa-globe"></i> Paramètres du site Web
            </a>
            <ul id="settings" class="list-unstyled collapse">
                <li><a href="{{ route('admin.basicSetting') }}"><i class="fa fa-cog"></i> Paramètres basiques</a></li>
                <li><a href="{{ route('admin.smsSetting') }}"><i class="fa fa-phone"></i> Paramètres SMS</a></li>
                <li><a href="{{ route('admin.emailSetting') }}"><i class="fa fa-envelope"></i> Paramètres de messagerie</a></li>
            </ul>
        </li>
        <li>
            <a href="#courierSetting" data-toggle="collapse">
                <i class="fa fa-fw fa-cog"></i> Paramètres du colis
            </a>
            <ul id="courierSetting" class="list-unstyled collapse">
                <li><a href="{{ route('unit.index') }}"><i class="far fa-circle"></i>&nbsp;Gérer l'unité</a></li>
                <li><a href="{{ route('type.index') }}"><i class="far fa-circle"></i>&nbsp;Gérer le type</a></li>
            </ul>
        </li>
        <li>
            <a href="#branch" data-toggle="collapse">
                <i class="fa fa-fw fa-address-card"></i> Informations sur les Entrepôts
            </a>
            <ul id="branch" class="list-unstyled collapse">
                <li><a href="{{ route('branch.create') }}"><i class="far fa-circle"></i> Ajouter un entrepôt</a></li>
                <li><a href="{{ route('branch.index') }}"><i class="far fa-circle"></i> Gérer l'entrepôt</a></li>
            </ul>
        </li>
        <li>
            <a href="#branchManager" data-toggle="collapse">
                <i class="fa fa-fw fa-users"></i> Infos sur le gestionnaire de l'entrepôt
            </a>
            <ul id="branchManager" class="list-unstyled collapse">
                <li><a href="{{ route('branchmanager.create') }}"><i class="far fa-circle"></i> Ajouter un gestionnaire</a></li>
                <li><a href="{{ route('branchmanager.index') }}"><i class="far fa-circle"></i> Gérer le gestionnaire</a></li>
            </ul>
        </li>

        <li id="companyIncomeList"><a href="{{ route('admin.company.income') }}"><i class="fa fa-fw fa-money-bill-alt"></i>&nbsp;Revenu de l'entreprise</a></li>
    </ul>
</div>
