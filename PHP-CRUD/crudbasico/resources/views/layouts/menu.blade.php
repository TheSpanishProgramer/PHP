<li class="header">MENU PRINCIPAL</li>
<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="{{url('home')}}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
</li>
@if(Auth::user()->hasRole('superadmin'))
    <li class="header">MENU SUPERADMIN</li>
    <?php
    $superadmin = 'superadmin';
    ?>
    <li class="treeview menu-open {{ Request::is('superadmin*') ? 'active' : '' }}">
        <a href="#">
            <i class="fa fa-table"></i> <span>Tablas BD</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ Request::is("$superadmin/roles*") ? 'active' : '' }}">
                <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
            </li>
            <li class="{{ Request::is("$superadmin/users*") ? 'active' : '' }}">
                <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
            </li>
            <li class="{{ Request::is("$superadmin/certificationQuestions*") ? 'active' : '' }}">
                <a href="{!! route('certificationQuestions.index') !!}"><i class="fa fa-edit"></i><span>CertificationQuestions</span></a>
            </li>
            <li class="{{ Request::is("$superadmin/certificationQuestionAnswers*") ? 'active' : '' }}">
                <a href="{!! route('certificationQuestionAnswers.index') !!}"><i class="fa fa-edit"></i><span>CertificationQuestionAnswers</span></a>
            </li>
        </ul>
    </li>
@endif

@if(Auth::user()->hasAnyRole(['superadmin', 'admin']))
    <li class="header">MENU ADMIN</li>
    <?php
    $user = 'admin';
    ?>
    <li class="{{ Request::is("$user/gTAAccounts*") ? 'active' : '' }}">
        <a href="{!! route('gTAAccounts.index') !!}"><img src="{{asset('img/icon-v.png')}}" style="max-height: 20px;"/> <span>GTA Accounts</span></a>
    </li>
@endif

@if(Auth::user()->hasAnyRole(['superadmin', 'admin', 'certificador']))
    <li class="header">MENU CERTIFICADOR</li>
    <?php
    $user = 'certificador';
    ?>
    <li class="{{ Request::is("$user/userCertifications*") ? 'active' : '' }}">
        <a href="{!! route('userCertifications.index') !!}"><i class="fa  fa-certificate"></i><span>Certificaciones</span></a>
    </li>
@endif

<li class="header"><img src="{{asset('img/icon-v.png')}}" style="max-height: 20px;"/> SERVER GTA - ROL</li>
<?php
$user = 'general';
?>
<li class="{{ Request::is("$user/pcu*") ? 'active' : '' }}">
    <a href="{{route('pcu.index')}}"><i class="fa fa-laptop"></i> <span>PCU</span></a>
</li>