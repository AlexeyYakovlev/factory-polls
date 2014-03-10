<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue" id="form_wizard_1">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i> Учтеная запись администратора - <span class="step-title">шаг 1 из 4</span>
                </div>
            </div>
            <div class="portlet-body form">
                <form action="#" class="form-horizontal" id="submit_form">
                    <div class="form-wizard">
                        <div class="form-body">
                            <ul class="nav nav-pills nav-justified steps">
                                <li>
                                    <a href="<?php echo URL::base(); ?>" class="step">
                                        <span class="number">1</span>
                                        <span class="desc"><i class="fa fa-check"></i> Учетная запись</span>   
                                    </a>
                                </li>
                                <li>
                                    <a class="step disabled">
                                        <span class="number">2</span>
                                        <span class="desc"><i class="fa fa-check"></i> Проверка системы</span>   
                                    </a>
                                </li>
                                <li>
                                    <a class="step disabled">
                                        <span class="number">3</span>
                                        <span class="desc"><i class="fa fa-check"></i> Настройки базы данных</span>   
                                    </a>
                                </li>
                                <li>
                                    <a class="step disabled">
                                        <span class="number">4</span>
                                        <span class="desc"><i class="fa fa-check"></i> Настройки проекта</span>   
                                    </a> 
                                </li>
                            </ul>
                            <div id="bar" class="progress progress-striped" role="progressbar">
                                <div class="progress-bar progress-bar-success"></div>
                            </div>
                            <div class="tab-content">
                                <div class="alert alert-danger display-none">
                                    <button class="close" data-dismiss="alert"></button>
                                    На данном шаге возникла ошибка. Проверьте введенные в форму данные. 
                                </div>
                                <div class="alert alert-success">
                                    <button class="close" data-dismiss="alert"></button>
                                    Соединение с сервером баз данных успешно установлено.
                                </div>
                                <div class="tab-pane active" id="tab1">
                                    <h3 class="block">Введите логин и пароль администратора системы</h3>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Username<span class="required">*</span></label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="username">
                                            <span class="help-block">Provide your username</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Password<span class="required">*</span></label>
                                        <div class="col-md-4">
                                            <input type="password" class="form-control" name="password" id="submit_form_password">
                                            <span class="help-block">Provide your password.</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Confirm Password<span class="required">*</span></label>
                                        <div class="col-md-4">
                                            <input type="password" class="form-control" name="rpassword">
                                            <span class="help-block">Confirm your password</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class = "form-actions fluid">
                            <div class = "row">
                                <div class = "col-md-12">
                                    <div class = "col-md-offset-3 col-md-9">
                                        <a href = "javascript:;" class = "btn default button-previous">
                                            <i class = "m-icon-swapleft"></i> Back
                                        </a>
                                        <a href = "javascript:;" class = "btn blue button-next">
                                            Continue <i class = "m-icon-swapright m-icon-white"></i>
                                        </a>
                                        <a href = "javascript:;" class = "btn green button-submit">
                                            Submit <i class = "m-icon-swapright m-icon-white"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>