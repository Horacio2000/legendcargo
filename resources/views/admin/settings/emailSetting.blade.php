@extends('admin.layouts.master')
@section('content')
<div class="content p-4">
    <h2 class="mb-4" style="text-transform: uppercase;">Email Setting</h2>
    <div class="card mb-4">
        <div class="card-body">
            <div class="table-scrollable">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> CODE </th>
                            <th> DESCRIPTION </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> 1 </td>
                            <td> <pre>&#123;&#123;message&#125;&#125;</pre></pre> </td>
                            <td> Détails du texte du script</td>
                        </tr>

                        <tr>
                            <td> 2 </td>
                            <td> <pre>&#123;&#123;name&#125;&#125;</pre> </td>
                            <td> Nom d'utilisateur. Tirera de la base de données et l'utilisera dans le texte EMAIL</td>
                        </tr>
                    </tbody>
                </table>
            </div> <br>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('admin.emailSettingUpdate',$settings->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="col-md-12  container-fluid">
                    <div class="form-group">
                        <label for="email_sent_from" style="text-transform: uppercase;"><strong>E-mail envoyé depuis</strong></label>
                        <input class="form-control form-control-lg mb-3" type="text" name="email_sent_from"  value="{{ $settings->email_sent_from }}">

                    </div>
                </div>
                <div class="col-md-12  container-fluid">
                    <div class="form-group">
                        <label for="email_template" style="text-transform: uppercase;"><strong>EMAIL TEMPLATE</strong></label>
                        <textarea class="form-control" id="email_template" rows="10" name="email_template">{{ $settings->email_template }}</textarea>
                    </div>
                </div>
                <br>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#settings").addClass("show");
    $("#settings li:nth-child(3)").addClass("active");
     new nicEditor({fullPanel: true,iconsPath: '../assets/admin/img/nicEditorIcons.gif'}).panelInstance('email_template');
</script>
@endsection
